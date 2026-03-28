<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/application/951510main_logo.png') }}" type="image/x-icon">
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    {{-- Template CSS --}}
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/style.css') }}?v={{ time() }}">
    
    {{-- Text Formatting Styles for Rich Content --}}
    <style>
        /* Ensure text formatting from rich editor displays correctly */
        b, strong {
            font-weight: 700 !important;
        }
        
        em, i {
            font-style: italic !important;
        }
        
        u {
            text-decoration: underline !important;
        }
        
        mark, .mark, .highlight {
            background-color: #fff3cd;
            padding: 2px 4px;
            border-radius: 2px;
        }
        
        /* Ensure lists display properly */
        ul, ol {
            margin-bottom: 1rem;
            padding-left: 2rem;
        }
        
        li {
            margin-bottom: 0.5rem;
        }
        
        /* Paragraph spacing */
        p {
            margin-bottom: 1rem;
        }
        
        /* Color text support */
        span[style*="color"] {
            display: inline;
        }
        
        /* Summernote content styling */
        .note-editable b,
        .note-editable strong {
            font-weight: 700 !important;
        }
        
        .note-editable em,
        .note-editable i {
            font-style: italic !important;
        }
        
        .note-editable u {
            text-decoration: underline !important;
        }
        
        /* Ensure inline styles from rich editor work */
        [style*="font-weight"] {
            font-weight: inherit !important;
        }
        
        /* Description content - ensure all formatting is shown */
        div[style*="color"],
        p[style*="color"],
        span[style*="color"] {
            color: inherit !important;
        }
    </style>
    
    {{-- Boxicons for Impact and other admin-selected icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    {{-- Custom CSS overrides --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    
    @stack('css')
</head>
<body class="{{ request()->is('/') ? 'home' : '' }}">
    @include('header')

        @yield('content')

    @include('footer')

    {{-- loader --}}
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    {{-- Template JS --}}
    <script src="{{ asset('frontend-assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/aos.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('frontend-assets/js/main.js') }}"></script>

    @stack('js')

</body>
</html>
