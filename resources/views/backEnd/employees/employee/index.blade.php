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
		<h5>Employee Lists</h5>
		<a href="{{ route('employee.create') }}" style="float: right; padding: 8px;" class="btn btn-success"> Add Employee </a>
	</div>
	<div class="card-block">
		<table id="basic-btn" class="table table-striped table-bordered nowrap">
			<thead>
				<tr>
					<th>ID</th>
					<th>Photo</th>
					<th>Full Name</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Joining date</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@php $i = 1 @endphp
				@foreach($employees as $employee)
				<tr>
					<td>{{$i++}}</td>
					<td>
						<div class="d-inline-block align-middle">
							@if(empty($employee->employee_photo))
							<img src="{{asset('public/images/no_image.png')}}" alt="user image" class="img-radius img-40 align-top m-r-15">
							@else
							<img src="{{asset($employee->employee_photo)}}" alt="user image" class="img-radius img-40 align-top m-r-15">
							@endif
						</div>
					</td>
					<td>{{$employee->full_name}}</td>
					<td>{{$employee->mobile}}</td>
					<td>{{$employee->email}}</td>
					<td>{{date('d-M-Y', strtotime($employee->joining_date))}}</td>
					<td>
						@if(isset($employee->department_id))
						{{$employee->department->department_name}}
						@endif
					</td>
					<td>
						@if(isset($employee->designation_id))
						{{$employee->designation->designation_name}}
						@endif
					</td>
					
					<td>
						<!-- <a href="{{ route('employee.show',$employee->id) }}" title="view"><button type="button" class="btn btn-success action-icon"><i class="fa fa-eye"></i></button></a> -->
						<a href="{{ route('employee.edit',$employee->id) }}" title="edit"><button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button></a>
						<a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteEmployeeView', $employee->id)}}">
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