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
    
    <!-- Dark Mode Styles -->
    <style>
        :root {
            --bg-primary: #ffffff;
            --bg-secondary: #f4f5f7;
            --bg-card: #ffffff;
            --text-primary: #343a40;
            --text-secondary: #6c757d;
            --border-color: #dee2e6;
            --card-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        [data-theme="dark"] {
            --bg-primary: #1a1d2e;
            --bg-secondary: #151824;
            --bg-card: #242939;
            --text-primary: #e0e6ed;
            --text-secondary: #98a6ad;
            --border-color: #2c3142;
            --card-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        [data-theme="dark"] body {
            background: var(--bg-secondary);
            color: var(--text-primary);
        }

        [data-theme="dark"] .container-scroller {
            background: var(--bg-secondary);
        }

        [data-theme="dark"] .navbar {
            background: var(--bg-card) !important;
            border-bottom: 1px solid var(--border-color);
        }

        [data-theme="dark"] .navbar-menu-wrapper {
            background: var(--bg-card) !important;
        }

        [data-theme="dark"] .sidebar {
            background: var(--bg-card) !important;
        }

        [data-theme="dark"] .card {
            background: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary);
        }

        [data-theme="dark"] .card-body {
            color: var(--text-primary);
        }

        [data-theme="dark"] .card-body > * {
            background-color: transparent;
        }

        [data-theme="dark"] .card-header {
            background: var(--bg-card) !important;
            border-color: var(--border-color) !important;
            color: var(--text-primary);
        }

        [data-theme="dark"] .card-footer {
            background: var(--bg-card) !important;
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .table {
            color: var(--text-primary);
            background: var(--bg-card);
            --bs-table-hover-bg: rgba(255, 255, 255, 0.05);
            --bs-table-hover-color: var(--text-primary);
            --bs-table-bg-state: transparent;
            --bs-table-color-state: var(--text-primary);
        }

        [data-theme="dark"] .table thead {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary);
        }

        [data-theme="dark"] .table thead th {
            background-color: var(--bg-secondary) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .table tbody {
            background-color: var(--bg-card) !important;
        }

        [data-theme="dark"] .table tbody td {
            background-color: var(--bg-card) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .table tbody tr {
            background-color: var(--bg-card) !important;
        }

        [data-theme="dark"] .table-hover tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] .table-hover tbody tr:hover td {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        /* Override ALL table row hover effects */
        [data-theme="dark"] table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] table tbody tr:hover td {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] .table tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] .table tbody tr:hover td {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(255, 255, 255, 0.02) !important;
        }

        [data-theme="dark"] .table-striped tbody tr:nth-of-type(odd) td {
            background-color: rgba(255, 255, 255, 0.02) !important;
        }

        [data-theme="dark"] .table-light {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: var(--text-primary);
        }

        [data-theme="dark"] .table-light th,
        [data-theme="dark"] .table-light td {
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: var(--text-primary) !important;
        }

        [data-theme="dark"] .text-muted {
            color: var(--text-secondary) !important;
        }

        [data-theme="dark"] .border,
        [data-theme="dark"] .table-bordered,
        [data-theme="dark"] .table-bordered td,
        [data-theme="dark"] .table-bordered th {
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .bg-light {
            background-color: rgba(255, 255, 255, 0.05) !important;
        }

        [data-theme="dark"] .form-control,
        [data-theme="dark"] .form-select {
            background-color: var(--bg-secondary);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        [data-theme="dark"] .form-control:focus,
        [data-theme="dark"] .form-select:focus {
            background-color: var(--bg-secondary);
            border-color: #4a90e2;
            color: var(--text-primary);
        }

        [data-theme="dark"] .modal-content {
            background-color: var(--bg-card);
            color: var(--text-primary);
        }

        [data-theme="dark"] .modal-header,
        [data-theme="dark"] .modal-footer {
            border-color: var(--border-color);
        }

        [data-theme="dark"] .page-header {
            background: transparent;
        }

        [data-theme="dark"] .breadcrumb {
            background: transparent;
        }

        [data-theme="dark"] .nav-link {
            color: var(--text-secondary);
        }

        [data-theme="dark"] .nav-link:hover {
            color: var(--text-primary);
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link {
            background: transparent !important;
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.25rem;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .theme-toggle:hover {
            transform: scale(1.1);
        }

        /* Sun icon in light mode - yellow */
        .theme-toggle .mdi-weather-sunny {
            color: #ffc107;
            filter: drop-shadow(0 0 3px rgba(255, 193, 7, 0.5));
        }

        /* Moon icon in dark mode - white */
        [data-theme="dark"] .theme-toggle .mdi-weather-night {
            color: #f8f9fa;
            filter: drop-shadow(0 0 3px rgba(248, 249, 250, 0.5));
        }

        [data-theme="dark"] .pending-donations-list::-webkit-scrollbar-track {
            background: var(--bg-secondary);
        }

        [data-theme="dark"] .pending-donations-list::-webkit-scrollbar-thumb {
            background: #555;
        }

        [data-theme="dark"] .page-title-icon {
            background: linear-gradient(to right, #4a90e2, #357abd) !important;
        }

        [data-theme="dark"] .bg-gradient-danger,
        [data-theme="dark"] .bg-gradient-info,
        [data-theme="dark"] .bg-gradient-success,
        [data-theme="dark"] .bg-gradient-warning,
        [data-theme="dark"] .bg-gradient-primary,
        [data-theme="dark"] .bg-gradient-secondary {
            opacity: 0.95;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link .menu-title {
            color: var(--text-primary);
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link .menu-icon {
            color: var(--text-secondary);
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active .nav-link .menu-icon {
            color: #fff;
        }

        [data-theme="dark"] h1, [data-theme="dark"] h2, [data-theme="dark"] h3, 
        [data-theme="dark"] h4, [data-theme="dark"] h5, [data-theme="dark"] h6 {
            color: var(--text-primary);
        }

        [data-theme="dark"] .card-title {
            color: var(--text-primary);
        }

        [data-theme="dark"] .badge.bg-light {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: var(--text-primary);
        }

        [data-theme="dark"] .page-body-wrapper {
            background: var(--bg-secondary);
        }

        [data-theme="dark"] .btn-outline-primary,
        [data-theme="dark"] .btn-outline-danger,
        [data-theme="dark"] .btn-outline-info {
            color: inherit;
        }

        [data-theme="dark"] .btn-outline-primary:hover,
        [data-theme="dark"] .btn-outline-danger:hover,
        [data-theme="dark"] .btn-outline-info:hover {
            color: #fff;
        }

        /* Brand Logo Area - Dark Mode */
        [data-theme="dark"] .navbar-brand-wrapper {
            background: var(--bg-card) !important;
            border-right: 1px solid var(--border-color);
        }

        [data-theme="dark"] .navbar-brand h3,
        [data-theme="dark"] .navbar-brand h5 {
            color: #e0e6ed !important;
        }

        /* Logo Styling */
        .navbar-brand-wrapper {
            padding: 0.5rem 0.5rem 0.5rem 0;
            justify-content: flex-start !important;
            text-align: left !important;
        }

        .brand-logo img,
        .brand-logo-mini img {
            max-height: 45px;
            width: auto;
            object-fit: contain;
            margin-left: 0;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            height: 100%;
            padding-left: 0;
        }

        .brand-logo-mini {
            display: flex;
            align-items: center;
            height: 100%;
            padding-left: 0;
        }

        .brand-logo-mini img {
            max-height: 32px;
        }

        /* Dark mode logo filter (optional - uncomment if logo needs inversion in dark mode) */
        /* [data-theme="dark"] .navbar-brand img {
            filter: brightness(0) invert(1);
        } */

        /* Sidebar Menu Highlighting - Dark Mode */
        [data-theme="dark"] .sidebar .nav .nav-item .nav-link {
            color: var(--text-secondary);
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link {
            background: transparent !important;
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link::before,
        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link::after {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link .menu-title {
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item.active > .nav-link .menu-icon {
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item:hover {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link:hover {
            background: transparent !important;
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link:hover::before,
        [data-theme="dark"] .sidebar .nav .nav-item .nav-link:hover::after {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link:hover .menu-title {
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .nav-link:hover .menu-icon {
            color: #4a90e2 !important;
        }

        /* Submenu styling */
        [data-theme="dark"] .sidebar .nav .nav-item .collapse .nav-link.active {
            background: transparent !important;
            color: #4a90e2 !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .collapse .nav-link {
            color: var(--text-secondary);
        }

        [data-theme="dark"] .sidebar .nav .nav-item .collapse .nav-link:hover {
            color: #4a90e2 !important;
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .collapse {
            background: transparent !important;
        }

        [data-theme="dark"] .sidebar .nav .nav-item .sub-menu {
            background: transparent !important;
        }

        /* Search functionality - no results message */
        [data-theme="dark"] .sidebar .nav .text-muted {
            color: var(--text-secondary) !important;
        }

        [data-theme="dark"] .sidebar .nav .text-muted i {
            font-size: 24px;
            opacity: 0.5;
        }

        /* Main Content Wrapper - Dark Mode */
        [data-theme="dark"] .main-panel {
            background: var(--bg-secondary) !important;
        }

        [data-theme="dark"] .content-wrapper {
            background: var(--bg-secondary) !important;
        }

        /* Remove white backgrounds from all containers */
        [data-theme="dark"] .container-fluid {
            background: transparent !important;
        }

        [data-theme="dark"] .row {
            background: transparent !important;
        }

        /* Ensure search field is dark */
        [data-theme="dark"] .search-field input {
            background-color: rgba(255, 255, 255, 0.1) !important;
            color: var(--text-primary) !important;
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .search-field input::placeholder {
            color: var(--text-secondary) !important;
        }

        [data-theme="dark"] .input-group-text {
            background-color: transparent !important;
            color: var(--text-secondary) !important;
            border-color: var(--border-color) !important;
        }

        /* Pagination */
        [data-theme="dark"] .pagination .page-item .page-link {
            background-color: var(--bg-card);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        [data-theme="dark"] .pagination .page-item.active .page-link {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }

        [data-theme="dark"] .pagination .page-item .page-link:hover {
            background-color: rgba(74, 144, 226, 0.2);
            color: var(--text-primary);
        }

        /* Alerts */
        [data-theme="dark"] .alert {
            background-color: var(--bg-card);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        /* Dropdown menus */
        [data-theme="dark"] .dropdown-menu {
            background-color: var(--bg-card);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .dropdown-item {
            color: var(--text-primary);
        }

        [data-theme="dark"] .dropdown-item:hover {
            background-color: rgba(74, 144, 226, 0.2);
            color: var(--text-primary);
        }

        /* Footer if exists */
        [data-theme="dark"] footer {
            background-color: var(--bg-card) !important;
            color: var(--text-primary);
        }

        /* Remove any remaining white backgrounds */
        [data-theme="dark"] .bg-white {
            background-color: var(--bg-card) !important;
        }

        [data-theme="dark"] .stretch-card,
        [data-theme="dark"] .grid-margin {
            background: transparent !important;
        }

        [data-theme="dark"] .card-img-holder {
            background: transparent;
        }

        /* Col elements should be transparent */
        [data-theme="dark"] [class*="col-"] {
            background: transparent !important;
        }

        /* List groups */
        [data-theme="dark"] .list-group-item {
            background-color: var(--bg-card);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        /* Navbar toggler buttons */
        [data-theme="dark"] .navbar-toggler {
            color: var(--text-primary);
            border-color: var(--border-color);
        }

        [data-theme="dark"] .navbar-toggler .mdi {
            color: var(--text-primary);
        }

        /* Breadcrumbs */
        [data-theme="dark"] .breadcrumb-item,
        [data-theme="dark"] .breadcrumb-item a {
            color: var(--text-secondary);
        }

        [data-theme="dark"] .breadcrumb-item.active {
            color: var(--text-primary);
        }

        /* Page title */
        [data-theme="dark"] .page-title {
            color: var(--text-primary);
        }

        /* Ensure all text inputs maintain dark styling */
        [data-theme="dark"] input[type="text"],
        [data-theme="dark"] input[type="email"],
        [data-theme="dark"] input[type="password"],
        [data-theme="dark"] input[type="number"],
        [data-theme="dark"] input[type="date"],
        [data-theme="dark"] textarea,
        [data-theme="dark"] select {
            background-color: var(--bg-secondary);
            border-color: var(--border-color);
            color: var(--text-primary);
        }

        /* Table responsive wrapper */
        [data-theme="dark"] .table-responsive {
            background-color: transparent !important;
        }

        [data-theme="dark"] .table-responsive.border {
            background-color: transparent !important;
        }

        [data-theme="dark"] .table-responsive.rounded {
            background-color: transparent !important;
        }

        [data-theme="dark"] .table-responsive.p-4 {
            background-color: transparent !important;
        }

        /* Remove any white borders or backgrounds from table containers */
        [data-theme="dark"] .p-4.border,
        [data-theme="dark"] .border.rounded {
            background-color: transparent !important;
        }

        [data-theme="dark"] .p-4.border.rounded {
            background-color: transparent !important;
        }

        [data-theme="dark"] .p-4.border.rounded.table-responsive {
            background-color: transparent !important;
        }

        /* Ensure table wrapper divs are dark */
        [data-theme="dark"] div.table-responsive,
        [data-theme="dark"] div.p-4 {
            background-color: transparent !important;
        }

        /* Card header backgrounds */
        [data-theme="dark"] .card-header.bg-white {
            background: var(--bg-card) !important;
        }

        /* Table bordered cells */
        [data-theme="dark"] .table-bordered thead th,
        [data-theme="dark"] .table-bordered thead td,
        [data-theme="dark"] .table-bordered tbody th,
        [data-theme="dark"] .table-bordered tbody td {
            background-color: var(--bg-card) !important;
        }

        /* Override any remaining white/light classes */
        [data-theme="dark"] .bg-white,
        [data-theme="dark"] .bg-light,
        [data-theme="dark"] .bg-transparent {
            background-color: transparent !important;
        }

        /* Specifically target table cells to remove white backgrounds */
        [data-theme="dark"] td,
        [data-theme="dark"] th {
            background-color: inherit !important;
        }

        /* Wrapper divs that might have white backgrounds */
        [data-theme="dark"] .p-4,
        [data-theme="dark"] .p-3,
        [data-theme="dark"] .p-2,
        [data-theme="dark"] .p-1 {
            background-color: transparent;
        }

        /* Border class overrides */
        [data-theme="dark"] .border {
            border-color: var(--border-color) !important;
        }

        [data-theme="dark"] .rounded,
        [data-theme="dark"] .rounded-1,
        [data-theme="dark"] .rounded-2,
        [data-theme="dark"] .rounded-3 {
            background-color: transparent;
        }

        /* Catch all for any remaining white backgrounds */
        [data-theme="dark"] div:not(.card):not(.modal-content):not(.btn) {
            background-color: transparent;
        }

        /* Specific for table wrappers with both border and rounded classes */
        [data-theme="dark"] .border.rounded {
            background-color: transparent !important;
        }

        [data-theme="dark"] .p-4.border.rounded {
            background-color: transparent !important;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            @php
                $app = application();
                $logoPath = !empty($app->main_logo) ? 'images/application/' . $app->main_logo : 'img/logo.png';
            @endphp
            <div class="navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}">
                    <img src="{{ asset($logoPath) }}" alt="Logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ route('admin.home') }}">
                    <img src="{{ asset($logoPath) }}" alt="Logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <div class="search-field d-none d-md-block">
                    <form class="d-flex align-items-center h-100" action="#" onsubmit="return false;">
                        <div class="input-group">
                            <div class="input-group-prepend bg-transparent">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" id="menuSearch" class="form-control bg-transparent border-0" placeholder="Search menu..." autocomplete="off">
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav navbar-nav-right">                    <!-- Dark Mode Toggle -->
                    <li class="nav-item d-none d-lg-block me-2">
                        <a class="nav-link theme-toggle" href="javascript:void(0)" id="themeToggle" title="Toggle Dark Mode">
                            <i class="mdi mdi-weather-sunny" id="themeIcon"></i>
                        </a>
                    </li>
                    <!-- Logout -->                    <li class="nav-item nav-logout d-none d-lg-block">
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
                        $isSubscribe = Request::is('admin/subscribe');
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
                        $isStrategicPlan = Request::is('admin/strategic-plans/create') || Request::is('admin/strategic-plans/index') || Request::is('admin/strategic-plans/edit/*');
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
                                <li class="nav-item"> <a class="nav-link @if(Request::is('admin/strategic-plans/index') || Request::is('admin/strategic-plans/edit/*')) active @endif" href="{{ route('strategic_plans.index') }}">All Strategic Plans</a></li>
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

    <!-- Toast Notifications -->
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 11000;">
        <!-- Success Toast -->
        @if(session('success') || session('update'))
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius: 10px;">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="mdi mdi-check-circle me-2"></i>
                    <span>{{ session('success') ?? session('update') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif

        <!-- Error Toast -->
        @if(session('error'))
        <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true" style="border-radius: 10px;">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="mdi mdi-alert-circle me-2"></i>
                    <span>{{ session('error') }}</span>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
        @endif
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
            
            // Initialize toasts
            @if(session('success') || session('update'))
                const successToastElement = document.getElementById('successToast');
                const successToast = new bootstrap.Toast(successToastElement, {
                    autohide: true,
                    delay: 3000
                });
                successToast.show();
            @endif

            @if(session('error'))
                const errorToastElement = document.getElementById('errorToast');
                const errorToast = new bootstrap.Toast(errorToastElement, {
                    autohide: true,
                    delay: 4000
                });
                errorToast.show();
            @endif
            
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
        });
    </script>

    <!-- Dark Mode Toggle Script -->
    <script>
        (function() {
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const htmlElement = document.documentElement;
            
            // Check for saved theme preference or default to 'light' mode
            const currentTheme = localStorage.getItem('theme') || 'light';
            htmlElement.setAttribute('data-theme', currentTheme);
            updateIcon(currentTheme);
            
            // Theme toggle handler
            themeToggle.addEventListener('click', function() {
                let theme = htmlElement.getAttribute('data-theme');
                
                if (theme === 'light') {
                    htmlElement.setAttribute('data-theme', 'dark');
                    localStorage.setItem('theme', 'dark');
                    updateIcon('dark');
                } else {
                    htmlElement.setAttribute('data-theme', 'light');
                    localStorage.setItem('theme', 'light');
                    updateIcon('light');
                }
            });
            
            function updateIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.classList.remove('mdi-weather-sunny');
                    themeIcon.classList.add('mdi-weather-night');
                    themeToggle.setAttribute('title', 'Switch to Light Mode');
                } else {
                    themeIcon.classList.remove('mdi-weather-night');
                    themeIcon.classList.add('mdi-weather-sunny');
                    themeToggle.setAttribute('title', 'Switch to Dark Mode');
                }
            }
        })();
    </script>

    <!-- Menu Search Functionality -->
    <script>
        (function() {
            const searchInput = document.getElementById('menuSearch');
            const sidebar = document.getElementById('sidebar');
            
            if (searchInput && sidebar) {
                const menuItems = sidebar.querySelectorAll('.nav-item');
                let noResultsMsg = null;
                
                // Store original expanded state of each menu
                const originalExpandedState = new Map();
                menuItems.forEach(function(item) {
                    const collapseElement = item.querySelector('.collapse');
                    if (collapseElement) {
                        originalExpandedState.set(item, collapseElement.classList.contains('show'));
                    }
                });
                
                searchInput.addEventListener('input', function(e) {
                    const searchTerm = e.target.value.toLowerCase().trim();
                    let hasResults = false;
                    
                    menuItems.forEach(function(item) {
                        const menuTitle = item.querySelector('.menu-title');
                        const subMenuLinks = item.querySelectorAll('.sub-menu .nav-link');
                        
                        if (menuTitle) {
                            const titleText = menuTitle.textContent.toLowerCase();
                            let showItem = false;
                            let mainMenuMatches = false;
                            
                            // Check if main menu title matches
                            if (titleText.includes(searchTerm)) {
                                showItem = true;
                                mainMenuMatches = true;
                            }
                            
                            // Check if any submenu item matches
                            let hasMatchingSubmenu = false;
                            subMenuLinks.forEach(function(link) {
                                const linkText = link.textContent.toLowerCase();
                                
                                if (searchTerm === '') {
                                    // No search term: show all submenus
                                    link.parentElement.style.display = '';
                                } else if (mainMenuMatches) {
                                    // Main menu matches: show ALL submenus regardless of their text
                                    link.parentElement.style.display = '';
                                    hasMatchingSubmenu = true;
                                } else if (linkText.includes(searchTerm)) {
                                    // Main menu doesn't match, but this submenu does
                                    showItem = true;
                                    hasMatchingSubmenu = true;
                                    link.parentElement.style.display = '';
                                } else {
                                    // Main menu doesn't match and this submenu doesn't match
                                    link.parentElement.style.display = 'none';
                                }
                            });
                            
                            // Show/hide the menu item
                            if (showItem || searchTerm === '') {
                                item.style.display = '';
                                hasResults = true;
                                
                                const collapseElement = item.querySelector('.collapse');
                                if (collapseElement) {
                                    if (searchTerm !== '') {
                                        // During search: expand if main menu or submenu matches
                                        if (mainMenuMatches || hasMatchingSubmenu) {
                                            collapseElement.classList.add('show');
                                        }
                                    } else {
                                        // Search cleared: restore original state
                                        const wasOriginallyExpanded = originalExpandedState.get(item);
                                        if (wasOriginallyExpanded) {
                                            collapseElement.classList.add('show');
                                        } else {
                                            collapseElement.classList.remove('show');
                                        }
                                    }
                                }
                            } else {
                                item.style.display = 'none';
                            }
                        }
                    });
                    
                    // Show/hide "no results" message
                    if (!hasResults && searchTerm !== '') {
                        if (!noResultsMsg) {
                            noResultsMsg = document.createElement('div');
                            noResultsMsg.className = 'text-center text-muted py-4 px-3';
                            noResultsMsg.style.fontSize = '14px';
                            noResultsMsg.innerHTML = '<i class="mdi mdi-magnify-close"></i><br>No menu items found';
                            sidebar.querySelector('.nav').appendChild(noResultsMsg);
                        }
                        noResultsMsg.style.display = 'block';
                    } else {
                        if (noResultsMsg) {
                            noResultsMsg.style.display = 'none';
                        }
                    }
                });
                
                // Clear search on escape key
                searchInput.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        e.target.value = '';
                        e.target.dispatchEvent(new Event('input'));
                        e.target.blur();
                    }
                });
            }
        })();
    </script>
    
    @stack('scripts')
</body>
</html>
