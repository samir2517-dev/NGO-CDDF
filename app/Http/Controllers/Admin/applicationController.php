<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class applicationController extends Controller
{
    public function create(){
        $application = DB::table('applications')->first();
        return view('admin.application.add',compact('application'));
    }

    public function store(Request $request)
    {
        $application = DB::table('applications')->first();

        //main logo
        if($main_logo = $request->file('main_logo'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($application) && file_exists(public_path($application->main_logo)))
            {
                @unlink($application->main_logo);
            }
            $main_logo_path = public_path('images/application/');
            $main_logo_name = rand(100000, 999999)."main_logo." . $main_logo->getClientOriginalExtension();
            $main_logo->move($main_logo_path, $main_logo_name);
            $main_logo_path_name = $main_logo_name;
        }
        else
        {
            if(!empty($application) && isset($application->main_logo))
            {
                $main_logo_path_name = $application->main_logo;
            }
            else
            {
                $main_logo_path_name = NULL;
            }

        }

        //fav icon
        if($fev_icon = $request->file('fev_icon'))
        {
            $request->validate([
                'image' => ['mimes:jpeg,png,jpg', 'max:500'],
            ]);

            if(!empty($application) && file_exists(public_path($application->fav_icon)))
            {
                @unlink($application->fev_icon);
            }
            $fev_icon_path = public_path('images/application/');
            $fev_icon_name= rand(100000, 999999)."fev_icon." . $fev_icon->getClientOriginalExtension();
            $fev_icon->move($fev_icon_path, $fev_icon_name);
            $fev_icon_path_name = $fev_icon_name;
        }
        else
        {
            if(!empty($application) && isset($application->fev_icon))
            {
                $fev_icon_path_name = $application->fev_icon;
            }
            else
            {
                $fev_icon_path_name = NULL;
            }

        }

        $matchThese = ['id' => 1];
        DB::table('applications')->updateOrInsert($matchThese,[
            'main_logo' => $main_logo_path_name,
            'fav_icon' => $fev_icon_path_name,
            'facebook' => $request->fb,
            'twitter' => $request->twitter,
            'instagram' => $request->insta,
            'youtube' => $request->youtube,
        ]);

        return redirect()->back()->with('success','Successfully Inserted Data');
    }

    

    // public function store(Request $request ){
    //     $validatedData = $request->validate([
    //         'logo' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fav' => 'required|mimes:jpg,png,jpeg,gif',
    //         'fb' => 'required',
    //         'twitter' => 'required',
    //         'insta' => 'required',
    //         'youtube' => 'required',
    //     ]);

    //     $logo = '';
    //     if ($image = $request->file('logo')) {
    //         $logo = rand(10000, 99999) . "logo." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $logo);
    //     }

    //     $favicon = '';
    //     if ($image = $request->file('fav')) {
    //         $favicon = rand(10000, 99999) . "fav." . $image->getClientOriginalExtension();
    //         $image->move(public_path('images/application/'), $favicon);
    //     }

    // $application =[
    //     'main_logo' => $logo,
    //     'fav_icon' => $favicon,
    //     'facebook' => $request->fb,
    //     'twitter' => $request->twitter,
    //     'instagram' => $request->insta,
    //     'youtube' => $request->youtube
    // ];

    // DB::table('applications')->insert($application);
    // return redirect()->back()->with('success', 'Successfully inserted data');

    // }

    // index
    public function index()
    {
        $applications = DB::table('applications')->get();
        return view('admin.application.index', compact('applications'));
    }
}
