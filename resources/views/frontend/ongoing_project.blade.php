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
                <span style="color: #0D47A1;">Ongoing Projects</span>
            </h1>

        </div>

        <!-- Projects Grid -->
        <div class="row g-4">
            @foreach ($project as $index => $data)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($index % 6) * 100 }}">
                    <div class="project-card" style="
                        background: white;
                        border-radius: 20px;
                        overflow: hidden;
                        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                        height: 100%;
                        display: flex;
                        flex-direction: column;
                    " onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)';">
                        
                        <!-- Project Image -->
                        <div style="position: relative; overflow: hidden; height: 200px;">
                            <img src="{{ asset('images/project/'.$data->image) }}" alt="{{ $data->title }}" style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                                transition: transform 0.5s ease;
                            " onmouseover="this.style.transform='scale(1.1)';" onmouseout="this.style.transform='scale(1)';">
                            
                            <!-- Active Badge -->
                            <div style="
                                position: absolute;
                                top: 15px;
                                right: 15px;
                                padding: 8px 16px;
                                background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
                                color: white;
                                border-radius: 20px;
                                font-size: 11px;
                                font-weight: 700;
                                text-transform: uppercase;
                                letter-spacing: 0.5px;
                                box-shadow: 0 4px 15px rgba(67, 233, 123, 0.4);
                                display: flex;
                                align-items: center;
                                gap: 6px;
                            ">
                                <span style="
                                    width: 6px;
                                    height: 6px;
                                    background: white;
                                    border-radius: 50%;
                                    animation: pulse 1.5s ease-in-out infinite;
                                "></span>
                                Active
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

                        <!-- Project Content -->
                        <div style="padding: 25px; flex-grow: 1; display: flex; flex-direction: column;">
                            <!-- Title -->
                            <h4 style="
                                font-size: 20px;
                                font-weight: 700;
                                color: #2c3e50;
                                margin-bottom: 12px;
                                line-height: 1.4;
                            ">{{ Str::limit($data->title, 35, '...') }}</h4>

                            <!-- Date -->
                            <div style="
                                display: flex;
                                align-items: center;
                                gap: 8px;
                                color: #6c757d;
                                font-size: 13px;
                                margin-bottom: 15px;
                            ">
                                <i class="fas fa-calendar-minus" style="color: #0D47A1;"></i>
                                <span>{{ date("d M, Y", strtotime($data->created_at ?? now())) }}</span>
                            </div>

                            <!-- Description -->
                            <p style="
                                color: #555;
                                font-size: 15px;
                                line-height: 1.7;
                                margin-bottom: 20px;
                                flex-grow: 1;
                            ">{{ Str::limit($data->description, 90, "...") }}</p>

                            <!-- Read More Link -->
                            <a href="{{ route('ongoing.project.view', $data->id) }}" style="
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
                {{ $project->links() }}
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
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
