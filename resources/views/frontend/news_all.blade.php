@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What We Do</li>
      </ol>
      <h2>Latest News</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Ongoing Project Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Latest News</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($news as $key=>$data)
                <div class="col">
                    <div class="card border-0 shadow">
                        <img src="{{ asset('images/news/'.$data->image) }}" class="card-img-top" alt="activity" width="100%" height="200px">
                        <div class="card-body ">
                            <h5 class="card-title text-start">{{ Str::limit($data->title, 25, '...') }}</h5>
                            <p class="text-secondary text-start" style="font-size: 12px;">
                                <i class="fas fa-calendar-minus"></i>
                                {{ date("d/m/Y  h:i:s a") }}
                            </p>
                            <p class="card-text py-3 text-start">
                                {{ Str::limit($data->description,75,"...") }}
                            </p>
                            <p class="text-start">
                                <a href="{{ route('latest.news.view',$data->id) }}" class="text-primary"><i class="fa fa-arrow-right" aria-hidden="true"></i> Read More</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center">
        {{ $news->links() }}
    </div>

    <div class="row" data-aos="fade-up" data-aos-delay="100">

    </div>

    </div>
  </section><!-- End Ongoing Project Section -->

@endsection
