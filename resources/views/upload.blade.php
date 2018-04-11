


<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elefante</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front.css') }}" rel="stylesheet" type="text/css"   >
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" type="text/css"   >

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

<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>


<!--
  DO NOT SIMPLY COPY THOSE LINES. Download the JS and CSS files from the
  latest release (https://github.com/enyo/dropzone/releases/latest), and
  host them yourself!
{{ asset('js/dropzone.js') }}
-->
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">


<p>
  This is the most minimal example of Dropzone. The upload in this example
  doesn't work, because there is no actual server to handle the file upload.
</p>

<!-- Change /upload-target to your upload address -->
<form action="/upload-target" class="dropzone"></form>


<div id="app"></div>


<script src="/js/app.js"></script>
<script src="/js/dropzone.js"></script>
<!-- <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script> -->
<!-- <script src="{{ asset('js/selectize.js') }}"></script> -->

<script>

    Dropzone.options.myDropzone = {
        // paramName: 'file',
        // maxFilesize: 5, // MB
        // maxFiles: 20,
        // acceptedFiles: ".jpeg,.jpg,.png,.gif",
        // init: function() {
        //     this.on("success", function(file, response) {
        //         var a = document.createElement('span');
        //         a.className = "thumb-url btn btn-primary";
        //         a.setAttribute('data-clipboard-text','{{url('/uploads')}}'+'/'+response);
        //         a.innerHTML = "copy url";
        //         file.previewTemplate.appendChild(a);
        //     });
        // }
    };
</script>
</body>
</html>
