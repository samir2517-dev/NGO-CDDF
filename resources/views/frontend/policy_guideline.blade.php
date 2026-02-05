@extends('main')

@section('content')

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Stay Informed</li>
      </ol>
      <h2>Policy and Guideline</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Policy and Guideline Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5">

      <div class="section-title">
        <h2>Policy and Guideline</h2>
            @foreach ($policy as $key => $data)
                {{-- <a href="{{ asset('images/policy_guideline/'.$data->file) }}" target="blank">{{ $data->name }}</a> --}}
                <a href="{{ asset('images/policy_guideline/'.$data->file) }}" target="blank" class="btn btn-warning border border-dark m-2" style="font-size: 20px; font-weight:500; box-shadow: 5px 5px 0 rgba(0,0,0,1);"><i class="fa-solid fa-cloud-arrow-down"></i> {{ $data->name }} .pdf</a>
            @endforeach
      </div>
    </div>
  </section>
  <!-- End Policy and Guideline Section -->

@endsection
