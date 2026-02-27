@extends('main')

@section('content')

<!-- Success Story Detail Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); min-height: 100vh;">
    <div class="container">
        @if(isset($story))
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Back Button -->
                <div class="mb-4" data-aos="fade-right">
                    <a href="{{ route('success.stories') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateX(-5px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 20px;"></i>
                        <span>Back to Success Stories</span>
                    </a>
                </div>

                <!-- Story Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;" data-aos="fade-up">
                    <!-- Story Image -->
                    @if($story->image)
                    <div style="position: relative; overflow: hidden; height: 450px;">
                        <img src="{{ asset('images/stories/'.$story->image) }}" alt="{{ $story->beneficiary_name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 30px;">
                            <h1 style="color: white; font-weight: 800; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">{{ $story->beneficiary_name }}</h1>
                            @if($story->beneficiary_title)
                            <p style="color: rgba(255,255,255,0.9); font-size: 18px; margin: 8px 0 0 0; text-shadow: 0 2px 8px rgba(0,0,0,0.5);"><em>{{ $story->beneficiary_title }}</em></p>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Story Content -->
                    <div class="card-body" style="padding: 50px;">
                        @if(!$story->image)
                            <h1 style="color: #2c3e50; font-weight: 800; margin-bottom: 10px;">{{ $story->beneficiary_name }}</h1>
                            @if($story->beneficiary_title)
                            <p style="color: #6c757d; font-size: 18px; margin-bottom: 20px;"><em>{{ $story->beneficiary_title }}</em></p>
                            @endif
                        @endif

                        <!-- Rating -->
                        <div style="margin-bottom: 30px;">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <span style="color: #FFC107; font-size: 32px;">★</span>
                                @else
                                    <span style="color: #dee2e6; font-size: 32px;">★</span>
                                @endif
                            @endfor
                        </div>

                        <!-- Date Badge -->
                        @if($story->date)
                        <div style="display: inline-flex; align-items: center; gap: 8px; background: #f8f9fa; padding: 10px 20px; border-radius: 10px; margin-bottom: 30px; color: #6c757d; font-size: 14px;">
                            <i class="bx bx-calendar" style="font-size: 18px; color: #0D47A1;"></i>
                            <span>{{ date('F d, Y', strtotime($story->date)) }}</span>
                        </div>
                        @endif

                        <!-- Description -->
                        <div style="font-size: 18px; line-height: 1.9; color: #2c3e50; text-align: justify; word-wrap: break-word; overflow-wrap: break-word; word-break: break-word;">
                            {{ $story->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Story Not Found -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center" style="padding: 80px 20px;" data-aos="fade-up">
                    <i class="bx bx-error-circle" style="font-size: 80px; color: #0D47A1; margin-bottom: 20px;"></i>
                    <h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">Story Not Found</h3>
                    <p style="color: #6c757d; font-size: 16px; margin-bottom: 30px;">The story you're looking for doesn't exist or has been removed.</p>
                    <a href="{{ route('success.stories') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 22px;"></i>
                        <span>Back to Success Stories</span>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection
