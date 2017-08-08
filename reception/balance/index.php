<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="Reciptionist")
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

<body ng-app="balance">
	
<div class=" container-fluid" ng-controller="balance_controller" >




		
		

<div ng-include="'include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 "  id="report_all">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		  <h3>Balance</h3>
		     <div>
			         <input type="text" class="form-control doctor-search-btn " placeholder="Search Patient Name" id="patientid"  ng-model="patient_id" ng-change="display_patient_details()">
			 </div>
		    
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
     	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_all_inside">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description</th>
										<th >Patient ID</th>
										<th >Patient Name</th>
										<th >Phone</th>
										<th >Date</th>
										<th >Balance</th>
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="reportall in balance_patient" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{reportall.description}}-{{reportall.bill_no}}</td>
										<td>{{reportall.patient_id}}</td>
										<td>{{reportall.patient_name}}</td>
										<td>{{reportall.phone}}</td>
										<td>{{reportall.date}}</td>
										<td> {{reportall.balance}}</td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
										 <td>Total</td>
										 <td>{{totalamt}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					    <div class=" col-sm-10 col-lg-10 col-xs-12 col-md-10">&nbsp;</div>
					    						
					  
					 
					 
		</div>
 </div>
</div> 

	


</div> 	
		
		
	
 
 
<!-- Print setion of op strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printop">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>
					</div>
						<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:50px"> 	
			
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:20px;margin-top:30px">
				<table style="border:1px solid black;width:100%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:25%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Date</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Cash</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Card</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;" ng-repeat="op in display_op">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.date}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.cashamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.cardamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.totalamt}}</td>
					</tr>
			  	
					<tr>
					   <td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Cash Total:{{cash}}</td>
						
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Card Total:{{card}}</td>
						<td  style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left;padding:2px;">Total Amount:{{total}}</td>
					</tr>
					
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:800px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>


<!-- print section ends here -->
 
 

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
   <script src="../../js/balancescript/balancescript.js"></script> 
</body> <!-- Body End -->
</html>