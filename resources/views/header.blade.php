<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/application/'.application()->main_logo) }}" alt="Logo" style="max-height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <!-- Home -->
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Home</a></li>

                <!-- About -->
                <li class="nav-item dropdown {{ in_array(Route::currentRouteName(), ['about.us', 'vision.mission', 'key.focus.area', 'team.members', 'origin_affilation', 'executive.committee', 'cheif.message', 'partner.donor', 'about.impact']) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="aboutDropdown">
                        <a class="dropdown-item" href="{{ route('about.us') }}">About BMS</a>
                        <a class="dropdown-item" href="{{ route('vision.mission') }}">Mission, Vision & Values</a>
                        <a class="dropdown-item" href="{{ route('key.focus.area') }}">Key Focus Area</a>
                        <a class="dropdown-item" href="{{ route('team.members') }}">Team Members</a>
                        <a class="dropdown-item" href="{{ route('origin_affilation') }}">Origin and Legal Affiliation</a>
                        <a class="dropdown-item" href="{{ route('executive.committee') }}">Executive Committee</a>
                        <a class="dropdown-item" href="{{ route('cheif.message') }}">Message from Chief Executive</a>
                        <a class="dropdown-item" href="{{ route('partner.donor') }}">Our Partners and Donor</a>
                        <a class="dropdown-item" href="{{ route('about.impact') }}">Impact</a>
                    </div>
                </li>

                <!-- Programs -->
                <li class="nav-item dropdown {{ in_array(Route::currentRouteName(), ['programs.all', 'programs.view', 'ongoing.project', 'project.archieve', 'success.stories', 'featured.program.view']) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="programsDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Programs
                    </a>
                    <div class="dropdown-menu" aria-labelledby="programsDropdown">
                        <a class="dropdown-item" href="{{ route('programs.all') }}">Featured Programs</a>
                        <a class="dropdown-item" href="{{ route('ongoing.project') }}">Ongoing Programs</a>
                        <a class="dropdown-item" href="{{ route('project.archieve') }}">Project Archieve</a>
                        <a class="dropdown-item" href="{{ route('success.stories') }}">Success Stories</a>
                    </div>
                </li>

                <!-- Get Involved -->
                <li class="nav-item dropdown {{ in_array(Route::currentRouteName(), ['volunterr.opportunities', 'donate', 'invoked.career']) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="involvedDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Get Involved
                    </a>
                    <div class="dropdown-menu" aria-labelledby="involvedDropdown">
                        <a class="dropdown-item" href="{{ route('volunterr.opportunities') }}">Volunteer Opportunities</a>
                        <a class="dropdown-item" href="{{ route('donate') }}">Donate</a>
                        <a class="dropdown-item" href="{{ route('invoked.career') }}">Career with BMS</a>
                    </div>
                </li>

                <!-- News & Events -->
                <li class="nav-item dropdown {{ in_array(Route::currentRouteName(), ['latest.news.all', 'news.view', 'strategic.plan', 'policy.guideline', 'publication', 'photo.all']) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" href="#" id="eventsDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        News & Events
                    </a>
                    <div class="dropdown-menu" aria-labelledby="eventsDropdown">
                        <a class="dropdown-item" href="{{ route('latest.news.all') }}">News & Events</a>
                        <a class="dropdown-item" href="{{ route('strategic.plan') }}">BMS Strategic Plan</a>
                        <a class="dropdown-item" href="{{ route('policy.guideline') }}">Policy & Guideline</a>
                        <a class="dropdown-item" href="{{ route('publication') }}">Publication</a>
                        <a class="dropdown-item" href="{{ route('photo.all') }}">Photo Gallery</a>
                    </div>
                </li>

                <!-- Contact -->
                <li class="nav-item {{ Route::currentRouteName() == 'contact' ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="{{ route('donate') }}" class="nav-link">Donate</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
