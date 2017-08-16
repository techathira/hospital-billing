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
      <li class="active"><a href="index.php">View Appointment</a></li>
      <li><a href="profile.php">Profile</a></li>
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
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-22">Filter</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-22">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required=""/>
				  <span class="bar"></span>
				  <label class="label-text" >From Date</label>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-22">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required=""/>
				  <span class="bar"></span>
				  <label class="label-text" >To Date</label>
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Sl No</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Patient Name</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Date</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Time</div>
			<div class="col-md-2 col-sm-4 col-lg-4 col-xs-4 font-16 padding-none">Reason</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none">&nbsp;</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">1</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Rahul patel</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">16-Aug-2017</div>
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">11:00 AM</div>
			<div class="col-md-2 col-sm-4 col-lg-4 col-xs-4 font-16 padding-none">Head ache since 2 days </div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none"><span ng-click="check_up()" class="pointer">Check Up</span> &nbsp;&nbsp;&nbsp; <span class="pointer" ng-click="histroy()">Histroy</span></div>
		</div>


    </div>
    <!-- /.container -->


<!-- SCRIPT -->
<script type="text/javascript" src="js/appointment/appointment.js"></script>
</body>

</html>
