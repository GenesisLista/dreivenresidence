<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('public/images/favicon.ico') }}" type="image/x-icon"> <!-- Favicon-->
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">

    @yield('meta')
    @stack('before-styles')
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap/css/bootstrap.min.css') }}">
    @stack('after-styles')
    @if (trim($__env->yieldContent('page-styles')))
    @yield('page-styles')
    @endif

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('public/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/theme1.css') }}">
</head>

<body class="font-montserrat">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
        </div>
    </div>

    <div id="main_content">

        @include('layouts.headertop')
        @include('layouts.rightbar')
        @include('layouts.userdiv')
        @include('layouts.sidebar')

        <div class="page">
            @include('layouts.page_header')

            @yield('content')

            @include('layouts.footer')
        </div>

    </div>

    <script src="{{ asset('public/bundles/lib.vendor.bundle.js') }}"></script>

    <script src="{{ asset('public/bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('public/bundles/counterup.bundle.js') }}"></script>
    <script src="{{ asset('public/bundles/knobjs.bundle.js') }}"></script>
    <script src="{{ asset('public/bundles/c3.bundle.js') }}"></script>

    <script src="{{ asset('public/js/core.js') }}"></script>
    <script src="{{ asset('public/js/page/index.js') }}"></script>
</body>

</html>