@extends('backEnd.master')
@section('mainContent')
<div class="card">
	<div class="card-header">
		<h5>Add Employee</h5>
	</div>
	<div class="card-block">
		{{ Form::open(['class' => '', 'files' => true, 'url' => 'employee', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}

			<div class="row">
				
				<div class="form-group col-md-6">
				  	<label for="first_name">First Name:</label>
				  	<input type="text" class="form-control  {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" name="first_name" />
				  	@if ($errors->has('first_name'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('first_name') }}</strong></span>
						</span>
					@endif
				</div>

				<div class="form-group col-md-6">
				  	<label for="last_name">Last Name:</label>
				  	<input type="text" class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" value="{{ old('last_name') }}" name="last_name"/>
				  	@if ($errors->has('last_name'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('last_name') }}</strong></span>
						</span>
					@endif
				</div>
				
			</div>

			<div class="row">
				
				<div class="form-group col-md-6">
				  	<label for="email">Email:</label>
				  	<input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email"/>
				  	@if ($errors->has('email'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('email') }}</strong></span>
						</span>
					@endif
				</div>
				
				<div class="form-group col-md-6">
				  	<label for="employee_photo">Employee Image:</label><br>
				  	<input data-preview="#preview" name="employee_photo" type="file" id="employee_photo">
        			<img class="col-sm-6" id="preview"  src="">
				  	@if ($errors->has('employee_photo'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('employee_photo') }}</strong></span>
						</span>
					@endif
				</div>

			</div>

			<div class="row">
				
				<div class="form-group col-md-3">
				  <label for="mobile">Cell no:</label>
				  <input type="text" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}" name="mobile"/>
				  	@if ($errors->has('mobile'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('mobile') }}</strong></span>
						</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="emergency_no">Emergency no:</label>
				  	<input type="text" class="form-control {{ $errors->has('emergency_no') ? ' is-invalid' : '' }}" value="{{ old('emergency_no') }}" name="emergency_no"/>
				  	@if ($errors->has('emergency_no'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('emergency_no') }}</strong></span>
						</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="date_of_birth">Date of birth:</label>
				  	<input type="" class="form-control datepicker {{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" value="{{ old('date_of_birth') }}" name="date_of_birth"/>
				  	@if ($errors->has('date_of_birth'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('date_of_birth') }}</strong></span>
						</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="joining_date">Joining date:</label>
				  	<input type="" class="form-control datepicker {{ $errors->has('joining_date') ? ' is-invalid' : '' }}" value="{{ old('joining_date') }}" name="joining_date"/>
				  	@if ($errors->has('joining_date'))
					    <span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('joining_date') }}</strong></span>
						</span>
					@endif
				</div>

			</div>
			

			<div class="row">

				<div class="form-group col-md-3">
				  	<label for="department_id">Department name:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" id="department_id">
					<option value="">Select Dept.</option>
					@if(isset($departments))
						@foreach($departments as $department)
							<option value="{{ $department->id }}" {{ old('department_id')== $department->id ? 'selected' : old('department_id')  }} >{{$department->department_name}}</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('department_id'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('department_id') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="designation_id">Designation name:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('designation_id') ? ' is-invalid' : '' }}" name="designation_id" id="designation_id">
					<option value="">Select Designation</option>
					@if(isset($designations))
						@foreach($designations as $designation)
							<option value="{{ $designation->id }}" {{ old('designation_id')== $designation->id ? 'selected' : old('designation_id')  }} >{{$designation->designation_name}}</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('designation_id'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('designation_id') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="gender_id">Gender:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('gender_id') ? ' is-invalid' : '' }}" name="gender_id" id="gender_id">
					<option value="">Select gender</option>
					@if(isset($genders))
						@foreach($genders as $gender)
							<option value="{{ $gender->id }}" {{ old('gender_id')== $gender->id ? 'selected' : old('gender_id')  }} >{{$gender->base_setup_name}}</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('gender_id'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('gender_id') }}</strong>
					</span>
					@endif
				</div>

				<div class="form-group col-md-3">
				  	<label for="blood_group_id">Blood group:</label>
				  	<select class="js-example-basic-single col-sm-12 {{ $errors->has('blood_group_id') ? ' is-invalid' : '' }}" name="blood_group_id" id="blood_group_id">
					<option value="">Select group</option>
					@if(isset($blood_groups))
						@foreach($blood_groups as $blood_group)
							<option value="{{ $blood_group->id }}" {{ old('blood_group')== $blood_group->id ? 'selected' : old('blood_group')  }} >{{$blood_group->base_setup_name}}</option>
						@endforeach
					@endif
					</select>
					@if ($errors->has('blood_group_id'))
					<span class="invalid-feedback invalid-select" role="alert">
						<strong>{{ $errors->first('blood_group_id') }}</strong>
					</span>
					@endif
				</div>

			</div>

			<div class="row">
				
				<div class="form-group col-md-6">
				  	<label for="permanent_address">Permanent address:</label>
				  	<textarea class="form-control" value="{{ old('permanent_address') }}" name="permanent_address"></textarea>
				</div>

				<div class="form-group col-md-6">
				  	<label for="current_address">Current address:</label>
				  	<textarea class="form-control" value="{{ old('current_address') }}" name="current_address"></textarea>
				</div>

			</div>

			<div class="row">
				
				<div class="form-group col-md-6">
				  	<label for="qualifications">Qualifications:</label>
				  	<textarea class="form-control" value="{{ old('qualifications') }}" name="qualifications"></textarea>
				</div>

				<div class="form-group col-md-6">
				  	<label for="experiences">Experiences:</label>
				  	<textarea class="form-control" value="{{ old('experiences') }}" name="experiences"></textarea>
				</div>

			</div>

			<div class="form-group row mt-5">
				<div class="col-sm-12 text-center">
					<button type="submit" class="btn btn-primary m-b-0">Add Employee</button>
				</div>
			</div>
		{{ Form::close()}}
	</div>
</div>

@endSection