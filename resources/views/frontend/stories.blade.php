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
                <span style="color: #0D47A1;">Success Stories</span>
            </h1>

        </div>
        
        @if(isset($stories) && count($stories) > 0)
        <!-- Stories Grid -->
        <div class="row g-4">
            @foreach($stories as $index => $story)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}">
                <div class="story-card" style="
                    background: white;
                    border-radius: 20px;
                    overflow: hidden;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                    
                    <!-- Story Image -->
                    <div style="position: relative; overflow: hidden; height: 250px;">
                        <div style="
                            width: 100%;
                            height: 100%;
                            background-image: url('{{ asset('images/stories/'.$story->image) }}');
                            background-size: cover;
                            background-position: center;
                            transition: transform 0.5s ease;
                        " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';"></div>
                        
                        <!-- Rating Badge -->
                        <div style="
                            position: absolute;
                            top: 15px;
                            right: 15px;
                            padding: 10px 15px;
                            background: rgba(255, 255, 255, 0.95);
                            backdrop-filter: blur(10px);
                            border-radius: 20px;
                            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                        ">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $story->rating)
                                    <span style="color: #FFA500; font-size: 14px;">★</span>
                                @else
                                    <span style="color: #dee2e6; font-size: 14px;">★</span>
                                @endif
                            @endfor
                        </div>

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

                    <!-- Story Content -->
                    <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                        <!-- Story Description -->
                        <p style="
                            color: #555;
                            font-size: 15px;
                            line-height: 1.7;
                            margin-bottom: 20px;
                            flex-grow: 1;
                            font-style: italic;
                        ">"{{ Str::limit($story->description, 150) }}"</p>

                        <!-- Beneficiary Info -->
                        <div style="
                            padding-top: 20px;
                            border-top: 2px solid #f0f0f0;
                        ">
                            <h5 style="
                                font-size: 18px;
                                font-weight: 700;
                                color: #2c3e50;
                                margin-bottom: 5px;
                            ">{{ $story->beneficiary_name }}</h5>
                            <p style="
                                color: #0D47A1;
                                font-size: 14px;
                                font-weight: 600;
                                margin-bottom: 15px;
                            ">{{ $story->beneficiary_title }}</p>
                            
                            <!-- Read Full Story Button -->
                            <a href="{{ route('success.stories.view', $story->id) }}" style="
                                display: inline-flex;
                                align-items: center;
                                gap: 8px;
                                padding: 10px 20px;
                                background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
                                color: white;
                                text-decoration: none;
                                border-radius: 50px;
                                font-weight: 600;
                                font-size: 14px;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);
                            " onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                                Read Full Story
                                <i class="fa fa-arrow-right" style="font-size: 12px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
            <div class="pagination-wrapper">
                {{ $stories->links() }}
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="fas fa-book-open" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Success Stories Yet</h4>
            <p style="color: #adb5bd;">Inspiring stories will appear here once added.</p>
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
