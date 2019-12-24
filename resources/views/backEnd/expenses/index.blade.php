@extends('backEnd.master')
@section('mainContent')
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
				<h5>Add New Expense</h5>
			</div>
			<div class="card-block">
				

				@if(isset($editData))
				{{ Form::open(['class' => '', 'files' => true, 'url' => 'expenses/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
				@else
				{{ Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'expenses',
				'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
				@endif
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="department_id">Employee Name:</label>
							<select class="js-example-basic-single col-sm-12 {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" id="employee_id">
								<option value="">Select Employee</option>
								@if(isset($employees))
								@foreach($employees as $value)
								<option value="{{ $value->id }}"
									@if(isset($editData))
									@if($editData->employee_id == $value->id)
									selected
									@endif
									@endif
									>{{$value->full_name}}</option>
									@endforeach
									@endif
								</select>
								@if ($errors->has('employee_id'))
								<span class="invalid-feedback invalid-select" role="alert">
									<strong>{{ $errors->first('employee_id') }}</strong>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label for="joining_date"> Date</label>
								<input type="" class="form-control datepicker {{ $errors->has('expense_date') ? ' is-invalid' : '' }}" value="{{isset($editData)? date('d-m-Y', strtotime($editData->expense_date)) : ''}}" name="expense_date"/>
								@if ($errors->has('expense_date'))
								<span class="invalid-feedback" role="alert" >
									<span class="messages"><strong>{{ $errors->first('expense_date') }}</strong></span>
								</span>
								@endif
							</div>
							<div class="form-group">
								<label class="col-form-label">Amount</label>
								<input type="number" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" name="amount" id="amount" placeholder="Add Expense" value="{{isset($editData)? $editData->amount : ''}}" autocomplete="off">

								@if ($errors->has('amount'))
								<span class="invalid-feedback" role="alert">
									<span class="messages"><strong>{{ $errors->first('amount') }}</strong></span>
								</span>
								@endif
							</div>
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
			@if(session()->has('message-success-assign-role'))
			<div class="alert alert-success mb-3 background-success" role="alert">
				{{ session()->get('message-success-assign-role') }}
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
			<div class="card">
				<div class="card-header">
					<h5>Expenses</h5>
				</div>
				<div class="card-block">
					<div class="dt-responsive table-responsive">
						<table id="basic-btn" class="table table-striped table-bordered nowrap">
							<thead>
								<tr>
									
									<th>Employee name</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								@if(isset($expenses))
								@php $i = 1 @endphp
								@foreach($expenses as $expense)
								<tr>
									<td>{{$expense->employee->full_name}}</td>
									<td>{{$expense->expense_date}}</td>
									<td>{{$expense->amount}}</td>
									
									<td>
										
										<a href="{{ url('expenses/'.$expense->id.'/edit') }}"  title="edit">
											<button type="button" class="btn btn-info action-icon"><i class="fa fa-edit"></i></button>
										</a>
										<!-- <a class="modalLink" title="Delete" data-modal-size="modal-md" href="{{url('deleteRoleView', $expense->id)}}">
											<button type="button" class="btn btn-danger action-icon"><i class="fa fa-trash-o"></i></button>
										</a> -->
									</td>
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