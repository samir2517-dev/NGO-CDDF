@extends('main')

@section('content')

<!-- Featured Program Detail Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); min-height: 100vh;">
    <div class="container">
        @if(isset($program))
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Back Button -->
                <div class="mb-4" data-aos="fade-right">
                    <a href="{{ route('programs.all') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateX(-5px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 20px;"></i>
                        <span>Back to Programs</span>
                    </a>
                </div>

                <!-- Program Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;" data-aos="fade-up">
                    <!-- Program Image -->
                    @if($program->image && file_exists(public_path('images/programs/'.$program->image)))
                        <div style="position: relative; overflow: hidden; height: 450px;">
                            <img src="{{ asset('images/programs/'.$program->image) }}" alt="{{ $program->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 30px;">
                                @if($program->status)
                                    <span class="badge mb-2" style="background: {{ $program->status == 'active' ? 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)' : ($program->status == 'completed' ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' : 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)') }}; padding: 8px 16px; font-size: 14px; border-radius: 20px;">{{ ucfirst($program->status) }}</span>
                                @endif
                                <h1 style="color: white; font-weight: 800; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">{{ $program->title }}</h1>
                            </div>
                        </div>
                    @else
                        <div style="position: relative; overflow: hidden; height: 450px;">
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="{{ $program->title ?? 'Program' }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 30px;">
                                @if($program->status)
                                    <span class="badge mb-2" style="background: {{ $program->status == 'active' ? 'linear-gradient(135deg, #43e97b 0%, #38f9d7 100%)' : ($program->status == 'completed' ? 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)' : 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)') }}; padding: 8px 16px; font-size: 14px; border-radius: 20px;">{{ ucfirst($program->status) }}</span>
                                @endif
                                <h1 style="color: white; font-weight: 800; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">{{ $program->title }}</h1>
                            </div>
                        </div>
                    @endif

                    <!-- Program Content -->
                    <div class="card-body" style="padding: 50px;">
                        <div style="font-size: 18px; line-height: 1.9; color: #2c3e50; text-align: justify;">
                            {!! nl2br(e($program->description)) !!}
                        </div>

                        <!-- Photo Gallery -->
                        @if($program->gallery_images)
                        <div class="mt-5">
                            <h3 style="color: #0D47A1; font-weight: 700; margin-bottom: 30px; border-bottom: 3px solid #0D47A1; padding-bottom: 10px; display: inline-block;">Photo Gallery</h3>
                            <div class="row g-3">
                                @foreach(json_decode($program->gallery_images) as $galleryImage)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ asset('images/programs/gallery/'.$galleryImage) }}" class="gallery-item">
                                        <div style="position: relative; overflow: hidden; border-radius: 12px; height: 200px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';">
                                            <img src="{{ asset('images/programs/gallery/'.$galleryImage) }}" alt="Gallery Image" style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(13, 71, 161, 0.8) 0%, transparent 70%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: flex-end; justify-content: center; padding: 15px;" onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0';">
                                                <span style="color: white; font-weight: 600; font-size: 14px; text-align: center;">
                                                    <i class="bx bx-search-alt" style="font-size: 18px;"></i> {{ $program->title }}
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Program Not Found -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center" style="padding: 80px 20px;" data-aos="fade-up">
                    <i class="bx bx-error-circle" style="font-size: 80px; color: #0D47A1; margin-bottom: 20px;"></i>
                    <h3 style="color: #2c3e50; font-weight: 700; margin-bottom: 15px;">Program Not Found</h3>
                    <p style="color: #6c757d; font-size: 16px; margin-bottom: 30px;">The program you're looking for doesn't exist or has been removed.</p>
                    <a href="{{ route('programs.all') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 22px;"></i>
                        <span>Back to Programs</span>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.gallery-item').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            },
            image: {
                titleSrc: function(item) {
                    return '{{ $program->title }}';
                }
            },
            zoom: {
                enabled: true,
                duration: 300
            }
        });
    });
</script>
@endpush
