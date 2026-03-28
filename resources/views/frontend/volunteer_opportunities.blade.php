@extends('main')

@section('content')

<!-- Volunteer Opportunities Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); padding-top: 60px !important;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                <span style="color: #0D47A1;">Volunteer Opportunities</span>
            </h1>
        </div>

        @if(isset($volunteers) && count($volunteers) > 0)
            <!-- Opportunities Grid -->
            <div class="row g-4">
                @foreach($volunteers as $index => $volunteer)
                    @php
                        // Gradient colors for cards
                        $gradients = [
                            'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                            'linear-gradient(135deg, #f093fb 0%, #f5576c 100%)',
                            'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)',
                            'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)',
                            'linear-gradient(135deg, #fa709a 0%, #fee140 100%)',
                            'linear-gradient(135deg, #30cfd0 0%, #330867 100%)',
                        ];
                        $gradient = $gradients[$index % count($gradients)];
                    @endphp
                    
                    <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 50 }}">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                            <!-- Card Header with Gradient -->
                            <div class="card-header border-0 text-white position-relative" style="background: {{ $gradient }}; padding: 30px;">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div class="flex-grow-1">
                                        <h3 class="mb-2 fw-bold" style="font-size: 24px; line-height: 1.3;">
                                            {{ $volunteer->title }}
                                        </h3>
                                        @if($volunteer->location)
                                            <div class="d-flex align-items-center" style="opacity: 0.95;">
                                                <i class="bx bx-map" style="font-size: 18px; margin-right: 8px;"></i>
                                                <span style="font-size: 15px;">{{ $volunteer->location }}</span>
                                            </div>
                                        @endif
                                    </div>
                                    @php
                                        $statusColor = $volunteer->status == 'open' ? '#10b981' : '#6c757d';
                                        $statusText = ucfirst($volunteer->status);
                                    @endphp
                                    <div class="ms-3" style="background: rgba(255,255,255,0.25); backdrop-filter: blur(10px); border-radius: 10px; padding: 8px 16px; min-width: 80px; text-align: center;">
                                        <div style="font-size: 13px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px;">
                                            {{ $statusText }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4 d-flex flex-column">
                                <!-- Description -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-start mb-2">
                                        <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                            <i class="bx bx-info-circle" style="font-size: 24px; color: white;"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div style="font-size: 12px; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">
                                                About This Opportunity
                                            </div>
                                            <div style="font-size: 15px; color: #2c3e50; line-height: 1.7;">
                                                {!! $volunteer->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($volunteer->requirements)
                                    <!-- Requirements -->
                                    <div class="mb-4">
                                        <div class="d-flex align-items-start mb-2">
                                            <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                                <i class="bx bx-check-circle" style="font-size: 24px; color: white;"></i>
                                            </div>
                                            <div class="ms-3 flex-grow-1">
                                                <div style="font-size: 12px; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">
                                                    Requirements
                                                </div>
                                                <div style="font-size: 15px; color: #2c3e50; line-height: 1.7;">
                                                    {{ $volunteer->requirements }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Action Button -->
                                @if($volunteer->status == 'open')
                                    <div class="mt-auto pt-3">
                                        <a href="{{ route('contact') }}" class="btn w-100 text-white fw-bold" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; padding: 12px; font-size: 16px; transition: all 0.3s ease;">
                                            <i class="bx bx-send me-2"></i>Apply Now
                                        </a>
                                    </div>
                                @else
                                    <div class="mt-auto pt-3">
                                        <button class="btn w-100 fw-bold" disabled style="background: #e9ecef; color: #6c757d; border: none; border-radius: 10px; padding: 12px; font-size: 16px;">
                                            <i class="bx bx-lock me-2"></i>Position Filled
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <!-- Card Footer Accent -->
                            <div style="height: 5px; background: {{ $gradient }};"></div>
                        </div>
                    </div>
                @endforeach
            </div>

        @else
            <!-- Empty State -->
            <div class="text-center py-5" data-aos="fade-up">
                <div class="mb-4">
                    <i class="bx bx-users" style="font-size: 80px; color: #dee2e6;"></i>
                </div>
                <h4 style="color: #6c757d; font-weight: 600;">No Volunteer Opportunities Available</h4>
                <p style="color: #adb5bd;">Check back soon for new opportunities to make a difference in your community.</p>
            </div>
        @endif

        <!-- Call to Action Banner -->
        <div class="mt-5 text-center" data-aos="fade-up">
            <div class="card border-0 shadow-sm" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 15px; padding: 40px;">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                    <div class="text-white">
                        <i class="bx bx-heart" style="font-size: 48px;"></i>
                    </div>
                    <div class="text-white text-center text-md-start">
                        <h3 class="mb-2 fw-bold">Ready to Make an Impact?</h3>
                        <p class="mb-0" style="font-size: 16px; opacity: 0.95;">
                            Have questions about volunteering? Get in touch with us to learn more about how you can contribute.
                        </p>
                    </div>
                    <div class="ms-md-auto">
                        <a href="{{ route('contact') }}" class="btn btn-light px-4 py-2 fw-bold" style="border-radius: 10px; color: #0D47A1;">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(13, 71, 161, 0.4);
}
</style>

@endsection
