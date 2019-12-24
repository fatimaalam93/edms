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
<div class="card">
	<div class="card-header">
		<h5>Add New Patient</h5>
		<a href="{{ url('patient') }}" style="float: right; padding: 8px;" class="btn btn-success"> Patients List</a>
	</div>
	@can('Add patients')
	<div class="card-block">
		{{ Form::open(['class' => '', 'files' => true, 'url' => 'patient', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
		<div class="row">
			<div class="col-md-12 pt-4">
				<div class="row">
					<div class="form-group col-md-3">
						<label for="patient_id">Patient ID: <span class="required"> (*) </span></label>
						<input type="text" class="form-control  {{ $errors->has('patient_id') ? ' is-invalid' : '' }}" value="{{ old('patient_id') }}" name="patient_id" />
						@if ($errors->has('patient_id'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('patient_id') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-3">
						<label for="title">Title: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" name="title"/>
						@if ($errors->has('title'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('title') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="first_name">First Name: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" value="{{ old('first_name') }}" name="first_name"/>
						@if ($errors->has('first_name'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('first_name') }}</strong></span>
						</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="middle_name">Middle name:</label>
						<input type="text" class="form-control {{ $errors->has('middle_name') ? ' is-invalid' : '' }}" value="{{ old('middle_name') }}" name="middle_name"/>
						@if ($errors->has('middle_name'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('middle_name') }}</strong></span>
						</span>
						@endif
					</div>
					<div class="form-group col-md-6">
						<label for="sur_name">Surname: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('sur_name') ? ' is-invalid' : '' }}" value="{{ old('sur_name') }}" name="sur_name"/>
						@if ($errors->has('sur_name'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('sur_name') }}</strong></span>
						</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="mobile">Mobile:</label>
						<input type="text" class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" value="{{ old('mobile') }}" name="mobile"/>
						@if ($errors->has('mobile'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('mobile') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-3">
						<label for="nhs_no">NHS No:</label>
						<input type="text" class="form-control {{ $errors->has('nhs_no') ? ' is-invalid' : '' }}" value="{{ old('nhs_no') }}" name="nhs_no"/>
						@if ($errors->has('nhs_no'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('nhs_no') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-3">
						<label for="date_of_birth">Date of birth: <span class="required"> (*) </span></label>
						<input type="" class="form-control datepicker {{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" value="{{ old('date_of_birth') }}" name="date_of_birth"/>
						@if ($errors->has('date_of_birth'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('date_of_birth') }}</strong></span>
						</span>
						@endif
					</div>
					<div class="form-group col-md-3">
						<label for="date_of_death">Date of Death:</label>
						<input type="" class="form-control datepicker {{ $errors->has('date_of_death') ? ' is-invalid' : '' }}" value="{{ old('date_of_death') }}" name="date_of_death"/>
						@if ($errors->has('date_of_death'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('date_of_death') }}</strong></span>
						</span>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3">
						<label for="gender">Gender: <span class="required"> (*) </span></label>
				  		<select class="js-example-basic-single col-sm-12 {{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" id="gender">
				  			<option value="male">Male</option>
				  			<option value="female">Female</option>
				  		</select>
						@if ($errors->has('gender'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('gender') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-3">
						<label for="next_of_kin">Next to kin:</label>
						<input type="text" class="form-control {{ $errors->has('next_of_kin') ? ' is-invalid' : '' }}" value="{{ old('next_of_kin') }}" name="next_of_kin"/>
						@if ($errors->has('next_of_kin'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('next_of_kin') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-3">
						<label for="post_code">PostCode:</label>
						<input type="text" class="form-control {{ $errors->has('post_code') ? ' is-invalid' : '' }}" value="{{ old('post_code') }}" name="post_code"/>
						@if ($errors->has('post_code'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('post_code') }}</strong></span>
						</span>
						@endif
					</div>

					
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="address"> Address:</label>
						<textarea class="form-control" value="{{ old('address') }}" name="address"></textarea>
					</div>

					<div class="form-group col-md-6">
						<label for="gp_details"> GP details:</label>
						<textarea class="form-control" value="{{ old('gp_details') }}" name="gp_details"></textarea>
					</div>
				</div>
			</div>
		</div>
			
		<div class="form-group row mt-5">
			<div class="col-sm-12 text-center">
				<a class="col-md-2 btn btn-danger mr-3" href="{{url('patient')}}">Cancel</a>
				<button type="submit" class="col-md-2 btn btn-primary">Save</button>
			</div>
		</div>
		{{ Form::close()}}
	</div>
	@endcan
</div>

@endSection