@extends ('admin.layout.master')

@section('head.title','Articles Manage')

@section('body.headTitle')
List Articles
<a href="{{route('admin.article.add')}}" class="btn btn-primary btn-success"><i class="fa fa-plus"></i> Add new</a>
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
							<th>Title</th>
							<th>Author</th>
							<th>Category</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php $stt = 1;?>
						@foreach($articles as $item)
						<tr class="td-data-{{$item->id}}">
							<td>{{ $stt }}</td>
							<td class="name-cate">{{ $item-> title}}</td>
							<td class="des-cate">
								<?php 
									$user_id = $item->user_id;
									$author = Simple_Blog\User::where('id',$user_id)->first();
									echo $author->name;
								?>
							</td>
							<td>
								<?php 
									$cate_id = $item->cate_id;
									$cate = Simple_Blog\Cate::where('id',$cate_id)->first();
									echo $cate->name;
								?>
							</td>
							@if(\Auth::user()->role == 'admin' || (\Auth::user()->id == $user_id && \Auth::user()->role == 'user'))
							<td><a href="{{route('admin.article.edit',[$item->id])}}" class="edit-article" val="{{ $item->id}}">Edit</a></td>
							<td><a class="text-danger del-article-{{$item->id}} del-article" val="{{ $item->id}}" data-toggle="modal" href='#modal-id'>Delete</a></td>
							@else
								<td><p>Edit</p></td>
								<td><a class="text-danger">Delete</a></td>
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
										<p class="text-center">Are you sure?</p>
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
<div class="row">
	<div class="col-lg-12">
		@if ($articles->lastPage() > 1)
		<ul class="pagination" style="float:right; margin-top: -5px;">
			@if ($articles->currentPage() != 1)
			<li class="paginate_button previous">
				<a href="{{ str_replace('/?', '?', $articles->url($articles->currentPage() - 1)) }}">Previous</a>
			</li>
			@endif
			@for ($i = 1;  $i <= $articles->lastPage(); $i++)
			<li class="paginate_button {{ ($articles->currentPage() == $i) ? 'active' : '' }}">
				<a href="{{ str_replace('/?', '?', $articles->url($i)) }}">{{ $i }}</a>
			</li>
			@endfor
			@if ($articles->currentPage() != $articles->lastPage() &&  $articles->lastPage() > 1)
			<li class="paginate_button next"><a href="{{ str_replace('/?', '?', $articles->url($articles->currentPage() + 1)) }}">Next</a></li>
			@endif
		</ul>
		@endif
	</div>
</div>
@endsection 

