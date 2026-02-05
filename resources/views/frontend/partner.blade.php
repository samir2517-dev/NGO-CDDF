@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Partner and Donor</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Partner and Donor Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Partner and Donor</h2>
        {{-- Partner Slider img --}}
        <div class="">
            <div class="row justify-content-center">
                @foreach ($partners as $partner)
                <div class="col-md-2 border border-secondary rounded py-3 m-2 d-flex align-items-center justify-content-center">
                    <h6 class="">{{ $partner->name }}</h6>
                </div>
                @endforeach
            </div>
        </div>
        {{-- Partner Slider img --}}
      </div>
    </div>
  </section>
  <!-- End Partner and Donor Section -->

@endsection
