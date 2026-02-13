@extends('layouts.admin')

@section('content')

<!-- Page Header -->
<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-view-dashboard"></i>
        </span> Dashboard
    </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>

<!-- About BMS Section -->
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-3">
                        <div class="icon-lg bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-information" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <h4 class="card-title mb-3">About Bakultali Mahila Sangshad (BMS)</h4>
                        <p class="text-muted mb-0" style="line-height: 1.8; text-align: justify;">
                            Bakultali Mahila Sangshad (BMS) is a non-government, non-profit, and social welfare organization in Bangladesh, dedicated to promoting the socio-economic and cultural status of the rural poor and vulnerable people, particularly women and children. The organization focuses on capacity building, institution building, capital formation, and problem-solving programs using modern scientific methodologies. BMS aims to empower the poor and vulnerable rural people, especially women and children, by making them capable, self-sufficient, self-governed, and self-ignited. The organization is governed by its constitution, approved by the registration authority of the Department of Women Affairs under the Ministry of Women Affairs.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards Row -->
<div class="row">
    <!-- Total Projects Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Projects <i class="mdi mdi-briefcase-outline mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_projects'] }}</h2>
                <h6 class="card-text">Total Projects</h6>
            </div>
        </div>
    </div>

    <!-- Total Donations Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Donations <i class="mdi mdi-cash-multiple mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_donations'] }}</h2>
                <h6 class="card-text">{{ number_format($stats['total_donation_amount'], 2) }} BDT</h6>
            </div>
        </div>
    </div>

    <!-- Team Members Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Team <i class="mdi mdi-account-multiple mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_team_members'] + $stats['total_executive_members'] }}</h2>
                <h6 class="card-text">Total Members</h6>
            </div>
        </div>
    </div>

    <!-- Volunteers Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Volunteers <i class="mdi mdi-account-heart mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_volunteers'] }}</h2>
                <h6 class="card-text">Total Volunteers</h6>
            </div>
        </div>
    </div>

    <!-- News Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">News <i class="mdi mdi-newspaper mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_news'] }}</h2>
                <h6 class="card-text">Latest News</h6>
            </div>
        </div>
    </div>

    <!-- Publications Card -->
    <div class="col-md-2 stretch-card grid-margin">
        <div class="card bg-gradient-secondary card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h4 class="font-weight-normal mb-3">Publications <i class="mdi mdi-book-open-variant mdi-24px float-end"></i>
                </h4>
                <h2 class="mb-3">{{ $stats['total_publications'] }}</h2>
                <h6 class="card-text">Total Publications</h6>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Recent Activity Row -->
<div class="row">
    <!-- Project Status Distribution -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project Status Distribution</h4>
                <canvas id="projectStatusChart" style="height: 280px;"></canvas>
                <div id="projectStatusLegend" class="mt-4"></div>
            </div>
        </div>
    </div>

    <!-- Recent Activities -->
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <i class="mdi mdi-trending-up text-info"></i> Recent Activities
                </h4>
                <div class="mt-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="projects-tab" data-bs-toggle="tab" href="#projects-content" role="tab">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="news-tab" data-bs-toggle="tab" href="#news-content" role="tab">
                                News
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="projects-content" role="tabpanel">
                            <div class="table-responsive mt-3">
                                <table class="table table-hover">
                                    <tbody>
                                        @forelse($recentProjects as $project)
                                        <tr>
                                            <td style="width: 50px;">
                                                @if($project->image)
                                                    <img src="{{ asset('images/projects/'.$project->image) }}" alt="{{ $project->title }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <div class="rounded bg-secondary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                        <i class="mdi mdi-briefcase text-white"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="mb-0">{{ Str::limit($project->title, 40) }}</p>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($project->created_at)->diffForHumans() }}</small>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">No recent projects</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="news-content" role="tabpanel">
                            <div class="table-responsive mt-3">
                                <table class="table table-hover">
                                    <tbody>
                                        @forelse($recentNews as $news)
                                        <tr>
                                            <td style="width: 50px;">
                                                @if($news->image)
                                                    <img src="{{ asset('images/news/'.$news->image) }}" alt="{{ $news->title }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <div class="rounded bg-info d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                        <i class="mdi mdi-newspaper text-white"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="mb-0">{{ Str::limit($news->title, 40) }}</p>
                                                <small class="text-muted">{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</small>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="2" class="text-center text-muted">No recent news</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Row -->
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Quick Statistics</h4>
                <div class="row mt-4">
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-bulletin-board text-primary" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_programs'] }}</h4>
                            <p class="text-muted mb-0">Programs</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-email text-info" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_contact_messages'] }}</h4>
                            <p class="text-muted mb-0">Messages</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-book-open-variant text-success" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_publications'] }}</h4>
                            <p class="text-muted mb-0">Publications</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-account-heart text-danger" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_volunteers'] }}</h4>
                            <p class="text-muted mb-0">Volunteers</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-account-circle text-warning" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_executive_members'] }}</h4>
                            <p class="text-muted mb-0">Executive</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-account-group text-secondary" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_team_members'] }}</h4>
                            <p class="text-muted mb-0">Team Members</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .card-img-holder {
        position: relative;
    }
    .card-img-absolute {
        position: absolute;
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Project Status Chart
    const projectCtx = document.getElementById('projectStatusChart').getContext('2d');
    const projectData = @json($projectsByStatus);
    
    const projectChart = new Chart(projectCtx, {
        type: 'doughnut',
        data: {
            labels: projectData.map(item => item.status ? item.status.charAt(0).toUpperCase() + item.status.slice(1) : 'Unknown'),
            datasets: [{
                data: projectData.map(item => item.count),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Custom legend
    const legendHtml = projectData.map((item, index) => {
        const colors = ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 206, 86, 0.8)', 'rgba(75, 192, 192, 0.8)'];
        const status = item.status ? item.status.charAt(0).toUpperCase() + item.status.slice(1) : 'Unknown';
        return `
            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <span class="badge" style="background-color: ${colors[index]}; width: 12px; height: 12px; display: inline-block; border-radius: 2px;"></span>
                    <span class="ms-2">${status}</span>
                </div>
                <span class="text-muted">${item.count}</span>
            </div>
        `;
    }).join('');
    
    document.getElementById('projectStatusLegend').innerHTML = legendHtml;
</script>
@endpush

@endsection

