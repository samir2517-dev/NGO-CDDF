<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class aboutusController extends Controller
{
    //__Create__//
    public function create(){
        $about = DB::table('about_us')->first();
        return view('admin.about.add',compact('about'));
    }

    //__Store__//
    public function store(Request $request){
        $validatedData = $request->validate([
            'description' => 'required',
        ]);

        $matchThese = ['id' => 1];
        DB::table('about_us')->updateOrInsert($matchThese, [
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success','Successfully Added');
    }
}
