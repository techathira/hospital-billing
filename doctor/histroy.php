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
	  <link rel="stylesheet" href="css/Jquery-ui.css" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="../js/angular.min.js"></script>
	  <script type="text/javascript" src="js/Jquery1-ui.js"></script>
</head>

<body ng-app="view_histroy" ng-controller="histroyCtrl">

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
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <!-- Page Content -->
    <div class="container-fluid">
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom font-grey">
		<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-18">Name:</div>
		<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-18 padding-none">{{patient_name}}</div>
		<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-18">Age:</div>
		<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-18 padding-none ">25</div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xs-4 font-18 padding-none "><p class="text-right padding-right-15 font-green "  ><span ng-click="check_up()" class="pointer">Check Up</span></p> </div>
		
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-18 padding-top-16">Filter</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-18">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" datepicker="" ng-model="from_date" />
				  <span class="bar"></span>
				  <label class="label-text" >From Date</label>
				  </div>
				</div>
			</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-18">
				<div class="group col-md-12 col-sm-12 col-lg-12"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" datepicker="" ng-model="to_date" />
				  <span class="bar"></span>
				  <label class="label-text" >To Date</label>
				  </div>
				</div>
			</div>
			
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">Sl No</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Date</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">Doctor Name</div>
			<div class="col-md-2 col-sm-4 col-lg-4 col-xs-4 font-16 padding-none">Reason</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none">&nbsp;</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 margin-bottom" ng-repeat="display in patient_info">
			<div class="col-md-1 col-sm-1 col-lg-1 col-xs-4 font-16 padding-none">1</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">{{display.date}}</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 padding-none">{{display.doctor_name}}</div>
			<div class="col-md-2 col-sm-4 col-lg-4 col-xs-4 font-16 padding-none">{{display.reason}}</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16 padding-none"><span ng-click="prescription(display.appointment_id,display.date)" class="pointer font-blue" data-toggle="modal" data-target="#prescription">View prescription</span> </div>
		</div>


    </div>
    <!-- /.container -->

	<!-- Modal -->


<!--Change password Modal -->
<div id="prescription" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:67%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Prescription for date {{fordate}}</h4>
      </div>
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 modal-body">
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 table-responsive">

				<table class="table table-border text-center">
			<tr >
				<th rowspan="3" class="text-center padding-top-5">Drug Name</th>
				<th rowspan="3" class="text-center padding-top-5">Dosage</th>
				<th colspan="6" class="text-center">Timing</th>
			</tr>
			<tr>
				<th colspan="2" class="text-center">Morning</th>
				<th colspan="2" class="text-center">Afternoon</th>
				<th colspan="2" class="text-center">Night</th>
				
			</tr>
			<tr>
				<th class="text-center">BF</th>
				<th class="text-center">AF</th>
				<th class="text-center">BF</th>
				<th class="text-center">AF</th>
                <th class="text-center">BF</th>
				<th class="text-center"> AF</th>
			</tr>
			
         <tr ng-repeat="display_drug in drugs">
			<td>{{display_drug.drug_name}}</td>
			<td>{{display_drug.dosage}}</td>
			<td>{{display_drug.mbf=="1" ? 'yes' : ''}}</td>
			<td>{{display_drug.maf=="1" ? 'yes' : ''}}</td>
			<td>{{display_drug.abf=="1" ? 'yes' : ''}}</td>
			<td>{{display_drug.aaf=="1" ? 'yes' : ''}}</td>
			<td>{{display_drug.nbf=="1" ? 'yes' : ''}}</td>
			<td>{{display_drug.naf=="1" ? 'yes' : ''}}</td>

		</tr>
		  
	</table>
		</div>

      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

	
<!-- SCRIPT -->
<script type="text/javascript" src="js/histroy/histroy.js"></script>
</body>

</html>
