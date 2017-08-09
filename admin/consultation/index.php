<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="admin")
{
	
}
else{
	header('Location: ../../login/index.html');
	die();
	
}
?>

<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
<link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' media='print' />

  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
<script src='../../js/jquery.min.js'></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>
<script src="../../js/datepicker/jquery-ui.js"></script>

</head>

<body ng-app="reports">
	
<div class=" container-fluid" ng-controller="reports_controller" >




		
		

<div ng-include="'../include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_op" id="opdayreport">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		  <h3>Consulted Doctors</h3>
		
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="op.fromdate" ng-change="set_from_date()"  />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="op.todate"/>
		   </div>
		    <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             <select class="form-control drop-down-btn" id="country" name="country" ng-model="op.doctor_id" ng-change="display_doctor_reports()">
													<option  value=""selected="selected">Select Doctors</option>
													<option  value="All">All</option>
													<option name="" ng-repeat="receptionist in receptionists" value="{{receptionist.doctor_id}}">{{receptionist.doctor_name}}</option>
													
												  </select>
		   </div>
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_op_div">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Patient Name</th>
										<th >Doctor Name</th>
										<th >Date</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="opdetails in display_op" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{opdetails.patient_name}}</td>
										<td>{{opdetails.doctor_name}}</td>
										<td>{{opdetails.consulted_date}}</td>
										<td>{{opdetails.amount}}</td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    
										 <td>Total : {{total}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
 </div>
</div> 
		
		
	</div>
 
 
 
 
</div> 
</div>  <!-- Container End -->

   <script>
  $( function() {
    $( ".datepicker" ).datepicker(
	   {
           dateFormat: 'yy-mm-dd'	   
 	   }
	
	
	
	);
  
  });
  </script>
   <script src="../../js/consultation/reportscript.js"></script> 
</body> <!-- Body End -->
</html>