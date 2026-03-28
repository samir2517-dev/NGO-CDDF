<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class newsController extends Controller
{
    // add
    public function add()
    {
        return view('admin.latest_news.add');
    }
    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif|max:10240',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $imageName = '';
        if($image = $request->file('image')){
            $imageName = rand(10000,99999) . "news." . $image->getClientOriginalExtension();
            $image->move(public_path('images/news/'),$imageName);
        }

        // Handle gallery images
        $galleryImages = [];
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $galleryImage) {
                $galleryImageName = rand(10000, 99999) . "_gallery_" . time() . "." . $galleryImage->getClientOriginalExtension();
                $galleryImage->move(public_path('images/news/gallery/'), $galleryImageName);
                $galleryImages[] = $galleryImageName;
            }
        }

        $news = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'gallery_images' => !empty($galleryImages) ? json_encode($galleryImages) : null,
        );

        DB::table('latest_news')->insert($news);
        
        // Sync with gallery table
        $newsId = DB::getPdo()->lastInsertId();
        $this->syncGalleryEntries($newsId, $imageName, $galleryImages, $request->title, $request->description);
        
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $news = DB::table('latest_news')->get();
        return view('admin.latest_news.index', compact('news'));
    }

    // Destroy
    public function destroy($id)
    {
        $news = DB::table('latest_news')->where('id',$id)->first();
        $oldIamgeName = public_path('images/news/'.$news->image);

        if(file_exists($oldIamgeName)){
            @unlink($oldIamgeName);
        }

        // Delete gallery images
        if ($news->gallery_images) {
            $galleryImages = json_decode($news->gallery_images, true);
            foreach ($galleryImages as $galleryImage) {
                $galleryImagePath = public_path('images/news/gallery/' . $galleryImage);
                if (file_exists($galleryImagePath)) {
                    @unlink($galleryImagePath);
                }
            }
        }

        // Remove from gallery table
        DB::table('gallery')->where('source_type', 'news')->where('source_id', $id)->delete();

        DB::table('latest_news')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted News');
    }

    // Edit
    public function edit($id)
    {
        $news = DB::table('latest_news')->where('id', $id)->first();
        return view('admin.latest_news.edit', compact('news'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'gallery_images.*' => 'nullable|mimes:jpg,png,jpeg,gif|max:10240',
        ]);

        $news = DB::table('latest_news')->where('id',$id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/news/'.$news->image);

        if($image = $request->file('image')){
            if(file_exists($oldIamgeName)){
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000,99999) . "news." . $image->getClientOriginalExtension();
            $image->move(public_path('images/news'), $imageName);
        }
        else{
            $imageName = $news->image;
        }

        // Handle gallery images
        $existingGalleryImages = $news->gallery_images ? json_decode($news->gallery_images, true) : [];
        
        // Handle deleted images
        if ($request->has('deleted_gallery_images')) {
            $deletedImages = json_decode($request->deleted_gallery_images, true);
            foreach ($deletedImages as $deletedImage) {
                $imagePath = public_path('images/news/gallery/' . $deletedImage);
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
                $galleryImage->move(public_path('images/news/gallery/'), $galleryImageName);
                $existingGalleryImages[] = $galleryImageName;
            }
        }

        $news = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'gallery_images' => !empty($existingGalleryImages) ? json_encode(array_values($existingGalleryImages)) : null,
        );

        DB::table('latest_news')->where('id', $id)->update($news);
        
        // Sync with gallery table
        $this->syncGalleryEntries($id, $imageName, $existingGalleryImages, $request->title, $request->description);
        
        return redirect()->route('news.index')->with('update', 'Successfully Updated News');
    }

    /**
     * Sync news images with the main gallery table
     */
    private function syncGalleryEntries($newsId, $coverImage, $galleryImages, $title, $description)
    {
        // Delete existing gallery entries for this news
        DB::table('gallery')->where('source_type', 'news')->where('source_id', $newsId)->delete();

        // Add cover image to gallery
        if ($coverImage) {
            DB::table('gallery')->insert([
                'title' => $title,
                'description' => $description,
                'image' => $coverImage,
                'source_type' => 'news',
                'source_id' => $newsId,
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
                    'source_type' => 'news',
                    'source_id' => $newsId,
                    'image_type' => 'gallery'
                ]);
            }
        }
    }
}
