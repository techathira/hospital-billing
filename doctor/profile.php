<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {

}
else{
	header('Location: ../login/index.html');
	die();	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital Billing</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="../js/angular.min.js"></script>
</head>

<body ng-app="view_appointment" ng-controller="appointmentCtrl">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Hospital Billing</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">View Appointment</a></li>
      <li class="active"><a href="#">Profile</a></li>
      <li><a href="#">Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <!-- Page Content -->
    <div class="container-fluid">
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		
		<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12 "></div>
		<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 padding-none bg-white">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-16">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2 padding-none">
				<img src="../icons/doctor.jpg" alt=""     style="height: 130px;" />
			</div>	
			<div class="col-md-10 col-sm-10 col-lg-10 col-xs-12  ">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-16 font-grey margin-bottom">My Account</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Name</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">Dr. Rahul Patel S G</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Email</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">RAHULPATEL@GMAIL.COM</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Phone</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">9901800489</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Specialization</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">MBBS</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Timing</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">&nbsp;</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6  padding-none">Day</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6  ">Morning</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6  ">Afternoon</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6  ">Evening</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6  ">Night</div>
				</div>
					
				</div>
			</div>
		</div>
		</div>

    </div>
    <!-- /.container -->


<!-- SCRIPT -->
<script type="text/javascript" src="js/appointment/appointment.js"></script>
</body>

</html>
