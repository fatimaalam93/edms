@extends('backEnd.master')
@section('mainContent')
<style type="text/css">
p{
	font-size: 15px;
}
.required {
	color: red;
}
</style>
<div class="row">
	<div class="col-md-4">
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
				<h5>Add New Region</h5>
			</div>
			<div class="card-block">
				@if(isset($editData))
				{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'sector/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
				@else
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'job_type',
				'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="col-form-label"><span class="required"> * </span>Job Type</label>
							<input type="text" class="form-control {{ $errors->has('job_name') ? ' is-invalid' : '' }}" name="job_name" id="name" placeholder="Job Type" value="{{isset($editData)? $editData->job_name : '' }}">

							@if ($errors->has('job_name'))
							<span class="invalid-feedback" role="alert">
								<span class="messages"><strong>{{ $errors->first('job_name') }}</strong></span>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group input-effect col-md-12">
						<label class="col-form-label"><span class="required"> * </span>Cost</label>

						<input type="number" class="form-control {{ $errors->has('cost') ? ' is-invalid' : '' }}" name="cost" id="cost" placeholder="Cost" value="{{isset($editData)? $editData->cost : old('cost')}}">

						@if ($errors->has('cost'))
						<span class="invalid-feedback" role="alert">
							<span class="messages"><strong>{{ $errors->first('cost') }}</strong></span>
						</span>
						@endif
					</div>
				</div>
				<div class="form-group row mt-4">
					<div class="col-sm-12 text-center">
						<button type="submit" class="btn btn-primary m-b-0">Submit</button>
					</div>
				</div>
				{{ Form::close()}}
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h5>Job Type List</h5>
			</div>
			<div class="card-block">
				<div class="dt-responsive table-responsive">
					<table id="basic-btn" class="table table-striped table-bordered nowrap">
						<thead>
							<tr>
								<th>ID</th>
								<th>Job Type</th>
								<th>Cost</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($jobs))
							@php $i = 1 @endphp
							@foreach($jobs as $value)
							<tr>
								<td>{{$i++}}</td>
								<td>{{$value->job_name}}</td>
								<td>{{$value->cost}}</td>
							</tr>
							@endforeach
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endSection