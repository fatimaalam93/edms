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
		<h5>Edit Document</h5>
	</div>
	@can('Edit documents')
	<div class="card-block">
		{{ Form::open(['class' => '', 'files' => true, 'url' => 'document/update/'.$editData->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'autocomplete' => 'off']) }}
		<div class="row">
			<div class="col-md-8 offset-md-2 pt-4">
				<div class="row">
					<div class="form-group col-md-6">
						<label for="document_type_code">Document Type Code: <span class="required"> (*) </span></label>
						<input type="text" class="form-control  {{ $errors->has('document_type_code') ? ' is-invalid' : '' }}" value="{{ $editData->document_type_code }}" name="document_type_code" />
						@if ($errors->has('document_type_code'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('document_type_code') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="doc_type">Document Type: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('doc_type') ? ' is-invalid' : '' }}" value="{{ $editData->doc_type }}" name="doc_type"/>
						@if ($errors->has('doc_type'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('doc_type') }}</strong></span>
						</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="document_name">Document Name: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('document_name') ? ' is-invalid' : '' }}" value="{{ $editData->document_name }}" name="document_name"/>
						@if ($errors->has('document_name'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('document_name') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="owner">Owner: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('owner') ? ' is-invalid' : '' }}" value="{{ $editData->owner }}" name="owner"/>
						@if ($errors->has('owner'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('owner') }}</strong></span>
						</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="speciality">Speciality: </label>
						<input type="text" class="form-control {{ $errors->has('speciality') ? ' is-invalid' : '' }}" value="{{ $editData->speciality }}" name="speciality"/>
						@if ($errors->has('speciality'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('speciality') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
						<label for="consultant">Consultant:</label>
						<input type="text" class="form-control {{ $errors->has('consultant') ? ' is-invalid' : '' }}" value="{{ $editData->consultant }}" name="consultant"/>
						@if ($errors->has('consultant'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('consultant') }}</strong></span>
						</span>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="acl">Access Control List: <span class="required"> (*) </span></label>
						<input type="text" class="form-control {{ $errors->has('acl') ? ' is-invalid' : '' }}" value="{{ $editData->acl }}" name="acl"/>
						@if ($errors->has('acl'))
						<span class="invalid-feedback" role="alert" >
							<span class="messages"><strong>{{ $errors->first('acl') }}</strong></span>
						</span>
						@endif
					</div>

					<div class="form-group col-md-6">
                        <label for="upload_document">Upload Document <span class="required"> (*) </span></label>
                        <input data-preview="#preview" class="form-control" type="file" name="upload_document" id="upload_document" >
                        @if ($errors->has('upload_document'))
                            <span class="invalid-feedback" role="alert" >
                                <span class="messages"><strong>{{ $errors->first('upload_document') }}</strong></span>
                            </span>
                        @endif
                    </div>
				</div>
			</div>
		</div>
			
		<div class="form-group row mt-5">
			<div class="col-sm-8 offset-md-2 text-center">
				<a class="col-md-2 btn btn-danger mr-3" href="{{ route('patient.show',$editData->patient_id) }}">Cancel</a>
				<button type="submit" class="col-md-2 btn btn-primary">Save</button>
			</div>
		</div>
		{{ Form::close()}}
	</div>
	@endcan
</div>

@endSection