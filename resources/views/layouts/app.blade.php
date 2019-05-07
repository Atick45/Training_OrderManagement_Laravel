<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Order Management') }}</title>
    
    
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login-assets/css/main.css') }}">
</head>
<body>

    


    @yield('content')






    <!-- footer section -->

    <div id="dropDownSelect1"></div>

    <script src="{{ asset('login-assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('login-assets/js/animsition.min.js')}}"></script>
    <script src="{{ asset('login-assets/js/popper.js')}}"></script>
    <script src="{{ asset('login-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('login-assets/js/select2.min.js')}}"></script>
    <script src="{{ asset('login-assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('login-assets/js/daterangepicker.js')}}"></script>
    <script src="{{ asset('login-assets/js/countdowntime.js')}}"></script>
    <script src="{{ asset('login-assets/js/main.js')}}"></script>
</body>
</html>
