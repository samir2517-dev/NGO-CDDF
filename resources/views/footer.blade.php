<footer class="ftco-footer ftco-section img">
    <div class="overlay"></div>
    <div class="container">
        <div class="row mb-5">
            {{-- Logo and Description Column --}}
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <div class="mb-3">
                        <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="BMS Logo" style="width: 80px; height: 80px;">
                    </div>
                    <p>Bakultali Mahila Sangshad (BMS) is a women-led grassroots organization working in northern Bangladesh since 1998. We are dedicated to empowering women and children in the disaster-prone regions of Kurigram through education, economic self-reliance, and community resilience programs.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="{{ application()->twitter }}" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{ application()->facebook }}" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{ application()->instagram }}" target="_blank"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            {{-- What We Are Column --}}
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4" style="margin-top: 80px;">
                    <h2 class="ftco-heading-2 mb-3">WHAT WE ARE</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about.us') }}" class="py-2 d-block">About BMS</a></li>
                        <li><a href="{{ route('vision.mission') }}" class="py-2 d-block">Mission & Vision</a></li>
                        <li><a href="{{ route('key.focus.area') }}" class="py-2 d-block">Key Focus Area</a></li>
                        <li><a href="{{ route('origin_affilation') }}" class="py-2 d-block">Origin and Legal Affiliation</a></li>
                        <li><a href="{{ route('partner.donor') }}" class="py-2 d-block">Our Partners and Donor</a></li>
                    </ul>
                </div>
            </div>

            {{-- What We Do Column --}}
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4" style="margin-top: 80px;">
                    <h2 class="ftco-heading-2 mb-3">WHAT WE DO</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('ongoing.project') }}" class="py-2 d-block">Ongoing Project</a></li>
                        <li><a href="{{ route('project.archieve') }}" class="py-2 d-block">Project Archieve</a></li>
                        <li><a href="{{ route('programs.all') }}" class="py-2 d-block">Programs</a></li>
                    </ul>
                </div>
            </div>

            {{-- Quick Links Column --}}
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4" style="margin-top: 80px;">
                    <h2 class="ftco-heading-2 mb-3">QUICK LINKS</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('volunterr.opportunities') }}" class="py-2 d-block">Volunteer Opportunities</a></li>
                        <li><a href="{{ route('donate') }}" class="py-2 d-block">Donate</a></li>
                        <li><a href="{{ route('contact') }}" class="py-2 d-block">Contact</a></li>
                    </ul>
                </div>
            </div>

            {{-- Removed duplicate About BMS links column --}}
            <div class="col-md-2 d-none">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">About BMS</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about.us') }}" class="py-2 d-block">About BMS</a></li>
                        <li><a href="{{ route('vision.mission') }}" class="py-2 d-block">Mission & Vision</a></li>
                        <li><a href="{{ route('origin_affilation') }}" class="py-2 d-block">Origin and Legal Affiliation</a></li>
                        <li><a href="{{ route('partner.donor') }}" class="py-2 d-block">Our Partners and Donor</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a href="{{ url('/') }}" target="_blank">BMS</a></p>
            </div>
        </div>
    </div>
</footer>
