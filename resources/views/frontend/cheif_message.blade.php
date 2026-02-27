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
                Message from <span style="color: #0D47A1;">Chief Executive</span>
            </h1>
        </div>

        @if(isset($message))
        <!-- Message Content -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div data-aos="fade-up" style="
                    background: white;
                    border-radius: 25px;
                    overflow: hidden;
                    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
                ">
                    <!-- Header with Photo -->
                    <div style="
                        background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%);
                        padding: 50px 40px;
                        text-align: center;
                        position: relative;
                    ">
                        <!-- Decorative Elements -->
                        <div style="
                            position: absolute;
                            top: -50px;
                            left: -50px;
                            width: 200px;
                            height: 200px;
                            background: rgba(255,255,255,0.1);
                            border-radius: 50%;
                        "></div>
                        <div style="
                            position: absolute;
                            bottom: -30px;
                            right: -30px;
                            width: 150px;
                            height: 150px;
                            background: rgba(255,255,255,0.1);
                            border-radius: 50%;
                        "></div>

                        @if($message->photo)
                        <!-- Photo Circle -->
                        <div style="
                            width: 180px;
                            height: 180px;
                            margin: 0 auto 25px;
                            border-radius: 50%;
                            overflow: hidden;
                            border: 6px solid white;
                            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                            position: relative;
                            z-index: 1;
                        ">
                            <img src="{{ asset('images/chief_message/'.$message->photo) }}" alt="{{ $message->name }}" style="
                                width: 100%;
                                height: 100%;
                                object-fit: cover;
                            ">
                        </div>
                        @endif

                        <!-- Name & Designation -->
                        <h2 style="
                            color: white;
                            font-size: 32px;
                            font-weight: 800;
                            margin-bottom: 10px;
                            position: relative;
                            z-index: 1;
                        ">{{ $message->name }}</h2>
                        
                        <p style="
                            color: rgba(255,255,255,0.95);
                            font-size: 20px;
                            font-weight: 600;
                            margin: 0;
                            position: relative;
                            z-index: 1;
                        ">{{ $message->designation }}</p>
                    </div>

                    <!-- Message Content -->
                    <div style="padding: 50px 40px;">
                        @if($message->title)
                        <!-- Message Title -->
                        <div style="
                            text-align: center;
                            margin-bottom: 40px;
                        ">
                            <h3 style="
                                font-size: 28px;
                                font-weight: 700;
                                color: #2c3e50;
                                position: relative;
                                display: inline-block;
                                padding-bottom: 15px;
                            ">
                                {{ $message->title }}
                                <span style="
                                    position: absolute;
                                    bottom: 0;
                                    left: 50%;
                                    transform: translateX(-50%);
                                    width: 60px;
                                    height: 3px;
                                    background: #0D47A1;
                                    border-radius: 2px;
                                "></span>
                            </h3>
                        </div>
                        @endif

                        <!-- Quote Icon Left -->
                        <div style="
                            text-align: left;
                            margin-bottom: 20px;
                        ">
                            <i class="icon-quote-left" style="
                                font-size: 50px;
                                color: rgba(13, 71, 161, 0.2);
                            "></i>
                        </div>

                        <!-- Message Text -->
                        <div style="
                            font-size: 18px;
                            line-height: 2;
                            color: #555;
                            text-align: justify;
                            margin-bottom: 20px;
                            padding: 0 20px;
                        ">{!! nl2br(e($message->message)) !!}</div>

                        <!-- Quote Icon Right -->
                        <div style="
                            text-align: right;
                            margin-bottom: 30px;
                        ">
                            <i class="icon-quote-right" style="
                                font-size: 50px;
                                color: rgba(13, 71, 161, 0.2);
                            "></i>
                        </div>

                        @if($message->signature)
                        <!-- Signature -->
                        <div style="
                            display: flex;
                            justify-content: flex-end;
                            margin-top: 40px;
                            padding-right: 20px;
                        ">
                            <div style="text-align: center;">
                                <img src="{{ asset('images/chief_message/'.$message->signature) }}" alt="Signature" style="
                                    max-width: 180px;
                                    max-height: 80px;
                                    margin-bottom: 10px;
                                    filter: grayscale(100%) contrast(200%);
                                ">
                                <div style="
                                    border-top: 2px solid #2c3e50;
                                    padding-top: 10px;
                                    font-weight: 600;
                                    color: #2c3e50;
                                    font-size: 16px;
                                ">{{ $message->name }}</div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- Empty State -->
        <div class="text-center py-5" data-aos="fade-up">
            <i class="icon-envelope" style="font-size: 80px; color: #dee2e6; margin-bottom: 20px;"></i>
            <h4 style="color: #6c757d; font-weight: 600;">No Message Available</h4>
            <p style="color: #adb5bd;">The Chief Executive's message will appear here once published.</p>
        </div>
        @endif
    </div>
</section>

@endsection
