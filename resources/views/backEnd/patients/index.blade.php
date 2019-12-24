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
		<h5>Patients List</h5>
		@can('Add patients')
		<a href="{{ route('create') }}" style="float: right; padding: 8px;" class="btn btn-success"> Add Patient </a>
		@endcan
	</div>
	<div class="card-block">
		<div class="table table-responsive">
		<table id="basic-btn" class="table table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>Patient ID</th>
					<th>NHS NO</th>
					<th>Title</th>
					<th>First Name</th>
					<th>Surname</th>
					<th>Date of Birth</th>
					<th>Date of Death</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@php $i = 1 @endphp
				@foreach($patients as $patient)
				<tr>
					<td>{{$patient->patient_id}}</td>
					<td>{{$patient->nhs_no}}</td>
					<td>{{$patient->title}}</td>
					<td>{{$patient->first_name}}</td>
					<td>{{$patient->sur_name}}</td>
					<td>{{date('d-M-Y', strtotime($patient->date_of_birth))}}</td>
					<td>
						@if(isset($patient->date_of_death))
						{{date('d-M-Y', strtotime($patient->date_of_death))}}
						@endif
					</td>
					<td>
						@can('View documents')
						<a href="{{ route('patient.show',$patient->id) }}" title="View Documents"><button type="button" class="btn btn-basic action-icon"><i class="fa fa-eye"></i></button></a>
						@endcan

						@can('Edit patients')
						<a href="{{ route('patient.edit',$patient->id) }}" title="Edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>
						@endcan

						@role('Adminstrator')
						<a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deletePateientView', $patient->id)}}"><button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button></a>
						@endrole

						@can('Add documents')
						<a href="{{ url('document/create/'.$patient->id) }}" title="Add Document"><button type="button" class="btn btn-success action-icon"><i class="fa fa-plus"></i></button></a>
						@endcan
					</td>

				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
	</div>
</div>
@endSection