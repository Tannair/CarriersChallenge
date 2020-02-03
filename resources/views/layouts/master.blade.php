<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title_prefix', config('adminlte.title_prefix', ''))
    @yield('title', config('adminlte.title', 'AdminLTE 3'))
    @yield('title_postfix', config('adminlte.title_postfix', ''))</title>
    @if(! config('adminlte.enabled_laravel_mix'))
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/plugins/datatables/jquery.dataTables.min.css')}}">

    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
    @include('adminlte::plugins', ['type' => 'css'])

    @yield('adminlte_css_pre')

    @yield('adminlte_css')

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>
@guest @yield('content') @else
    <body class="hold-transition">
    <div class="tab1-loading overlay"></div>
    <div class="tab1-loading loading-img"></div>
    <div class="wrapper">
        <!-- Header -->
    @include('layouts.header')
    <!-- Sidebar -->
    @include('layouts.sidebar') @yield('content')
    <!-- Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->
    </body>

@endguest

@yield('javascript')
{{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

{{--@if(! config('adminlte.enabled_laravel_mix'))
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    @include('adminlte::plugins', ['type' => 'js'])

    @yield('adminlte_js')
@else
    <script src="{{ asset('js/funcionarios.js') }}"></script>
@endif--}}

</html>
