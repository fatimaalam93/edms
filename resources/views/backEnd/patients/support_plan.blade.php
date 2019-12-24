<!DOCTYPE html>
<html>
<head>
	<title>Patient Details</title>
</head>
<body>
	
	<div>
		<div style="clear: both;">
		<img src="{{ url('public/images/logo_reports.png') }}" width="" style="text-align: right !important;">
	</div>
	<br><br>
		<span style="float: left; margin-right: 20px;"><strong>Patient ID :</strong> {{$result['patient_id']}}</span>
		<span style="float: left; margin-right: 20px;"><strong>Full Name :</strong> {{$result['first_name']. ' '.$result['middle_name'].' '.$result['sur_name'] }}</span>
		<span style="float: left;"><strong>Date of Birth :</strong> {{$result['date_of_birth']}}</span>
		<br>
		<p style="clear: both;"><strong>Support Plans</strong></p>
		@php 
		$editDatas = explode(',' ,$result['support_plan']);
		@endphp

		@if(isset($support_plans))
		@foreach($support_plans as $support_plan)
		<div class="checkbox">
			<label><input type="checkbox" name="support_plan[]" value="{{$support_plan->id}}"
				@foreach($editDatas as $value)
				@if($support_plan->id == $value)
				checked
				@endif
				@endforeach
				> {{$support_plan->plan_name}}</label>
			</div>
			@endforeach
			@endif 

		</div>
	</body>
	</html>