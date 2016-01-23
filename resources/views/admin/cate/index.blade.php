@extends ('admin.layout.master')

@section('head.title','Category Manage')

@section('body.headTitle')
List Category
<a href="{{route('admin.cate.add')}}" class="btn btn-primary btn-success"><i class="fa fa-plus"></i> Add new</a>
@endsection

@section('body.content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body table-responsive no-padding">
				<form action="" method="POST" class="form-horizontal" role="form" id="form-index">
					{!! csrf_field() !!}
					<table class="table table-hover text-center">
						<tr>
							<th>STT</th>
							<th>Name</th>
							<th>Short Description</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php $stt = 1;?>
						@foreach($cates as $item)
						<tr class="td-data-{{$item->id}}">
							<td>{{ $stt }}</td>
							<td class="name-cate">{{ $item-> name}}</td>
							<td class="des-cate"> {{ $item->short_description}}</td>
							<td><a href="javascript:void(0)" class="edit-cat" val="{{ $item->id}}">Edit</a></td>
							<td><a class="text-danger del-cat-{{$item->id}} del-cat" val="{{ $item->id}}" data-toggle="modal" href='#modal-id'>Delete</a></td>
						</tr>
						<tr class="hidden form-edit-{{$item->id}}" >
							<td>{{ $stt }}</td>
							<td><input type="text" name="name_cat" value="{{ $item->name}}" class="form-control" /></td>
							<td><input type="text" name="des_cat" value="{{ $item->short_description}}" class="form-control" /></td>
							<td><a href="javascript:void(0)" class="save-edit-cat" val="{{ $item->id}}">Save</a></td>
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
										<p class="text-center">Are you sure?</p>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button type="button" class="btn btn-primary confirm-del" val="{{ $item->id}}">Yes</button>
									</div>
								</div>
							</div>
						</div><!-- End model-->
					
				</form>
				
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		@if ($cates->lastPage() > 1)
		<ul class="pagination" style="float:right; margin-top: -5px;">
			@if ($cates->currentPage() != 1)
			<li class="paginate_button previous">
				<a href="{{ str_replace('/?', '?', $cates->url($cates->currentPage() - 1)) }}">Previous</a>
			</li>
			@endif
			@for ($i = 1;  $i <= $cates->lastPage(); $i++)
			<li class="paginate_button {{ ($cates->currentPage() == $i) ? 'active' : '' }}">
				<a href="{{ str_replace('/?', '?', $cates->url($i)) }}">{{ $i }}</a>
			</li>
			@endfor
			@if ($cates->currentPage() != $cates->lastPage() &&  $cates->lastPage() > 1)
			<li class="paginate_button next"><a href="{{ str_replace('/?', '?', $cates->url($cates->currentPage() + 1)) }}">Next</a></li>
			@endif
		</ul>
		@endif
	</div>
</div>
@endsection 

