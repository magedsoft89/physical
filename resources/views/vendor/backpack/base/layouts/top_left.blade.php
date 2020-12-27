<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" dir="{{ config('backpack.base.html_direction') }}">

<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Playfair+Display:wght@400;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css')}}">

    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css')}}">

    <link rel="stylesheet" href="{{ asset('css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @include(backpack_view('inc.head'))

</head>

<body class="{{ config('backpack.base.body_class') }}">

@include(backpack_view('inc.main_header'))

<div class="app-body">

    @include(backpack_view('inc.sidebar'))

    <main class="main pt-2">

        @yield('before_breadcrumbs_widgets')

        @includeWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'))

        @yield('after_breadcrumbs_widgets')

        @yield('header')

        <div class="container-fluid animated fadeIn">

            @yield('before_content_widgets')

            @yield('content')

            @yield('after_content_widgets')

        </div>

    </main>

</div><!-- ./app-body -->

<footer class="{{ config('backpack.base.footer_class') }}">
    @include(backpack_view('inc.footer'))
</footer>

@yield('before_scripts')
@stack('before_scripts')

@include(backpack_view('inc.scripts'))

@yield('after_scripts')
@stack('after_scripts')
</body>
</html>
