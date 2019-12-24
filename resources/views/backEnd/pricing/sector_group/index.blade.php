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
				<h5>Add New Sector Group</h5>
			</div>
			<div class="card-block">
				@if(isset($editData))
				{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'editSectorGroup/'.$editData->id, 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
				@else
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'save-sector-group',
				'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="form-group sector">
							<label class="col-form-label"><span class="required"> * </span>Sector</label>
							<select class="js-example-basic-single col-sm-12 {{ $errors->has('sector') ? ' is-invalid' : '' }}" name="sector" id="sector">
								<option value="">Select Sector</option>
								@if(isset($sectors))
								@foreach($sectors as $key=>$value)
								<option value="{{$value->id}}"
									@if(isset($editData))
									@if($editData->sector_id == $value->id)
									selected
									@endif
									@endif
									>{{$value->sector_name}}
								</option>
								@endforeach
								@endif
							</select>
							@if ($errors->has('sector'))
							<span class="invalid-feedback invalid-select" role="alert">
								<strong>{{ $errors->first('sector') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group input-effect col-md-12">
						<label class="col-form-label"><span class="required"> * </span>Sector Group</label>

						<input type="text" class="form-control {{ $errors->has('sector_group') ? ' is-invalid' : '' }}" name="sector_group" id="sector_group" placeholder="Sector Group" value="{{isset($editData)? $editData->sector_group : old('sector_group')}}">

						@if ($errors->has('sector_group'))
						<span class="invalid-feedback" role="alert">
							<span class="messages"><strong>{{ $errors->first('sector_group') }}</strong></span>
						</span>
						@endif
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
					<div class="form-group row col-md-12">
						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary m-b-0">Submit</button>
						</div>
					</div>
				{{ Form::close()}}
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<h5>Sector Group Lists</h5>
			</div>
			<div class="card-block">
				<div class="dt-responsive table-responsive">
					<table id="basic-btn" class="table table-striped table-bordered nowrap">
						<thead>
							<tr>
								<th>Serial No.</th>
								<th>Sector </th>
								<th>Sector Group</th>
								<th>Cost</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@if(isset($sector_groups))
							@php $i = 1 @endphp
							@foreach($sector_groups as $value)
								@if(isset($value->sector_id))
									<tr>
										<td>{{$i++}}</td>
										<td>{{$value->sector->sector_name}}</td>
										<td>{{$value->sector_group}}</td>
										<td>{{$value->cost}}</td>
										<td>
											<a href="{{url('edit-sector-group/'.$value->id)}}" title="edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>
											<a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteSectorGroupView', $value->id)}}">
												<button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
											</a>
										</td>
									</tr>
								@endif
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
