<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>

    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta content="initial-scale=1, shrink-to-fit=no, width=device-width" name="viewport">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i|Roboto+Mono:300,400,700|Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="{{ asset('material/css/material.css') }}" rel="stylesheet">
    <link href="{{ asset('catware/css/catware.css') }}" rel="stylesheet">

 </head>

 <body>

   @include('share.messages')
   @yield('content')

   <script src="{{ asset('material/js/jquery-3.2.1.slim.min.js') }}"></script>
   <script src="{{ asset('material/js/popper.min.js') }}"></script>
   <script src="{{ asset('material/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('material/js/material.min.js') }}"></script>

   <script>
      $(function () {
          $('[data-toggle="popover"]').popover()
      })
   </script>

 </body>

</html>
