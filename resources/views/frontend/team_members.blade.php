@extends('main')

@section('content')

  <!-- Breadcrumbs -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Team Members</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

<!-- Contact Section -->
  <section id="contact" class="contact p-0 m-0">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <section class="bg-light py-3 py-md-5 py-xl-8">
                <div class="container">
                    <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="mb-3 display-5 text-center">Our Team</h2>
                        <p class="text-secondary mb-4 text-center lead fs-4">We are a group of innovative, experienced, and proficient teams. You will love to collaborate with us.</p>
                    </div>
                    </div>
                </div>

                <div class="container overflow-hidden">
                    <div class="row gy-4 gy-lg-0 gx-xxl-5">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                                <div class="card-body p-0">
                                    <figure class="m-0 p-0">
                                    <img class="img-fluid" loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="Members">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Md. Jane Alam</h4>
                                        <p class="text-secondary mb-0">Product Manager</p>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube p-3 border m-1 rounded"></i></a>
                                        </div>
                                    </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                                <div class="card-body p-0">
                                    <figure class="m-0 p-0">
                                    <img class="img-fluid" loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="Members">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Mohammad Rahman</h4>
                                        <p class="text-secondary mb-0">Finance Director</p>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube p-3 border m-1 rounded"></i></a>
                                        </div>
                                    </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                                <div class="card-body p-0">
                                    <figure class="m-0 p-0">
                                    <img class="img-fluid" loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="Members">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Aisha Ahmed</h4>
                                        <p class="text-secondary mb-0">Field Officer</p>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube p-3 border m-1 rounded"></i></a>
                                        </div>
                                    </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card border-0 border-bottom border-primary shadow-sm overflow-hidden">
                                <div class="card-body p-0">
                                    <figure class="m-0 p-0">
                                    <img class="img-fluid" loading="lazy" src="{{ asset('img/testimonial.jpg') }}" alt="Members">
                                    <figcaption class="m-0 p-4">
                                        <h4 class="mb-1">Ahmed Ali</h4>
                                        <p class="text-secondary mb-0">Program Director</p>
                                        <div class="d-flex justify-content-center mt-3">
                                            <a href="{{ application()->facebook }}" target="blank"><i class="fa-brands fa-facebook-f p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->twitter }}" target="blank"><i class="fa-brands fa-twitter p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->instagram }}" target="blank"><i class="fa-brands fa-instagram p-3 border m-1 rounded"></i></a>
                                            <a href="{{ application()->youtube }}" target="blank"><i class="fa-brands fa-youtube p-3 border m-1 rounded"></i></a>
                                        </div>
                                    </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
  </section>
<!-- End Contact Section -->
@endsection
