@extends('main')

@section('content')

<!-- Contact Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); padding-top: 60px !important;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                Contact <span style="color: #0D47A1;">Information</span>
            </h1>
        </div>

        <!-- Contact Information Grid -->
        <div class="row g-4 mb-5">
            @if($head_office)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; padding: 25px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(13,71,161,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.1)';">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                        <i class="bx bxs-building" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; padding: 8px 15px; border-radius: 8px; display: inline-block; margin-bottom: 12px; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                        Head Office
                    </div>
                    <h5 style="color: #2c3e50; font-weight: 700; margin-bottom: 10px;">{{ $head_office->title }}</h5>
                    <p style="color: #6c757d; font-size: 14px; line-height: 1.6;">{{ $head_office->address }}</p>
                    @if($head_office->mobile || $head_office->mobile2)
                    <p style="color: #6c757d; font-size: 14px; margin-bottom: 8px;"><strong style="color: #0D47A1;">Mobile:</strong> {{ $head_office->mobile }}@if($head_office->mobile && $head_office->mobile2), @endif{{ $head_office->mobile2 }}</p>
                    @endif
                    @if($head_office->email || $head_office->email2)
                    <p style="color: #6c757d; font-size: 14px; margin-bottom: 0;"><strong style="color: #0D47A1;">Email:</strong> {{ $head_office->email }}@if($head_office->email && $head_office->email2), @endif{{ $head_office->email2 }}</p>
                    @endif
                </div>
            </div>
            @endif

            @forelse ($branches as $branch)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; padding: 25px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(13,71,161,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.1)';">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                        <i class="bx bxs-buildings" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 8px 15px; border-radius: 8px; display: inline-block; margin-bottom: 12px; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                        Branch
                    </div>
                    <h5 style="color: #2c3e50; font-weight: 700; margin-bottom: 10px;">{{ $branch->title }}</h5>
                    <p style="color: #6c757d; font-size: 14px; line-height: 1.6;">{{ $branch->address }}</p>
                    @if($branch->mobile || $branch->mobile2)
                    <p style="color: #6c757d; font-size: 14px; margin-bottom: 8px;"><strong style="color: #0D47A1;">Mobile:</strong> {{ $branch->mobile }}@if($branch->mobile && $branch->mobile2), @endif{{ $branch->mobile2 }}</p>
                    @endif
                    @if($branch->email || $branch->email2)
                    <p style="color: #6c757d; font-size: 14px; margin-bottom: 0;"><strong style="color: #0D47A1;">Email:</strong> {{ $branch->email }}@if($branch->email && $branch->email2), @endif{{ $branch->email2 }}</p>
                    @endif
                </div>
            </div>
            @empty
            @endforelse

            @forelse ($persons as $person)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100" style="border-radius: 15px; padding: 25px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(13,71,161,0.15)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 2px 10px rgba(0,0,0,0.1)';">
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                        <i class="bx bx-user" style="font-size: 24px; color: white;"></i>
                    </div>
                    <div style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 8px 15px; border-radius: 8px; display: inline-block; margin-bottom: 12px; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                        Person
                    </div>
                    <h5 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">{{ $person->title }}</h5>
                    <ul class="list-unstyled" style="font-size: 14px; color: #6c757d; margin: 0; padding: 0;">
                        @if($person->name)
                        <li style="margin-bottom: 8px;"><strong style="color: #0D47A1;">{{ $person->title }}:</strong> {{ $person->name }}</li>
                        @endif
                        @if($person->mobile || $person->mobile2)
                        <li style="margin-bottom: 8px;"><strong style="color: #0D47A1;">Mobile:</strong> {{ $person->mobile }}@if($person->mobile && $person->mobile2), @endif{{ $person->mobile2 }}</li>
                        @endif
                        @if($person->email || $person->email2)
                        <li style="margin-bottom: 8px;"><strong style="color: #0D47A1;">Email:</strong> {{ $person->email }}@if($person->email && $person->email2), @endif{{ $person->email2 }}</li>
                        @endif
                        @if($person->skype)
                        <li style="margin-bottom: 8px;"><strong style="color: #0D47A1;">Skype:</strong> {{ $person->skype }}</li>
                        @endif
                        @if($person->whatsapp)
                        <li style="margin-bottom: 8px;"><strong style="color: #0D47A1;">WhatsApp:</strong> {{ $person->whatsapp }}</li>
                        @endif
                        @if($person->twitter)
                        <li style="margin-bottom: 0;"><strong style="color: #0D47A1;">Twitter:</strong> {{ $person->twitter }}</li>
                        @endif
                    </ul>
                </div>
            </div>
            @empty
            @endforelse
        </div>

        <!-- Contact Form Section -->
        <div class="row g-4">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header border-0 text-white" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); padding: 25px;">
                        <h3 class="mb-0 fw-bold" style="font-size: 24px;">
                            <i class="bx bx-envelope me-2"></i>Send us a Message
                        </h3>
                    </div>
                    <div class="card-body p-4">
                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" style="border-radius: 10px; border-left: 4px solid #10b981;">
                                <i class="bx bx-check-circle me-2"></i>{{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('message.store') }}" method="post" role="form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" style="color: #2c3e50;">Your Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" value="{{ old('name') }}" style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold" style="color: #2c3e50;">Your Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" value="{{ old('email') }}" style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #2c3e50;">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Enter subject" value="{{ old('subject') }}" style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold" style="color: #2c3e50;">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Enter your message" style="border-radius: 10px; padding: 12px; border: 2px solid #e9ecef;">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-lg w-100 text-white fw-bold" type="submit" style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border: none; border-radius: 10px; padding: 15px; transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 20px rgba(13,71,161,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                                <i class="bx bx-send me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 15px; padding: 30px; color: white;">
                    <div style="font-size: 60px; margin-bottom: 20px;">
                        <i class="bx bx-envelope"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Message Us</h3>
                    <p style="font-size: 16px; line-height: 1.8; opacity: 0.95;">
                        Please send us your message through email or message box. We will respond within a short period of time. Thank you for being with us.
                    </p>
                </div>
            </div>
        </div>


    </div>
</section>

<style>
.form-control:focus {
    border-color: #0D47A1 !important;
    box-shadow: 0 0 0 0.2rem rgba(13, 71, 161, 0.15) !important;
}
</style>

@endsection
