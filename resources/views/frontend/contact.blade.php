@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Contact</li>
      </ol>
      <h2>Contact</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light py-0 my-0">
    <div class="container bg-white" data-aos="fade-up">
      <div class="section-title py-5">
        <h2>Contact Information </h2>
         <!-- ======= Contact Section ======= -->
         <div class="row py-3">
            <div class="col-md-3 text-start my-2">
                <h5>Head Office Address</h5>
                <p class="text-secondary">R.K Road Khalilganj Bazar, Kurigram</p>
            </div>
            <div class="col-md-3 text-start my-2">
                <h5>Chief Executive</h5>
                <ul class="text-start m-0 p-0 text-secondary">
                    <li>Chief Executive: Sayda Yesmin  </li>
                    <li>Mobile: 01719-691409, 01324-194889  </li>
                    <li>Skype: yesminafad@hotmail.com </li>
                    <li>WhatsApp: 01719691409 </li>
                    <li>Twitter: @sayda_yesmin </li>
                    <li>Email: yesminafad@gmail.com, yesminafad@yahoo.com</li>
                </ul>
            </div>
            <div class="col-md-3 text-start my-2">
                <h5>Admin Officer</h5>
                <ul class="text-start m-0 p-0 text-secondary">
                    <li>Admin Officer: Md Al Muzahid</li>
                    <li>Mobilr:01713-202608</li>
                    <li>Email:muzahid.afad@gmail.com</li>
                    <li>WhatsApp: 01713-202608</li>
                </ul>
            </div>
            <div class="col-md-3 text-start my-2">
                <h5>Focal Person</h5>
                <ul class="text-start m-0 p-0 text-secondary">
                    <li>Focal Person: Reshma Sultana</li>
                    <li>Mobile:01712-534642</li>
                    <li>Email:reshmatuli42@gmail.com</li>
                    <li>WhatsApp:01712-534642</li>
                </ul>
            </div>
         </div>

         <hr class="py-2">

         {{-- Message Form --}}
        <div class="row mx-1">
            <div class="col-lg-8 my-2">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <form action="{{ route('message.store') }}" method="post" role="form" class="php-email-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Your Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-2">
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}">
                        @error('subject')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="3" placeholder="Message">
                            {{ old('message') }}
                        </textarea>
                        @error('message')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-start">
                        <button class="btn btn-danger" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 text-start my-2">
                <h1>Message us <i class="fa-regular fa-envelope text-danger"></i></h1>
                <p class="text-secondary">Please send us your message through email or message box. We will response within short periods of time. Thank you for being with us.</p>
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section -->
<div style="background-image: url('{{ asset('img/donation.jpg') }}')" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-12 mx-auto text-center">
                <h6 class="text-warning text-center">We need your cooperation</h6>
                <h1 class="text-white text-center">Be a part of our mission to raise funds for impactful humanitarian causes.</h1>
                <a href="{{ route('donate') }}" class="btn btn-warning mt-3"><i class="fa-solid fa-sack-dollar"></i> Donate Now</a>
            </div>
        </div>
    </div>
</div>

<section id="contact" class="contact bg-light py-0 my-0">
    <div class="container bg-white py-5">
        <div class="mb-5">
            <div class="section-title">
                <h2>Office Location</h2>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1719.1936844054173!2d89.62614056461113!3d25.80873502360909!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e2c8d493785f47%3A0x89cb625d52f7cfd3!2sKhalilganj%20Bazar!5e0!3m2!1sen!2sbd!4v1675184176828!5m2!1sen!2sbd" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

@endsection
