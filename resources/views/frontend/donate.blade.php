@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Get Involved</li>
      </ol>
      <h2>Donate</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Donate</h2>
        <div style="background-image: url('{{ asset('img/donation.jpg') }}')" class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12 mx-auto text-center">
                        <h6 class="text-warning text-center">We need your cooperation</h6>
                        <h1 class="text-white text-center">Be a part of our mission to raise funds for impactful humanitarian causes.</h1>
                        <a href="{{ route('contact') }}" class="btn btn-warning mt-3"><i class="fa-solid fa-sack-dollar"></i> Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-5 p-3 justify-content-center">
            <h5 class="fs-2 text-danger">Please donate to us using the following payment methods.</h5>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('img/bkash.png') }}" alt="bkash" width="50%">
                    <h5 class="fs-4">+8801825-003211</h5>
                </div>
            </div>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('img/nagad.png') }}" alt="bkash" width="50%">
                    <h5 class="fs-4">+8801825-003211</h5>
                </div>
            </div>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('img/rocket.png') }}" alt="bkash" width="50%">
                    <h5 class="fs-4">+8801825-003211</h5>
                </div>
            </div>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('img/upay.png') }}" alt="bkash" width="50%">
                    <h5 class="fs-4">+8801825-003211</h5>
                </div>
            </div>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <img src="{{ asset('img/visa.png') }}" alt="bkash" width="50%">
                    <h5 class="fs-4">8957 5685 2531 4512</h5>
                </div>
            </div>
            <div class="col-md-3 border rounded p-3 m-1 d-flex justify-content-center align-items-center">
                <div>
                    <h1><i class="fa-solid fa-building-columns"></i></h1>
                    <h5 class="fs-4">Bank Name : IBBL</h5>
                    <ul>
                        <li>Accountant Name: Md. Jane Alam</li>
                        <li>Accountant Number: 2050 2250 2050 XXXX</li>
                        <li>Branch : Maijdee Court, Maijdee, Noakhali Sadar, Noakhali, Bangladesh</li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
