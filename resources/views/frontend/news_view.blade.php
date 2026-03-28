@extends('main')

@section('content')

    <!-- ======= News Detail Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container py-5">

        <div class="row">
            {{-- Main News Content --}}
            <div class="col-lg-8 mb-4">
                <!-- Back Button -->
                <div class="mb-4" data-aos="fade-right">
                    <a href="{{ route('latest.news.all') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 12px 24px; background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 71, 161, 0.3);" onmouseover="this.style.transform='translateX(-5px)'; this.style.boxShadow='0 6px 20px rgba(13, 71, 161, 0.4)';" onmouseout="this.style.transform='translateX(0)'; this.style.boxShadow='0 4px 15px rgba(13, 71, 161, 0.3)';">
                        <i class="bx bx-arrow-back" style="font-size: 20px;"></i>
                        <span>Back to News & Events</span>
                    </a>
                </div>

                <div class="bg-white shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <img src="{{ asset('images/news/'.$news->image) }}" class="w-100" alt="{{ $news->title }}" style="height: 450px; object-fit: cover;">
                    <div class="p-5">
                        <div class="mb-3">
                            <span class="badge bg-primary" style="font-size: 0.9rem; padding: 8px 16px; border-radius: 20px;">Recent</span>
                        </div>
                        <h2 class="mb-3" style="font-weight: 700; color: #333; line-height: 1.3;">{{ $news->title }}</h2>
                        <p class="text-muted mb-4" style="font-size: 0.95rem;">
                            <i class="fa fa-calendar"></i>
                            {{ isset($news->created_at) ? date('F d, Y', strtotime($news->created_at)) : date('F d, Y') }}
                        </p>
                        <div style="text-align:justify; font-size: 1.05rem; line-height: 1.8; color: #555;">
                            {!! $news->description !!}
                        </div>

                        <!-- Photo Gallery -->
                        @if($news->gallery_images)
                        <div class="mt-5">
                            <h3 style="color: #0D47A1; font-weight: 700; margin-bottom: 30px; border-bottom: 3px solid #0D47A1; padding-bottom: 10px; display: inline-block;">Photo Gallery</h3>
                            <div class="row g-3">
                                @foreach(json_decode($news->gallery_images) as $galleryImage)
                                <div class="col-md-3 col-sm-6">
                                    <a href="{{ asset('images/news/gallery/'.$galleryImage) }}" class="gallery-item">
                                        <div style="position: relative; overflow: hidden; border-radius: 12px; height: 200px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 8px 20px rgba(13, 71, 161, 0.2)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 3px 10px rgba(0,0,0,0.1)';">
                                            <img src="{{ asset('images/news/gallery/'.$galleryImage) }}" alt="Gallery Image" style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(13, 71, 161, 0.8) 0%, transparent 70%); opacity: 0; transition: opacity 0.3s ease; display: flex; align-items: flex-end; justify-content: center; padding: 15px;" onmouseover="this.style.opacity='1';" onmouseout="this.style.opacity='0';">
                                                <span style="color: white; font-weight: 600; font-size: 14px; text-align: center;">
                                                    <i class="bx bx-search-alt" style="font-size: 18px;"></i> {{ $news->title }}
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

            {{-- Recent News Sidebar --}}
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px; z-index: 1;">
                    <h4 class="mb-4" style="font-weight: 700; color: #333;">Recent</h4>
                    @if(isset($recent_news) && count($recent_news) > 0)
                        @foreach($recent_news as $key => $item)
                        <div class="mb-4" data-aos="fade-left" data-aos-delay="{{ ($key + 1) * 100 }}">
                            <div class="bg-white shadow-sm" style="border-radius: 12px; overflow: hidden; transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow=''">
                                <a href="{{ route('latest.news.view', $item->id) }}">
                                    <img src="{{ asset('images/news/'.$item->image) }}" alt="{{ $item->title }}" class="w-100" style="height: 180px; object-fit: cover;">
                                </a>
                                <div class="p-3">
                                    <div class="mb-2">
                                        <span class="text-muted" style="font-size: 0.85rem;"><i class="fa fa-calendar"></i> {{ isset($item->created_at) ? date('M d, Y', strtotime($item->created_at)) : 'Recent' }}</span>
                                    </div>
                                    <h5 class="mb-2" style="font-size: 1rem; font-weight: 600; line-height: 1.4;"><a href="{{ route('latest.news.view', $item->id) }}" style="color: #333; text-decoration: none;">{{ Str::limit($item->title, 70) }}</a></h5>
                                    <p class="text-muted mb-2" style="font-size: 0.9rem; line-height: 1.5;">{{ Str::limit($item->description, 90) }}</p>
                                    <a href="{{ route('latest.news.view', $item->id) }}" class="text-primary" style="font-size: 0.9rem; font-weight: 500; text-decoration: none;">Read More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p class="text-muted">No other news available.</p>
                    @endif
                </div>
            </div>
        </div>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

      </div>

    </div>
  </section><!-- End Ongoing Project Section -->

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
                    return '{{ $news->title }}';
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
