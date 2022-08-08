<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Newsifier test</title>

    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .float-right {
        float: right;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
</head>
<body>
    
    @include('layouts.partials.navbar')

    <main class="container mt-5">
        @yield('content')
    </main>

    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    {{--<script src="../../../resources/js/simple-image.js"></script>--}}
    {{--<link href="../../../resources/css/simple-image.css" rel="stylesheet"/>--}}
    <script src="{!! url('assets/bootstrap/js/simple-image.js') !!}"></script>
{{--    <script src="{!! url('assets/bootstrap/css/simple-image.css') !!}"></script>--}}

    {{--<div id="editorjs"></div>--}}


    {{--<script>--}}
        {{--const editor = new EditorJS({--}}
            {{--autofocus: true--}}
        {{--});--}}
    {{--</script>--}}
  </body>
</html>
