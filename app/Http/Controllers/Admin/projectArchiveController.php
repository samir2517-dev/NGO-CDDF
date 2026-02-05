<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class projectArchiveController extends Controller
{
    //__create
    public function create(){
        return view('admin.project_archive.add');
    }

    //__store
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'partner' => 'required',
        ]);

        $project = [
            'name' => $request->name,
            'partners' => $request->partner,
            'from_date' => $request->from,
            'to_date' => $request->to
        ];

        DB::table('projects')->insert($project);
        return redirect()->back()->with('success','Successfully Inserted');
    }

    //__index
    public function index(){
        $project = DB::table('projects')->get();
        return view('admin.project_archive.index',compact('project'));
    }

    //__delete
    public function destroy($id){
        DB::table('projects')->where('id',$id)->delete();
        return redirect()->back()->with('success', 'Successfully Deleted');
    }

    //__edit
    public function edit($id){
        $project = DB::table('projects')->where('id',$id)->first();
        return view('admin.project_archive.edit',compact('project'));
    }

    //__update
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'partner' => 'required',
        ]);

        $project = [
                'name' => $request->name,
                'partners' => $request->partner,
                'from_date' => $request->from,
                'to_date' => $request->to
            ];

        DB::table('projects')->where('id',$id)->update($project);
        return redirect()->back()->with('success', 'Successfully Updated');
    }
}
