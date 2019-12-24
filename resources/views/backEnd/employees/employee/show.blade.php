
@extends('backEnd.master')
@section('mainContent')

<div class="tab-pane" id="contacts" role="tabpanel">
	<div class="row">
		<!-- <div class="col-xl-3">
			<div class="card">
				<div class="card-header contact-user">
					@if( isset($editData->employee_photo) )
						<img src="{{ asset($editData->employee_photo) }}" class="img-radius img-40" />
					@else
						<img src="{{ asset('/public/images/no_image.png') }}" class="img-radius img-40" />
					@endif
					<h5 class="m-l-10">{{$editData->full_name}}</h5>
				</div>

				<div class="card-block groups-contact">
					<ul class="list-group">
						<li class="list-group-item justify-content-between">
						Email
						@if( isset($editData->email) )
							<span class="badge badge-primary badge-pill">{{ $editData->email }}</span>
						@else
							<span class="badge badge-primary badge-pill">No mail address</span>
						@endif
						</li>
						<li class="list-group-item justify-content-between">
						Mobile
							@if( isset($editData->mobile) )
							<span class="badge badge-success badge-pill">{{ $editData->mobile }}</span>
						@else
							<span class="badge badge-success badge-pill">No phone number</span>
						@endif
						</li>
						<li class="list-group-item justify-content-between">
						Department
							@if( isset($departments) && isset($editData->department_id))
								@foreach($departments as $department)
									@if($department->id == $editData->department_id)
										<span class="badge badge-info badge-pill">{{ $department->department_name }}</span>
									@endif
								@endforeach
							@else
								<span class="badge badge-info badge-pill">No Department</span>
							@endif
						</li>
						<li class="list-group-item justify-content-between">
						Designation
							@if( isset($designations) && isset($editData->designation_id))
								@foreach($designations as $designation)
									@if($designation->id == $editData->designation_id)
										<span class="badge badge-danger badge-pill">{{ $designation->designation_name }}</span>
									@endif
								@endforeach
							@else
								<span class="badge badge-danger badge-pill">No Designation</span>
							@endif
						</li>
					</ul>
				</div>
			</div>
		</div> -->

		<div class="col-xl-3">
			<div class="card user-card">
				<div class="card-header-img">
					@if( isset($editData->employee_photo) )
						<img class="img-fluid img-radius" style="margin-top: 20px;" src="{{ asset($editData->employee_photo) }}" alt="card-img">
					@else
						<img class="img-fluid img-radius" src="{{ asset('/public/images/no_image.png') }}" alt="card-img">
					@endif

					@if( isset($editData->full_name) )
						<h4>{{ $editData->full_name }}</h4>
					@else
						<h4>No Name</h4>
					@endif
					
					@if( isset($editData->email) )
						<h5>{{ $editData->email }}</h5>
					@else
						<h5>No Email</h5>
					@endif

					@if( isset($designations) && isset($editData->designation_id))
						@foreach($designations as $designation)
							@if($designation->id == $editData->designation_id)
								<h6>{{ $designation->designation_name }}</h6>
							@endif
						@endforeach
					@else
						<h6>No Designation</h6>
					@endif
				</div>

				<div style="text-align: center;">
					@if( isset($editData->mobile) )
						<button type="button" class="btn btn-primary waves-effect waves-light m-r-15">{{ $editData->mobile }}</button>
					@else
						<button type="button" class="btn btn-primary waves-effect waves-light">No Number</button>
					@endif

					@if( isset($blood_groups) && isset($editData->blood_group_id))
						@foreach($blood_groups as $blood_group)
							@if($blood_group->id == $editData->blood_group_id)
								<button type="button" class="btn btn-success waves-effect waves-light">{{ $blood_group->base_setup_name }}</button>
							@endif
						@endforeach
					@else
						<button type="button" class="btn btn-success waves-effect waves-light">No Blood Group</button>
					@endif
				</div>
			</div>
		</div>

		 <div class="col-xl-9">
        <div class="tab-header card">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Details</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#employee_salary" role="tab">Employee Salary</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#leave" role="tab">Leave</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#attendance_history" role="tab">Attendence history</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#task" role="tab">Tasks</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#document" role="tab">Documents</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="personal" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Details</h5>
                    </div>
                    <div class="card-block">
                        <div class="view-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 ">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Full Name</th>

                                                                @if( isset($editData->full_name) )
																	<td>{{ $editData->full_name }}</td>
																@else
																	<td>No Name</td>
																@endif

                                                            </tr>

                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                @if( isset($editData->email) )
																	<td>{{ $editData->email }}</td>
																@else
																	<td>No Email</td>
																@endif                                                            
															</tr>
                                                            <tr>
                                                                <th scope="row">Birth Date</th>
                                                                <td>October 25th, 1990</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Marital Status</th>
                                                                <td>Single</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Location</th>
                                                                <td>New York, USA</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane" id="employee_salary" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Leave</h5>
                    </div>
                    <div class="card-block">
                       
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="leave" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Leave</h5>
                    </div>
                    <div class="card-block">
                       
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="attendance_history" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Attendance History</h5>
                    </div>
                    <div class="card-block">
                       
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="task" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Tasks</h5>
                    </div>
                    <div class="card-block">
                        
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="document" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Documents</h5>
                    </div>
                    <div class="card-block">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	</div>
</div>
@endSection