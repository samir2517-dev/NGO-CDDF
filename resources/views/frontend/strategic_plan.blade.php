@extends('main')

@section('content')

<!-- Strategic Plan Section -->
<section style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 80px 0; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                BMS <span style="color: #0D47A1;">Strategic Plan</span>
            </h1>
        </div>

        <!-- Strategic Plans Grid -->
        <div class="row g-4 justify-content-center">
            @forelse ($strategicPlans as $key => $plan)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <a href="{{ asset('images/strategic_plans/pdfs/'.$plan->pdf_file) }}" target="_blank" download class="text-decoration-none">
                        <div class="card border-0 h-100 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                            <div class="position-relative" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); padding: 40px;">
                                <div class="text-center">
                                    @if (!empty($plan->image))
                                        <img src="{{ asset('images/strategic_plans/images/'.$plan->image) }}" 
                                             alt="{{ $plan->title }}" 
                                             style="max-width: 100%; height: auto; max-height: 200px; border-radius: 10px; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.2);">
                                    @else
                                        @php
                                            $app = application();
                                            $logoPath = !empty($app->main_logo) ? 'images/application/' . $app->main_logo : 'img/logo.png';
                                        @endphp
                                        <img src="{{ asset($logoPath) }}" 
                                             alt="Logo" 
                                             style="max-width: 70%; height: auto; filter: drop-shadow(0 4px 10px rgba(13, 71, 161, 0.3));">
                                    @endif
                                </div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge text-white px-3 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 20px; font-size: 12px;">
                                        <i class="fas fa-file-pdf me-1"></i> PDF
                                    </span>
                                </div>
                            </div>
                            <div class="card-body p-4" style="background: white;">
                                <h5 class="fw-bold mb-3 text-center" style="color: #2c3e50; font-size: 20px;">
                                    {{ $plan->title }}
                                </h5>
                                @if (!empty($plan->description))
                                    <p class="text-center mb-4" style="color: #6c757d; line-height: 1.6;">
                                        {{ $plan->description }}
                                    </p>
                                @endif
                                <div class="text-center">
                                    <button class="btn text-white px-4 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                                        <i class="fas fa-download me-2"></i> Download Plan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12" data-aos="fade-up">
                    <div class="text-center py-5" style="background: white; border-radius: 15px; padding: 60px 20px;">
                        <div class="mb-4">
                            <i class="fas fa-clipboard-list" style="font-size: 80px; color: #ced4da;"></i>
                        </div>
                        <h4 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">No Strategic Plan Available</h4>
                        <p class="text-muted mb-0" style="font-size: 16px;">
                            Please check back later for our strategic planning documents.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

<style>
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(13, 71, 161, 0.25) !important;
}

.card:hover .btn {
    transform: scale(1.05);
    box-shadow: 0 5px 20px rgba(13, 71, 161, 0.4);
}
</style>

@endsection
