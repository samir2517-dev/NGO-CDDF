@extends('main')

@section('content')

<!-- Publication Section -->
<section style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 80px 0; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                Our <span style="color: #0D47A1;">Publications</span>
            </h1>
        </div>

        @if(isset($publications) && count($publications) > 0)
            <div class="row g-4">
                @foreach($publications as $key => $publication)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                        <div class="position-relative" style="overflow: hidden;">
                            @if($publication->thumbnail)
                                <img src="{{ asset('images/publications/thumbnails/'.$publication->thumbnail) }}" 
                                     class="card-img-top" 
                                     alt="{{ $publication->title }}" 
                                     style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center" 
                                     style="height: 250px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                                    <i class="fa-solid fa-file-pdf" style="font-size: 80px; color: #0D47A1; opacity: 0.5;"></i>
                                </div>
                            @endif
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge text-white px-3 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 20px; font-size: 12px;">
                                    <i class="fas fa-book me-1"></i> Publication
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold mb-3" style="color: #2c3e50; font-size: 20px; line-height: 1.4;">
                                {{ $publication->title }}
                            </h5>
                            <p class="card-text flex-grow-1 mb-4" style="color: #6c757d; line-height: 1.6;">
                                {{ Str::limit($publication->description, 120) }}
                            </p>
                            <div class="mt-auto">
                                @if($publication->pdf_file)
                                    <a href="{{ asset('images/publications/pdfs/'.$publication->pdf_file) }}" 
                                       target="_blank" 
                                       class="btn w-100 text-white fw-bold" 
                                       style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; padding: 12px; font-size: 16px; transition: all 0.3s ease;">
                                        <i class="fa-solid fa-download me-2"></i> Download PDF
                                    </a>
                                @else
                                    <button class="btn btn-secondary w-100" disabled style="border-radius: 10px; padding: 12px; font-size: 16px;">
                                        <i class="fa-solid fa-file-pdf me-2"></i> No PDF Available
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div data-aos="fade-up">
                <div class="text-center py-5" style="background: white; border-radius: 15px; padding: 60px 20px;">
                    <div class="mb-4">
                        <i class="fa-solid fa-book-open" style="font-size: 80px; color: #ced4da;"></i>
                    </div>
                    <h4 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">No Publications Available</h4>
                    <p class="text-muted mb-0" style="font-size: 16px;">
                        Please check back later for new publications and research materials.
                    </p>
                </div>
            </div>
        @endif

    </div>
</section>

<style>
.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 40px rgba(13, 71, 161, 0.25) !important;
}

.card:hover img {
    transform: scale(1.05);
}

.card .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(13, 71, 161, 0.4);
}
</style>

@endsection
