<!doctype html>
<html lang="en">
  <head>
    @include('layouts.front.style')
    <title>{{ config('app.name', 'Laravel') }}</title>
    @stack('styles')
  </head>
  <body class="text-center">
    @yield('content')
    @include('layouts.front.script')
    @stack('scripts')
  </body>
</html>
