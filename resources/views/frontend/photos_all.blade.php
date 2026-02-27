@extends('main')

@section('content')

<!-- Photo Gallery Section -->
<section style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 80px 0; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                <span style="color: #0D47A1;">Photo Gallery</span>
            </h1>
        </div>

        @if(count($photos) > 0)
        <!-- Gallery Grid -->
        <div class="row g-4 mb-5">
            @foreach($photos as $key => $photo)
                @php
                    // Determine image path based on source type
                    $imagePath = 'images/gallery/' . $photo->image;
                    if ($photo->source_type === 'program') {
                        $imagePath = $photo->image_type === 'cover' 
                            ? 'images/programs/' . $photo->image 
                            : 'images/programs/gallery/' . $photo->image;
                    } elseif ($photo->source_type === 'project') {
                        $imagePath = $photo->image_type === 'cover' 
                            ? 'images/project/' . $photo->image 
                            : 'images/ongoing_project/gallery/' . $photo->image;
                    } elseif ($photo->source_type === 'news') {
                        $imagePath = $photo->image_type === 'cover' 
                            ? 'images/news/' . $photo->image 
                            : 'images/news/gallery/' . $photo->image;
                    }
                @endphp
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key % 6) * 100 }}">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                        <div class="position-relative" style="overflow: hidden; height: 280px;">
                            <a href="{{ asset($imagePath) }}" 
                               class="image-popup d-block w-100 h-100" 
                               data-title="{{ $photo->title }}" 
                               data-description="{{ $photo->description }}">
                                <img src="{{ asset($imagePath) }}" 
                                     class="card-img-top" 
                                     alt="{{ $photo->title }}" 
                                     style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s ease;">
                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" 
                                     style="background: rgba(13, 71, 161, 0); transition: background 0.3s ease;">
                                    <i class="icon-search" style="color: white; font-size: 2.5rem; opacity: 0; transition: opacity 0.3s ease;"></i>
                                </div>
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-2" style="color: #2c3e50; font-size: 18px; line-height: 1.4;">
                                {{ $photo->title }}
                            </h5>
                            <p class="card-text text-muted" style="font-size: 14px; line-height: 1.6;">
                                {{ Str::limit($photo->description, 100, "...") }}
                            </p>
                            <a href="{{ asset($imagePath) }}" 
                               class="image-popup" 
                               data-title="{{ $photo->title }}" 
                               data-description="{{ $photo->description }}"
                               style="display: inline-flex; align-items: center; gap: 8px; color: #0D47A1; font-weight: 600; font-size: 15px; text-decoration: none; transition: all 0.3s ease; margin-top: 8px;" 
                               onmouseover="this.style.gap='12px'; this.style.color='#1565C0';" 
                               onmouseout="this.style.gap='8px'; this.style.color='#0D47A1';">
                                View Full Image <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
            <div class="pagination-wrapper">
                {{ $photos->links() }}
            </div>
        </div>
        @else
        <div class="text-center py-5">
            <p class="text-muted">No photos available in the gallery.</p>
        </div>
        @endif
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(13, 71, 161, 0.2) !important;
}

.card:hover img {
    transform: scale(1.05);
}

.card:hover .position-absolute {
    background: rgba(13, 71, 161, 0.7) !important;
}

.card:hover .icon-search {
    opacity: 1 !important;
}

.pagination-wrapper .pagination {
    display: flex;
    gap: 10px;
}

.pagination-wrapper .page-link {
    color: #0D47A1;
    border: 2px solid #0D47A1;
    border-radius: 8px;
    padding: 8px 16px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.pagination-wrapper .page-link:hover {
    background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
    color: white;
    border-color: #0D47A1;
}

.pagination-wrapper .page-item.active .page-link {
    background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
    border-color: #0D47A1;
}
</style>

@endsection

@push('js')
<script>
    $(document).ready(function(){
        // Initialize image popup for gallery with title and description
        if (typeof $.fn.magnificPopup !== 'undefined') {
            $('.image-popup').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1]
                },
                image: {
                    titleSrc: function(item) {
                        var title = item.el.attr('data-title');
                        var description = item.el.attr('data-description');
                        
                        if (title && description) {
                            return '<div style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); padding: 20px; border-radius: 10px; margin-top: 15px;">' +
                                   '<h4 style="color: white; margin: 0 0 10px 0; font-size: 1.3rem; font-weight: 600;">' + title + '</h4>' +
                                   '<p style="color: rgba(255,255,255,0.95); margin: 0; line-height: 1.6; font-size: 0.95rem;">' + description + '</p>' +
                                   '</div>';
                        } else if (title) {
                            return '<h4 style="color: white; margin: 10px 0; font-size: 1.3rem;">' + title + '</h4>';
                        }
                        return '';
                    }
                },
                closeOnContentClick: true,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom',
                zoom: {
                    enabled: true,
                    duration: 300,
                    easing: 'ease-in-out'
                },
                callbacks: {
                    beforeOpen: function() {
                        // Add custom styling to popup
                        this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    }
                }
            });
        }

        // Initialize AOS
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }
    });
</script>
@endpush
