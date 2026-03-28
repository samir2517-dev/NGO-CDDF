@extends('main')

@section('content')

<!-- Donate Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); padding-top: 60px !important;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                Make a <span style="color: #0D47A1;">Donation</span>
            </h1>
        </div>

        <!-- Payment Methods Section -->
        @if($paymentMethods->count() > 0)
            <div class="mb-5" data-aos="fade-up">
                <h3 class="text-center mb-4" style="color: #2c3e50; font-weight: 700;">Payment Methods</h3>
                <div class="row g-4 justify-content-center">
                    @foreach($paymentMethods as $index => $method)
                        @php
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
                        
                        <div class="col-lg-4 col-md-6 col-12" data-aos="zoom-in" data-aos-delay="{{ $index * 50 }}">
                            <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: all 0.3s ease;">
                                <!-- Card Header -->
                                <div class="card-header border-0 text-white text-center" style="background: {{ $gradient }}; padding: 20px;">
                                    @if($method->icon_image)
                                        <div style="width: 100px; height: 100px; margin: 0 auto; background: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; padding: 15px;">
                                            <img src="{{ asset('storage/'.$method->icon_image) }}" alt="{{ $method->type }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    @elseif($method->type == 'bank')
                                        <i class="bx bxs-bank" style="font-size: 60px;"></i>
                                    @elseif(in_array(strtolower((string) $method->type), ['bkash', 'nagad', 'rocket', 'upay', 'visa']))
                                        <i class="bx bxs-wallet" style="font-size: 60px;"></i>
                                    @else
                                        <i class="bx bx-money" style="font-size: 60px;"></i>
                                    @endif
                                </div>

                                <!-- Card Body -->
                                <div class="card-body text-center p-4">
                                    <h5 class="fw-bold mb-2" style="color: #2c3e50;">{{ $method->account_name }}</h5>
                                    <h4 class="mb-3" style="color: #0D47A1; font-weight: 700;">{{ $method->account_number }}</h4>
                                    
                                    @if($method->type == 'bank' && $method->bank_details)
                                        <div class="text-start mt-3" style="background: #f8f9fa; border-radius: 10px; padding: 15px;">
                                            @if(isset($method->bank_details['bank_name']))
                                                <div class="mb-2" style="font-size: 14px;">
                                                    <strong style="color: #6c757d;">Bank:</strong> 
                                                    <span style="color: #2c3e50;">{{ $method->bank_details['bank_name'] }}</span>
                                                </div>
                                            @endif
                                            @if(isset($method->bank_details['branch_name']))
                                                <div class="mb-2" style="font-size: 14px;">
                                                    <strong style="color: #6c757d;">Branch:</strong> 
                                                    <span style="color: #2c3e50;">{{ $method->bank_details['branch_name'] }}</span>
                                                </div>
                                            @endif
                                            @if(isset($method->bank_details['routing_number']))
                                                <div style="font-size: 14px;">
                                                    <strong style="color: #6c757d;">Routing:</strong> 
                                                    <span style="color: #2c3e50;">{{ $method->bank_details['routing_number'] }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>

                                <!-- Card Footer Accent -->
                                <div style="height: 5px; background: {{ $gradient }};"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Donation Form -->
        <div class="row justify-content-center" data-aos="fade-up">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <!-- Form Header -->
                    <div class="card-header border-0 text-white text-center" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); padding: 30px;">
                        <h3 class="mb-0 fw-bold" style="font-size: 24px;">
                            <i class="bx bx-donate-heart me-2"></i>Submit Donation Information
                        </h3>
                    </div>

                    <!-- Form Body -->
                    <div class="card-body p-4 p-md-5">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" style="border-radius: 10px; border-left: 4px solid #10b981;">
                                <i class="bx bx-check-circle me-2"></i>{{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('donation.submit') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="donor_name" class="form-label fw-bold" style="color: #2c3e50;">
                                        Your Name <span style="color: #0D47A1;">*</span>
                                    </label>
                                    <input type="text" name="donor_name" id="donor_name" 
                                           class="form-control @error('donor_name') is-invalid @enderror" 
                                           placeholder="Enter your full name" 
                                           value="{{ old('donor_name') }}" 
                                           style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;"
                                           required>
                                    @error('donor_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="donor_phone" class="form-label fw-bold" style="color: #2c3e50;">
                                        Phone Number <span style="color: #0D47A1;">*</span>
                                    </label>
                                    <input type="text" name="donor_phone" id="donor_phone" 
                                           class="form-control @error('donor_phone') is-invalid @enderror" 
                                           placeholder="e.g., +8801XXXXXXXXX" 
                                           value="{{ old('donor_phone') }}" 
                                           style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;"
                                           required>
                                    @error('donor_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="payment_method_id" class="form-label fw-bold" style="color: #2c3e50;">
                                        Payment Method Used <span style="color: #0D47A1;">*</span>
                                    </label>
                                    <select name="payment_method_id" id="payment_method_id" 
                                            class="form-select @error('payment_method_id') is-invalid @enderror" 
                                            style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;"
                                            required>
                                        <option value="">-- Select Payment Method --</option>
                                        @foreach($paymentMethods as $method)
                                            <option value="{{ $method->id }}" {{ old('payment_method_id') == $method->id ? 'selected' : '' }}>
                                                {{ ucfirst($method->type) }} - {{ $method->account_number }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('payment_method_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="transaction_id" class="form-label fw-bold" style="color: #2c3e50;">
                                        Transaction ID <span style="color: #0D47A1;">*</span>
                                    </label>
                                    <input type="text" name="transaction_id" id="transaction_id" 
                                           class="form-control @error('transaction_id') is-invalid @enderror" 
                                           placeholder="Enter transaction/reference ID" 
                                           value="{{ old('transaction_id') }}" 
                                           style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;"
                                           required>
                                    @error('transaction_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="amount" class="form-label fw-bold" style="color: #2c3e50;">
                                    Donation Amount (৳) <span style="color: #0D47A1;">*</span>
                                </label>
                                <input type="number" name="amount" id="amount" 
                                       class="form-control @error('amount') is-invalid @enderror" 
                                       placeholder="Enter amount in BDT" 
                                       min="1" step="0.01"
                                       value="{{ old('amount') }}" 
                                       style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;"
                                       required>
                                @error('amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="alert" style="background: linear-gradient(135deg, #e0f2fe 0%, #dbeafe 100%); border-left: 4px solid #3b82f6; border-radius: 10px; padding: 15px; margin-bottom: 20px;">
                                <i class="bx bx-info-circle" style="color: #3b82f6; font-size: 20px; margin-right: 8px;"></i>
                                <strong style="color: #1e40af;">Note:</strong>
                                <span style="color: #1e3a8a;">Please make your donation first, then submit this form with the transaction details. We will verify your donation and contact you soon.</span>
                            </div>

                            <!-- reCAPTCHA v2 Checkbox -->
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}" style="margin: 20px 0;"></div>
                            @error('g-recaptcha-response')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror

                            <button type="submit" class="btn btn-lg w-100 text-white fw-bold" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; padding: 15px; font-size: 18px; transition: all 0.3s ease; cursor: pointer;">
                                <i class="bx bx-paper-plane me-2"></i>Submit Donation Information
                            </button>
                        </form>
                        <!-- reCAPTCHA v2 Script - Auto Renders Widget -->
                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15) !important;
}

.form-control:focus,
.form-select:focus {
    border-color: #0D47A1 !important;
    box-shadow: 0 0 0 0.2rem rgba(13, 71, 161, 0.15) !important;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(13, 71, 161, 0.4);
}
</style>

@endsection
