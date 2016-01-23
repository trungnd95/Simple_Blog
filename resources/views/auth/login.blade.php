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
			<p class="login-box-msg">Sign in to start your session</p>
			<form action="{{url('auth/login')}}" method="post">
				{!! csrf_field() !!}
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email" name="email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password"> 
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div><!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div><!-- /.col -->
				</div>
			</form>
			<a href="{{url('password/email')}}">I forgot my password</a><br>
		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

	
</body>
</html>
