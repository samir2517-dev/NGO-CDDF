@extends('main')

@section('title')
Bakultali Mahila Sangshad
@endsection

@section('content')

<style>
/* Hero Slider - Complete Custom Implementation */
.hero-slider-container {
    position: relative;
    width: 100%;
    height: 100vh;
    min-height: 600px;
    overflow: hidden;
}

.hero-slider-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
}

.hero-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.8s ease-in-out, visibility 0.8s ease-in-out;
    z-index: 0;
}

.hero-slide.active {
    opacity: 1;
    visibility: visible;
    z-index: 1;
}

.hero-slide .hero-wrap {
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Slider Navigation */
.slider-nav {
    position: absolute;
    top: 50%;
    width: 100%;
    transform: translateY(-50%);
    z-index: 10;
    pointer-events: none;
}

.slider-nav button {
    position: absolute;
    width: 50px;
    height: 50px;
    background: transparent;
    border: none;
    color: #fff;
    font-size: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
    pointer-events: all;
    outline: none;
    opacity: 0.8;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.slider-nav button:hover {
    opacity: 1;
    transform: scale(1.2);
}

.slider-nav .prev {
    left: 20px;
}

.slider-nav .next {
    right: 20px;
}

/* Slider Dots */
.slider-dots {
    position: absolute;
    bottom: 30px;
    width: 100%;
    text-align: center;
    z-index: 10;
}

.slider-dots span {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 0 5px;
    background: rgba(255, 255, 255, 0.5);
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s ease;
    border: none;
    outline: none;
}

.slider-dots span.active {
    background: rgba(255, 255, 255, 1);
    width: 30px;
    border-radius: 6px;
}

.slider-dots span:hover {
    background: rgba(255, 255, 255, 0.8);
}

/* Remove orange border from carousel navigation arrows */
.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
}

.owl-carousel .owl-nav button.owl-prev:focus,
.owl-carousel .owl-nav button.owl-next:focus,
.owl-carousel .owl-nav button.owl-prev:active,
.owl-carousel .owl-nav button.owl-next:active {
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
}

/* Hover bounce animation for cards */
.blog-entry,
.staff,
.gallery-item,
.cause-entry {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Gallery Masonry Layout */
.gallery-masonry {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 200px;
    gap: 15px;
    grid-auto-flow: dense;
}

.gallery-item-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.gallery-item-normal {
    grid-row: span 1;
    grid-column: span 1;
}

.gallery-item-tall {
    grid-row: span 2;
    grid-column: span 1;
}

.gallery-item-wide {
    grid-row: span 1;
    grid-column: span 2;
}

.gallery-item {
    display: block;
    width: 100%;
    height: 100%;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.gallery-item:hover img {
    transform: scale(1.1);
}

.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(13, 71, 161, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

.gallery-overlay .icon-search {
    color: white;
    font-size: 2.5rem;
}

.gallery-title-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.7) 70%, transparent 100%);
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-title-overlay {
    transform: translateY(0);
}

.gallery-title-overlay h5 {
    color: white;
    margin: 0;
    font-size: 1rem;
    font-weight: 600;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

/* Responsive Gallery */
@media (max-width: 992px) {
    .gallery-masonry {
        grid-template-columns: repeat(2, 1fr);
        grid-auto-rows: 180px;
    }
}

@media (max-width: 576px) {
    .gallery-masonry {
        grid-template-columns: 1fr;
        grid-auto-rows: 200px;
    }
    
    .gallery-item-tall,
    .gallery-item-wide {
        grid-row: span 1;
        grid-column: span 1;
    }
}

/* Magnific Popup Custom Styles */
.mfp-with-zoom .mfp-container,
.mfp-with-zoom.mfp-bg {
    opacity: 0;
    transition: all 0.3s ease-out;
}

.mfp-with-zoom.mfp-ready .mfp-container {
    opacity: 1;
}

.mfp-with-zoom.mfp-ready.mfp-bg {
    opacity: 0.8;
}

.mfp-with-zoom.mfp-removing .mfp-container,
.mfp-with-zoom.mfp-removing.mfp-bg {
    opacity: 0;
}

.mfp-title {
    padding-right: 0 !important;
}

.mfp-bottom-bar {
    margin-top: -50px;
}

.mfp-counter {
    color: white;
    font-size: 14px;
    font-weight: 600;
}

/* Blue Theme Color Variations */
.btn-primary {
    background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%) !important;
    border: none !important;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #01579B 0%, #0D47A1 100%) !important;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(13, 71, 161, 0.4) !important;
}

/* Additional accent colors for variety */
.accent-purple {
    color: #5E35B1 !important;
}

.accent-teal {
    color: #0D47A1 !important;
}

.accent-cyan {
    color: #5E35B1 !important;
}

.bg-gradient-blue {
    background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);
}

.bg-gradient-purple {
    background: linear-gradient(135deg, #E8EAF6 0%, #C5CAE9 100%);
}

.bg-gradient-teal {
    background: linear-gradient(135deg, #E1F5FE 0%, #B3E5FC 100%);
}

.blog-entry:hover,
.staff:hover,
.gallery-item:hover,
.cause-entry:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

/* Smooth image transitions */
.blog-entry img,
.staff img,
.gallery-item img {
    transition: transform 0.3s ease;
}

.blog-entry:hover img,
.staff:hover img,
.gallery-item:hover img {
    transform: scale(1.05);
}

/* Ensure overflow hidden for image scaling */
.blog-entry a,
.staff .img-wrap,
.gallery-item {
    overflow: hidden;
}
</style>

{{-- Hero Section with Custom Slider --}}
<div class="hero-slider-container" id="heroSlider">
    <div class="hero-slider-wrapper">
        @if(count($slider) > 0)
            @foreach($slider as $key => $slide)
            <div class="hero-slide {{ $key == 0 ? 'active' : '' }}" data-index="{{ $key }}">
                <div class="hero-wrap" style="background-image: url('{{ asset('images/slider/'.$slide->image) }}');">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text align-items-center justify-content-center">
                            <div class="col-md-7 ftco-animate text-center">
                                <h1 class="mb-4">{{ $slide->title }}</h1>
                                <p class="mb-5">{{ $slide->description }}</p>
                                <p>
                                    <a href="{{ route('donate') }}" class="btn btn-primary px-4 py-3">Donate Now</a>
                                    <a href="{{ route('about.us') }}" class="btn btn-white btn-outline-white px-4 py-3 ml-2">Learn More</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="hero-slide active" data-index="0">
                <div class="hero-wrap" style="background-image: url('{{ asset('img/slider/slider-1.jpg') }}');">
                    <div class="overlay"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text align-items-center justify-content-center">
                            <div class="col-md-7 ftco-animate text-center">
                                <h1 class="mb-4">Doing Nothing is Not An Option of Our Life</h1>
                                <p class="mb-5">Empowering communities in northern Bangladesh since 1999</p>
                                <p>
                                    <a href="{{ route('donate') }}" class="btn btn-primary px-4 py-3">Donate Now</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    
    @if(count($slider) > 1)
    <!-- Navigation Arrows -->
    <div class="slider-nav">
        <button class="prev" onclick="heroSlider.prev()">
            <span class="icon-chevron-left"></span>
        </button>
        <button class="next" onclick="heroSlider.next()">
            <span class="icon-chevron-right"></span>
        </button>
    </div>
    
    <!-- Dots Navigation -->
    <div class="slider-dots" id="sliderDots"></div>
    @endif
</div>

{{-- Counter/Intro Section --}}
<section class="ftco-counter ftco-intro" id="section-counter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-1 align-items-stretch">
                    <div class="text">
                        <span>Served Over</span>
                        <strong class="number" data-number="1300000">0</strong>
                        <span>People in 3 districts of Bangladesh</span>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-2 align-items-stretch">
                    <div class="text">
                        <h3 class="mb-4">Donate Money</h3>
                        <p>Support our mission to empower communities in northern Bangladesh through education, healthcare, and sustainable development.</p>
                        <p><a href="{{ route('donate') }}" class="btn btn-white px-3 py-2 mt-2">Donate Now</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 color-3 align-items-stretch">
                    <div class="text">
                        <h3 class="mb-4">Be a Volunteer</h3>
                        <p>Join our team of dedicated volunteers making a real difference in the lives of marginalized communities.</p>
                        <p><a href="{{ route('volunterr.opportunities') }}" class="btn btn-white px-3 py-2 mt-2">Be A Volunteer</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="ftco-section" style="padding-bottom: 2rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <a href="{{ route('donate') }}" class="text-decoration-none w-100" style="color: inherit;">
                    <div class="media block-6 d-flex services p-3 py-4 d-block" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation-1"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Make Donation</h3>
                            <p>Your generous donations help us provide essential services, education, and healthcare to underserved communities in northern Bangladesh.</p>
                        </div>
                    </div>
                </a>      
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <a href="{{ route('volunterr.opportunities') }}" class="text-decoration-none w-100" style="color: inherit;">
                    <div class="media block-6 d-flex services p-3 py-4 d-block" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="icon d-flex mb-3"><span class="flaticon-charity"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Become A Volunteer</h3>
                            <p>Join hands with us in our mission to create positive change. Volunteer your time and skills to make a lasting impact.</p>
                        </div>
                    </div>
                </a>      
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <a href="{{ route('corporate.partnership') }}" class="text-decoration-none w-100" style="color: inherit;">
                    <div class="media block-6 d-flex services p-3 py-4 d-block" style="cursor: pointer; transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <div class="icon d-flex mb-3"><span class="flaticon-donation"></span></div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Sponsorship</h3>
                            <p>Partner with BMS through corporate sponsorship and help us expand women's empowerment programs to reach more vulnerable communities across northern Bangladesh.</p>
                        </div>
                    </div>
                </a>    
            </div>
        </div>
    </div>
</section>

{{-- Mission & Vision Section --}}
<section class="ftco-section bg-light" style="padding-top: 2rem;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4">Our Mission & Vision</h2>
                <p class="lead">Empowering communities, transforming lives, and building a just society for all</p>
            </div>
        </div>
        
        @if(isset($mission_vision) && $mission_vision)
        <div class="row align-items-stretch">
            {{-- Mission Card --}}
            <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="100">
                <div class="mission-vision-card h-100 bg-white shadow-sm" style="border-radius: 15px; overflow: hidden; border-left: 5px solid #0D47A1; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(13, 71, 161,0.3);">
                                <i class="icon-target" style="font-size: 2rem; color: white;"></i>
                            </div>
                            <h3 class="mb-0" style="font-size: 1.8rem; font-weight: 700; color: #333; margin-left: 25px;">Our Mission</h3>
                        </div>
                        <div class="mission-content">
                            <p style="font-size: 1.05rem; line-height: 1.9; color: #555; text-align: justify;">
                                @if($mission_vision->mission)
                                    {{ $mission_vision->mission }}
                                @else
                                    To empower women and girls through education, economic self-reliance, and leadership training, while building community resilience against climate change and natural disasters.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Vision Card --}}
            <div class="col-lg-6 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="mission-vision-card h-100 bg-white shadow-sm" style="border-radius: 15px; overflow: hidden; border-left: 5px solid #5E35B1; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="p-5">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);">
                                <i class="bx bxs-bulb" style="font-size: 2.5rem; color: white;"></i>
                            </div>
                            <h3 class="mb-0" style="font-size: 1.8rem; font-weight: 700; color: #333; margin-left: 25px;">Our Vision</h3>
                        </div>
                        <div class="vision-content">
                            <p style="font-size: 1.05rem; line-height: 1.9; color: #555; text-align: justify;">
                                @if($mission_vision->vision)
                                    {{ $mission_vision->vision }}
                                @else
                                    A society where every individual, regardless of gender or economic status, can realize their full potential in a vibrant and just environment.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- Core Values Section --}}
        @if($mission_vision->values)
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12">
                <div class="values-section bg-white shadow-sm p-5" style="border-radius: 15px; border-top: 4px solid #5E35B1; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);">
                            <i class="icon-heart" style="font-size: 2rem; color: white;"></i>
                        </div>
                        <h3 style="font-size: 1.8rem; font-weight: 700; color: #333;">Our Core Values</h3>
                    </div>
                    <div class="values-content">
                        <p style="font-size: 1.05rem; line-height: 1.9; color: #555; text-align: justify;">
                            {{ $mission_vision->values }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @else
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted">Mission and Vision information will be available soon.</p>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Featured Programs Section --}}
<section class="ftco-section" style="background: linear-gradient(135deg, #E1F5FE 0%, #B3E5FC 100%);">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4">Featured Programs</h2>
                <p>Empowering Women, Building Resilience: BMS's Featured Programs create pathways to economic independence and leadership for women and girls in disaster-prone communities.</p>
            </div>
        </div>
        <div class="row d-flex">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs->take(3) as $key => $program)
                <div class="col-md-4 d-flex ftco-animate" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">
                    <div class="blog-entry align-self-stretch w-100 shadow-sm">
                        <a href="{{ route('programs.view', $program->id) }}">
                            @if($program->image && file_exists(public_path('images/programs/'.$program->image)))
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" class="img-fluid" style="width: 100%; height: 270px; object-fit: cover;">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg" alt="{{ $program->title }}" class="img-fluid" style="width: 100%; height: 270px; object-fit: cover;">
                            @endif
                        </a>
                        <div class="text p-4 d-block bg-white">
                            <div class="meta mb-3">
                                @if($program->start_date)
                                <div class="d-inline-block me-3"><a href="#" class="text-muted"><i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($program->start_date)) }}</a></div>
                                @endif
                                @if($program->status)
                                <div class="d-inline-block"><span class="badge bg-{{ $program->status == 'active' ? 'success' : ($program->status == 'completed' ? 'secondary' : 'info') }}">{{ ucfirst($program->status) }}</span></div>
                                @endif
                            </div>
                            <h3 class="heading mt-2"><a href="{{ route('programs.view', $program->id) }}">{{ Str::limit($program->title, 50) }}</a></h3>
                            <p class="text-muted">{{ Str::limit($program->description, 100) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p class="text-muted">No featured programs available at the moment.</p>
                </div>
            @endif
        </div>
        @if(isset($programs) && count($programs) > 0)
        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('programs.all') }}" class="btn btn-primary px-4 py-3">View All Programs</a>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Photo Gallery Section --}}
<section class="ftco-section-3 img bg-light" style="padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4">Photo Gallery</h2>
                <p>Capturing moments of change, hope, and empowerment across our programs and initiatives.</p>
            </div>
        </div>
        @if(isset($gallery) && count($gallery) > 0)
        <div class="gallery-masonry" data-aos="fade-up">
            @foreach($gallery->take(12) as $key => $photo)
            @php
                // Create dynamic sizing pattern for masonry effect
                $sizeClasses = [
                    'gallery-item-tall', // Image 1: tall
                    'gallery-item-wide', // Image 2: wide
                    'gallery-item-normal', // Image 3: normal
                    'gallery-item-normal', // Image 4: normal
                    'gallery-item-wide', // Image 5: wide
                    'gallery-item-tall', // Image 6: tall
                    'gallery-item-normal', // Image 7: normal
                    'gallery-item-normal', // Image 8: normal
                    'gallery-item-tall', // Image 9: tall
                    'gallery-item-wide', // Image 10: wide
                    'gallery-item-normal', // Image 11: normal
                    'gallery-item-normal', // Image 12: normal
                ];
                $sizeClass = $sizeClasses[$key % 12];
                
                // Determine image path based on source type
                $imagePath = 'images/gallery/' . $photo->image;
                if ($photo->source_type === 'program') {
                    $imagePath = $photo->image_type === 'cover' 
                        ? 'images/programs/' . $photo->image 
                        : 'images/programs/gallery/' . $photo->image;
                } elseif ($photo->source_type === 'project') {
                    $imagePath = $photo->image_type === 'cover' 
                        ? 'images/project/' . $photo->image 
                        : 'images/ongoing_project/gallery/' . $photo->image;
                } elseif ($photo->source_type === 'news') {
                    $imagePath = $photo->image_type === 'cover' 
                        ? 'images/news/' . $photo->image 
                        : 'images/news/gallery/' . $photo->image;
                }
            @endphp
            <div class="gallery-item-wrapper {{ $sizeClass }}" data-aos="zoom-in" data-aos-delay="{{ ($key + 1) * 100 }}">
                <a href="{{ asset($imagePath) }}" 
                   class="gallery-item image-popup d-block position-relative overflow-hidden" 
                   data-title="{{ $photo->title }}" 
                   data-description="{{ $photo->description }}">
                    <img src="{{ asset($imagePath) }}" alt="{{ $photo->title }}" class="img-fluid w-100 h-100">
                    <div class="gallery-overlay">
                        <span class="icon-search"></span>
                    </div>
                    <div class="gallery-title-overlay">
                        <h5>{{ $photo->title }}</h5>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('photo.all') }}" class="btn btn-primary px-4 py-3">View All Photos</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-muted">No gallery images available</p>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Latest News Section --}}
<section class="ftco-section" style="background: linear-gradient(135deg, #E8EAF6 0%, #C5CAE9 100%);">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4">Latest News & Events</h2>
                <p>Stay updated with BMS's latest news and events, showcasing our work in women's empowerment, disaster preparedness, and community-led development initiatives.</p>
            </div>
        </div>
        <div class="row">
            @if(isset($news) && count($news) > 0)
                @php $firstNews = $news->first(); $otherNews = $news->skip(1)->take(2); @endphp
                {{-- Featured News (Left Large) --}}
                <div class="col-lg-6 mb-4 ftco-animate" data-aos="fade-right">
                    <div class="featured-news bg-white shadow-sm d-flex flex-column" style="border-radius: 10px; overflow: hidden; height: 100%; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                        <a href="{{ route('latest.news.view', $firstNews->id) }}" class="d-block position-relative overflow-hidden" style="height: 350px;">
                            <img src="{{ asset('images/news/'.$firstNews->image) }}" alt="{{ $firstNews->title }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="mb-3">
                                <span class="badge bg-primary" style="font-size: 0.85rem; padding: 6px 14px; border-radius: 20px;">Recent</span>
                                <span class="text-muted ms-2" style="font-size: 0.9rem;"><i class="fa fa-calendar"></i> {{ isset($firstNews->created_at) ? date('M d, Y', strtotime($firstNews->created_at)) : 'Recent' }}</span>
                            </div>
                            <h3 class="mb-3" style="font-size: 1.5rem; font-weight: 700; line-height: 1.4;">
                                <a href="{{ route('latest.news.view', $firstNews->id) }}" style="color: #333; text-decoration: none;">{{ $firstNews->title }}</a>
                            </h3>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 1rem; line-height: 1.7;">{{ Str::limit($firstNews->description, 180) }}</p>
                            <a href="{{ route('latest.news.view', $firstNews->id) }}" class="text-primary" style="font-size: 1rem; font-weight: 600; text-decoration: none;">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                {{-- Other News (Right Stacked) --}}
                <div class="col-lg-6">
                    <div class="row">
                        @foreach($otherNews as $key => $newsItem)
                        <div class="col-12 mb-4 ftco-animate" data-aos="fade-left" data-aos-delay="{{ ($key + 1) * 100 }}">
                            <div class="news-card-horizontal shadow-sm bg-white" style="border-radius: 10px; overflow: hidden;">
                                <div class="row g-0">
                                    <div class="col-5">
                                        <a href="{{ route('latest.news.view', $newsItem->id) }}" class="d-block h-100">
                                            <img src="{{ asset('images/news/'.$newsItem->image) }}" alt="{{ $newsItem->title }}" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 220px;">
                                        </a>
                                    </div>
                                    <div class="col-7">
                                        <div class="p-3 h-100 d-flex flex-column">
                                            <div class="mb-2">
                                                <span class="text-muted" style="font-size: 0.85rem;"><i class="fa fa-calendar"></i> {{ isset($newsItem->created_at) ? date('M d, Y', strtotime($newsItem->created_at)) : 'Recent' }}</span>
                                            </div>
                                            <h4 class="mb-2" style="font-size: 1.1rem; font-weight: 600;"><a href="{{ route('latest.news.view', $newsItem->id) }}" style="color: #333;">{{ Str::limit($newsItem->title, 60) }}</a></h4>
                                            <p class="text-muted mb-auto" style="font-size: 0.9rem; line-height: 1.6;">{{ Str::limit($newsItem->description, 80) }}</p>
                                            <a href="{{ route('latest.news.view', $newsItem->id) }}" class="text-primary mt-2" style="font-size: 0.9rem; font-weight: 500;">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12 text-center">
                    <p class="text-muted">No news available at the moment.</p>
                </div>
            @endif
        </div>
        @if(isset($news) && count($news) > 0)
        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('latest.news.all') }}" class="btn btn-primary px-4 py-3">View All News</a>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Success Stories Section - Alternating Layout --}}
<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">Success Stories</h2>
                <p>Read inspiring stories from women and families whose lives have been transformed through BMS's empowerment programs, proving that change begins with agency and opportunity.</p>
            </div>
        </div>
        <div class="row">
            @if(isset($stories) && count($stories) > 0)
                @foreach($stories->take(2) as $key => $story)
                {{-- Alternating layout: even index = image left, odd index = image right --}}
                <div class="col-12 mb-5 ftco-animate" data-aos="fade-{{ $key % 2 == 0 ? 'right' : 'left' }}" data-aos-delay="{{ ($key + 1) * 100 }}">
                    <div class="story-card-horizontal bg-white shadow-sm position-relative" style="border-radius: 20px; overflow: hidden; border-{{ $key % 2 == 0 ? 'left' : 'right' }}: 5px solid {{ $key % 2 == 0 ? '#5E35B1' : '#0D47A1' }}; transition: all 0.4s;" onmouseover="this.style.transform='translateX({{ $key % 2 == 0 ? '10' : '-10' }}px) scale(1.02)'; this.style.boxShadow='0 20px 50px rgba({{ $key % 2 == 0 ? '94, 53, 177' : '13, 71, 161' }}, 0.2)'" onmouseout="this.style.transform='translateX(0) scale(1)'; this.style.boxShadow=''">
                        <div class="row g-0 align-items-center">
                            {{-- Image Column (Left for even, Right for odd) --}}
                            @if($key % 2 == 0)
                            <div class="col-lg-5">
                                <div class="story-image-container position-relative" style="height: 400px; overflow: hidden;">
                                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    {{-- Quote Icon Overlay --}}
                                    <div class="position-absolute d-flex align-items-center justify-content-center" style="top: 30px; right: 30px; width: 80px; height: 80px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 8px 20px rgba(94, 53, 177, 0.4);">
                                        <i class="icon-quote-left" style="font-size: 2rem; color: white;"></i>
                                    </div>
                                    {{-- Rating Badge --}}
                                    <div class="position-absolute" style="bottom: 20px; left: 20px;">
                                        <div class="rating bg-white px-3 py-2" style="border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $story->rating)
                                                    <span style="color: #ffc107; font-size: 1.2rem;">★</span>
                                                @else
                                                    <span style="color: #e0e0e0; font-size: 1.2rem;">☆</span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            {{-- Content Column --}}
                            <div class="col-lg-7">
                                <div class="story-content p-5">
                                    <div class="mb-3">
                                        <span class="badge" style="background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); color: white; font-size: 0.85rem; padding: 8px 16px; border-radius: 20px;">Success Story #{{ $key + 1 }}</span>
                                    </div>
                                    <p class="story-quote mb-4" style="font-size: 1.15rem; line-height: 1.8; font-style: italic; color: #555; position: relative; padding-left: 20px; border-left: 3px solid #5E35B1;">
                                        "{{ $story->description }}"
                                    </p>
                                    <div class="story-author d-flex align-items-center mt-4 pt-4" style="border-top: 2px solid #f8f9fa;">
                                        <div class="author-icon me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; flex-shrink: 0;">
                                            <i class="icon-user" style="font-size: 1.8rem; color: white;"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1" style="font-size: 1.2rem; font-weight: 700; color: #333;">{{ $story->beneficiary_name }}</h5>
                                            <p class="mb-0 text-muted" style="font-size: 1rem;">{{ $story->beneficiary_title }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Image Column (Right for odd) --}}
                            @if($key % 2 != 0)
                            <div class="col-lg-5">
                                <div class="story-image-container position-relative" style="height: 400px; overflow: hidden;">
                                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    {{-- Quote Icon Overlay --}}
                                    <div class="position-absolute d-flex align-items-center justify-content-center" style="top: 30px; left: 30px; width: 80px; height: 80px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 50%; box-shadow: 0 8px 20px rgba(13, 71, 161, 0.4);">
                                        <i class="icon-quote-left" style="font-size: 2rem; color: white;"></i>
                                    </div>
                                    {{-- Rating Badge --}}
                                    <div class="position-absolute" style="bottom: 20px; right: 20px;">
                                        <div class="rating bg-white px-3 py-2" style="border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $story->rating)
                                                    <span style="color: #ffc107; font-size: 1.2rem;">★</span>
                                                @else
                                                    <span style="color: #e0e0e0; font-size: 1.2rem;">☆</span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-md-12 text-center">
                <p class="text-muted">No success stories available at the moment.</p>
            </div>
            @endif
        </div>
        @if(isset($stories) && count($stories) > 0)
        <div class="row mt-4">
            <div class="col text-center">
                <a href="{{ route('success.stories') }}" class="btn btn-primary px-4 py-3">View All Stories</a>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Join Us Section --}}
<section class="ftco-section-3" style="background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%); padding: 80px 0;">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10 text-center" data-aos="fade-up">
                <h2 class="mb-4" style="font-weight: 700; font-size: 2.5rem; font-family: 'Work Sans', Arial, sans-serif; color: #0D47A1;">Join Our Movement</h2>
                <p style="font-size: 1.1rem; line-height: 1.8; font-family: 'Work Sans', Arial, sans-serif; color: #000;">Be part of the change. Whether you want to volunteer your time, partner with us, or stay updated with our work - there's a place for you in our community.</p>
            </div>
        </div>
        
        {{-- Volunteer Banner --}}
        <div class="row mb-4" data-aos="fade-right" data-aos-delay="100">
            <div class="col-12">
                <div class="join-banner d-flex align-items-center" style="background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%); border-radius: 15px; overflow: hidden; min-height: 180px; transition: all 0.3s; border-left: 8px solid #0D47A1;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 10px 40px rgba(13,71,161,0.3)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow=''">
                    <div class="banner-icon d-flex align-items-center justify-content-center" style="width: 200px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); height: 100%; flex-shrink: 0;">
                        <i class="icon-heart" style="font-size: 4rem; color: white;"></i>
                    </div>
                    <div class="banner-content flex-grow-1 px-5 py-4">
                        <h3 style="font-weight: 700; color: #333; font-size: 1.8rem; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 15px;">Become a Volunteer</h3>
                        <p style="color: #666; font-size: 1rem; line-height: 1.6; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 20px;">Make a direct impact in women's lives. Join our team of dedicated volunteers and contribute your skills to empower communities.</p>
                        <a href="{{ route('volunterr.opportunities') }}" class="btn btn-lg px-4 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; border: none; border-radius: 25px; font-weight: 600; font-family: 'Work Sans', Arial, sans-serif; font-size: 1rem;">View Opportunities →</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Partner Banner --}}
        <div class="row mb-4" data-aos="fade-left" data-aos-delay="200">
            <div class="col-12">
                <div class="join-banner d-flex align-items-center" style="background: linear-gradient(135deg, #E8EAF6 0%, #C5CAE9 100%); border-radius: 15px; overflow: hidden; min-height: 180px; transition: all 0.3s; border-right: 8px solid #5E35B1;" onmouseover="this.style.transform='translateX(-10px)'; this.style.boxShadow='0 10px 40px rgba(94, 53, 177, 0.3)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow=''">
                    <div class="banner-content flex-grow-1 px-5 py-4 order-1">
                        <h3 style="font-weight: 700; color: #333; font-size: 1.8rem; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 15px; text-align: right;">Become a Partner</h3>
                        <p style="color: #666; font-size: 1rem; line-height: 1.6; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 20px; text-align: right;">Collaborate with us to create lasting change. Partner with BMS to expand our reach and amplify our impact in northern Bangladesh.</p>
                        <div class="text-right">
                            <a href="{{ route('contact') }}" class="btn btn-lg px-4 py-2" style="background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); color: white; border: none; border-radius: 25px; font-weight: 600; font-family: 'Work Sans', Arial, sans-serif; font-size: 1rem;">Get in Touch →</a>
                        </div>
                    </div>
                    <div class="banner-icon d-flex align-items-center justify-content-center order-2" style="width: 200px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); height: 100%; flex-shrink: 0;">
                        <i class="icon-people" style="font-size: 4rem; color: white;"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Newsletter Banner --}}
        <div class="row" data-aos="fade-right" data-aos-delay="300">
            <div class="col-12">
                <div class="join-banner d-flex align-items-center" style="background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%); border-radius: 15px; overflow: hidden; min-height: 180px; transition: all 0.3s; border-left: 8px solid #0D47A1;" onmouseover="this.style.transform='translateX(10px)'; this.style.boxShadow='0 10px 40px rgba(13,71,161,0.3)'" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow=''">
                    <div class="banner-icon d-flex align-items-center justify-content-center" style="width: 200px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); height: 100%; flex-shrink: 0;">
                        <i class="icon-envelope" style="font-size: 4rem; color: white;"></i>
                    </div>
                    <div class="banner-content flex-grow-1 px-5 py-4">
                        <h3 style="font-weight: 700; color: #333; font-size: 1.8rem; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 15px;">Subscribe to Our Newsletter</h3>
                        <p style="color: #666; font-size: 1rem; line-height: 1.6; font-family: 'Work Sans', Arial, sans-serif; margin-bottom: 20px;">Stay updated with our latest news, stories, and impact reports delivered to your inbox.</p>
                        
                        @if (session()->has('success'))
                        <div class="alert alert-success" style="border-radius: 10px; margin-bottom: 20px;">
                            <i class="fa fa-check-circle"></i> {{ session()->get('success') }}
                        </div>
                        @endif
                        
                        <form action="{{ route('user.subscribe') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-5 mb-3">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}" style="border-radius: 10px; padding: 12px 20px; border: 2px solid #e9ecef; font-size: 1rem; font-family: 'Work Sans', Arial, sans-serif;" onfocus="this.style.borderColor='#0D47A1'" onblur="this.style.borderColor='#e9ecef'">
                                    @error('name')
                                    <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" style="border-radius: 10px; padding: 12px 20px; border: 2px solid #e9ecef; font-size: 1rem; font-family: 'Work Sans', Arial, sans-serif;" onfocus="this.style.borderColor='#0D47A1'" onblur="this.style.borderColor='#e9ecef'">
                                    @error('email')
                                    <div class="text-danger mt-1" style="font-size: 0.875rem;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" class="btn btn-lg w-100" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; border: none; border-radius: 10px; font-weight: 600; font-family: 'Work Sans', Arial, sans-serif; font-size: 1rem; padding: 12px 10px;">Subscribe →</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('js')
<script>
    // Custom Hero Slider Implementation
    const heroSlider = {
        currentSlide: 0,
        totalSlides: 0,
        autoplayInterval: null,
        touchStartX: 0,
        touchEndX: 0,
        
        init: function() {
            const slides = document.querySelectorAll('.hero-slide');
            this.totalSlides = slides.length;
            
            console.log('=== CUSTOM HERO SLIDER ===');
            console.log('Total slides:', this.totalSlides);
            
            if (this.totalSlides <= 1) {
                return; // No need for slider functionality
            }
            
            // Create dots
            this.createDots();
            
            // Start autoplay
            this.startAutoplay();
            
            // Add touch/swipe support
            this.addTouchSupport();
            
            // Add mouse wheel support
            this.addWheelSupport();
            
            // Pause autoplay on hover
            const container = document.getElementById('heroSlider');
            if (container) {
                container.addEventListener('mouseenter', () => this.stopAutoplay());
                container.addEventListener('mouseleave', () => this.startAutoplay());
            }
        },
        
        createDots: function() {
            const dotsContainer = document.getElementById('sliderDots');
            if (!dotsContainer) return;
            
            for (let i = 0; i < this.totalSlides; i++) {
                const dot = document.createElement('span');
                dot.className = i === 0 ? 'active' : '';
                dot.onclick = () => this.goToSlide(i);
                dotsContainer.appendChild(dot);
            }
        },
        
        goToSlide: function(index) {
            const slides = document.querySelectorAll('.hero-slide');
            const dots = document.querySelectorAll('.slider-dots span');
            
            // Remove active class from current slide
            slides[this.currentSlide].classList.remove('active');
            if (dots[this.currentSlide]) {
                dots[this.currentSlide].classList.remove('active');
            }
            
            // Add active class to new slide
            this.currentSlide = index;
            slides[this.currentSlide].classList.add('active');
            if (dots[this.currentSlide]) {
                dots[this.currentSlide].classList.add('active');
            }
            
            console.log('Slide changed to:', this.currentSlide + 1);
        },
        
        next: function() {
            let nextIndex = this.currentSlide + 1;
            if (nextIndex >= this.totalSlides) {
                nextIndex = 0; // Loop to first slide
            }
            this.goToSlide(nextIndex);
        },
        
        prev: function() {
            let prevIndex = this.currentSlide - 1;
            if (prevIndex < 0) {
                prevIndex = this.totalSlides - 1; // Loop to last slide
            }
            this.goToSlide(prevIndex);
        },
        
        startAutoplay: function() {
            this.stopAutoplay(); // Clear any existing interval
            this.autoplayInterval = setInterval(() => this.next(), 5000);
        },
        
        stopAutoplay: function() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
                this.autoplayInterval = null;
            }
        },
        
        addTouchSupport: function() {
            const container = document.getElementById('heroSlider');
            if (!container) return;
            
            container.addEventListener('touchstart', (e) => {
                this.touchStartX = e.changedTouches[0].screenX;
            }, {passive: true});
            
            container.addEventListener('touchend', (e) => {
                this.touchEndX = e.changedTouches[0].screenX;
                this.handleSwipe();
            }, {passive: true});
            
            // Mouse drag support
            let isDragging = false;
            let startX = 0;
            
            container.addEventListener('mousedown', (e) => {
                isDragging = true;
                startX = e.clientX;
                container.style.cursor = 'grabbing';
            });
            
            container.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
            });
            
            container.addEventListener('mouseup', (e) => {
                if (!isDragging) return;
                isDragging = false;
                container.style.cursor = '';
                
                const endX = e.clientX;
                const diff = startX - endX;
                
                if (Math.abs(diff) > 100) { // Minimum swipe distance
                    if (diff > 0) {
                        this.next();
                    } else {
                        this.prev();
                    }
                }
            });
            
            container.addEventListener('mouseleave', () => {
                isDragging = false;
                container.style.cursor = '';
            });
        },
        
        handleSwipe: function() {
            const diff = this.touchStartX - this.touchEndX;
            
            if (Math.abs(diff) > 100) { // Minimum swipe distance
                if (diff > 0) {
                    this.next(); // Swipe left
                } else {
                    this.prev(); // Swipe right
                }
            }
        },
        
        addWheelSupport: function() {
            const container = document.getElementById('heroSlider');
            if (!container) return;
            
            let isScrolling = false;
            
            container.addEventListener('wheel', (e) => {
                const deltaX = e.deltaX;
                const deltaY = e.deltaY;
                
                // Detect horizontal scroll (trackpad swipe or shift+wheel)
                if (Math.abs(deltaX) > Math.abs(deltaY) || e.shiftKey) {
                    e.preventDefault();
                    
                    if (!isScrolling) {
                        isScrolling = true;
                        
                        if ((deltaX > 0) || (e.shiftKey && deltaY > 0)) {
                            this.next();
                        } else if ((deltaX < 0) || (e.shiftKey && deltaY < 0)) {
                            this.prev();
                        }
                        
                        setTimeout(() => {
                            isScrolling = false;
                        }, 500);
                    }
                }
            }, {passive: false});
        }
    };
    
    $(document).ready(function(){
        // Initialize custom hero slider
        heroSlider.init();

        // Success Stories Carousel
        var storiesCount = $('.carousel-testimony .item').length;
        var maxStories = Math.min(storiesCount, 1); // Show 1 story at a time
        var carouselTestimony = $('.carousel-testimony').owlCarousel({
            autoplay: storiesCount > 1,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            loop: false,
            margin: 30,
            nav: storiesCount > 1,
            navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
            dots: false,
            mouseDrag: storiesCount > 1,
            touchDrag: storiesCount > 1,
            pullDrag: storiesCount > 1,
            freeDrag: false,
            smartSpeed: 600,
            rewind: false,
            responsive:{
                0:{items: Math.min(1, storiesCount)},
                600:{items: Math.min(1, storiesCount)},
                1000:{items: maxStories}
            }
        });

        // Photo Gallery Carousel
        var galleryCount = $('.carousel-gallery .item').length;
        var maxGallery = Math.min(galleryCount, 4); // Show max 4 or less if not enough items
        var carouselGallery = $('.carousel-gallery').owlCarousel({
            autoplay: galleryCount > maxGallery,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            loop: false,
            margin: 10,
            nav: galleryCount > maxGallery,
            navText: ['<span class="icon-chevron-left"></span>', '<span class="icon-chevron-right"></span>'],
            dots: false,
            mouseDrag: galleryCount > maxGallery,
            touchDrag: galleryCount > maxGallery,
            pullDrag: galleryCount > maxGallery,
            freeDrag: false,
            smartSpeed: 600,
            rewind: false,
            responsive:{
                0:{items: Math.min(1, galleryCount)},
                600:{items: Math.min(2, galleryCount)},
                1000:{items: maxGallery}
            }
        });

        // Enable horizontal scrolling with mouse wheel and touchpad
        function enableHorizontalScroll(carouselElement, owlInstance) {
            var isScrolling = false;
            
            carouselElement.on('mouseenter', function() {
                carouselElement[0].addEventListener('wheel', wheelHandler, {passive: false});
            });
            
            carouselElement.on('mouseleave', function() {
                carouselElement[0].removeEventListener('wheel', wheelHandler);
            });
            
            function wheelHandler(e) {
                var deltaX = e.deltaX;
                var deltaY = e.deltaY;
                
                // Detect horizontal scroll (trackpad swipe or shift+wheel)
                if (Math.abs(deltaX) > Math.abs(deltaY) || e.shiftKey) {
                    e.preventDefault();
                    
                    if (!isScrolling) {
                        isScrolling = true;
                        
                        if ((deltaX > 0) || (e.shiftKey && deltaY > 0)) {
                            owlInstance.trigger('next.owl.carousel');
                        } else if ((deltaX < 0) || (e.shiftKey && deltaY < 0)) {
                            owlInstance.trigger('prev.owl.carousel');
                        }
                        
                        setTimeout(function() {
                            isScrolling = false;
                        }, 300);
                    }
                }
            }
        }

        enableHorizontalScroll($('.carousel-testimony'), carouselTestimony);
        enableHorizontalScroll($('.carousel-gallery'), carouselGallery);

        // Initialize image popup for gallery with title and description
        if (typeof $.fn.magnificPopup !== 'undefined') {
            $('.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1]
                },
                image: {
                    titleSrc: function(item) {
                        var title = item.el.attr('data-title');
                        var description = item.el.attr('data-description');
                        
                        if (title && description) {
                            return '<div style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); padding: 20px; border-radius: 10px; margin-top: 15px;">' +
                                   '<h4 style="color: white; margin: 0 0 10px 0; font-size: 1.3rem; font-weight: 600;">' + title + '</h4>' +
                                   '<p style="color: rgba(255,255,255,0.95); margin: 0; line-height: 1.6; font-size: 0.95rem;">' + description + '</p>' +
                                   '</div>';
                        } else if (title) {
                            return '<h4 style="color: white; margin: 10px 0; font-size: 1.3rem;">' + title + '</h4>';
                        }
                        return '';
                    }
                },
                closeOnContentClick: true,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true,
                    duration: 300,
                    easing: 'ease-in-out'
                },
                callbacks: {
                    beforeOpen: function() {
                        // Add custom styling to popup
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    }
                }
            });
        }

        // Initialize AOS (Animate On Scroll)
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
    });
</script>
@endpush



