<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgramController extends Controller
{
    // add
    public function add()
    {
        return view('admin.programs.add');
    }

    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:10240',
            'status' => 'required|in:active,completed,upcoming',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "program." . $image->getClientOriginalExtension();
            $image->move(public_path('images/programs/'), $imageName);
        }

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImageName = rand(10000, 99999) . "_gallery_" . time() . "." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/programs/gallery/'), $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
        }

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'gallery_images' => !empty($galleryImages) ? json_encode($galleryImages) : null,
            'start_date' => $request->start_date,
            'status' => $request->status
        );

        DB::table('programs')->insert($data);
        
        // Sync with gallery table
        $programId = DB::getPdo()->lastInsertId();
        $this->syncGalleryEntries($programId, $imageName, $galleryImages, $request->title, $request->description);
        
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $data = DB::table('programs')->orderBy('id', 'desc')->get();
        return view('admin.programs.index', compact('data'));
    }

    // Destroy
    public function destroy($id)
    {
        $item = DB::table('programs')->where('id', $id)->first();
        $oldImageName = public_path('images/programs/' . $item->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }

        // Delete gallery images
        if ($item->gallery_images) {
            $galleryImages = json_decode($item->gallery_images, true);
            foreach ($galleryImages as $galleryImage) {
                $galleryImagePath = public_path('images/programs/gallery/' . $galleryImage);
                if (file_exists($galleryImagePath)) {
                    @unlink($galleryImagePath);
                }
            }
        }

        // Remove from gallery table
        DB::table('gallery')->where('source_type', 'program')->where('source_id', $id)->delete();

        DB::table('programs')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    // Edit
    public function edit($id)
    {
        $data = DB::table('programs')->where('id', $id)->first();
        return view('admin.programs.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:active,completed,upcoming',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $item = DB::table('programs')->where('id', $id)->first();

        $imageName = '';
        $oldImageName = public_path('images/programs/' . $item->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldImageName)) {
                @unlink($oldImageName);
            }
            $imageName = rand(10000, 99999) . "program." . $image->getClientOriginalExtension();
            $image->move(public_path('images/programs'), $imageName);
        } else {
            $imageName = $item->image;
        }

        // Handle gallery images
        $existingGalleryImages = $item->gallery_images ? json_decode($item->gallery_images, true) : [];
        
        // Handle deleted images
        if ($request->has('deleted_gallery_images')) {
            $deletedImages = json_decode($request->deleted_gallery_images, true);
            foreach ($deletedImages as $deletedImage) {
                $imagePath = public_path('images/programs/gallery/' . $deletedImage);
                if (file_exists($imagePath)) {
                    @unlink($imagePath);
                }
                $existingGalleryImages = array_diff($existingGalleryImages, [$deletedImage]);
            }
        }

        // Handle gallery reordering
        if ($request->has('gallery_order') && $request->gallery_order) {
            $orderedImages = json_decode($request->gallery_order, true);
            // Filter to only include images that still exist (not deleted)
            $existingGalleryImages = array_intersect($orderedImages, $existingGalleryImages);
        }

        // Add new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImageName = rand(10000, 99999) . "_gallery_" . time() . "." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/programs/gallery/'), $galleryImageName);
                $existingGalleryImages[] = $galleryImageName;
            }
        }

        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'gallery_images' => !empty($existingGalleryImages) ? json_encode(array_values($existingGalleryImages)) : null,
            'start_date' => $request->start_date,
            'status' => $request->status
        );

        DB::table('programs')->where('id', $id)->update($data);
        
        // Sync with gallery table
        $this->syncGalleryEntries($id, $imageName, $existingGalleryImages, $request->title, $request->description);
        
        return redirect()->route('programs.index')->with('update', 'Successfully Updated');
    }

    /**
     * Sync program images with the main gallery table
     */
    private function syncGalleryEntries($programId, $coverImage, $galleryImages, $title, $description)
    {
        // Delete existing gallery entries for this program
        DB::table('gallery')->where('source_type', 'program')->where('source_id', $programId)->delete();

        // Add cover image to gallery
        if ($coverImage) {
            DB::table('gallery')->insert([
                'title' => $title,
                'description' => $description,
                'image' => $coverImage,
                'source_type' => 'program',
                'source_id' => $programId,
                'image_type' => 'cover'
            ]);
        }

        // Add all gallery images
        if (!empty($galleryImages)) {
            foreach ($galleryImages as $index => $galleryImage) {
                DB::table('gallery')->insert([
                    'title' => $title,
                    'description' => $description,
                    'image' => $galleryImage,
                    'source_type' => 'program',
                    'source_id' => $programId,
                    'image_type' => 'gallery'
                ]);
            }
        }
    }
}
