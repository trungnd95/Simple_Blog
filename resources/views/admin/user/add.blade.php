@extends ('admin.layout.master')

@section('head.title','Authors Manage')

@section('body.headTitle','Add author')

@section('body.content')
<div class="row">
		<div class="col-lg-12">
			<form action="{{route('admin.user.add')}}" method="POST"  enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group">
		                  <label for="name">Name <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required />
		                </div>
		             
		                <div class="form-group">
		                  <label for="Email">Email</label>
		                  <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="form-control" />
		                </div>  

		                <div class="form-group">
		                  <label for="password">Password</label>
		                  <input type="password" name="password" placeholder="Password..." value="{{ old('password') }}" class="form-control" />
		                </div>  
						
						<div class="form-group">
		                  <label for="avatar">Avatar</label>
		                  <input type="file" name="avatar"   class="form-control" />
		                </div>  
					 
						<!-- Multiple Radios -->
						<div class="form-group">
							<label class="col-md-4 control-label" for="radios">Role</label>
							<div class="col-md-4">
								<div class="radio">
									<label for="radios-0">
										<input type="radio" name="radios" id="radios-0" value="admin" checked="checked">Admin
									</label>
								</div>
								<div class="radio">
									<label for="radios-1">
										<input type="radio" name="radios" id="radios-1" value="user">User
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
	                	<button type="submit" class="btn btn-primary">Add</button>
	                	<button type="reset" class="btn btn-danger">Reset</button>
	                </div>
					<!-- /.box-body -->
				</div> 
			</form> 
		</div>
	</div>
@endsection 