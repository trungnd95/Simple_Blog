 <!DOCTYPE html>
 <html>
 @include('admin.partials.head')
 <body class="hold-transition login-page">
 	<div class="login-box">
 		<div class="login-logo">
 			<a href="#">Login</a>
 		</div><!-- /.login-logo -->
 		<div class="login-box-body">
 			<p class="login-box-msg">Reset Password</p>
 			
 			<form method="post" action="{{url('password/email')}}">
 				{!! csrf_field() !!}
 				<div class="form-group has-feedback">
 					<input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" >
 					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
 				</div>
 				<div class="row">
 					<div class="col-xs-12">
 						<button type="submit" class="btn btn-primary btn-block btn-flat">Send Password Reset Link</button>
 					</div>    
 				</div>
 			</form>

 		</div>
 	</div><!-- /.login-box -->

 	@include('admin.partials.script')
 </body>
 </html>
