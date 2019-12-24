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
		<span style="float: left; margin-right: 20px;"><strong>Patient ID :</strong> {{$patient_id}}</span>
		<span style="float: left; margin-right: 20px;"><strong>Full Name :</strong> {{$first_name. ' '.$middle_name.' '.$sur_name }}</span>
		<span style="float: left;"><strong>Date of Birth :</strong> {{$date_of_birth}}</span>
		<br>
		<p style="clear: both;"><strong>title:</strong>{{$title}}</p>
		<p style="clear: both;"><strong>NHS No:</strong>{{$nhs_no}}</p>
		
		<p style="clear: both;"><strong>Mobile:</strong>{{$mobile}}</p>
		<p style="clear: both;"><strong>Post Code:</strong>{{$post_code}}</p>
		<p style="clear: both;"><strong>Address:</strong>{{$address}}</p>
		<p style="clear: both;"><strong>Gp Details:</strong>{{$gp_details}}</p>
		<p style="clear: both;"><strong>Next to kin:</strong>{{$next_of_kin}}</p>
		
	</div>
</body>
</html>