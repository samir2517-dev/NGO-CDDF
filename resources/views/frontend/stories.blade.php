@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Success Stories</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Success Stories --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Success Stories</h2>
            <div class="row p-3">
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="{{ route('success.stories.view') }}">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <div class="overlay">
                                <p class="h4">Women's Empowerment Initiative</p>
                                <p class="textmuted"> Promoting gender equality and empowerment through education, skill-building, and advocacy for women's rights.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="#">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/2659475/pexels-photo-2659475.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <div class="overlay">
                                <p class="h4">Youth Development Project</p>
                                <p class="textmuted"> Empowering the next generation through mentorship, education, and community engagement to foster leadership.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="#">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/4388165/pexels-photo-4388165.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                            <div class="overlay">
                                <p class="h4">Healthcare Access Program</p>
                                <p class="textmuted">Providing essential healthcare services, awareness campaigns, and medical assistance to underserved communities in Bangladesh.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="#">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/4577718/pexels-photo-4577718.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="">
                            <div class="overlay">
                                <p class="h4">Environmental Sustainability Project</p>
                                <p class="textmuted">Promoting sustainable practices, conservation efforts, and environmental education to safeguard natural resources and mitigate climate change impacts.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="#">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/3449662/pexels-photo-3449662.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="">
                            <div class="overlay">
                                <p class="h4">Community Resilience Initiative</p>
                                <p class="textmuted">Building resilient communities through disaster preparedness, infrastructure development, and livelihood support to enhance local capacities and reduce vulnerabilities.</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 px-0 ">
                    <a href="#">
                        <div class="featuredImage">
                            <img src="https://images.pexels.com/photos/417344/pexels-photo-417344.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="">
                            <div class="overlay">
                                <p class="h4">Education for All Campaign</p>
                                <p class="textmuted">Ensuring access to quality education for children from marginalized backgrounds through scholarships, school support programs, and educational resources.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  {{-- End of Success Stories --}}
@endsection
