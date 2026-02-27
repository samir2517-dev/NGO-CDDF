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
                Career with <span style="color: #0D47A1;">BMS</span>
            </h1>

        </div>

        <!-- Career Opportunities Grid -->
        @if(isset($career) && count($career) > 0)
        <div class="row g-4">
            @foreach($career as $index => $data)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="certificate-card" style="
                    background: white;
                    border-radius: 20px;
                    padding: 40px 30px;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    text-align: center;
                    position: relative;
                    overflow: hidden;
                " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                    
                    <!-- Background Pattern -->
                    <div style="
                        position: absolute;
                        top: -50px;
                        right: -50px;
                        width: 150px;
                        height: 150px;
                        background: linear-gradient(135deg, rgba(13, 71, 161, 0.05) 0%, rgba(21, 101, 192, 0.05) 100%);
                        border-radius: 50%;
                    "></div>
                    
                    <!-- Career Icon -->
                    <div style="
                        width: 100px;
                        height: 100px;
                        border-radius: 50%;
                        background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-bottom: 25px;
                        box-shadow: 0 10px 30px rgba(13, 71, 161, 0.3);
                        position: relative;
                        z-index: 1;
                    ">
                        <i class="bx bx-briefcase" style="font-size: 45px; color: white;"></i>
                    </div>

                    <!-- Position Name -->
                    <h4 style="
                        font-size: 22px;
                        font-weight: 700;
                        color: #2c3e50;
                        margin-bottom: 25px;
                        line-height: 1.4;
                        position: relative;
                        z-index: 1;
                    ">{{ $data->name }}</h4>

                    <!-- Download Button -->
                    <a href="{{ asset('images/invoked/'.$data->file) }}" target="_blank" style="
                        display: inline-flex;
                        align-items: center;
                        gap: 12px;
                        padding: 14px 35px;
                        background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
                        color: white;
                        text-decoration: none;
                        border-radius: 50px;
                        font-weight: 600;
                        font-size: 16px;
                        transition: all 0.3s ease;
                        box-shadow: 0 5px 15px rgba(13, 71, 161, 0.3);
                        position: relative;
                        z-index: 1;
                    " onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 8px 25px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 5px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-download" style="font-size: 18px;"></i>
                        Download Details
                    </a>

                    <!-- File Type Label -->
                    <div style="
                        margin-top: 20px;
                        padding: 8px 20px;
                        background: #f8f9fa;
                        border-radius: 20px;
                        font-size: 13px;
                        color: #6c757d;
                        font-weight: 600;
                        text-transform: uppercase;
                        letter-spacing: 0.5px;
                        position: relative;
                        z-index: 1;
                    ">
                        <i class="bx bx-file" style="margin-right: 5px;"></i>
                        PDF Document
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="bx bx-briefcase" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Career Opportunities Available</h4>
            <p style="color: #adb5bd;">Career opportunities will appear here once they are posted.</p>
        </div>
        @endif
    </div>
</section>

@endsection
