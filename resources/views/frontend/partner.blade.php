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
                Our <span style="color: #0D47A1;">Partners & Donors</span>
            </h1>

        </div>

        <!-- Partners Grid -->
        @if(isset($partners) && count($partners) > 0)
        <div class="row g-4">
            @foreach($partners as $index => $partner)
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                <div class="partner-card" style="
                    background: white;
                    border-radius: 20px;
                    padding: 30px;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    text-align: center;
                    min-height: 220px;
                    position: relative;
                    overflow: hidden;
                " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                    
                    <!-- Background Pattern -->
                    <div style="
                        position: absolute;
                        top: -30px;
                        right: -30px;
                        width: 100px;
                        height: 100px;
                        background: linear-gradient(135deg, rgba(13, 71, 161, 0.05) 0%, rgba(21, 101, 192, 0.05) 100%);
                        border-radius: 50%;
                    "></div>

                    <!-- Partner Logo -->
                    <div style="
                        width: 100%;
                        height: 120px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 20px;
                        position: relative;
                        z-index: 1;
                    ">
                        @if($partner->image)
                        <img src="{{ asset('images/partner/'.$partner->image) }}" alt="{{ $partner->name }}" style="
                            max-width: 100%;
                            max-height: 100%;
                            object-fit: contain;
                            transition: transform 0.3s ease;
                        " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                        @else
                        <div style="
                            width: 100px;
                            height: 100px;
                            border-radius: 50%;
                            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">
                            <i class="icon-organization" style="font-size: 50px; color: white;"></i>
                        </div>
                        @endif
                    </div>

                    <!-- Partner Name -->
                    <h5 style="
                        font-size: 18px;
                        font-weight: 700;
                        color: #2c3e50;
                        margin: 0;
                        line-height: 1.4;
                        position: relative;
                        z-index: 1;
                    ">{{ $partner->name }}</h5>

                    <!-- Decorative Line -->
                    <div style="
                        width: 40px;
                        height: 3px;
                        background: linear-gradient(90deg, #0D47A1 0%, #1565C0 100%);
                        margin-top: 15px;
                        border-radius: 2px;
                        position: relative;
                        z-index: 1;
                    "></div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="icon-people" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Partners or Donors Yet</h4>
            <p style="color: #adb5bd;">Partner and donor organizations will appear here once added.</p>
        </div>
        @endif

        <!-- Thank You Section -->
        @if(isset($partners) && count($partners) > 0)
        <div class="row mt-5">
            <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                <div style="
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    border-radius: 20px;
                    padding: 40px;
                    color: white;
                    text-align: center;
                    box-shadow: 0 10px 30px rgba(102,126,234,0.3);
                ">
                    <i class="icon-heart" style="font-size: 50px; margin-bottom: 20px; opacity: 0.9;"></i>
                    <h3 style="
                        font-size: 32px;
                        font-weight: 800;
                        margin-bottom: 15px;
                        color: white;
                    ">Thank You!</h3>
                    <p style="
                        font-size: 18px;
                        margin: 0;
                        line-height: 1.8;
                        opacity: 0.95;
                        max-width: 800px;
                        margin: 0 auto;
                    ">
                        We extend our heartfelt gratitude to all our partners and donors for their invaluable support in empowering communities and transforming lives.
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
