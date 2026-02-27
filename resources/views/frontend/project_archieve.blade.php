@extends('main')

@section('content')

<!-- Project Archive Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); padding-top: 60px !important;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                <span style="color: #0D47A1;">Project Archive</span>
            </h1>
        </div>

        @if(isset($project) && count($project) > 0)
            <!-- Projects Grid -->
            <div class="row g-4">
                @foreach($project as $index => $proj)
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
                            <div class="card-header border-0 text-white position-relative" style="background: {{ $gradient }}; padding: 25px; min-height: 100px; display: flex; align-items: center;">
                                <div class="d-flex align-items-center justify-content-between w-100">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-0 fw-bold" style="font-size: 20px; line-height: 1.4;">
                                            {{ $proj->name }}
                                        </h4>
                                    </div>
                                    <div class="ms-3" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border-radius: 10px; padding: 10px 15px; min-width: 60px; text-align: center;">
                                        <div style="font-size: 28px; font-weight: 800; line-height: 1;">{{ $index + 1 }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Body -->
                            <div class="card-body p-4">
                                <!-- Partner/Donor Info -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-start mb-2">
                                        <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                            <i class="bx bx-group" style="font-size: 24px; color: white;"></i>
                                        </div>
                                        <div class="ms-3 flex-grow-1">
                                            <div style="font-size: 12px; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">
                                                Partners/Donors
                                            </div>
                                            <div style="font-size: 16px; color: #2c3e50; font-weight: 600; line-height: 1.5;">
                                                {{ $proj->partners }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Project Period -->
                                <div class="d-flex align-items-start">
                                    <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                        <i class="bx bx-calendar" style="font-size: 24px; color: white;"></i>
                                    </div>
                                    <div class="ms-3 flex-grow-1">
                                        <div style="font-size: 12px; color: #6c757d; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 5px;">
                                            Project Period
                                        </div>
                                        <div style="font-size: 16px; color: #2c3e50; font-weight: 600; line-height: 1.5;">
                                            {{ \Carbon\Carbon::parse($proj->from_date)->format('M d, Y') }} 
                                            <span style="color: #0D47A1; margin: 0 5px;">→</span> 
                                            {{ \Carbon\Carbon::parse($proj->to_date)->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Footer Accent -->
                            <div style="height: 5px; background: {{ $gradient }};"></div>
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

        @else
            <!-- Empty State -->
            <div class="text-center py-5" data-aos="fade-up">
                <div class="mb-4">
                    <i class="bx bx-archive" style="font-size: 80px; color: #dee2e6;"></i>
                </div>
                <h4 style="color: #6c757d; font-weight: 600;">No Archived Projects</h4>
                <p style="color: #adb5bd;">Completed projects will be displayed here once they are archived.</p>
            </div>
        @endif
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15) !important;
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
