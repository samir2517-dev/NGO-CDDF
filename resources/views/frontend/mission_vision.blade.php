@extends('main')

@section('content')

<!-- Mission, Vision & Values Section -->
<section class="py-5" style="background: linear-gradient(180deg, #ffffff 0%, #f8f9fa 100%);">
    <div class="container">
        <!-- Page Title -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h1 style="font-size: 48px; font-weight: 800; color: #2c3e50; margin-bottom: 15px;">
                Our <span style="color: #0D47A1;">Guiding Principles</span>
            </h1>
        </div>

        <!-- Mission Row -->
        <div class="row align-items-center mb-5 pb-4" data-aos="fade-right">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div style="background: linear-gradient(135deg, #0D47A1 0%, #1565C0 100%); border-radius: 20px; padding: 60px 40px; position: relative; box-shadow: 0 20px 60px rgba(13, 71, 161, 0.3);">
                    <div style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-size: 24px; font-weight: 700;">01</span>
                    </div>
                    <div style="text-align: center; color: white;">
                        <div style="width: 120px; height: 120px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; border: 3px solid rgba(255,255,255,0.3);">
                            <i class="fa-solid fa-bullseye" style="font-size: 60px;"></i>
                        </div>
                        <h2 style="font-size: 36px; font-weight: 700; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Our Mission</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="background: white; border-radius: 20px; padding: 45px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border-left: 5px solid #0D47A1;">
                    <p style="font-size: 17px; line-height: 1.9; color: #555; text-align: justify; margin: 0;">
                        {{ $mission_vision->mission ?? 'To empower women and girls through education, economic self-reliance, and leadership training, while building community resilience against climate change and natural disasters. We strive to create sustainable pathways out of poverty through innovative programs that address the unique challenges faced by women in disaster-prone regions of northern Bangladesh.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Vision Row (Reversed) -->
        <div class="row align-items-center mb-5 pb-4 flex-lg-row-reverse" data-aos="fade-left">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div style="background: linear-gradient(135deg, #1565C0 0%, #0D47A1 100%); border-radius: 20px; padding: 60px 40px; position: relative; box-shadow: 0 20px 60px rgba(13, 71, 161, 0.3);">
                    <div style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-size: 24px; font-weight: 700;">02</span>
                    </div>
                    <div style="text-align: center; color: white;">
                        <div style="width: 120px; height: 120px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; border: 3px solid rgba(255,255,255,0.3);">
                            <i class="fa-solid fa-eye" style="font-size: 60px;"></i>
                        </div>
                        <h2 style="font-size: 36px; font-weight: 700; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Our Vision</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="background: white; border-radius: 20px; padding: 45px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border-right: 5px solid #1565C0;">
                    <p style="font-size: 17px; line-height: 1.9; color: #555; text-align: justify; margin: 0;">
                        {{ $mission_vision->vision ?? 'A society where every individual, regardless of gender or economic status, can realize their full potential in a vibrant and just environment. We envision communities where women are empowered decision-makers, where environmental sustainability is prioritized, and where every person has access to opportunities for growth and prosperity.' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Values Row -->
        <div class="row align-items-center mb-5" data-aos="fade-right">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div style="background: linear-gradient(135deg, #5E35B1 0%, #7E57C2 100%); border-radius: 20px; padding: 60px 40px; position: relative; box-shadow: 0 20px 60px rgba(94, 53, 177, 0.3);">
                    <div style="position: absolute; top: 20px; right: 20px; width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                        <span style="color: white; font-size: 24px; font-weight: 700;">03</span>
                    </div>
                    <div style="text-align: center; color: white;">
                        <div style="width: 120px; height: 120px; background: rgba(255,255,255,0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; border: 3px solid rgba(255,255,255,0.3);">
                            <i class="fa-solid fa-heart" style="font-size: 60px;"></i>
                        </div>
                        <h2 style="font-size: 36px; font-weight: 700; margin: 0; text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Our Values</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div style="background: white; border-radius: 20px; padding: 45px; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border-left: 5px solid #5E35B1;">
                    <p style="font-size: 17px; line-height: 1.9; color: #555; text-align: justify; margin: 0;">
                        {{ $mission_vision->values ?? 'Gender equality, institutional transparency, and community-led resilience form the cornerstone of our work. We believe true empowerment is about fostering agency so women become decision-makers in their own right. By maintaining a strict zero-tolerance policy toward safeguarding violations and ensuring every financial transaction is accountable to international standards, BMS has built a foundation of trust with both local beneficiaries and global partners.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
