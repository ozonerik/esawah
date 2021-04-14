<!-- jQuery -->
<script src="{{ asset('front/plugins/jquery/jquery.min.js') }}"></script>
<!-- https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<!-- https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js -->
<script src="{{ asset('front/dist/js/bootstrap.min.js') }}" ></script>
<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('front/plugins/toastr/toastr.min.js') }}"></script>
<!-- Show/Hide Password -->
<script src="{{ asset('front/plugins/showhidepswd/bootstrap-show-password.js') }}"></script>

@if(Session::has('message'))
<script>
  var type = "{{ Session::get('alert-type', 'info') }}";
  switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }
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

