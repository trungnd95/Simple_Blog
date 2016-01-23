@extends ('admin.layout.master')

@section('head.title','Authors Manage')

@section('body.headTitle')
List Author
<a href="{{route('admin.user.add')}}" class="btn btn-primary btn-success"><i class="fa fa-plus"></i> Add new</a>
@endsection

@section('body.content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body table-responsive no-padding">
				<form action="" method="POST" class="form-horizontal" role="form" id="form-index-author" enctype="multipart/form-data">
					{!! csrf_field() !!}
					<table class="table table-hover text-center">
						<tr>
							<th>STT</th>
							<th>Avatar</th>
							<th>Name</th>
							<th>Email</th>
							<th>Role</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php $stt = 1;?>

						@foreach($authors as $item)
						<tr class="author-data-{{$item->id}}">
							<td>{!! $stt !!}</td>
							<td> <img width="60" height="60" src="{{asset('public/upload/images/'.$item->avatar)}}" alt="Avatar"> </td>
							<td> {!! $item->name !!}</td>
							<td> {!! $item->email!!}</td>
							<td>{!! $item->role!!}</td>
							@if(\Auth::check())
								@if(\Auth::user()->role == 'admin')
									<td> <a href="{{route('admin.user.edit',[$item->id])}}" val="{{ $item->id}}" class="edit-author" >Edit</a></td>
									<td><a class="text-danger del-author-{{$item->id}} del-author" val="{{ $item->id}}" data-toggle="modal" href='#modal-id'>Delete</a></td>
								@elseif(\Auth::user()->id == $item->id && \Auth::user()->role == 'user')
									<td> <a href="{{route('admin.user.edit',[$item->id])}}" val="{{ $item->id}}" class="edit-author"  >Edit</a></td>
									<td><p class="disable text-danger del-author-{{$item->id}} del-author" val="{{ $item->id}}" >Delete</p></td>
								@else 
									<td> <p href="#" val="{{ $item->id}}">Edit</p></td>
									<td><p class=" text-danger del-author-{{$item->id}} del-author" val="{{ $item->id}}">Delete</p></td>
								@endif
							@endif
						</tr>
						<?php $stt++;?>
						@endforeach
					</table>

					<!-- Modal popup to confirm delete cat -->
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Delete Category</h4>
								</div>
								<div class="modal-body">
									<p>Are you sure?</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary confirm-del">Yes</button>
								</div>
							</div>
						</div>
					</div><!-- End model-->
				</form>
				
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>

@endsection 

