@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About us</li>
      </ol>
      <h2>Origin and Legal Affiliation</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Origin and Legal Affiliation: </h2>
        <p>
            AFAD is registered (No. 2443) with NGO Affair’s Bureau (NGOAB) of Prime Minister’s Office of People's Republic of Government of Bangladesh, and it got the registration (No. DWA/Kuri/Reg/29/99 )  from the Directorate of Women’s Affairs (DWA) in 1999. At the same time, AFAD has the registration from the Directorate of Youth Development, Govt. of Bangladesh.
        </p>
      </div>

      <div class="row">
        <div class="col text-start">
            <h5>Certificate of Legal Affilation:</h5>
                @foreach ($affilation as $key => $data)
                    <a href="{{ asset('images/legal_affilation/'.$data->file) }}" target="blank" class="btn btn-warning border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> {{ $data->name }}</a>
                @endforeach
        </div>
      </div>

    </div>
  </section><!-- End Contact Section -->

@endsection
