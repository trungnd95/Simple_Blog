@extends ('admin.layout.master')

@section('head.title','Category Manage')

@section('body.headTitle','Add Category')

@section('body.content')
<div class="row">
		<div class="col-lg-12">
			<form action="{{route('admin.cate.add')}}" method="POST" >
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group">
		                  <label for="name">Name <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required />
		                </div>
		             
		                <div class="form-group">
		                  <label for="description">Description</label>
		                  <textarea class="form-control ckeditor" rows="6" placeholder="Description ..." name="description" id="description">{{ old('description') }}</textarea>

		                </div>  
					</div>
					<div class="box-footer">
	                	<button type="submit" class="btn btn-primary">Add New Category</button>
	                </div>
					<!-- /.box-body -->
				</div> 
			</form> 
		</div>
	</div>
@endsection 