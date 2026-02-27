@extends('main')

@section('content')

<!-- Focus Areas Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                Our <span style="color: #0D47A1;">Key Focus Areas</span>
            </h1>
        </div>

        <!-- Focus Areas Grid -->
        <div class="row g-4">
            @foreach(($focus_areas ?? collect()) as $index => $item)
                @php
                    // Gradient colors for cards without images
                    $gradients = [
                        'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                        'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                        'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                        'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                        'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                        'linear-gradient(135deg, #30cfd0 0%, #330867 100%)',
                    ];
                    
                    $gradient = $gradients[$index % count($gradients)];
                    
                    // Check for icon
                    $iconUrl = null;
                    $iconClass = 'fa-solid fa-bullseye';
                    if (!empty($item->icon_path)) {
                        $iconUrl = asset('storage/' . $item->icon_path);
                    } elseif (!empty($item->icon_class)) {
                        $iconClass = $item->icon_class;
                    }
                @endphp

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="focus-card" style="height: 100%;">
                        <!-- Card Header with Image or Gradient -->
                        <div class="focus-card-header" style="
                            @if(!empty($item->image_path))
                                background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.7)), url('{{ asset('storage/' . $item->image_path) }}');
                                background-size: cover;
                                background-position: center;
                            @else
                                background: {{ $gradient }};
                            @endif
                            height: 280px;
                            border-radius: 20px 20px 0 0;
                            padding: 35px;
                            display: flex;
                            flex-direction: column;
                            justify-content: flex-end;
                            position: relative;
                            overflow: hidden;
                        ">
                            <!-- Icon Badge -->
                            <div style="
                                position: absolute;
                                top: 25px;
                                right: 25px;
                                width: 70px;
                                height: 70px;
                                background: rgba(255,255,255,0.2);
                                backdrop-filter: blur(10px);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                border: 3px solid rgba(255,255,255,0.3);
                            ">
                                @if($iconUrl)
                                    <img src="{{ $iconUrl }}" alt="{{ $item->title }}" style="width: 40px; height: 40px; object-fit: contain;">
                                @else
                                    <i class="{{ $iconClass }}" style="font-size: 35px; color: white;"></i>
                                @endif
                            </div>
                            
                            <!-- Title on Image/Gradient -->
                            <h3 style="
                                color: white;
                                font-size: 28px;
                                font-weight: 700;
                                margin: 0;
                                text-shadow: 0 2px 20px rgba(0,0,0,0.3);
                                line-height: 1.3;
                            ">{{ $item->title }}</h3>
                        </div>
                        
                        <!-- Card Body -->
                        <div style="
                            background: white;
                            padding: 35px 30px;
                            border-radius: 0 0 20px 20px;
                            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
                            position: relative;
                        ">
                            <p style="
                                font-size: 16px;
                                line-height: 1.8;
                                color: #555;
                                text-align: justify;
                                margin: 0;
                            ">{{ $item->description }}</p>
                            
                            <!-- Decorative Bottom Border -->
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 30px;
                                right: 30px;
                                height: 4px;
                                background: {{ !empty($item->image_path) ? 'linear-gradient(90deg, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.1) 100%)' : $gradient }};
                                border-radius: 4px 4px 0 0;
                            "></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if(($focus_areas ?? collect())->isEmpty())
            <div class="text-center py-5" data-aos="fade-up">
                <i class="fa-solid fa-inbox" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
                <h4 style="color: #6c757d; font-weight: 600;">No Focus Areas Available</h4>
                <p style="color: #adb5bd;">Focus areas will be displayed here once they are added.</p>
            </div>
        @endif
    </div>
</section>

<style>
    .focus-card {
        transition: all 0.4s ease;
        border-radius: 20px;
        overflow: hidden;
        background: white;
    }
    
    .focus-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0,0,0,0.15) !important;
    }
    
    .focus-card-header {
        transition: all 0.4s ease;
    }
    
    .focus-card:hover .focus-card-header {
        transform: scale(1.05);
    }
</style>

@endsection
