@extends('main')

@section('content')

<!-- Ongoing Project Detail Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%); min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Back Button -->
                <div class="mb-4" data-aos="fade-right">
                    <a href="{{ route('ongoing.project') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateX(-5px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 20px;"></i>
                        <span>Back to Ongoing Projects</span>
                    </a>
                </div>

                <!-- Project Card -->
                <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;" data-aos="fade-up">
                    <!-- Project Image -->
                    <div style="position: relative; overflow: hidden; height: 450px;">
                        <img src="{{ asset('images/project/'.$project->image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%); padding: 30px;">
                            <span class="badge mb-2" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); padding: 8px 16px; font-size: 14px; border-radius: 20px;">
                                <i class="bx bx-trending-up"></i> Active
                            </span>
                            <h1 style="color: white; font-weight: 800; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.5);">{{ $project->title }}</h1>
                        </div>
                    </div>

                    <!-- Project Content -->
                    <div class="card-body" style="padding: 50px;">
                        <!-- Date Info -->
                        <div style="display: inline-flex; align-items: center; gap: 8px; background: #f8f9fa; padding: 10px 20px; border-radius: 10px; margin-bottom: 30px; color: #6c757d; font-size: 14px;">
                            <i class="bx bx-calendar" style="font-size: 18px; color: #0D47A1;"></i>
                            <span>{{ date("F d, Y") }}</span>
                        </div>

                        <!-- Description -->
                        <div style="font-size: 18px; line-height: 1.9; color: #2c3e50; text-align: justify;">
                            {{ $project->description }}
                        </div>

                        <!-- Photo Gallery -->
                        @if($project->gallery_images)
                        <div class="mt-5">
                            <h3 style="color: #0D47A1; font-weight: 700; margin-bottom: 30px; border-bottom: 3px solid #0D47A1; padding-bottom: 10px; display: inline-block;">Photo Gallery</h3>
                            <div class="row g-3">
                                @foreach(json_decode($project->gallery_images) as $galleryImage)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ asset('images/ongoing_project/gallery/'.$galleryImage) }}" class="gallery-item">
                                        <div style="position: relative; overflow: hidden; border-radius: 12px; height: 200px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';">
                                            <img src="{{ asset('images/ongoing_project/gallery/'.$galleryImage) }}" alt="Gallery Image" style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(13, 71, 161, 0.8) 0%, transparent 70%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: flex-end; justify-content: center; padding: 15px;" onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0';">
                                                <span style="color: white; font-weight: 600; font-size: 14px; text-align: center;">
                                                    <i class="bx bx-search-alt" style="font-size: 18px;"></i> {{ $project->title }}
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
                    return '{{ $project->title }}';
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
