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
                Our <span style="color: #0D47A1;">Impact</span>
            </h1>

        </div>

        <!-- Impact Metrics Grid -->
        @if(isset($impact) && count($impact) > 0)
        <div class="row g-4">
            @php
                $gradients = [
                    'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                    'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                    'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                    'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                    'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                    'linear-gradient(135deg, #30cfd0 0%, #330867 100%)',
                    'linear-gradient(135deg, #a8edea 0%, #fed6e3 100%)',
                    'linear-gradient(135deg, #1565C0 0%, #0D47A1 100%)',
                ];
            @endphp
            
            @foreach($impact as $index => $item)
            @php
                $gradient = $gradients[$index % count($gradients)];
            @endphp
            
            <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="impact-card" style="
                    background: white;
                    border-radius: 25px;
                    overflow: hidden;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    height: 100%;
                    position: relative;
                " onmouseover="this.style.transform='translateY(-15px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                    
                    <!-- Gradient Header -->
                    <div style="
                        background: {{ $gradient }};
                        padding: 35px 25px;
                        text-align: center;
                        position: relative;
                        overflow: hidden;
                    ">
                        <!-- Decorative Circle -->
                        <div style="
                            position: absolute;
                            top: -40px;
                            right: -40px;
                            width: 120px;
                            height: 120px;
                            background: rgba(255,255,255,0.1);
                            border-radius: 50%;
                        "></div>

                        <!-- Icon -->
                        <div style="
                            width: 90px;
                            height: 90px;
                            margin: 0 auto 20px;
                            border-radius: 50%;
                            background: rgba(255,255,255,0.25);
                            backdrop-filter: blur(10px);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            position: relative;
                            z-index: 1;
                            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
                        ">
                            @if($item->icon)
                            <i class="{{ $item->icon }}" style="
                                font-size: 45px;
                                color: white;
                            "></i>
                            @else
                            <i class="bx bx-bar-chart-alt-2" style="
                                font-size: 45px;
                                color: white;
                            "></i>
                            @endif
                        </div>

                        <!-- Metric Value -->
                        <h2 style="
                            font-size: 48px;
                            font-weight: 800;
                            color: white;
                            margin: 0 0 10px 0;
                            line-height: 1;
                            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
                            position: relative;
                            z-index: 1;
                        ">{{ $item->metric_value }}</h2>

                        <!-- Metric Unit -->
                        <p style="
                            font-size: 20px;
                            font-weight: 700;
                            color: white;
                            margin: 0;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            position: relative;
                            z-index: 1;
                        ">{{ $item->metric_unit }}</p>
                    </div>

                    <!-- Content Section -->
                    <div style="padding: 25px;">
                        <!-- Title -->
                        <h5 style="
                            font-size: 18px;
                            font-weight: 700;
                            color: #2c3e50;
                            margin-bottom: 12px;
                            text-align: center;
                            line-height: 1.4;
                        ">{{ $item->title }}</h5>

                        @if($item->description)
                        <!-- Description -->
                        <p style="
                            font-size: 14px;
                            line-height: 1.7;
                            color: #6c757d;
                            margin-bottom: 15px;
                            text-align: center;
                        ">{{ $item->description }}</p>
                        @endif

                        @if($item->year)
                        <!-- Year Badge -->
                        <div style="
                            text-align: center;
                            margin-top: 15px;
                        ">
                            <span style="
                                display: inline-block;
                                padding: 6px 18px;
                                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                                border-radius: 20px;
                                font-size: 13px;
                                font-weight: 600;
                                color: #495057;
                                border: 2px solid #dee2e6;
                            ">
                                <i class="bx bx-calendar" style="margin-right: 5px;"></i>
                                {{ $item->year }}
                            </span>
                        </div>
                        @endif
                    </div>

                    <!-- Bottom Accent -->
                    <div style="
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        height: 5px;
                        background: {{ $gradient }};
                    "></div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="bx bx-bar-chart-alt-2" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Impact Metrics Yet</h4>
            <p style="color: #adb5bd;">Impact statistics will appear here once added.</p>
        </div>
        @endif

        <!-- Call to Action -->
        @if(isset($impact) && count($impact) > 0)
        <div class="row mt-5">
            <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                <div style="
                    background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
                    border-radius: 25px;
                    padding: 50px 40px;
                    color: white;
                    text-align: center;
                    box-shadow: 0 15px 40px rgba(13, 71, 161, 0.3);
                    position: relative;
                    overflow: hidden;
                ">
                    <!-- Decorative Elements -->
                    <div style="
                        position: absolute;
                        top: -60px;
                        left: -60px;
                        width: 200px;
                        height: 200px;
                        background: rgba(255,255,255,0.1);
                        border-radius: 50%;
                    "></div>
                    <div style="
                        position: absolute;
                        bottom: -40px;
                        right: -40px;
                        width: 180px;
                        height: 180px;
                        background: rgba(255,255,255,0.1);
                        border-radius: 50%;
                    "></div>

                    <i class="bx bx-trophy" style="
                        font-size: 60px;
                        margin-bottom: 20px;
                        opacity: 0.9;
                        position: relative;
                        z-index: 1;
                    "></i>
                    <h3 style="
                        font-size: 36px;
                        font-weight: 800;
                        margin-bottom: 15px;
                        color: white;
                        position: relative;
                        z-index: 1;
                    ">Together, We Create Change</h3>
                    <p style="
                        font-size: 19px;
                        margin: 0;
                        line-height: 1.8;
                        opacity: 0.95;
                        max-width: 900px;
                        margin: 0 auto;
                        position: relative;
                        z-index: 1;
                    ">
                        Every number represents lives transformed, communities empowered, and hope restored. Join us in making an even greater impact.
                    </p>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
