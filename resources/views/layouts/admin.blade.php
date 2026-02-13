<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BMS | Admin Dashboard</title>
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    
    <!-- Favicon -->
    @if(function_exists('application') && application() && isset(application()->fav_icon))
        <link rel="shortcut icon" href="{{ asset('images/application/'.application()->fav_icon) }}" />
    @else
        <link rel="shortcut icon" href="{{ asset('admin-assets/images/favicon.png') }}" />
    @endif
    
    @stack('styles')
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}" style="text-decoration: none;">
                    <h3 class="mb-0" style="color: #6C7293; font-weight: 600;">BMS</h3>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}" style="text-decoration: none;">
                    <h5 class="mb-0" style="color: #6C7293; font-weight: 600;">BMS</h5>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control bg-transparent border-0" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
                            <i class="mdi mdi-power"></i>
                        </a>
                        <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <!-- Page Body Wrapper -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                @php
                    $currentPath = Request::path();
                @endphp
                <ul class="nav">
                    @php
                        $isDashboard = Request::is('admin/home') || Request::is('admin/home/*') || Request::is('admin/dashboard') || Request::is('admin/dashboard/*');
                    @endphp
                    <li class="nav-item @if($isDashboard) active @endif">
                        <a class="nav-link" href="{{ route('admin.home') }}">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>

                    <!-- Slider -->
                    @php
                        $isSlider = Request::is('admin/slider/add') || Request::is('admin/slider/all') || Request::is('admin/slider/edit/*');
                    @endphp
                    <li class="nav-item @if($isSlider) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#slider" aria-expanded="@if($isSlider) true @else false @endif" aria-controls="slider">
                            <span class="menu-title">Slider</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-view-carousel menu-icon"></i>
                        </a>
                        <div class="collapse @if($isSlider) show @endif" id="slider">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/slider/add')) active @endif" href="{{ route('slider.add') }}">Add Slider</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/slider/all') || Request::is('admin/slider/edit/*')) active @endif" href="{{ route('slider.index') }}">All Slider</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Ongoing Project -->
                    @php
                        $isProject = Request::is('admin/project/add') || Request::is('admin/project/index') || Request::is('admin/project/edit/*');
                    @endphp
                    <li class="nav-item @if($isProject) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#projects" aria-expanded="@if($isProject) true @else false @endif" aria-controls="projects">
                            <span class="menu-title">Ongoing Project</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-briefcase menu-icon"></i>
                        </a>
                        <div class="collapse @if($isProject) show @endif" id="projects">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/project/add')) active @endif" href="{{ route('project.add') }}">Add Project</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/project/index') || Request::is('admin/project/edit/*')) active @endif" href="{{ route('project.index') }}">All Project</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Latest News -->
                    @php
                        $isNews = Request::is('admin/news/add') || Request::is('admin/news/index') || Request::is('admin/news/edit/*');
                    @endphp
                    <li class="nav-item @if($isNews) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#news" aria-expanded="@if($isNews) true @else false @endif" aria-controls="news">
                            <span class="menu-title">Latest News</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-newspaper menu-icon"></i>
                        </a>
                        <div class="collapse @if($isNews) show @endif" id="news">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/news/add')) active @endif" href="{{ route('news.add') }}">Add News</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/news/index') || Request::is('admin/news/edit/*')) active @endif" href="{{ route('news.index') }}">All News</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Photo Gallery -->
                    @php
                        $isGallery = Request::is('admin/gallery/add') || Request::is('admin/gallery/index') || Request::is('admin/gallery/edit/*');
                    @endphp
                    <li class="nav-item @if($isGallery) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#gallery" aria-expanded="@if($isGallery) true @else false @endif" aria-controls="gallery">
                            <span class="menu-title">Photo Gallery</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-image-multiple menu-icon"></i>
                        </a>
                        <div class="collapse @if($isGallery) show @endif" id="gallery">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/gallery/add')) active @endif" href="{{ route('gallery.add') }}">Add Photo</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/gallery/index') || Request::is('admin/gallery/edit/*')) active @endif" href="{{ route('gallery.index') }}">All Photo</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Subscribe -->
                    @php
                        $isSubscribe = Request::is('admin/admin/subscribe');
                    @endphp
                    <li class="nav-item @if($isSubscribe) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#subscribe" aria-expanded="@if($isSubscribe) true @else false @endif" aria-controls="subscribe">
                            <span class="menu-title">Subscribe</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-bell menu-icon"></i>
                        </a>
                        <div class="collapse @if($isSubscribe) show @endif" id="subscribe">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if($isSubscribe) active @endif" href="{{ route('subscribe.all') }}">All Subscribe</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Donate Now -->
                    @php
                        $isDonate = Request::is('admin/payment-methods/*') || Request::is('admin/donations/*');
                    @endphp
                    <li class="nav-item @if($isDonate) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#donate" aria-expanded="@if($isDonate) true @else false @endif" aria-controls="donate">
                            <span class="menu-title">Donate Now</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-heart menu-icon"></i>
                        </a>
                        <div class="collapse @if($isDonate) show @endif" id="donate">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/payment-methods/add')) active @endif" href="{{ route('admin.payment_methods.add') }}">Add Payment Method</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/payment-methods/index') || Request::is('admin/payment-methods/edit/*')) active @endif" href="{{ route('admin.payment_methods.index') }}">All Payment Methods</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/donations/*')) active @endif" href="{{ route('admin.donations.index') }}">All Donations</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Key Focus Area -->
                    @php
                        $isFocus = Request::is('admin/focus-areas/add') || Request::is('admin/focus-areas/index') || Request::is('admin/focus-areas/edit/*');
                    @endphp
                    <li class="nav-item @if($isFocus) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#focus" aria-expanded="@if($isFocus) true @else false @endif" aria-controls="focus">
                            <span class="menu-title">Key Focus Area</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-target menu-icon"></i>
                        </a>
                        <div class="collapse @if($isFocus) show @endif" id="focus">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/focus-areas/add')) active @endif" href="{{ route('admin.focus_areas.add') }}">Add Focus Area</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/focus-areas/index') || Request::is('admin/focus-areas/edit/*')) active @endif" href="{{ route('admin.focus_areas.index') }}">All Focus Areas</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Application -->
                    @php
                        $isLogo = Request::is('admin/logo/create') || Request::is('admin/logo/index') || Request::is('admin/logo/edit/*');
                    @endphp
                    <li class="nav-item @if($isLogo) active @endif">
                        <a class="nav-link" href="{{ route('logo.create') }}">
                            <span class="menu-title">Application</span>
                            <i class="mdi mdi-application menu-icon"></i>
                        </a>
                    </li>

                    <!-- About us -->
                    @php
                        $isAbout = Request::is('admin/about/us/add') || Request::is('admin/about/us/create');
                    @endphp
                    <li class="nav-item @if($isAbout) active @endif">
                        <a class="nav-link" href="{{ route('about.us.create') }}">
                            <span class="menu-title">About us</span>
                            <i class="mdi mdi-information menu-icon"></i>
                        </a>
                    </li>

                    <!-- Mission Vision -->
                    @php
                        $isMission = Request::is('admin/mission/vision/create');
                    @endphp
                    <li class="nav-item @if($isMission) active @endif">
                        <a class="nav-link" href="{{ route('mission.vision.create') }}">
                            <span class="menu-title">Mission Vision</span>
                            <i class="mdi mdi-flag menu-icon"></i>
                        </a>
                    </li>

                    <!-- Origin & Legal Affilation -->
                                        @php
                        $isLegal = Request::is('admin/origin/legal_affilation/create') || Request::is('admin/origin/legal_affilation/index') || Request::is('admin/origin/legal_affilation/edit/*');
                    @endphp
                    <li class="nav-item @if($isLegal) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#legal" aria-expanded="@if($isLegal) true @else false @endif" aria-controls="legal">
                            <span class="menu-title">Origin & Legal Affilation</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file-document menu-icon"></i>
                        </a>
                        <div class="collapse @if($isLegal) show @endif" id="legal">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/origin/legal_affilation/create')) active @endif" href="{{ route('origin.legal_affilation.create') }}">Add Affilation</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/origin/legal_affilation/index') || Request::is('admin/origin/legal_affilation/edit/*')) active @endif" href="{{ route('origin.legal_affilation.index') }}">All Affilation</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Executive Committee -->
                                        @php
                        $isExecutive = Request::is('admin/executive/add') || Request::is('admin/executive/index') || Request::is('admin/executive/edit/*');
                    @endphp
                    <li class="nav-item @if($isExecutive) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#executive" aria-expanded="@if($isExecutive) true @else false @endif" aria-controls="executive">
                            <span class="menu-title">Executive Committee</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-circle menu-icon"></i>
                        </a>
                        <div class="collapse @if($isExecutive) show @endif" id="executive">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/executive/add')) active @endif" href="{{ route('executive.add') }}">Add Member</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/executive/index') || Request::is('admin/executive/edit/*')) active @endif" href="{{ route('executive.index') }}">All Members</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Team Members -->
                                        @php
                        $isTeam = Request::is('admin/team/add') || Request::is('admin/team/index') || Request::is('admin/team/edit/*');
                    @endphp
                    <li class="nav-item @if($isTeam) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#team" aria-expanded="@if($isTeam) true @else false @endif" aria-controls="team">
                            <span class="menu-title">Team Members</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-multiple menu-icon"></i>
                        </a>
                        <div class="collapse @if($isTeam) show @endif" id="team">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/team/add')) active @endif" href="{{ route('team.add') }}">Add Member</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/team/index') || Request::is('admin/team/edit/*')) active @endif" href="{{ route('team.index') }}">All Members</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Programs -->
                                        @php
                        $isPrograms = Request::is('admin/programs/add') || Request::is('admin/programs/index') || Request::is('admin/programs/edit/*');
                    @endphp
                    <li class="nav-item @if($isPrograms) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#programs" aria-expanded="@if($isPrograms) true @else false @endif" aria-controls="programs">
                            <span class="menu-title">Programs</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-bulletin-board menu-icon"></i>
                        </a>
                        <div class="collapse @if($isPrograms) show @endif" id="programs">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/programs/add')) active @endif" href="{{ route('programs.add') }}">Add Program</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/programs/index') || Request::is('admin/programs/edit/*')) active @endif" href="{{ route('programs.index') }}">All Programs</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Impact Metrics -->
                                        @php
                        $isImpact = Request::is('admin/impact/add') || Request::is('admin/impact/index') || Request::is('admin/impact/edit/*');
                    @endphp
                    <li class="nav-item @if($isImpact) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#impact" aria-expanded="@if($isImpact) true @else false @endif" aria-controls="impact">
                            <span class="menu-title">Impact Metrics</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-chart-line menu-icon"></i>
                        </a>
                        <div class="collapse @if($isImpact) show @endif" id="impact">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/impact/add')) active @endif" href="{{ route('impact.add') }}">Add Impact</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/impact/index') || Request::is('admin/impact/edit/*')) active @endif" href="{{ route('impact.index') }}">All Impact</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Success Stories -->
                                        @php
                        $isStories = Request::is('admin/stories/add') || Request::is('admin/stories/index') || Request::is('admin/stories/edit/*');
                    @endphp
                    <li class="nav-item @if($isStories) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#stories" aria-expanded="@if($isStories) true @else false @endif" aria-controls="stories">
                            <span class="menu-title">Success Stories</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-book-open-variant menu-icon"></i>
                        </a>
                        <div class="collapse @if($isStories) show @endif" id="stories">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/stories/add')) active @endif" href="{{ route('stories.add') }}">Add Story</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/stories/index') || Request::is('admin/stories/edit/*')) active @endif" href="{{ route('stories.index') }}">All Stories</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Chief Executive Message -->
                                        @php
                        $isChief = Request::is('admin/chief/message/add') || Request::is('admin/chief/message/index') || Request::is('admin/chief/message/edit/*');
                    @endphp
                    <li class="nav-item @if($isChief) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#chief" aria-expanded="@if($isChief) true @else false @endif" aria-controls="chief">
                            <span class="menu-title">Chief Executive Message</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-message-text menu-icon"></i>
                        </a>
                        <div class="collapse @if($isChief) show @endif" id="chief">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/chief/message/add')) active @endif" href="{{ route('chief.message.add') }}">Add Message</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/chief/message/index') || Request::is('admin/chief/message/edit/*')) active @endif" href="{{ route('chief.message.index') }}">All Message</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- FAQ -->
                                        @php
                        $isFAQ = Request::is('admin/faq/add') || Request::is('admin/faq/index') || Request::is('admin/faq/edit/*');
                    @endphp
                    <li class="nav-item @if($isFAQ) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#faq" aria-expanded="@if($isFAQ) true @else false @endif" aria-controls="faq">
                            <span class="menu-title">FAQ</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-help-circle menu-icon"></i>
                        </a>
                        <div class="collapse @if($isFAQ) show @endif" id="faq">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/faq/add')) active @endif" href="{{ route('faq.add') }}">Add FAQ</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/faq/index') || Request::is('admin/faq/edit/*')) active @endif" href="{{ route('faq.index') }}">All FAQ</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Strategic Plan -->
                                        @php
                        $isStrategicPlan = Request::is('admin/strategic-plans/create') || Request::is('admin/strategic-plans') || Request::is('admin/strategic-plans/edit/*');
                    @endphp
                    <li class="nav-item @if($isStrategicPlan) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#strategicplan" aria-expanded="@if($isStrategicPlan) true @else false @endif" aria-controls="strategicplan">
                            <span class="menu-title">Strategic Plan</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file-chart menu-icon"></i>
                        </a>
                        <div class="collapse @if($isStrategicPlan) show @endif" id="strategicplan">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/strategic-plans/create')) active @endif" href="{{ route('strategic_plans.create') }}">Add Strategic Plan</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/strategic-plans') || Request::is('admin/strategic-plans/edit/*')) active @endif" href="{{ route('strategic_plans.index') }}">All Strategic Plans</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Volunteers -->
                                        @php
                        $isVolunteers = Request::is('admin/volunteers/add') || Request::is('admin/volunteers/index') || Request::is('admin/volunteers/edit/*');
                    @endphp
                    <li class="nav-item @if($isVolunteers) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#volunteers" aria-expanded="@if($isVolunteers) true @else false @endif" aria-controls="volunteers">
                            <span class="menu-title">Volunteers</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-account-heart menu-icon"></i>
                        </a>
                        <div class="collapse @if($isVolunteers) show @endif" id="volunteers">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/volunteers/add')) active @endif" href="{{ route('volunteers.add') }}">Add Opportunity</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/volunteers/index') || Request::is('admin/volunteers/edit/*')) active @endif" href="{{ route('volunteers.index') }}">All Opportunities</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- User Message -->
                                        @php
                        $isMessage = Request::is('admin/message/index') || Request::is('admin/message/view/*');
                    @endphp
                    <li class="nav-item @if($isMessage) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#usermessage" aria-expanded="@if($isMessage) true @else false @endif" aria-controls="usermessage">
                            <span class="menu-title">User Message</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-email menu-icon"></i>
                        </a>
                        <div class="collapse @if($isMessage) show @endif" id="usermessage">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/message/index') || Request::is('admin/message/view/*')) active @endif" href="{{ route('message.index') }}">All Message</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Partners & Donor -->
                                        @php
                        $isPartner = Request::is('admin/partner/create') || Request::is('admin/partner/index') || Request::is('admin/partner/edit/*');
                    @endphp
                    <li class="nav-item @if($isPartner) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#partners" aria-expanded="@if($isPartner) true @else false @endif" aria-controls="partners">
                            <span class="menu-title">Partners & Donor</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-handshake menu-icon"></i>
                        </a>
                        <div class="collapse @if($isPartner) show @endif" id="partners">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/partner/create')) active @endif" href="{{ route('partner.create') }}">Add Partners & Donor</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/partner/index') || Request::is('admin/partner/edit/*')) active @endif" href="{{ route('partner.index') }}">All Partners & Donor</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Project Archive -->
                                        @php
                        $isArchive = Request::is('admin/project/archive/create') || Request::is('admin/project/archive/index') || Request::is('admin/project/archive/edit/*');
                    @endphp
                    <li class="nav-item @if($isArchive) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#archive" aria-expanded="@if($isArchive) true @else false @endif" aria-controls="archive">
                            <span class="menu-title">Project Archive</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-archive menu-icon"></i>
                        </a>
                        <div class="collapse @if($isArchive) show @endif" id="archive">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/project/archive/create')) active @endif" href="{{ route('project.archive.create') }}">Add Project</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/project/archive/index') || Request::is('admin/project/archive/edit/*')) active @endif" href="{{ route('project.archive.index') }}">All Project</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Policy and Guideline -->
                                        @php
                        $isPolicy = Request::is('admin/policy/create') || Request::is('admin/policy/index') || Request::is('admin/policy/edit/*');
                    @endphp
                    <li class="nav-item @if($isPolicy) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#policy" aria-expanded="@if($isPolicy) true @else false @endif" aria-controls="policy">
                            <span class="menu-title">Policy and Guideline</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                        </a>
                        <div class="collapse @if($isPolicy) show @endif" id="policy">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/policy/create')) active @endif" href="{{ route('policy.create') }}">Add Policy and Guideline</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/policy/index') || Request::is('admin/policy/edit/*')) active @endif" href="{{ route('policy.index') }}">All Policy and Guideline</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Publication -->
                                        @php
                        $isPublications = Request::is('admin/publications/add') || Request::is('admin/publications/index') || Request::is('admin/publications/edit/*');
                    @endphp
                    <li class="nav-item @if($isPublications) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#publications" aria-expanded="@if($isPublications) true @else false @endif" aria-controls="publications">
                            <span class="menu-title">Publication</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                        </a>
                        <div class="collapse @if($isPublications) show @endif" id="publications">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/publications/add')) active @endif" href="{{ route('publications.add') }}">Add Publication</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/publications/index') || Request::is('admin/publications/edit/*')) active @endif" href="{{ route('publications.index') }}">All Publications</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Career -->
                                        @php
                        $isCareer = Request::is('admin/invoked/create') || Request::is('admin/invoked/index') || Request::is('admin/invoked/edit/*');
                    @endphp
                    <li class="nav-item @if($isCareer) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#career" aria-expanded="@if($isCareer) true @else false @endif" aria-controls="career">
                            <span class="menu-title">Career</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-briefcase-outline menu-icon"></i>
                        </a>
                        <div class="collapse @if($isCareer) show @endif" id="career">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/invoked/create')) active @endif" href="{{ route('invoked.create') }}">Add Career</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/invoked/index') || Request::is('admin/invoked/edit/*')) active @endif" href="{{ route('invoked.index') }}">All Career</a></li>
                            </ul>
                        </div>
                    </li>

                    <!-- Contact -->
                                        @php
                        $isContact = Request::is('admin/contact/add') || Request::is('admin/contact/index') || Request::is('admin/contact/edit/*');
                    @endphp
                    <li class="nav-item @if($isContact) active @endif">
                        <a class="nav-link" data-bs-toggle="collapse" href="#contact" aria-expanded="@if($isContact) true @else false @endif" aria-controls="contact">
                            <span class="menu-title">Contact</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-phone menu-icon"></i>
                        </a>
                        <div class="collapse @if($isContact) show @endif" id="contact">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/contact/add')) active @endif" href="{{ route('contact.add') }}">Add Contact</a></li>
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/contact/index') || Request::is('admin/contact/edit/*')) active @endif" href="{{ route('contact.index') }}">All Contact</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                
                <!-- Footer -->
                <footer class="footer">
                    <div class="d-flex justify-content-center">
                        <span class="text-muted text-center">
                            Copyright © {{ date('Y') }} BMS. All rights reserved.
                        </span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg" style="border-radius: 15px; border: none;">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-center mt-3" id="deleteConfirmModalLabel">
                        <div class="d-flex flex-column align-items-center">
                            <div class="rounded-circle bg-danger bg-opacity-10 p-3 mb-3">
                                <i class="mdi mdi-delete-forever text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <h4 class="mb-0">Are you sure?</h4>
                        </div>
                    </h5>
                </div>
                <div class="modal-body text-center px-4 pb-2">
                    <p class="text-muted mb-0">Do you really want to delete this item?</p>
                    <p class="text-muted mb-0">This action cannot be undone.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal" style="border-radius: 25px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger px-4" id="confirmDeleteBtn" style="border-radius: 25px;">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Toast Notification -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11000;">
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius: 10px;">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="mdi mdi-check-circle me-2"></i>
                    <span id="toastMessage">@if(session('success')){{ session('success') }}@else Item deleted successfully! @endif</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- Plugins JS -->
    <script src="{{ asset('admin-assets/vendors/js/vendor.bundle.base.js') }}"></script>
    
    <!-- Plugin JS for this page -->
    <script src="{{ asset('admin-assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    
    <!-- Inject JS -->
    <script src="{{ asset('admin-assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin-assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin-assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin-assets/js/todolist.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery.cookie.js') }}"></script>
    
    <!-- Global delete confirmation modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let deleteUrl = '';
            const deleteModalElement = document.getElementById('deleteConfirmModal');
            const deleteModal = new bootstrap.Modal(deleteModalElement);
            const successToastElement = document.getElementById('successToast');
            const successToast = new bootstrap.Toast(successToastElement);
            
            // Handle all delete links with delete-confirm class
            document.addEventListener('click', function(e) {
                const deleteLink = e.target.closest('.delete-confirm');
                if (deleteLink) {
                    e.preventDefault();
                    e.stopPropagation();
                    deleteUrl = deleteLink.href;
                    deleteModal.show();
                    return false;
                }
            });
            
            // Handle confirm delete button
            document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
                if (deleteUrl) {
                    // Hide the modal first
                    deleteModal.hide();
                    
                    // Redirect to delete URL
                    window.location.href = deleteUrl;
                }
            });
            
            // Reset deleteUrl when modal is closed
            deleteModalElement.addEventListener('hidden.bs.modal', function() {
                deleteUrl = '';
            });
            
            // Show success toast if delete was successful (check for success message in session)
            @if(session('success'))
                successToast.show();
            @endif
        });
    </script>
    
    @stack('scripts')
</body>
</html>
