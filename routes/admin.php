<?php

use App\Http\Controllers\Admin\aboutusController;
use App\Http\Controllers\Admin\applicationController;
use App\Http\Controllers\Admin\galleryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\invokedController;
use App\Http\Controllers\Admin\legalAffilationController;
use App\Http\Controllers\Admin\messageController;
use App\Http\Controllers\Admin\missionController;
use App\Http\Controllers\Admin\newsController;
use App\Http\Controllers\Admin\partnersController;
use App\Http\Controllers\Admin\policyController;
use App\Http\Controllers\Admin\projectArchiveController;
use App\Http\Controllers\Admin\projectController;
use App\Http\Controllers\Admin\sliderController;
use App\Http\Controllers\Admin\subscribeController;
use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', function () {
        return redirect('/admin/home');
    })->name('admin.home');
    
    Auth::routes(['register' => false]);
});


Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::prefix('admin')->group(function () {
    // slider
    Route::get('/slider/add',[sliderController::class,'add'])->name('slider.add');
    Route::post('/slider/store',[sliderController::class,'store'])->name('slider.store');
    Route::get('/slider/all',[sliderController::class,'index'])->name('slider.index');
    Route::get('/slider/delete/{id}',[sliderController::class,'destroy'])->name('slider.delete');
    Route::get('/slider/edit/{id}',[sliderController::class,'edit'])->name('slider.edit');
    Route::post('/slider/update/{id}',[sliderController::class,'update'])->name('slider.update');

    // Ongoing Project
    Route::get('/project/add', [projectController::class, 'add'])->name('project.add');
    Route::post('/project/store', [projectController::class, 'store'])->name('project.store');
    Route::get('/project/index', [projectController::class, 'index'])->name('project.index');
    Route::get('/project/delete/{id}', [projectController::class, 'destroy'])->name('project.delete');
    Route::get('/project/edit/{id}', [projectController::class, 'edit'])->name('project.edit');
    Route::post('/project/update/{id}', [projectController::class, 'update'])->name('project.update');

    // Latest News
    Route::get('/news/add', [newsController::class, 'add'])->name('news.add');
    Route::post('/news/store', [newsController::class, 'store'])->name('news.store');
    Route::get('/news/index', [newsController::class, 'index'])->name('news.index');
    Route::get('/news/delete/{id}', [newsController::class, 'destroy'])->name('news.delete');
    Route::get('/news/edit/{id}', [newsController::class, 'edit'])->name('news.edit');
    Route::post('/news/update/{id}', [newsController::class, 'update'])->name('news.update');

    // Photo Gallery
    Route::get('/gallery/add', [galleryController::class, 'add'])->name('gallery.add');
    Route::post('/gallery/store', [galleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/index', [galleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/delete/{id}', [galleryController::class, 'destroy'])->name('gallery.delete');
    Route::get('/gallery/edit/{id}', [galleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/update/{id}', [galleryController::class, 'update'])->name('gallery.update');

    // Subscribe
    Route::get('admin/subscribe',[subscribeController::class,'index'])->name('subscribe.all');
    Route::get('admin/subscribe/delete/{id}',[subscribeController::class,'destroy'])->name('subscribe.delete');

    // Message
    Route::get('message/index',[messageController::class,'index'])->name('message.index');
    Route::get('message/delete/{id}',[messageController::class,'destroy'])->name('message.delete');
    Route::get('message/view/{id}',[messageController::class,'view'])->name('message.view');

    //__ about us__//
    Route::get('about/us/add',[aboutusController::class,'create'])->name('about.us.create');
    Route::post('about/us/store',[aboutusController::class,'store'])->name('about.us.store');

    //__Mission and Vision__//
    Route::get('/mission/vision/create',[missionController::class,'create'])->name('mission.vision.create');
    Route::post('/mission/vision/store',[missionController::class,'store'])->name('mission.vision.store');

    //__Origin and Legal Affilation__//
    Route::get('/origin/legal_affilation/create',[legalAffilationController::class,'create'])->name('origin.legal_affilation.create');
    Route::post('/origin/legal_affilation/store',[legalAffilationController::class,'store'])->name('origin.legal_affilation.store');
    Route::get('/origin/legal_affilation/index',[legalAffilationController::class,'index'])->name('origin.legal_affilation.index');
    Route::get('/origin/legal_affilation/delete/{id}',[legalAffilationController::class,'destroy'])->name('origin.legal_affilation.delete');
    Route::get('/origin/legal_affilation/edit/{id}',[legalAffilationController::class,'edit'])->name('origin.legal_affilation.edit');
    Route::post('origin/legal_affilation/update/{id}', [legalAffilationController::class, 'update'])->name('origin.legal_affilation.update');

    //__Partner's and Donor's __//
    Route::get('partner/create', [partnersController::class, 'create'])->name('partner.create');
    Route::post('partner/store', [partnersController::class, 'store'])->name('partner.store');
    Route::get('partner/index', [partnersController::class, 'index'])->name('partner.index');
    Route::get('partner/delete/{id}',[partnersController::class,'destroy'])->name('partner.delete');
    Route::get('partner/edit/{id}',[partnersController::class,'edit'])->name('partner.edit');
    Route::post('partner/update/{id}',[partnersController::class,'update'])->name('partner.update');

    //__Project Archive __//
    Route::get('project/archive/create', [projectArchiveController::class, 'create'])->name('project.archive.create');
    Route::post('project/archive/store', [projectArchiveController::class, 'store'])->name('project.archive.store');
    Route::get('project/archive/index', [projectArchiveController::class, 'index'])->name('project.archive.index');
    Route::get('project/archive/delete/{id}',[projectArchiveController::class,'destroy'])->name('project.archive.delete');
    Route::get('project/archive/edit/{id}',[projectArchiveController::class,'edit'])->name('project.archive.edit');
    Route::post('project/archive/update/{id}',[projectArchiveController::class,'update'])->name('project.archive.update');

    //__Policy & Guideline __//
    Route::get('policy/create', [policyController::class, 'create'])->name('policy.create');
    Route::post('policy/store', [policyController::class, 'store'])->name('policy.store');
    Route::get('policy/index', [policyController::class, 'index'])->name('policy.index');
    Route::get('policy/delete/{id}',[policyController::class,'destroy'])->name('policy.delete');
    Route::get('policy/edit/{id}',[policyController::class,'edit'])->name('policy.edit');
    Route::post('policy/update/{id}',[policyController::class,'update'])->name('policy.update');

    //__Get Invoked __//
    Route::get('invoked/create', [invokedController::class, 'create'])->name('invoked.create');
    Route::post('invoked/store', [invokedController::class, 'store'])->name('invoked.store');
    Route::get('invoked/index', [invokedController::class, 'index'])->name('invoked.index');
    Route::get('invoked/delete/{id}',[invokedController::class,'destroy'])->name('invoked.delete');
    Route::get('invoked/edit/{id}',[invokedController::class,'edit'])->name('invoked.edit');
    Route::post('invoked/update/{id}',[invokedController::class,'update'])->name('invoked.update');

    //__ Applicaiton Logo, Favicon __//
    Route::get('logo/create', [applicationController::class, 'create'])->name('logo.create');
    Route::post('logo/store', [applicationController::class, 'store'])->name('logo.store');
    Route::get('logo/index', [applicationController::class, 'index'])->name('logo.index');
    Route::get('logo/delete/{id}',[applicationController::class,'destroy'])->name('logo.delete');
    Route::get('logo/edit/{id}',[applicationController::class,'edit'])->name('logo.edit');
    Route::post('logo/update/{id}',[applicationController::class,'update'])->name('logo.update');


});
