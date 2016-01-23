<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
@include('admin.partials.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  @include('admin.partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include('admin.partials.navbar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="col-lg-12">
      @if(Session::has('flash_message'))
      <div class="alert alert-{{Session::get('flash_level')}}">
        {{Session::get('flash_message')}}
      </div>
      @endif
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('body.headTitle')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('admin.partials.errors')
      <!-- Your Page Content Here -->
      @yield('body.content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('admin.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('public/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('public/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/bower_components/AdminLTE/dist/js/app.min.js')}}"></script>
<!-- Myscript -->
<script src="{{asset('public/js/app.js')}}"></script>
<script> 
    $(document).ready(function(){
      $('.alert').delay(3000).slideUp();
    })
</script>
</body>
</html>
