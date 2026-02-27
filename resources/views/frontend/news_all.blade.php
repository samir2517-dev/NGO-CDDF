@extends('main')

@section('content')

<!-- News & Events Section -->
<section style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%); padding: 80px 0; min-height: 100vh;">
    <div class="container" data-aos="fade-up">
        
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                <span style="color: #0D47A1;">News & Events</span>
            </h1>
        </div>

        <!-- News Grid -->
        <div class="row g-4 mb-5">
            @foreach ($news as $key=>$data)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                    <div class="card border-0 h-100 shadow-sm" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                        <div class="position-relative" style="overflow: hidden;">
                            <img src="{{ asset('images/news/'.$data->image) }}" 
                                 class="card-img-top" 
                                 alt="news" 
                                 style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                            <div class="position-absolute top-0 end-0 m-3">
                                <span class="badge text-white px-3 py-2" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 20px; font-size: 12px;">
                                    <i class="fas fa-newspaper me-1"></i> Latest
                                </span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold mb-3" style="color: #2c3e50; font-size: 20px; line-height: 1.4;">
                                {{ Str::limit($data->title, 60, '...') }}
                            </h5>
                            <p class="text-muted mb-3" style="font-size: 14px;">
                                <i class="fas fa-calendar-alt me-2" style="color: #0D47A1;"></i>
                                {{ date("M d, Y", strtotime($data->created_at ?? now())) }}
                            </p>
                            <p class="card-text flex-grow-1" style="color: #6c757d; line-height: 1.6;">
                                {{ Str::limit($data->description, 120, "...") }}
                            </p>
                            <a href="{{ route('latest.news.view',$data->id) }}" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 8px;
                                color: #0D47A1;
                                font-weight: 600;
                                font-size: 15px;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.gap='12px'; this.style.color='#1565C0';" onmouseout="this.style.gap='8px'; this.style.color='#0D47A1';">
                                Read Full Article
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
            <div class="pagination-wrapper">
                {{ $news->links() }}
            </div>
        </div>

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
