<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56950128-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-56950128-3');
  </script>

  <link rel="shortcut icon" href="{{{ asset('favicon.png') }}}">
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Elefante</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css"   >
  <link href="/css/dropzone.css" rel="stylesheet" type="text/css"   >
  
  <!-- Scripts -->
  <script src="/js/application.js"></script>
  <script src="/js/dropzone.js"></script>
  <script src="/js/charts.js"></script>
  
  @yield('header-scripts')
    <style>
    .selectize-input>.item{
        background: #1b9dec !important;
        background: #f9c244 !important;
        border-radius: 4px ;
        color: white !important;
    }
    .carta{
      padding:20px;
    }
    </style>
  @yield('style')
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  

  @yield('content')


  @yield('scripts')



</body>
</html>
