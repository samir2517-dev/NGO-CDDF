<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class galleryController extends Controller
{
    // add
    public function add()
    {
        return view('admin.gallery.add');
    }
    // Store
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = rand(10000, 99999) . "gallery." . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery/'), $imageName);
        }

        $gallery = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'source_type' => 'manual', // Manually added gallery items
            'source_id' => null,
            'image_type' => null
        );

        DB::table('gallery')->insert($gallery);
        return redirect()->back()->with('success', 'Successfully inserted data');
    }

    // index
    public function index()
    {
        $gallery = DB::table('gallery')->get();
        return view('admin.galLery.index', compact('gallery'));
    }

    // Destroy
    public function destroy($id)
    {
        $gallery = DB::table('gallery')->where('id', $id)->first();
        
        // Prevent deletion of auto-synced items
        if ($gallery->source_type && $gallery->source_type !== 'manual') {
            return redirect()->back()->with('error', 'Cannot delete auto-synced gallery items. Delete the source ' . $gallery->source_type . ' instead.');
        }
        
        // Only delete manual gallery images from the gallery folder
        $oldImageName = public_path('images/gallery/' . $gallery->image);

        if (file_exists($oldImageName)) {
            @unlink($oldImageName);
        }
        
        DB::table('gallery')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted Gallery Item');
    }

    // Edit
    public function edit($id)
    {
        $gallery = DB::table('gallery')->where('id', $id)->first();
        return view('admin.gallery.edit', compact('gallery'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $gallery = DB::table('gallery')->where('id', $id)->first();

        $imageName = '';
        $oldIamgeName = public_path('images/gallery/' . $gallery->image);

        if ($image = $request->file('image')) {
            if (file_exists($oldIamgeName)) {
                @unlink($oldIamgeName);
            }
            $imageName = rand(10000, 99999) . "gallery." . $image->getClientOriginalExtension();
            $image->move(public_path('images/gallery'), $imageName);
        } else {
            $imageName = $gallery->image;
        }

        $gallery = array(
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        );

        DB::table('gallery')->where('id', $id)->update($gallery);
        return redirect()->route('gallery.index')->with('update', 'Successfully Updated News');
    }
}

