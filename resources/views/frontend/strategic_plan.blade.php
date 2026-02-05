@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Stay Informed</li>
      </ol>
      <h2>Strategic Plan</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- Strategic Plan Section -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">
      <div class="section-title">
        <h2>Strategic Plan</h2>
            <div class="row d-flex justify-content-center">
                <div class="sol-sm-12 col-md-6 col-lg-4">
                    <a href="{{ asset('frontend/file/strategic_plan/AFAD Strategic plan -Bangla.pdf') }}" target="blank">
                        <div class="card">
                        <div class="card-body py-4">
                            <img src="{{ asset('img/logo.png') }}" alt="" width="50%">
                        </div>
                        <div class="card-footer">
                            <h5 class="fw-bold">কৌশলগত পরিকল্পনা</h5>
                            <h6 class="text-dark">এসোসিয়েশন ফর অল্টারনেটিভ ডেভেলপমেন্ট (এএফএডি)</h6>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
      </div>
    </div>
  </section>
  <!-- End Strategic Plan Section -->

@endsection
