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
<script>
$(document).ready(function(){
    $('[data-toggle="print"]').tooltip();   
      
});
</script>
</head>

<body ng-app="previous">
	
<div class=" container-fluid" ng-controller="previous_controller" >




		
		

<div ng-include="'include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " id="opdayreport">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
	

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_op_bill">
					   <h3>OP BILLS</h3>
					 <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox"  >
					   </div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" >&nbsp;</div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >BILL NO</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th >Balance</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient in display_patient | filter:serachbox" > 
										
										<td>{{patient.bill_no}}</td>
										<td>{{patient.patient_name}}</td>
										<td>{{patient.date}}</td>
										<td>{{patient.cashamt}}</td>
										<td>{{patient.cardamt}}</td>
										<td>{{patient.balance}}</td>
										<td>{{patient.totalamt}}</td>
										<td><a href="#" ng-click="printsection(patient.bill_no)"><img src="../../icons/newicons/print.png" data-toggle="print" title="PRINT"></a></td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cashtotalamt}}</td>
										 <td>Card Total : {{cardtotalamt}}</td>
										 <td></td>
										 <td>Total : {{totalamt}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_ip_bill" >
					 <h3>IP BILLS</h3>
					 <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox"  >
					   </div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" >&nbsp;</div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >BILL NO</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th >Advance</th>
										<th >Balance</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient_ip in display_patient_ip | filter:serachbox" > 
										
										<td>{{patient_ip.bill_no}}</td>
										<td>{{patient_ip.patient_name}}</td>
										<td>{{patient_ip.date}}</td>
										<td>{{patient_ip.cashamt}}</td>
										<td>{{patient_ip.cardamt}}</td>
										<td>{{patient_ip.advance}}</td>
										<td>{{patient_ip.balance}}</td>
										<td>{{patient_ip.totalamt}}</td>
										<td><a href="#" ng-click="ipprintsection(patient_ip.bill_no)"><img src="../../icons/newicons/print.png" data-toggle="print" title="PRINT"></a></td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cashtotalamt_ip}}</td>
										 <td>Card Total : {{cardtotalamt_ip}}</td>
										 <td></td>
										 <td></td>
										 <td>Total : {{totalamt_ip}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_test_bill" >
					 <h3>TEST BILLS</h3>
					 <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox_test"  >
					   </div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" >&nbsp;</div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >BILL NO</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th >Balance</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient_test in display_patient_test | filter:serachbox_test" > 
										
										<td>{{patient_test.lab_billno}}</td>
										<td>{{patient_test.patient_name}}</td>
										<td>{{patient_test.date}}</td>
										<td>{{patient_test.cashamt}}</td>
										<td>{{patient_test.cardamt}}</td>
										<td>{{patient_test.balance}}</td>
										<td>{{patient_test.amount}}</td>
										<td><a href="#" ng-click="test_printsection(patient_test.lab_billno)"><img src="../../icons/newicons/print.png" data-toggle="print" title="PRINT"></a></td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cashtotalamt_test}}</td>
										 <td>Card Total : {{cardtotalamt_test}}</td>
										  <td></td>
										 <td>Total : {{totalamt_test}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_package_bill">
					 <h3>PACKAGE BILLS</h3>
					 <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox_package"  >
					   </div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" >&nbsp;</div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >BILL NO</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th >Balance</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient_package in display_patient_package | filter:serachbox_package" > 
										
										<td>{{patient_package.package_billno}}</td>
										<td>{{patient_package.patient_name}}</td>
										<td>{{patient_package.date}}</td>
										<td>{{patient_package.cashamt}}</td>
										<td>{{patient_package.cardamt}}</td>
										<td>{{patient_package.balance}}</td>
										<td>{{patient_package.totalamount}}</td>
										<td><a href="#" ng-click="package_printsection(patient_package.package_billno)"><img src="../../icons/newicons/print.png" data-toggle="print" title="PRINT"></a></td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cashtotalamt_package}}</td>
										 <td>Card Total : {{cardtotalamt_package}}</td>
										 <td></td>
										 <td>Total : {{totalamt_package}}</td>
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
		<!--  op print section -->
		 <div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printsection">
	        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	             
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>
					</div>
			<div style="height:20px;"><hr style="height:2px;"></div>
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="2" >
						<tr>
							<td >Patient Id </td>
							<td>{{make_payment.patient_id}}</td>
							
						</tr>
						
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{make_payment.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{make_payment.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{make_payment.age}}</td>
								
						</tr>
					</table>
				</div>
			
				
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
					    <tr>
							<td >Patient Name  </td>
							<td>{{make_payment.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{make_payment.doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{make_payment.date}}</td>
						</tr>
						<tr>
							<td >OPD Bill Number</td>
							<td>{{make_payment.bill_no}}</td>
						</tr>
						<tr>
							<td >Payment Mode</td>
							<td>{{make_payment.paymentmode}}</td>
						</tr>
					</table>	
				</div>
				
				
		  </div> 
		  
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:55%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Amount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Total</th>
					</tr>
					
					<tr style="height: 10px;" ng-repeat="print in show_service_taken">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index + 1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.total}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{make_payment.totalamt}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment.balance}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment.totalamt-make_payment.balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:500px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>
		  
	
	</div>
	
   <!--  op print section end here -->	
   <!--  ip print section -->
		 <div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="ip_printsection">
	        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	             
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>
					</div>
			<div style="height:20px;"><hr style="height:2px;"></div>
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="2" >
						<tr>
							<td >Patient Id </td>
							<td>{{make_payment_ip.patient_id}}</td>
							
						</tr>
						
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{make_payment_ip.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{make_payment_ip.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{make_payment_ip.age}}</td>
								
						</tr>
					</table>
				</div>
			
				
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
					    <tr>
							<td >Patient Name  </td>
							<td>{{make_payment_ip.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{make_payment_ip.doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{make_payment_ip.date}}</td>
						</tr>
						<tr>
							<td >OPD Bill Number</td>
							<td>{{make_payment_ip.bill_no}}</td>
						</tr>
						<tr>
							<td >Payment Mode</td>
							<td>{{make_payment_ip.paymentmode}}</td>
						</tr>
					</table>	
				</div>
				
				
		  </div> 
		  
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:55%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Amount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Total</th>
					</tr>
					
					<tr style="height: 10px;" ng-repeat="print_ip in show_ip_taken">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index + 1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_ip.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_ip.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_ip.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_ip.total}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{make_payment_ip.totalamt}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Advance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment_ip.advance}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment_ip.balance}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment_ip.totalamt - make_payment_ip.balance - make_payment_ip.advance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:500px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>
		  
	
	</div>
	
   <!--  ip print section end here -->	
   <!--  test print section -->	
	<div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="test_printsection">
	        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	             
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>
					</div>
			<div style="height:20px;"><hr style="height:2px;"></div>
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="2" >
						<tr>
							<td >Patient Id </td>
							<td>{{test_make_payment.patient_id}}</td>
							
						</tr>
						
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{test_make_payment.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{test_make_payment.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{test_make_payment.age}}</td>
								
						</tr>
					</table>
				</div>
			
				
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
					    <tr>
							<td >Patient Name  </td>
							<td>{{test_make_payment.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{test_make_payment.doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{test_make_payment.date}}</td>
						</tr>
						<tr>
							<td >OPD Bill Number</td>
							<td>{{test_make_payment.lab_billno}}</td>
						</tr>
						<tr>
							<td >Payment Mode</td>
							<td>{{test_make_payment.paymentmode}}</td>
						</tr>
					</table>	
				</div>
				
				
		  </div> 
		  
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:55%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Payment Mode</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Amount</th>
						
					</tr>
					
					<tr style="height: 10px;" ng-repeat="print_test in show_test_taken">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index + 1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_test.test_name}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_test.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print_test.price}}</td>
						
					</tr>
				
					<tr>
						<td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{test_make_payment.amount}}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_make_payment.balance}}</td>
					</tr>
					
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test_make_payment.amount-test_make_payment.balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:500px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>
		  
	
	</div>
	  <!--  test print section ends -->
	  
	   <!--  package print section -->	
	<div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="package_printsection">
	        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	             
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SRI LAKSHMI SUPER SPECILITY HOSPITAL</p></center>
						<center><p style="font-size: 10px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 10px;">Ph:080 41676336,M:9535566566</p></center>
					</div>
			<div style="height:20px;"><hr style="height:2px;"></div>
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="2" >
						<tr>
							<td >Patient Id </td>
							<td>{{package_make_payment.patient_id}}</td>
							
						</tr>
						
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{package_make_payment.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{package_make_payment.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{package_make_payment.age}}</td>
								
						</tr>
					</table>
				</div>
			
				
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
					    <tr>
							<td >Patient Name  </td>
							<td>{{package_make_payment.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{package_make_payment.doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{package_make_payment.date}}</td>
						</tr>
						<tr>
							<td >OPD Bill Number</td>
							<td>{{package_make_payment.package_billno}}</td>
						</tr>
						<tr>
							<td >Payment Mode</td>
							<td>{{package_make_payment.paymentmode}}</td>
						</tr>
					</table>	
				</div>
				
				
		  </div> 
		  
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:55%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Payment Mode</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Amount</th>
						
					</tr>
					
					<tr style="height: 10px;">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index + 1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.totalamount}}</td>
						
					</tr>
				
					<tr>
						<td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{package_make_payment.totalamount}}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.balance}}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.offer}}%</td>
					</tr>
					
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package_make_payment.totalamount-package_make_payment.balance}}</td>
					</tr>
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				<div style=" width:80px ;border-top:1px solid black;margin-left:500px ">
				 Signature 
				</div>
				
				</div>
				</div>
		
		  </div>
		  
	
	</div>
	  <!--  package print section ends -->
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
   <script src="../../js/previousbill/previousscript.js"></script> 
</body> <!-- Body End -->
</html>