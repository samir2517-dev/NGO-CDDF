@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-xl-10 mx-auto">
        <h6 class="mb-0 text-uppercase">Donation Details</h6>
        <hr/>
        <div class="card">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Donation #{{ $data->id }}</h6>
                    <a href="{{ route('admin.donations.index') }}" class="btn btn-secondary btn-sm">
                        <i class="bx bx-arrow-back"></i> Back to List
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session()->get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Donor Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%"><strong>Donor Name:</strong></td>
                                        <td>{{ $data->donor_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone Number:</strong></td>
                                        <td>{{ $data->donor_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Transaction ID:</strong></td>
                                        <td><code>{{ $data->transaction_id }}</code></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Payment Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="40%"><strong>Amount:</strong></td>
                                        <td><h5 class="text-success mb-0">৳ {{ number_format($data->amount, 2) }}</h5></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Payment Method:</strong></td>
                                        <td>
                                            @if($data->paymentMethod)
                                                <span class="badge bg-info">{{ ucfirst($data->paymentMethod->type) }}</span><br>
                                                <small class="text-muted">{{ $data->paymentMethod->account_name }}</small><br>
                                                <small class="text-muted">{{ $data->paymentMethod->account_number }}</small>
                                            @else
                                                <span class="badge bg-secondary">N/A</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if($data->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif($data->status == 'verified')
                                                <span class="badge bg-success">Verified</span>
                                            @else
                                                <span class="badge bg-danger">Rejected</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Additional Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="20%"><strong>Submitted Date:</strong></td>
                                        <td>{{ $data->created_at->format('d M Y, h:i A') }}</td>
                                    </tr>
                                    @if($data->admin_note)
                                    <tr>
                                        <td><strong>Admin Note:</strong></td>
                                        <td>{{ $data->admin_note }}</td>
                                    </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Actions</h6>
                            </div>
                            <div class="card-body">
                                @if($data->status == 'pending')
                                <div class="mb-3">
                                    <label for="admin_note" class="form-label">Admin Note (Optional)</label>
                                    <textarea name="admin_note" id="admin_note" class="form-control" rows="2" 
                                              placeholder="Add any note about this donation..."></textarea>
                                </div>
                                <button type="button" class="btn btn-success verify-confirm-detail" 
                                        data-url="{{ route('admin.donations.verify', $data->id) }}">
                                    <i class="bx bx-check-circle"></i> Verify Donation
                                </button>

                                <button type="button" class="btn btn-warning ms-2 reject-confirm-detail" 
                                        data-url="{{ route('admin.donations.reject', $data->id) }}">
                                    <i class="bx bx-x-circle"></i> Reject Donation
                                </button>
                                @else
                                <div class="alert alert-info mb-0">
                                    This donation has already been {{ $data->status }}.
                                </div>
                                @endif

                                <hr>

                                <a href="{{ route('admin.donations.delete', $data->id) }}" 
                                   class="btn btn-danger delete-confirm">
                                    <i class="bx bx-trash"></i> Delete Donation
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
            const verifyBtn = e.target.closest('.verify-confirm-detail');
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
            const rejectBtn = e.target.closest('.reject-confirm-detail');
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
                // Create and submit form with admin note
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = actionUrl;
                
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = '{{ csrf_token() }}';
                form.appendChild(csrfToken);
                
                // Add admin note if exists
                const adminNote = document.getElementById('admin_note');
                if (adminNote && adminNote.value) {
                    const noteInput = document.createElement('input');
                    noteInput.type = 'hidden';
                    noteInput.name = 'admin_note';
                    noteInput.value = adminNote.value;
                    form.appendChild(noteInput);
                }
                
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