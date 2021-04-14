    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ myapp()['description'] }}">
    <meta name="author" content="{{ myapp()['author'] }}">
    <meta name="generator" content="{{ myapp()['generator'] }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css-->
    <link rel="stylesheet" href="{{ asset('front/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('front/plugins/toastr/toastr.min.css') }}">
    <!-- front styles -->
    <link href="{{ asset('front/myfrontstyle.css') }}" rel="stylesheet">