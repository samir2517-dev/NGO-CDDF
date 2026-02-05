@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>About AFAD</li>
      </ol>
      <h2>Executive Committee</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Executive Committee Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Governance Structure/organogram of AFAD</h2>
        <p>
            The general body of AFAD comprises of 21 renowned women rights activist women and, the Executive Committee (EC) is consisted with 07 women members. The Chief Executive is responsible to the EC and there by GB.  The members of EC are providing different support to the organization on voluntary basis. There is no conflict of interest among the members in EC and GB level. The EC meetings are held regularly on monthly basis and GB meetings are held on six monthly basis. The organization is regularly submitting the Income tax return and VAT according the Govt. rule and regulations.
        </p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col text-start">
            <h5>Organizational Structure:</h5>
                {{-- <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="blank">Organizational Structure Pdf</a> --}}
                <a href="{{ asset('frontend/file/AFAD_Organogram.pdf') }}" target="blank" class="btn btn-primary border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> Organizational Structure Pdf</a>
            </ul>
        </div>
      </div>

    </div>
  </section
  ><!-- End Executive Committee Section -->

@endsection
