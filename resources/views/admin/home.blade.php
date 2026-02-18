@extends('layouts.admin')

@section('content')

<style>
    .avatar-sm {
        width: 36px;
        height: 36px;
        font-size: 14px;
    }
    .bg-success-subtle {
        background-color: rgba(25, 135, 84, 0.1) !important;
    }
    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.1) !important;
    }
    .bg-primary-subtle {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }
    .icon-lg {
        width: 60px;
        height: 60px;
    }
    .fw-500 {
        font-weight: 500;
    }
    .pending-donations-list {
        max-height: 450px;
        overflow-y: auto;
    }
    .pending-donations-list::-webkit-scrollbar {
        width: 6px;
    }
    .pending-donations-list::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .pending-donations-list::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }
    .pending-donations-list::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

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

<!-- Statistics Cards Row -->
<div class="row">
    <!-- Total Projects Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total Projects</h5>
                <h2 class="mb-0">{{ $stats['total_projects'] }}</h2>
            </div>
        </div>
    </div>

    <!-- Total Donations Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total Donations</h5>
                <h2 class="mb-0">{{ $stats['total_donations'] }}</h2>
            </div>
        </div>
    </div>

    <!-- Team Members Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total Team Members</h5>
                <h2 class="mb-0">{{ $stats['total_team_members'] }}</h2>
            </div>
        </div>
    </div>

    <!-- Volunteers Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-warning card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total Volunteers</h5>
                <h2 class="mb-0">{{ $stats['total_volunteers'] }}</h2>
            </div>
        </div>
    </div>

    <!-- News Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-primary card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total News</h5>
                <h2 class="mb-0">{{ $stats['total_news'] }}</h2>
            </div>
        </div>
    </div>

    <!-- Publications Card -->
    <div class="col-lg-3 col-md-4 col-sm-6 stretch-card grid-margin">
        <div class="card bg-gradient-secondary card-img-holder text-white">
            <div class="card-body text-center">
                <img src="{{ asset('admin-assets/images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image" />
                <h5 class="font-weight-normal mb-3">Total Publications</h5>
                <h2 class="mb-0">{{ $stats['total_publications'] }}</h2>
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
                            <i class="mdi mdi-account-star text-success" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_executive_members'] }}</h4>
                            <p class="text-muted mb-0">Executive</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-heart-multiple text-danger" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_stories'] }}</h4>
                            <p class="text-muted mb-0">Stories</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-image-multiple text-warning" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_gallery'] }}</h4>
                            <p class="text-muted mb-0">Gallery</p>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 mb-3">
                        <div class="text-center">
                            <i class="mdi mdi-help-circle text-secondary" style="font-size: 2.5rem;"></i>
                            <h4 class="mt-2 mb-0">{{ $stats['total_faq'] }}</h4>
                            <p class="text-muted mb-0">FAQs</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Donations Overview Section -->
<div class="row">
    <div class="col-md-12">
        <h4 class="mb-3 text-uppercase">
            <i class="mdi mdi-hand-heart text-danger"></i> Donations Management
        </h4>
    </div>
</div>

<div class="row">
    <!-- Donation Amount Card -->
    <div class="col-lg-4 col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-2 text-muted">Total Donation Amount</h6>
                        <h3 class="mb-0 text-success">৳{{ number_format($stats['total_donation_amount'], 2) }}</h3>
                        <small class="text-muted">Verified donations</small>
                    </div>
                    <div>
                        <div class="icon-lg bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-cash-multiple" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Donations Card -->
    <div class="col-lg-4 col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-2 text-muted">Pending Donations</h6>
                        <h3 class="mb-0 text-warning">{{ $stats['pending_donations'] }}</h3>
                        <small class="text-muted">Awaiting verification</small>
                    </div>
                    <div>
                        <div class="icon-lg bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-clock-alert" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Donors Card -->
    <div class="col-lg-4 col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title mb-2 text-muted">Total Donors</h6>
                        <h3 class="mb-0 text-primary">{{ $stats['total_donations'] }}</h3>
                        <small class="text-muted">All time contributions</small>
                    </div>
                    <div>
                        <div class="icon-lg bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-account-heart" style="font-size: 2rem;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent & Pending Donations -->
<div class="row">
    <!-- Recent Donations -->
    <div class="col-lg-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">Recent Donations</h4>
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-outline-primary">
                        View All <i class="mdi mdi-arrow-right"></i>
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Donor</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentDonations as $donation)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm bg-light rounded-circle d-flex align-items-center justify-content-center me-2">
                                            <i class="mdi mdi-account text-muted"></i>
                                        </div>
                                        <div>
                                            <div class="fw-500">{{ $donation->donor_name }}</div>
                                            <small class="text-muted">{{ $donation->donor_phone ?? 'N/A' }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="fw-bold text-success">৳{{ number_format($donation->amount, 2) }}</span>
                                </td>
                                <td>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($donation->created_at)->format('M d, Y') }}</small>
                                </td>
                                <td>
                                    @if($donation->status == 'verified')
                                        <span class="badge bg-success">Verified</span>
                                    @elseif($donation->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-4">
                                    <i class="mdi mdi-information-outline"></i> No donations yet
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Donations for Action -->
    <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title mb-0">
                        <i class="mdi mdi-alert-circle text-warning"></i> Pending Verification
                    </h4>
                </div>
                <div class="pending-donations-list">
                    @forelse($pendingDonations->take(5) as $pending)
                    <div class="border rounded p-3 mb-3 bg-light">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h6 class="mb-1">{{ $pending->donor_name }}</h6>
                                <small class="text-muted">{{ $pending->donor_phone ?? 'N/A' }}</small>
                            </div>
                            <span class="badge bg-warning">{{ \Carbon\Carbon::parse($pending->created_at)->diffForHumans() }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0 text-success">৳{{ number_format($pending->amount, 2) }}</h5>
                                <small class="text-muted">ID: {{ $pending->transaction_id ?? 'N/A' }}</small>
                            </div>
                            <a href="{{ route('admin.donations.show', $pending->id) }}" class="btn btn-sm btn-primary">
                                Review <i class="mdi mdi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-muted py-5">
                        <i class="mdi mdi-check-circle-outline" style="font-size: 3rem;"></i>
                        <p class="mt-2 mb-0">All donations verified!</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Project Status Chart - only initialize if element exists
    const projectChartElement = document.getElementById('projectStatusChart');
    if (projectChartElement) {
        const projectCtx = projectChartElement.getContext('2d');
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
        const legendElement = document.getElementById('projectStatusLegend');
        if (legendElement) {
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
            
            legendElement.innerHTML = legendHtml;
        }
    }
</script>
@endpush

@endsection
