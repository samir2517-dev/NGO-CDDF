@extends('main')

@section('content')

<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="
                font-size: 48px;
                font-weight: 800;
                color: #2c3e50;
                margin-bottom: 20px;
                position: relative;
                display: inline-block;
            ">
                <span style="color: #0D47A1;">Executive Committee</span>
            </h1>

        </div>

        <!-- Committee Members Grid -->
        @if(isset($committee) && count($committee) > 0)
        <div class="row g-4">
            @foreach($committee as $index => $member)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="team-card" style="
                    background: white;
                    border-radius: 20px;
                    overflow: hidden;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    height: 100%;
                    position: relative;
                " onmouseover="this.style.transform='translateY(-15px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                    
                    <!-- Photo Section -->
                    <div style="
                        position: relative;
                        overflow: hidden;
                        height: 280px;
                    ">
                        @if($member->photo)
                        <img src="{{ asset('images/executive_committee/'.$member->photo) }}" alt="{{ $member->name }}" style="
                            width: 100%;
                            height: 100%;
                            object-fit: cover;
                            transition: transform 0.5s ease;
                        " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                        @else
                        <div style="
                            width: 100%;
                            height: 100%;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="fa-solid fa-user" style="font-size: 80px; color: rgba(255,255,255,0.3);"></i>
                        </div>
                        @endif
                        
                        <!-- Gradient Overlay -->
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            right: 0;
                            height: 100px;
                            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
                        "></div>
                    </div>

                    <!-- Content Section -->
                    <div style="padding: 25px 20px;">
                        <!-- Name & Designation -->
                        <h4 style="
                            font-size: 20px;
                            font-weight: 700;
                            color: #2c3e50;
                            margin-bottom: 8px;
                            line-height: 1.3;
                        ">{{ $member->name }}</h4>
                        
                        <p style="
                            color: #0D47A1;
                            font-size: 15px;
                            font-weight: 600;
                            margin-bottom: {{ $member->department ?? false ? '5px' : '15px' }};
                        ">{{ $member->designation }}</p>
                        
                        @if(isset($member->department) && $member->department)
                        <p style="
                            color: #6c757d;
                            font-size: 13px;
                            margin-bottom: 15px;
                            font-style: italic;
                        ">{{ $member->department }}</p>
                        @endif

                        @if(isset($member->bio) && $member->bio)
                        <p style="
                            color: #555;
                            font-size: 14px;
                            line-height: 1.6;
                            margin-bottom: 20px;
                            display: -webkit-box;
                            -webkit-line-clamp: 3;
                            -webkit-box-orient: vertical;
                            overflow: hidden;
                        ">{{ $member->bio }}</p>
                        @endif

                        <!-- Social Media Links -->
                        @if($member->facebook || $member->twitter || $member->instagram || $member->youtube)
                        <div style="
                            display: flex;
                            gap: 10px;
                            justify-content: center;
                            padding-top: 15px;
                            border-top: 1px solid #f0f0f0;
                        ">
                            @if($member->facebook)
                            <a href="{{ $member->facebook }}" target="_blank" class="social-icon" style="
                                width: 38px;
                                height: 38px;
                                border-radius: 50%;
                                background: #3b5998;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 18px;
                                transition: all 0.3s ease;
                                text-decoration: none;
                            " onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0 5px 15px rgba(59,89,152,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                                <span class="icon-facebook"></span>
                            </a>
                            @endif

                            @if($member->twitter)
                            <a href="{{ $member->twitter }}" target="_blank" class="social-icon" style="
                                width: 38px;
                                height: 38px;
                                border-radius: 50%;
                                background: #1da1f2;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 18px;
                                transition: all 0.3s ease;
                                text-decoration: none;
                            " onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0 5px 15px rgba(29,161,242,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                                <span class="icon-twitter"></span>
                            </a>
                            @endif

                            @if($member->instagram)
                            <a href="{{ $member->instagram }}" target="_blank" class="social-icon" style="
                                width: 38px;
                                height: 38px;
                                border-radius: 50%;
                                background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 18px;
                                transition: all 0.3s ease;
                                text-decoration: none;
                            " onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0 5px 15px rgba(228,64,95,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                                <span class="icon-instagram"></span>
                            </a>
                            @endif

                            @if($member->youtube)
                            <a href="{{ $member->youtube }}" target="_blank" class="social-icon" style="
                                width: 38px;
                                height: 38px;
                                border-radius: 50%;
                                background: #ff0000;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                color: white;
                                font-size: 18px;
                                transition: all 0.3s ease;
                                text-decoration: none;
                            " onmouseover="this.style.transform='scale(1.15)'; this.style.boxShadow='0 5px 15px rgba(255,0,0,0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none';">
                                <span class="icon-youtube-play"></span>
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="fa-solid fa-users" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Committee Members Yet</h4>
            <p style="color: #adb5bd;">Executive committee members will appear here once added.</p>
        </div>
        @endif
    </div>
</section>

@endsection
