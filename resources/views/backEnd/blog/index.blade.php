@extends('backEnd.master')
@section('mainContent')

@if(session()->has('message-success'))
<div class="alert alert-success mb-3 background-success" role="alert">
	{{ session()->get('message-success') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@elseif(session()->has('message-danger'))
<div class="alert alert-danger">
	{{ session()->get('message-danger') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif
@if(session()->has('message-success-delete'))
<div class="alert alert-danger mb-3 background-danger" role="alert">
	{{ session()->get('message-success-delete') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@elseif(session()->has('message-danger-delete'))
<div class="alert alert-danger">
	{{ session()->get('message-danger-delete') }}
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
@endif


<div class="card">
	<div class="card-header">
		<h5>Blogs List</h5>
		<a href="{{ route('blog.create') }}" style="float: right; padding: 8px;" class="btn btn-success"> Add New Blog </a>
	</div>
	<div class="card-block">
		<table id="basic-btn" class="table table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>ID</th>
					<th>Image</th>
					<th>Title</th>
					<th>Created By</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@php $i = 1 @endphp
				@foreach($blogs as $blog)
				<tr>
					<td>{{$i++}}</td>
					<td>
						<div class="d-inline-block align-middle">
							@if(empty($blog->image))
							<img src="{{asset('public/images/no_image.png')}}" alt="image" class="img-radius img-40 align-top m-r-15">
							@else
							<img src="{{asset($blog->image)}}" alt="image" class="img-radius img-40 align-top m-r-15">
							@endif
						</div>
					</td>
					<td>{{$blog->title}}</td>
					<td>
						@if( isset($blog->created_by) )
							@foreach($users as $user)
								@if( $blog->created_by == $user->id )
	                                {{$user->name}}
	                            @endif
	                        @endforeach
						@endif
					</td>
					<td>
						<a href="{{ route('blog.edit',$blog->id) }}" title="Edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>
						<a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteBlogView', $blog->id)}}">
							<button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endSection