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
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css" /> 
	  
	  <script src="http://code.jquery.com/jquery-1.10.2.js"></script> <!-- for Auto complete -->
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script><!-- for Auto complete -->
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="../js/angular.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap-notify.js"></script> <!-- for Notify js -->

</head>

<body ng-app="checkup" ng-controller="checkupCtrl" ng-cloak>

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
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">&nbsp;</div>
    <div class="col-md-10 col-sm-10 col-lg-8 col-xs-12  bg-white">
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
		<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 font-20 font-grey">Appointment Id: <span class="uppercase">{{appointment_id}}</span></div>
		<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 font-20 font-grey">Name: <span class="uppercase">{{patient_details.patient_name}}</span></div>
			
		</div>
		<form ng-submit="add_prescription()" name="add">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16">Prescription:</div>
			<div class="col-md-5 col-sm-5 col-lg-5 col-xs-4 font-16">
				<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" ng-model="prescription.drug_name" id="drugname" />
					  <input type="hidden"  class="module-input" required="" ng-model="prescription.drug_id" id="drugid" />
				  <span class="bar"></span>
				  <label class="label-text" >EG: Crocin</label>
				  </div>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20 pointer padding-none" ng-click="add_drug()"><i class="glyphicon glyphicon-plus"></i></div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16">Dosage:</div>
			<div class="col-md-5 col-sm-5 col-lg-5 col-xs-4 font-16">
				<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required="" ng-model="prescription.dosage" />
				  <span class="bar"></span>
				  <label class="label-text" >EG: 10 tablet / 50 ML</label>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2 font-16">Timing:</div>
			<div class="col-md-10 col-sm-10 col-lg-10 col-xs-10 font-16 table-responsive" >
				<table  class="table table-border">
					<tr class="text-center">
						<td colspan="2" class="table-head-padding">Morning</td>
						<td colspan="2">Afternoon</td>
						<td colspan="2">Night</td>
					</tr>
					<tr class="table-content-padding text-center">
						<td >Before Food</td>
						<td>After Food</td>
						<td>Before Food</td>
						<td>After Food</td>
						<td>Before Food</td>
						<td>After Food</td>
					</tr>
					<tr class="text-center">
						<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="prescription.mbf"/></td>
						<td><input type="checkbox" name="maf" id="" value="maf" ng-model="prescription.maf" /></td>
						<td><input type="checkbox" name="abf" id="" value="abf" ng-model="prescription.abf" /></td>
						<td><input type="checkbox" name="aaf" id="" value="aaf" ng-model="prescription.aaf" /></td>
						<td><input type="checkbox" name="nbf" id="" value="nbf" ng-model="prescription.nbf" /></td>
						<td><input type="checkbox" name="naf" id="" value="naf" ng-model="prescription.naf" /></td>
						
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20">&nbsp;</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16">
				<input type="submit" value="ADD" class="btn btn-primary" />
			</div>
		</div>
		</form>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>

	<div class="col-md-8 col-sm-8 col-lg-12 col-xs-12 table-responsive" ng-show="prescription_table">
		<table class="table table-border text-center">
			<tr >
				<th rowspan="3" class="text-center padding-top-5">Drug Name</th>
				<th rowspan="3" class="text-center padding-top-5">Dosage</th>
				<th colspan="6" class="text-center">Timing</th>
				<th rowspan="3" colspan="2"></th>
				
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
			
         <tr ng-repeat="display in temp">
			<td>{{display.drug_name}}</td>
			<td>{{display.dosage}}</td>
			<td>{{display.mbf==true ? 'yes' : ''}}</td>
			<td>{{display.maf==true ? 'yes' : ' '}}</td>
			<td>{{display.abf==true ? 'yes' : ' '}}</td>
			<td>{{display.aaf==true ? 'yes' : ' '}}</td>
			<td>{{display.nbf==true ? 'yes' : ' '}}</td>
			<td>{{display.naf==true ? 'yes' : ' '}}</td>
            <td ng-click="edit_prescription($index)" ><span class="cursor-pointer" data-toggle="modal" data-target="#edit_prescription">Edit</span></td>
			<td ng-click="delete_prescription(display.drug_name)"><span class="cursor-pointer">Delete </span></td>
		</tr>
		  
	</table>
	<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20">&nbsp;</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16 pull-right">
				<input type="button" value="PRESCRIBE" class="btn btn-primary" ng-click="submit_prescription()"/>
			</div>
		</div>
	</div>
		
		

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
 </div><!-- /.container -->

 
 <!-- Modal -->


<!--Change password Modal -->
<div id="edit_prescription" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit {{editpres.drug_name}}</h4>
      </div>
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-1 modal-body">
	  <form class="form-horizontal"   ng-submit="change_prescription()"  >
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 padding-none font-16 padding-top-16">Dosage</div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 padding-none font-16">
			<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" ng-model="editpres.dosage" required=""  />
				  <span class="bar"></span>
				  <label class="label-text" >Dosage</label>
				  </div>
				</div>
		</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom table-responsive">
		<table class="table table-border text-center">
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
			
         <tr>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.mbf"/></td>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.maf"/></td>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.abf"/></td>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.aaf"/></td>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.nbf"/></td>
			<td><input type="checkbox" name="mbf" id="" value="mbf" ng-model="editpres.naf"/></td>
		</tr>
		  </table>
		</div>
				
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Change</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>
 

<!-- SCRIPT -->
<script type="text/javascript" src="js/checkup/checkup.js"></script>

</body>

</html>
