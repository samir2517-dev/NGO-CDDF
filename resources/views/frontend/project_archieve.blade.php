@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>What we Do</li>
      </ol>
      <h2>Project Archieve</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

    <!-- ======= Project Archieve Section ======= -->
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Project Archieve</h2>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
            <thead class="bg-danger text-white">
                <tr>
                    <th class="align-middle">Serial</th>
                    <th class="text-start align-middle w-50">Name of the Project</th>
                    <th class="text-start align-middle">Partners/Donors</th>
                    <th class="align-middle text-start">Project Period</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($project as $key=>$proj)
                    <tr>
                        <td class="align-middle">{{ ++$key }}</td>
                        <td class="text-start align-middle">{{ $proj->name }}</td>
                        <td class="text-start align-middle">{{ $proj->partners }}</td>
                        <td class="align-middle text-start">{{ $proj->from_date }} - {{ $proj->to_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </section>
  <!-- End Project ArchievePartner and Donor Section -->

@endsection
