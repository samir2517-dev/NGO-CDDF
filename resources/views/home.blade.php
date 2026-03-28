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
    margin-top: 60px;
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
                <div class="hero-wrap" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 45%, #42A5F5 100%);">
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

{{-- Mission, Vision & Values Section (2-Column Layout) --}}
<section class="ftco-section bg-light" style="padding-top: 2rem;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-10 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Our</span> Mission, Vision & Values</h2>
            </div>
        </div>
        
        @if(isset($mission_vision) && $mission_vision)
        <div class="row align-items-stretch">
            {{-- Mission Card --}}
            <div class="col-lg-6 mb-4" data-aos="fade-right" data-aos-delay="100">
                <div class="mission-vision-card h-100 bg-white shadow-sm" style="border-radius: 15px; overflow: hidden; border-top: 5px solid #0D47A1; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(13, 71, 161,0.3);">
                                <i class="icon-target" style="font-size: 2rem; color: white;"></i>
                            </div>
                        </div>
                        <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: 700; color: #333;">Our Mission</h3>
                        <div class="mission-content">
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; text-align: center;">
                                @if($mission_vision->mission)
                                    {{ $mission_vision->mission }}
                                @else
                                    To empower women and girls through education, economic self-reliance, and leadership training.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Vision Card --}}
            <div class="col-lg-6 mb-4" data-aos="fade-left" data-aos-delay="200">
                <div class="mission-vision-card h-100 bg-white shadow-sm" style="border-radius: 15px; overflow: hidden; border-top: 5px solid #5E35B1; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <div class="icon-circle d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);">
                                <i class="bx bxs-bulb" style="font-size: 2.5rem; color: white;"></i>
                            </div>
                        </div>
                        <h3 class="text-center mb-4" style="font-size: 1.5rem; font-weight: 700; color: #333;">Our Vision</h3>
                        <div class="vision-content">
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; text-align: center;">
                                @if($mission_vision->vision)
                                    {{ $mission_vision->vision }}
                                @else
                                    A society where every individual can realize their full potential in a vibrant and just environment.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Values Card --}}
            <div class="col-lg-4 mb-4" data-aos="fade-left" data-aos-delay="300">
            {{-- Values Row --}}
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="values-section bg-white shadow-sm" style="border-radius: 15px; overflow: hidden; border-top: 5px solid #5E35B1; transition: all 0.3s; padding: 2rem;" data-aos="fade-up" data-aos-delay="300" onmouseover="this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.boxShadow='0 0.125rem 0.25rem rgba(0,0,0,0.075)'">
                    <div class="row align-items-center">
                        <div class="col-md-2 text-center">
                            <div class="d-inline-flex align-items-center justify-content-center" style="width: 70px; height: 70px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 5px 15px rgba(94, 53, 177, 0.3);">
                                <i class="icon-heart" style="font-size: 2rem; color: white;"></i>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <h3 class="mb-3" style="font-size: 1.5rem; font-weight: 700; color: #333;">Our Values</h3>
                            <p style="font-size: 1rem; line-height: 1.8; color: #555; margin-bottom: 0;">
                                @if($mission_vision->values)
                                    {{ $mission_vision->values }}
                                @else
                                    Integrity, compassion, and commitment to community-led sustainable development.
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted">Mission and Vision information will be available soon.</p>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Featured Programs & Ongoing Projects Sections --}}
<section class="ftco-section" style="background: #ffffff;">
    <div class="container-fluid" style="max-width: 95%; margin: 0 auto;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Featured</span> Programs</h2>
            </div>
        </div>
        <div class="row d-flex">
            @if(isset($programs) && count($programs) > 0)
                @foreach($programs->take(3) as $key => $program)
                <div class="col-md-4 d-flex ftco-animate" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">
                    <div class="blog-entry align-self-stretch w-100 shadow-sm">
                        <a href="{{ route('programs.view', $program->id) }}">
                            @if(isset($program->image) && $program->image && file_exists(public_path('images/programs/'.$program->image)))
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title ?? 'Program' }}" class="img-fluid" style="width: 100%; height: 270px; object-fit: cover;">
                            @else
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg" alt="{{ $program->title ?? 'Program' }}" class="img-fluid" style="width: 100%; height: 270px; object-fit: cover;">
                            @endif
                        </a>
                        <div class="text p-4 d-block bg-white">
                            <div class="meta mb-3">
                                @if(isset($program->start_date) && $program->start_date)
                                <div class="d-inline-block me-3"><a href="#" class="text-muted"><i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($program->start_date)) }}</a></div>
                                @endif
                            </div>
                            <h3 class="heading mt-2"><a href="{{ route('programs.view', $program->id) }}">{{ Str::limit($program->title ?? '', 50) }}</a></h3>
                            <p class="text-muted">{{ Str::limit($program->description ?? '', 100) }}</p>
                            <div class="mt-3">
                                <a href="{{ route('programs.view', $program->id) }}" class="btn btn-sm" style="background: #0D47A1; color: white; border: none;">Read More →</a>
                            </div>
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

{{-- Ongoing Projects Section --}}
<section class="ftco-section" style="background: #ffffff;">
    <div class="container-fluid" style="max-width: 95%; margin: 0 auto;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Ongoing</span> Projects</h2>
            </div>
        </div>
        <div class="row d-flex">
            @if(isset($ongoing_projects) && count($ongoing_projects) > 0)
                @foreach($ongoing_projects->take(4) as $key => $project)
                <div class="col-md-3 d-flex ftco-animate" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">
                    <div class="blog-entry align-self-stretch w-100 shadow-sm">
                        <a href="{{ route('project.view', $project->id) }}">
                            @if(isset($project->image) && $project->image && file_exists(public_path('images/project/'.$project->image)))
                            <img src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                            @else
                            <img src="https://images.pexels.com/photos/3807517/pexels-photo-3807517.jpeg" alt="{{ $project->title }}" class="img-fluid" style="width: 100%; height: 250px; object-fit: cover;">
                            @endif
                        </a>
                        <div class="text p-4 d-block bg-white">
                            <h3 class="heading mt-2"><a href="{{ route('project.view', $project->id) }}">{{ Str::limit($project->title, 45) }}</a></h3>
                            <p class="text-muted">{{ Str::limit($project->description ?? '', 80) }}</p>
                            <div class="mt-3">
                                <a href="{{ route('project.view', $project->id) }}" class="btn btn-sm" style="background: #0D47A1; color: white; border: none;">Read More →</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-md-12 text-center">
                    <p class="text-muted">No ongoing projects available at the moment.</p>
                </div>
            @endif
        </div>
        @if(isset($ongoing_projects) && count($ongoing_projects) > 0)
        <div class="row mt-5">
            <div class="col text-center">
                <a href="{{ route('project.all') }}" class="btn btn-primary px-4 py-3">View All Projects</a>
            </div>
        </div>
        @endif
    </div>
</section>

{{-- Photo Gallery Section (3x3 Grid) --}}
<section class="ftco-section-3 img" style="padding: 60px 0; background: #ffffff;">
    <div class="container-fluid" style="max-width: 95%; margin: 0 auto;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Photo</span> Gallery</h2>
            </div>
        </div>
        @if(isset($gallery) && count($gallery) > 0)
        <div class="row" data-aos="fade-up">
            @foreach($gallery->take(9) as $key => $photo)
            @php
                // Determine image path based on source type
                $imagePath = 'images/gallery/' . $photo->image;
                if (isset($photo->source_type)) {
                    if ($photo->source_type === 'program') {
                        $imagePath = isset($photo->image_type) && $photo->image_type === 'cover' 
                            ? 'images/programs/' . $photo->image 
                            : 'images/programs/gallery/' . $photo->image;
                    } elseif ($photo->source_type === 'project') {
                        $imagePath = isset($photo->image_type) && $photo->image_type === 'cover' 
                            ? 'images/project/' . $photo->image 
                            : 'images/ongoing_project/gallery/' . $photo->image;
                    } elseif ($photo->source_type === 'news') {
                        $imagePath = isset($photo->image_type) && $photo->image_type === 'cover' 
                            ? 'images/news/' . $photo->image 
                            : 'images/news/gallery/' . $photo->image;
                    }
                }
            @endphp
            <div class="col-md-4 mb-4" data-aos="zoom-in" data-aos-delay="{{ ($key + 1) * 100 }}">
                <a href="{{ asset($imagePath) }}" 
                   class="gallery-item image-popup d-block position-relative overflow-hidden" 
                   data-title="{{ $photo->title ?? '' }}" 
                   data-description="{{ $photo->description ?? '' }}"
                   style="border-radius: 10px; overflow: hidden; height: 280px;">
                    <img src="{{ asset($imagePath) }}" alt="{{ $photo->title ?? 'Gallery' }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                    <div class="gallery-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(13, 71, 161, 0.7); display: flex; justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s ease;">
                        <span class="icon-search" style="color: white; font-size: 2.5rem;"></span>
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

{{-- Latest News & Events Section (3x2 Grid) --}}
<section class="ftco-section" style="background: #ffffff;">
    <div class="container-fluid" style="max-width: 95%; margin: 0 auto;">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Latest News</span> & Events</h2>
            </div>
        </div>
        <div class="row">
            @if(isset($news) && count($news) > 0)
                @foreach($news->take(6) as $key => $newsItem)
                <div class="col-md-4 mb-4 ftco-animate" data-aos="fade-up" data-aos-delay="{{ ($key + 1) * 100 }}">
                    <div class="news-card bg-white shadow-sm d-flex flex-column" style="border-radius: 10px; overflow: hidden; height: 100%; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 35px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                        <a href="{{ route('latest.news.view', $newsItem->id) }}" class="d-block position-relative overflow-hidden" style="height: 250px;">
                            @if(isset($newsItem->image) && $newsItem->image && file_exists(public_path('images/news/'.$newsItem->image)))
                            <img src="{{ asset('images/news/'.$newsItem->image) }}" alt="{{ $newsItem->title ?? 'News' }}" class="img-fluid w-100 h-100" style="object-fit: cover; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            @else
                            <div class="w-100 h-100" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;"><span style="color: #999;">No Image</span></div>
                            @endif
                        </a>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <div class="mb-3">
                                <span class="badge bg-primary" style="font-size: 0.85rem; padding: 6px 14px; border-radius: 20px;">News</span>
                                @if(isset($newsItem->created_at))
                                <span class="text-muted ms-2" style="font-size: 0.9rem;"><i class="fa fa-calendar"></i> {{ date('M d, Y', strtotime($newsItem->created_at)) }}</span>
                                @endif
                            </div>
                            <h4 class="mb-3" style="font-size: 1.2rem; font-weight: 700; line-height: 1.4;">
                                <a href="{{ route('latest.news.view', $newsItem->id) }}" style="color: #333; text-decoration: none;">{{ Str::limit($newsItem->title ?? '', 60) }}</a>
                            </h4>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">{{ Str::limit($newsItem->description ?? '', 100) }}</p>
                            <a href="{{ route('latest.news.view', $newsItem->id) }}" class="text-primary" style="font-size: 0.95rem; font-weight: 600; text-decoration: none;">Read More <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
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
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
            <h2 class="mb-4" style="color: #000000; text-transform: uppercase;">Sponsors for Growing Fund</h2>
        </div>
    </div>
    <div class="container">
        <div class="sponsorship-banner" style="padding: 50px 40px; border-radius: 12px; text-align: center; margin-bottom: 60px; background: #5E35B1; box-shadow: 0 10px 30px rgba(94, 53, 177, 0.2);">
            <p style="color: #000000; font-size: 1.2rem; font-weight: 500; line-height: 1.8; margin-bottom: 0;">
                Sponsor for our growing fund to support women's empowerment programs, educational initiatives, and disaster preparedness in rural Bangladesh. Your contribution creates lasting change.
            </p>
            <div class="mt-4">
                <a href="{{ route('contact') }}" class="btn btn-light px-5 py-3" style="font-weight: 600; color: #5E35B1; border-radius: 30px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);">Become a Sponsor</a>
            </div>
        </div>
    </div>
</section>

{{-- Partners & Donors Section with Infinite Auto-Scrolling Carousel --}}
<section class="ftco-section bg-white">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center" data-aos="fade-up">
                <h2 class="mb-4"><span style="color: #0D47A1;">Partners</span> & Donors</h2>
            </div>
        </div>
        @if(isset($partners) && count($partners) > 0)
        <div style="overflow: hidden; padding: 30px 0;">
            <style>
                .carousel-container {
                    overflow: hidden;
                    width: 100%;
                }
                
                .carousel-track {
                    display: flex;
                    will-change: transform;
                }
                
                .carousel-item {
                    flex: 0 0 auto;
                    width: 230px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
            </style>
            
            <div class="carousel-container">
                <div class="carousel-track" id="carouselTrack">
                    {{-- Original set of partners (no duplicates) --}}
                    @foreach($partners as $partner)
                    <div class="carousel-item">
                        <div style="width: 180px; height: 100px; display: flex; align-items: center; justify-content: center; padding: 10px; border: 1px solid #e9ecef; border-radius: 10px; background: white; transition: all 0.3s ease; cursor: pointer;" onmouseover="this.style.boxShadow='0 10px 30px rgba(0,0,0,0.15)'; this.style.transform='scale(1.08)'" onmouseout="this.style.boxShadow='none'; this.style.transform='scale(1)'">
                            @if(isset($partner->image) && $partner->image && file_exists(public_path('images/partner/'.$partner->image)))
                            <img src="{{ asset('images/partner/'.$partner->image) }}" alt="{{ $partner->name ?? 'Partner' }}" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;">
                            @else
                            <span style="color: #666; font-size: 0.9rem; text-align: center; font-weight: 600;">{{ $partner->name ?? 'Partner' }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="text-muted">No partners available at the moment.</p>
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
                                    @if(isset($story->image) && $story->image && file_exists(public_path('images/stories/'.$story->image)))
                                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name ?? 'Story' }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    @else
                                    <div class="w-100 h-100" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;"><span style="color: #999;">No Image</span></div>
                                    @endif
                                    {{-- Quote Icon Overlay --}}
                                    <div class="position-absolute d-flex align-items-center justify-content-center" style="top: 30px; right: 30px; width: 80px; height: 80px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; box-shadow: 0 8px 20px rgba(94, 53, 177, 0.4);">
                                        <i class="icon-quote-left" style="font-size: 2rem; color: white;"></i>
                                    </div>
                                    {{-- Rating Badge --}}
                                    @if(isset($story->rating))
                                    <div class="position-absolute" style="bottom: 20px; left: 20px;">
                                        <div class="rating bg-white px-3 py-2" style="border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $story->rating)
                                                    <span style="color: #5E35B1; font-size: 1.2rem;">★</span>
                                                @else
                                                    <span style="color: #e0e0e0; font-size: 1.2rem;">☆</span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    @endif
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
                                        "{{ $story->description ?? '' }}"
                                    </p>
                                    <div class="story-author d-flex align-items-center mt-4 pt-4" style="border-top: 2px solid #f8f9fa;">
                                        <div class="author-icon me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 50%; flex-shrink: 0;">
                                            <i class="icon-user" style="font-size: 1.8rem; color: white;"></i>
                                        </div>
                                        <div>
                                            <h5 class="mb-1" style="font-size: 1.2rem; font-weight: 700; color: #333;">{{ $story->beneficiary_name ?? 'Beneficiary' }}</h5>
                                            <p class="mb-0 text-muted" style="font-size: 1rem;">{{ $story->beneficiary_title ?? '' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- Image Column (Right for odd) --}}
                            @if($key % 2 != 0)
                            <div class="col-lg-5">
                                <div class="story-image-container position-relative" style="height: 400px; overflow: hidden;">
                                    @if(isset($story->image) && $story->image && file_exists(public_path('images/stories/'.$story->image)))
                                    <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name ?? 'Story' }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
                                    @else
                                    <div class="w-100 h-100" style="background: #f0f0f0; display: flex; align-items: center; justify-content: center;"><span style="color: #999;">No Image</span></div>
                                    @endif
                                    {{-- Quote Icon Overlay --}}
                                    <div class="position-absolute d-flex align-items-center justify-content-center" style="top: 30px; left: 30px; width: 80px; height: 80px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 50%; box-shadow: 0 8px 20px rgba(13, 71, 161, 0.4);">
                                        <i class="icon-quote-left" style="font-size: 2rem; color: white;"></i>
                                    </div>
                                    {{-- Rating Badge --}}
                                    @if(isset($story->rating))
                                    <div class="position-absolute" style="bottom: 20px; right: 20px;">
                                        <div class="rating bg-white px-3 py-2" style="border-radius: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $story->rating)
                                                    <span style="color: #5E35B1; font-size: 1.2rem;">★</span>
                                                @else
                                                    <span style="color: #e0e0e0; font-size: 1.2rem;">☆</span>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                    @endif
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

{{-- Our Impact Section --}}
<section class="ftco-counter ftco-intro" id="section-counter" style="position: relative; overflow: hidden; background-color: #5E35B1; padding: 5em 0;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-image: url('{{ asset('frontend/images/bg_2.jpg') }}'); background-size: cover; background-position: center; opacity: 0.1;"></div>
    <div class="container" style="position: relative; z-index: 2;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-12 text-center heading-section heading-section-white ftco-animate" data-aos="fade-up">
                <h2 class="mb-4" style="color: white; font-weight: 700; text-transform: uppercase; letter-spacing: 2px;">Our Impact</h2>
            </div>
        </div>
        
        <div class="row justify-content-center text-center">
            @forelse($impact->sortBy('order') as $key => $item)
            <div class="col-md-3 col-sm-6 col-6 mb-4 ftco-animate" data-aos="fade-up" data-aos-delay="{{ ($key % 4 + 1) * 100 }}">
                <div class="block-18 d-flex justify-content-center align-items-center flex-column" style="background: rgba(255, 255, 255, 0.1); border-radius: 10px; padding: 30px 20px; border: 1px solid rgba(255, 255, 255, 0.2); transition: transform 0.3s ease; height: 100%;">
                    <div class="icon d-flex justify-content-center align-items-center mb-3 text-white" style="font-size: 45px;">
                        @if(isset($item->icon) && $item->icon)
                            <span class="{{ $item->icon }}"></span>
                        @else
                            @php
                                $fallbackIcons = ['flaticon-charity', 'flaticon-donation', 'flaticon-ecology', 'flaticon-group'];
                            @endphp
                            <span class="{{ $fallbackIcons[$key % 4] }}"></span>
                        @endif
                    </div>
                    <div class="text w-100">
                        <span class="d-flex align-items-center justify-content-center text-white">
                            @php
                                $val = $item->metric_value ?? '0';
                                $num = filter_var($val, FILTER_SANITIZE_NUMBER_INT) ?: '0';
                                $extra = preg_replace('/[0-9,]/', '', $val);
                            @endphp
                            <strong class="number" data-number="{{ str_replace(',', '', $num) }}" style="font-size: 40px; font-weight: 700;">0</strong>
                            @if($extra)
                                <strong style="font-size: 30px; margin-left: 2px;">{{ $extra }}</strong>
                            @endif
                        </span>
                        @if(isset($item->metric_unit) && $item->metric_unit)
                            <span class="d-block mt-1" style="color: rgba(255, 255, 255, 0.9); font-size: 0.95rem;">{{ $item->metric_unit }}</span>
                        @endif
                        <span class="d-block mt-2" style="color: #ffffff; font-weight: 500; font-size: 1.1rem;">{{ $item->title ?? 'Impact' }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center text-white">
                <p>Impact data is being updated.</p>
            </div>
            @endforelse
        </div>
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
    </div>
</section>

<script>
// Circular Queue Carousel
function initCarousel() {
    const track = document.getElementById('carouselTrack');
    if (!track) return;
    
    const itemWidth = 230;
    const items = track.querySelectorAll('.carousel-item');
    const totalItems = items.length;
    
    // Only show 5 items at a time
    const visibleItems = 5;
    const visibleWidth = itemWidth * visibleItems;
    
    let currentX = 0;
    let isMoving = true;
    let lastTime = Date.now();
    const animationDuration = 40000; // 40 seconds for full cycle
    const pixelsPerMs = (itemWidth * totalItems) / animationDuration;
    
    function animate() {
        if (isMoving) {
            const now = Date.now();
            const elapsed = now - lastTime;
            currentX += pixelsPerMs * elapsed;
            
            // When an item scrolls out of view, move it to the end of the queue
            while (currentX >= itemWidth) {
                // Move first item to the end
                const firstItem = track.querySelector('.carousel-item');
                if (firstItem) {
                    track.appendChild(firstItem);
                    currentX -= itemWidth;
                }
            }
            
            track.style.transform = `translateX(-${currentX}px)`;
            lastTime = now;
        } else {
            lastTime = Date.now();
        }
        
        requestAnimationFrame(animate);
    }
    
    // Pause on hover
    track.parentElement.addEventListener('mouseenter', () => {
        isMoving = false;
    });
    
    track.parentElement.addEventListener('mouseleave', () => {
        isMoving = true;
        lastTime = Date.now();
    });
    
    animate();
}

document.addEventListener('DOMContentLoaded', initCarousel);
$(document).ready(function() {
    initCarousel();
});
</script>

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



