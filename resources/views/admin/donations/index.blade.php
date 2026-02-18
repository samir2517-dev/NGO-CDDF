@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
        <h6 class="mb-0 text-uppercase">All Donations</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Donations List</h6>
                    <div>
                        <!-- Filter Form -->
                        <form method="GET" action="{{ route('admin.donations.index') }}" class="d-inline-flex gap-2">
                            <select name="status" class="form-select form-select-sm" style="width: 150px;">
                                <option value="">All Status</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
                                <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}" style="width: 150px;">
                            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="15%">Donor Name</th>
                                <th width="10%">Phone</th>
                                <th width="12%">Transaction ID</th>
                                <th width="10%">Amount</th>
                                <th width="12%">Payment Method</th>
                                <th width="10%">Status</th>
                                <th width="12%">Date</th>
                                <th width="14%" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $key=>$item)
                            <tr>
                                <td>{{ $data->firstItem() + $key }}</td>
                                <td><strong>{{ $item->donor_name }}</strong></td>
                                <td>{{ $item->donor_phone }}</td>
                                <td><code>{{ $item->transaction_id }}</code></td>
                                <td><strong>৳ {{ number_format($item->amount, 2) }}</strong></td>
                                <td>
                                    @if($item->paymentMethod)
                                        <span class="badge bg-info">{{ ucfirst($item->paymentMethod->type) }}</span>
                                    @else
                                        <span class="badge bg-secondary">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    @if($item->status == 'pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($item->status == 'verified')
                                        <span class="badge bg-success">Verified</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                <td><small>{{ $item->created_at->format('d M Y') }}<br>{{ $item->created_at->format('h:i A') }}</small></td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.donations.show', $item->id) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="View Details">
                                            <i class="bx bx-show"></i> View
                                        </a>
                                        @if($item->status == 'pending')
                                        <button type="button" 
                                                class="btn btn-sm btn-success verify-confirm" 
                                                data-url="{{ route('admin.donations.verify', $item->id) }}"
                                                title="Verify">
                                            <i class="bx bx-check"></i> Verify
                                        </button>
                                        <button type="button" 
                                                class="btn btn-sm btn-warning reject-confirm" 
                                                data-url="{{ route('admin.donations.reject', $item->id) }}"
                                                title="Reject">
                                            <i class="bx bx-x"></i> Reject
                                        </button>
                                        @endif
                                        <a href="{{ route('admin.donations.delete', $item->id) }}" 
                                           class="btn btn-sm btn-danger delete-confirm" 
                                           title="Delete">
                                            <i class="bx bx-trash"></i> Delete
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    <i class="bx bx-info-circle" style="font-size: 24px;"></i>
                                    <p class="mb-0 mt-2">No donations found.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $data->links() }}
                </div>

                <!-- Summary -->
                @if($data->count() > 0)
                <div class="alert alert-info mt-3">
                    <strong>Summary:</strong> 
                    Total: <strong>{{ $data->total() }}</strong> donations | 
                    Page: <strong>{{ $data->currentPage() }}</strong> of <strong>{{ $data->lastPage() }}</strong>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Verify Confirmation Modal -->
<div class="modal fade" id="verifyConfirmModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="verifyConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg" style="border-radius: 15px; border: none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title w-100 text-center mt-3" id="verifyConfirmModalLabel">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-10 p-4 mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="mdi mdi-check text-success" style="font-size: 3.5rem; font-weight: bold;"></i>
                        </div>
                        <h4 class="mb-0">Verify Donation?</h4>
                    </div>
                </h5>
            </div>
            <div class="modal-body text-center px-4 pb-2">
                <p class="text-muted mb-0">Are you sure you want to verify this donation?</p>
                <p class="text-muted mb-0">This will mark the donation as verified.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal" style="border-radius: 25px;">
                    Cancel
                </button>
                <button type="button" class="btn btn-success px-4" id="confirmVerifyBtn" style="border-radius: 25px;">
                    Verify
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Reject Confirmation Modal -->
<div class="modal fade" id="rejectConfirmModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="rejectConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg" style="border-radius: 15px; border: none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title w-100 text-center mt-3" id="rejectConfirmModalLabel">
                    <div class="d-flex flex-column align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-4 mb-3" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                            <i class="mdi mdi-close text-warning" style="font-size: 3.5rem; font-weight: bold;"></i>
                        </div>
                        <h4 class="mb-0">Reject Donation?</h4>
                    </div>
                </h5>
            </div>
            <div class="modal-body text-center px-4 pb-2">
                <p class="text-muted mb-0">Are you sure you want to reject this donation?</p>
                <p class="text-muted mb-0">This will mark the donation as rejected.</p>
            </div>
            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal" style="border-radius: 25px;">
                    Cancel
                </button>
                <button type="button" class="btn btn-warning px-4" id="confirmRejectBtn" style="border-radius: 25px;">
                    Reject
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let actionUrl = '';
        
        // Initialize modals
        const verifyModalElement = document.getElementById('verifyConfirmModal');
        const verifyModal = new bootstrap.Modal(verifyModalElement);
        
        const rejectModalElement = document.getElementById('rejectConfirmModal');
        const rejectModal = new bootstrap.Modal(rejectModalElement);
        
        // Handle verify button clicks
        document.addEventListener('click', function(e) {
            const verifyBtn = e.target.closest('.verify-confirm');
            if (verifyBtn) {
                e.preventDefault();
                e.stopPropagation();
                actionUrl = verifyBtn.getAttribute('data-url');
                verifyModal.show();
                return false;
            }
        });
        
        // Handle reject button clicks
        document.addEventListener('click', function(e) {
            const rejectBtn = e.target.closest('.reject-confirm');
            if (rejectBtn) {
                e.preventDefault();
                e.stopPropagation();
                actionUrl = rejectBtn.getAttribute('data-url');
                rejectModal.show();
                return false;
            }
        });
        
        // Handle confirm verify button
        document.getElementById('confirmVerifyBtn').addEventListener('click', function() {
            if (actionUrl) {
                verifyModal.hide();
                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
        
        // Handle confirm reject button
        document.getElementById('confirmRejectBtn').addEventListener('click', function() {
            if (actionUrl) {
                rejectModal.hide();
                // Create and submit form
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                document.body.appendChild(form);
                form.submit();
            }
        });
        
        // Reset actionUrl when modals are closed
        verifyModalElement.addEventListener('hidden.bs.modal', function() {
            actionUrl = '';
        });
        
        rejectModalElement.addEventListener('hidden.bs.modal', function() {
            actionUrl = '';
        });
    });
</script>
@endpush