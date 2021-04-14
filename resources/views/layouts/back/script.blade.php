<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('back/plugins/toastr/toastr.min.js') }}"></script>
<!-- Show/Hide Password -->
<script src="{{ asset('front/plugins/showhidepswd/bootstrap-show-password.js') }}"></script>

@error('password')
<script>
toastr.error("{{ $message }}");
</script>
@enderror
                                
@if ($message = Session::get('success'))
<script>
toastr.success("{{ $message }}");
</script>
@endif

@if ($message = Session::get('info'))
<script>
toastr.info("{{ $message }}");
</script>
@endif

@if ($message = Session::get('warning'))
<script>
toastr.warning("{{ $message }}");
</script>
@endif

@if ($message = Session::get('error'))
<script>
toastr.error("{{ $message }}");
</script>
@endif

@if ($errors->any())
<script>
@foreach ($errors->all() as $error)
toastr.error("{{ $error }}");
@endforeach
</script>
@endif
@if (session('status'))
<script>
toastr.info("{{ session('status') }}");
</script>
@endif