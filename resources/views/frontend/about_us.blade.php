@extends('main')

@section('content')

<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="
                font-size: 48px;
                font-weight: 800;
                color: #2c3e50;
                margin-bottom: 20px;
                position: relative;
                display: inline-block;
            ">
                About <span style="color: #0D47A1;">BMS</span>
            </h1>

        </div>

        <!-- About Content -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div style="
                    background: white;
                    border-radius: 20px;
                    padding: 45px;
                    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
                    border-left: 5px solid #0D47A1;
                " data-aos="fade-up">
                    <p style="
                        font-size: 17px;
                        line-height: 1.9;
                        color: #555;
                        text-align: justify;
                        margin: 0;
                    ">{{ $about_us->description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
