<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css"   >
    <style>
    .selectize-input>.item{
        background: #1b9dec !important;
        background: #f9c244 !important;
        border-radius: 4px ;
        color: white !important;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


  @yield('content')

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('node_modules/selectize/dist/js/selectize.js') }}"></script>

  @yield('scripts')

</body>
</html>
