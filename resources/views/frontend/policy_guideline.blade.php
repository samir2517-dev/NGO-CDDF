@extends('main')

@section('content')

<!-- Policy and Guideline Section -->
<section style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 80px 0; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                <span style="color: #0D47A1;">Policy & Guidelines</span>
            </h1>
        </div>

        <!-- Policy Grid -->
        <div class="row g-4 justify-content-center">
            @foreach ($policy as $key => $data)
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <a href="{{ asset('images/policy_guideline/'.$data->file) }}" target="_blank" class="text-decoration-none">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="icon-wrapper d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%); border-radius: 12px;">
                                            <i class="fas fa-file-pdf" style="font-size: 36px; color: #0D47A1;"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h5 class="fw-bold mb-2" style="color: #2c3e50; font-size: 20px;">
                                            {{ $data->name }}
                                        </h5>
                                        <p class="text-muted mb-0" style="font-size: 14px;">
                                            <i class="fas fa-file-alt me-2" style="color: #0D47A1;"></i> PDF Document
                                        </p>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn btn-sm text-white px-4 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease;">
                                            <i class="fas fa-download me-2"></i> Download
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Info Section -->
        <div class="row mt-5" data-aos="fade-up">
            <div class="col-12">
                <div class="card border-0" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 15px; padding: 40px; text-align: center;">
                    <div class="card-body">
                        <i class="fas fa-info-circle mb-3" style="font-size: 48px; color: white;"></i>
                        <h4 class="text-white fw-bold mb-3">Need Assistance?</h4>
                        <p class="text-white mb-4" style="font-size: 16px; max-width: 600px; margin: 0 auto;">
                            If you need clarification on any of our policies or guidelines, please feel free to contact our administration team.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-light px-5 py-3" style="border-radius: 10px; font-weight: 700; transition: all 0.3s ease;">
                            <i class="fas fa-envelope me-2"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(13, 71, 161, 0.2) !important;
}

.card:hover .icon-wrapper {
    transform: scale(1.1);
    transition: transform 0.3s ease;
}

.card:hover .btn {
    transform: scale(1.05);
    box-shadow: 0 5px 15px rgba(13, 71, 161, 0.4);
}

.btn-light:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(255, 255, 255, 0.3);
}
</style>

@endsection
