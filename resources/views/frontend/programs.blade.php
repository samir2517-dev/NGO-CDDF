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
            ">
                <span style="color: #0D47A1;">Featured Programs</span>
            </h1>

        </div>

        @if(isset($programs) && count($programs) > 0)
        <!-- Programs Grid -->
        <div class="row g-4">
            @foreach ($programs as $index => $program)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}">
                    <div class="program-card" style="
                        background: white;
                        border-radius: 20px;
                        overflow: hidden;
                        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                    " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                        
                        <!-- Program Image -->
                        <div style="position: relative; overflow: hidden; height: 250px;">
                            @if($program->image && file_exists(public_path('images/programs/'.$program->image)))
                                <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    transition: transform 0.5s ease;
                                " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                            @else
                                <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title }}" style="
                                    width: 100%;
                                    height: 100%;
                                    object-fit: cover;
                                    transition: transform 0.5s ease;
                                " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                            @endif
                            
                            <!-- Status Badge -->
                            @if($program->status)
                            <div style="
                                position: absolute;
                                top: 15px;
                                right: 15px;
                                padding: 8px 16px;
                                background: {{ $program->status == 'active' ? 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)' : ($program->status == 'completed' ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' : 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)') }};
                                color: white;
                                border-radius: 20px;
                                font-size: 12px;
                                font-weight: 600;
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                                box-shadow: 0 4px 15px rgba(0,0,0,0.2);
                            ">{{ ucfirst($program->status) }}</div>
                            @endif

                            <!-- Gradient Overlay -->
                            <div style="
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                height: 80px;
                                background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
                            "></div>
                        </div>

                        <!-- Program Content -->
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <!-- Title -->
                            <h4 style="
                                font-size: 20px;
                                font-weight: 700;
                                color: #2c3e50;
                                margin-bottom: 12px;
                                line-height: 1.4;
                            ">{{ Str::limit($program->title, 50, '...') }}</h4>

                            <!-- Date -->
                            @if($program->start_date)
                            <div style="
                                display: flex;
                                align-items: center;
                                gap: 8px;
                                color: #6c757d;
                                font-size: 14px;
                                margin-bottom: 15px;
                            ">
                                <i class="fas fa-calendar-check" style="color: #0D47A1;"></i>
                                <span>{{ date('d M, Y', strtotime($program->start_date)) }}</span>
                            </div>
                            @endif

                            <!-- Description -->
                            <p style="
                                color: #555;
                                font-size: 15px;
                                line-height: 1.7;
                                margin-bottom: 20px;
                                flex-grow: 1;
                            ">{{ Str::limit($program->description, 130, "...") }}</p>

                            <!-- Read More Link -->
                            <a href="{{ route('programs.view', $program->id) }}" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 8px;
                                color: #0D47A1;
                                font-weight: 600;
                                font-size: 15px;
                                text-decoration: none;
                                transition: all 0.3s ease;
                            " onmouseover="this.style.gap='12px'; this.style.color='#1565C0';" onmouseout="this.style.gap='8px'; this.style.color='#0D47A1';">
                                Read More
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
                {{ $programs->links() }}
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="fas fa-folder-open" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Programs Available</h4>
            <p style="color: #adb5bd;">Featured programs will appear here once added.</p>
        </div>
        @endif
    </div>
</section>

<style>
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
