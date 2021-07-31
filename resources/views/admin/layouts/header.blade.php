
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Auction</title>

  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
    @include('admin.layouts.nav')
    @include('admin.layouts.aside')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

<script src="{{asset('js/admin.js')}}"></script>
<!-- Page specific script -->
<script>
    @if(Session::has('message'))
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
  @endif
  function showcat(id){
 $('#modal-title').html($('#show_cat_'+id).data('name'));
 $('#selectedimage').attr('src','{{asset("frontend/category/")}}/'+$('#show_cat_'+id).data('img')+'.jpg');
 $('#modal-sm').modal('show');
}
</script>
</body>
</html>