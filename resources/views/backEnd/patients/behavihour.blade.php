<!DOCTYPE html>
<html>
<head>
	<title>Hi</title>
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
	<p style="clear: both;"><strong>Behavihour Details:</strong></p>
	<p>{{strip_tags($behaviour)}}</p>
	

</div>
</body>
</html>