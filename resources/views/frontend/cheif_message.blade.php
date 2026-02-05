@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Message form Cheif Executive</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Message Section ======= -->
  <section id="testimonials" class="testimonials bg-light p-0">
    <div class="container bg-white py-5">
      <div class="section-title">
        <h2>Message form Cheif Executive</h2>
        <div class="testimonials-slider">
          <div class="testimonial-wrap">
            <div class="testimonial-item">
              <div class="d-flex justify-content-center">
                <img src="{{ asset('img/testimonial.jpg') }}" class="testimonial-img" alt="">
              </div>
              <h3 class="fs-3">Mohammad Jane Alam</h3>
              <h4 class="fs-5 text-dark">Cheif Executive</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Dear AFAD Community,<br><br>

                I am honored to address you as the Chief Executive of AFAD. As we embark on this journey together, I am filled with enthusiasm and determination to lead our organization towards greater heights of impact and service.

                With your unwavering support and dedication, we will continue to uphold our mission of empowering communities, fostering resilience, and driving positive change. Together, let us strive to make a lasting difference in the lives of those we serve.

                Thank you for your commitment to AFAD's vision and values. I look forward to working alongside each and every one of you as we pursue our shared goals. <br> <br>

                Warm regards
              </p>
            </div>
          </div>
          <!-- End Message item -->
        </div>
      </div>
    </div>
  </section>
  <!-- End Message Section -->

@endsection
