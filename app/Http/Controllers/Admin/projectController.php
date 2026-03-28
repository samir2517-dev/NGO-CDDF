<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectController extends Controller
{
    // add
    public function add(){
        return view('admin.ongoing_project.add');
    }
    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:10240',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(1000000, 9999999) . "project." . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'), $imageName);
        }

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImageName = rand(10000, 99999) . "_gallery_" . time() . "." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/ongoing_project/gallery/'), $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
        }

        $project = array(
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'gallery_images' => !empty($galleryImages) ? json_encode($galleryImages) : null,
            );

        DB::table('ongoing_project')->insert($project);
        
        // Sync with gallery table
        $projectId = DB::getPdo()->lastInsertId();
        $this->syncGalleryEntries($projectId, $imageName, $galleryImages, $request->title, $request->description);
        
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index(){
        $project = DB::table('ongoing_project')->get();
        return view('admin.ongoing_project.index', compact('project'));
    }

    // Destroy
    public function destroy($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        $oldImageName = public_path('images/project/'.$project->image);

        if(file_exists($oldImageName)){
            @unlink($oldImageName);
        }

        // Delete gallery images
        if ($project->gallery_images) {
            $galleryImages = json_decode($project->gallery_images, true);
            foreach ($galleryImages as $galleryImage) {
                $galleryImagePath = public_path('images/ongoing_project/gallery/' . $galleryImage);
                if (file_exists($galleryImagePath)) {
                    @unlink($galleryImagePath);
                }
            }
        }

        // Remove from gallery table
        DB::table('gallery')->where('source_type', 'project')->where('source_id', $id)->delete();

        DB::table('ongoing_project')->where('id',$id)->delete();
        return redirect()->back()->with('success','Successfully Deleted Project');
    }

    // Edit
    public function edit($id){
        $project = DB::table('ongoing_project')->where('id',$id)->first();
        return view('admin.ongoing_project.edit',compact('project'));
    }

    // Update
    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $project = DB::table('ongoing_project')->where('id',$id)->first();

        $imageName = '';
        $oldImageName = public_path('images/project/'.$project->image);

        if($image = $request->file('image')){
            if(file_exists($oldImageName)){
                @unlink($oldImageName);
            }
            $imageName = rand(10000,99999). "project." . $image->getClientOriginalExtension();
            $image->move(public_path('images/project'),$imageName);
        }
        else{
            $imageName = $project->image;
        }

        // Handle gallery images
        $existingGalleryImages = $project->gallery_images ? json_decode($project->gallery_images, true) : [];
        
        // Handle deleted images
        if ($request->has('deleted_gallery_images')) {
            $deletedImages = json_decode($request->deleted_gallery_images, true);
            foreach ($deletedImages as $deletedImage) {
                $imagePath = public_path('images/ongoing_project/gallery/' . $deletedImage);
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
                $galleryImage->move(public_path('images/ongoing_project/gallery/'), $galleryImageName);
                $existingGalleryImages[] = $galleryImageName;
            }
        }

        $project = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'gallery_images' => !empty($existingGalleryImages) ? json_encode(array_values($existingGalleryImages)) : null,
        );

        DB::table('ongoing_project')->where('id',$id)->update($project);
        
        // Sync with gallery table
        $this->syncGalleryEntries($id, $imageName, $existingGalleryImages, $request->title, $request->description);
        
        return redirect()->route('project.index')->with('update', 'Successfully Updated data');
    }

    /**
     * Sync project images with the main gallery table
     */
    private function syncGalleryEntries($projectId, $coverImage, $galleryImages, $title, $description)
    {
        // Delete existing gallery entries for this project
        DB::table('gallery')->where('source_type', 'project')->where('source_id', $projectId)->delete();

        // Add cover image to gallery
        if ($coverImage) {
            DB::table('gallery')->insert([
                'title' => $title,
                'description' => $description,
                'image' => $coverImage,
                'source_type' => 'project',
                'source_id' => $projectId,
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
                    'source_type' => 'project',
                    'source_id' => $projectId,
                    'image_type' => 'gallery'
                ]);
            }
        }
    }
}
