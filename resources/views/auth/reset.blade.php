<!DOCTYPE html>
<html>
@include('admin.partials.head')
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#">Login</a>
    </div><!-- /.login-logo -->
    @include('admin.partials.errors')
    <div class="login-box-body">
      <p class="login-box-msg">Reset Password</p>
      
      <form method="post" action="{{url('password/reset')}}">
        {!! csrf_field() !!}
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Confirmation Password" name="password_confirmation">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" name="remember" value="1"> Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng Nhập</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
  </div><!-- /.login-box -->

  @include('admin.partials.script')
</body>
</html>