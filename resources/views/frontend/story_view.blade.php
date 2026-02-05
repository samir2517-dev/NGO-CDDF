@extends('main')

@section('content')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li>Programs</li>
      </ol>
      <h2>Success Story</h2>
    </div>
  </section>
  <!-- End Breadcrumbs -->

  {{-- Featured Program Single View --}}
  <section id="contact" class="contact bg-light p-0">
    <div class="container bg-white py-5" data-aos="fade-up">
      <div class="section-title">
        <h2>Success Story</h2>
        <div class="row">
            <div class="col text-start">
                <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="" class="w-50">
                <h3 class="mt-3">Women's Empowerment Initiative</h3>
                <p style="text-align: justify;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias minima harum eaque eligendi quae ab atque nobis tempora, necessitatibus expedita illo rem blanditiis ratione quod, doloremque animi? Quod dolor commodi minus dolorum nisi veritatis incidunt nam, molestiae reiciendis dicta obcaecati! Officia, explicabo quibusdam commodi aliquid fugit deserunt alias voluptatum velit ea itaque totam quas consequatur incidunt fugiat deleniti in error amet accusamus veritatis? Nemo aut excepturi et, perspiciatis ratione, incidunt minima ad voluptatibus distinctio obcaecati laborum ex voluptates corporis ipsum libero accusantium? Repellat accusamus quidem labore tempora, praesentium minima, officiis voluptate a, qui fugit molestiae. Placeat repellendus quam expedita dolore quos, assumenda nesciunt omnis vero, dicta eum dolor hic sint minus voluptate amet ipsum sequi, nam aut minima? Voluptatem tenetur ducimus, quos earum itaque excepturi. Ex veniam similique tempora? Voluptas iusto tempora autem aut maxime aliquam, aliquid numquam quia minus neque, impedit beatae sunt, suscipit in culpa consequuntur itaque cum!
                </p>
                <div class="py-3">
                    <a href="{{ route('success.stories') }}" class="btn btn-danger"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back to Stories</a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
  {{-- End of Featured Program Single View --}}


@endsection
