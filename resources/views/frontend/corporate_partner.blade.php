@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Corporate Partnership</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Corporate Partnership</h2>
            <img src="{{ asset('img/partner.png') }}" alt="" class="" width="20%">
            <p class="fs-4 text-secondary">The content will be updated soon.</p>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
