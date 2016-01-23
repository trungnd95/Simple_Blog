@extends ('admin.layout.master')

@section('head.title','Articles Manage')

@section('body.headTitle','Add article')

@section('body.content')
<div class="row">
		<div class="col-lg-12">
			<form action="{{route('admin.article.add')}}" method="POST" >
				{!! csrf_field() !!}
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group">
		                  <label for="title">Title <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="title" name="title" id="title" value="{{ old('title') }}" required />
		                </div>
		             
		                <div class="form-group">
		                  <label for="content">Content</label>
		                  <textarea name="content" placeholder="Cotent ..."  class="form-control ckeditor" >{{ old('content') }}</textarea>
		                </div>  
						
		                <!-- Select Basic -->
		                <div class="form-group">
		                <label class="col-md-2 control-label" for="selectbasic">Category</label>
		                	<div class="col-md-4">
		                		<select id="selectbasic" name="category" class="form-control">
		                			<option value="">Select Category</option>}
		                		
		                			<?php 
		                				$cates = Simple_Blog\Cate::select('id','name')->get();
		                			?>
		                			@foreach($cates as $item)
		                			<option value="{!! $item->id !!}">{{$item->name}}</option>
		                			@endforeach
		                		</select>
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