<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Remitty | Auth</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet">
    <style>
        html{height:100%;}

        .cart-header {
            background-color:#35eb1d !important;
            height:100px;
        }
    </style>
    @yield('stylesheet')
</head>
<body style="height:100%; background-color:#00007f;">
    <div class="loader-container">
         <div class="sk-spinner sk-spinner-pulse"></div>
    </div>
    <div id="app" style="padding-top:100px;margin-bottom:100px;">

        @yield('content')

    </div>

    @yield('script')
    <script src={{asset("assets/js/jquery.min.js")}}></script>
    <script>
      window.onload = function () {
          setTimeout(function () {
              $('.loader-container').fadeOut('slow');
          }, 100);
      }
    </script>
</body>
</html>
