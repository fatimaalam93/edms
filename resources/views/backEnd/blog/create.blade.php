@extends('backEnd.master')
@section('mainContent')
<div class="row">
	<div class="col-md-12">
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
				<h5>Add New Blog</h5>
			</div>
			<div class="card-block">
				@if(isset($editData))
				{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'blog/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
				@else
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'blog',
				'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-form-label">Title</label>
							<input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="name" placeholder="Title" value="{{isset($editData)? $editData->title : old('title') }}">

							@if ($errors->has('title'))
							<span class="invalid-feedback" role="alert">
								<span class="messages"><strong>{{ $errors->first('title') }}</strong></span>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 pt-4">
						<script type="text/javascript" src="http://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
						<label class="col-form-label">Description:</label>
						<textarea  id="editor" name="description" rows="50" cols="80">
							@if(isset($editData->description))
							{{$editData->description}}
							@endif
						</textarea>
						<script>
							CKEDITOR.replace('editor');
						</script>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-form-label">Image</label>
							<input class="primary-input form-control" type="file" id="blogImage" placeholder="" name="image">
							@if ($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<span class="messages"><strong>{{ $errors->first('image') }}</strong></span>
							</span>
							@endif
						</div>
					</div>
				</div>
				<div class="form-group row ">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary m-b-0">Submit</button>
					</div>
				</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
</div>

@endSection