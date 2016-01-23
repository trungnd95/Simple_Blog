<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('head.title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('public/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css')}}">

  <!-- Mycss -->
  <link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">

  <!-- CKEditor and CKFinder -->
  <script type="text/javascript" src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
  <script src="{{ url('public/admin/ckfinder/ckfinder.js') }}"></script>  
  <script type="text/javascript">
    var baseURL = "{{ url('/') }}";
  </script>
  <script src="{{ url('public/admin/func_ckfinder.js')}}"></script>
</head>