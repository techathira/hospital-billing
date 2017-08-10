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

<body ng-app="reports">
	
<div class=" container-fluid" ng-controller="reports_controller" >




		
		

<div ng-include="'include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_all" id="report_all">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		  <h3>REPORTS</h3>
		
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="re.fromdate" />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="re.todate" ng-change="displayallreports()"/>
		   </div>
		    
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
     	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_all_inside">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Payment Mode</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th>Amount</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="reportall in display_all" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{reportall.description}}-{{reportall.bill_no}}</td>
										<td>{{reportall.date}}</td>
										<td>{{reportall.paymentmode}}</td>
										<td>{{reportall.cashamt}}</td>
										<td>{{reportall.cardamt}}</td>
										<td>{{reportall.totalamt}}</td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cash}}</td>
										 <td>Card Total : {{card}}</td>
										 <td>Total : {{total}}</td>
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

	


  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_op" id="show_all">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		  <h3>OP REPORTS</h3>
		
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="op.fromdate" />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="op.todate" ng-change="displayreports()"/>
		   </div>
		    
	  </div>
	  
     <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_op_div">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >patient ID</th>
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
									  <tr class="border-data-btm" ng-repeat="opdetails in display_op track by $index" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{opdetails.patient_id}}</td>
										<td>{{opdetails.description}}</td>
										<td>{{opdetails.date}}</td>
										<td>{{opdetails.cashamt}}</td>
										<td>{{opdetails.cardamt}}</td>
										<td>{{opdetails.balance}}</td>
										<td>{{opdetails.totalamt}}</td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total : {{cash}}</td>
										 <td>Card Total : {{card}}</td>
										 <td>Balance : {{opbalance}}</td>
										 <td>Total : {{total}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					    <div class=" col-sm-10 col-lg-10 col-xs-12 col-md-10">&nbsp;</div>
						<div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2">
							<a href="#" ng-click="opreportprint()"><img src="../../icons/newicons/print.png" style="height:25px;width:25px;"data-toggle="print" title="Print"></a>
					   </div>
					  
					 
					 
		</div>
 </div>
</div> 
		
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_ip" id="ipdayreport">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		    <h3>IP REPORTS</h3>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="ip.fromdate" />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="ip.todate" ng-change="displayipreports()"/>
		   </div>
		    
		   
		   
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="show_ip_div">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Bill NO</th>
										<th >Patient ID</th>
										<th >Patient Name</th>
										<th>Date</th>
										<th>Payment Mode</th>
										<th>Cash Total</th>
										<th>Card Total</th>
										<th>Advance</th>
										<th>Balance</th>
										<th>Payer Amount</th>
										<th>Patient Amount</th>
										<th>Discount</th>
										<th>Service Tax</th>
										<th>Total</th>
										
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="ipdetails in display_ip track by $index" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{ipdetails.bill_no}}</td>
										<td>{{ipdetails.patient_id}}</td>
										<td>{{ipdetails.description}}</td>
										<td>{{ipdetails.date}}</td>
										<td>{{ipdetails.paymentmode}}</td>
										<td>{{ipdetails.cashamt}}</td>
										<td>{{ipdetails.cardamt}}</td>
										<td>{{ipdetails.advance}}</td>
										<td>{{ipdetails.balance}}</td>
										<td>{{ipdetails.amount_payer}}</td>
										<td>{{ipdetails.amount_patient}}</td>
										<td>{{ipdetails.discount}}</td>
										<td>{{ipdetails.service_tax}}</td>
										<td>{{ipdetails.totalamt}}</td>
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
										 <td></td>
										 <td></td>
										 <td>Cash Total : {{cashamt}}</td>
										 <td>Card Total : {{cardamt}}</td>
										 <td>Advance Total: {{advance}}</td>
										 <td>Balance: {{ipbalance}}</td>
										 <td>Payer Amount: {{amountpayer}}</td>
										 <td>Patient Amount: {{amountpatient}}</td>
										 <td>Discount : {{totaldiscount}}</td>
										 <td>Service Tax: {{totservice_tax}}</td>
										 <td>Total : {{totalamt}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					   <div class=" col-sm-10 col-lg-10 col-xs-12 col-md-10">&nbsp;</div>
						<div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2">
							<a href="#" ng-click="ipreportprint()"><img src="../../icons/newicons/print.png" style="height:25px;width:25px;"data-toggle="print" title="Print"></a>
					   </div>
					 
					 
		</div>
 </div>
</div> 
	
	
			
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_package" id="package_report">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		    <h3>PACKAGE REPORTS</h3>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="package1.fromdate" />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="package1.todate" ng-change="packagereport()"/>
		   </div>
		    
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space"  ng-show="show_package_div" >
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Patient ID</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card AMount</th>
										<th >Balance</th>
										<th>Amount</th>
										
										
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="package_disp in package_disp track by $index" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td> {{package_disp.patient_id}}</td>
										<td> {{package_disp.description}}</td>
										<td> {{package_disp.date}}</td>
										<td> {{package_disp.cashamt}}</td>
										<td> {{package_disp.cardamt}}</td>
										<td> {{package_disp.balance}}</td>
										<td>{{package_disp.totalamt}}</td>
									
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td>Cash Total:{{packagecash}}</td>
									    
										 <td>Card Total:{{packagecard}}</td>
										 <td>Balance:{{package_balance}}</td>
										 <td>Total:{{packageamt}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					   <div class=" col-sm-10 col-lg-10 col-xs-12 col-md-10">&nbsp;</div>
						<div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2">
							<a href="#" ng-click="packagereportprint()"><img src="../../icons/newicons/print.png" style="height:25px;width:25px;"data-toggle="print" title="Print"></a>
					   </div>
					 
					 
		</div>
 </div>
</div> 
	
	

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " ng-show="show_test" id="test">


	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
		    <h3>TEST REPORTS</h3>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             From Date <input  class="datepicker" ng-model="op_test.fromdate" />
		   </div>
		   <div class="col-md-4 col-lg-4 col-xs-4 col-sm-4 ">
             To Date <input class="datepicker" ng-model="op_test.todate" ng-change="testreport()"/>
		   </div>
		     
	  </div>

 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space"  ng-show="show_test_div">
					
					 
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Patient ID</th>
										<th >Perticular</th>
										<th >Date</th>
										<th >Cash Amount</th>
										<th >Card Amount</th>
										<th >Balance</th>
										<th >Amount</th>
										
										
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="testdetails in testdetails track by $index" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>  {{testdetails.patient_id}}</td>
										<td>  {{testdetails.description}}</td>
										<td>{{testdetails.date}}</td>
										<td>{{testdetails.cashamt}}</td>
										<td>{{testdetails.cardamt}}</td>
										<td>{{testdetails.balance}}</td>
										<td>{{testdetails.totalamt}}</td>
										
										
										
										
									  </tr>
									  <tr>
									    <td></td>
									    <td></td>
									    <td></td>
									    <td></td>
									    
									    <td>Cash Total :{{testcash}}</td>
									 
										 <td>Card Total:{{testcard}}</td>
										 <td>Balance:{{test_balance}}</td>
										 <td>Total : {{testamount}}</td>
									 </tr>
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					   <div class=" col-sm-10 col-lg-10 col-xs-12 col-md-10">&nbsp;</div>
						<div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2">
							<a href="#" ng-click="testreportprint()"><img src="../../icons/newicons/print.png" style="height:25px;width:25px;"data-toggle="print" title="Print"></a>
					   </div>
					 
					 
		</div>
 </div>
</div> 	
		
		
	</div>
 
 
<!-- Print setion of op strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printop">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 20px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 20px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 20px;">Ph:080 41676336,M:9535566566</p></center>
						<img src="print_barcode.php?barcode_to_print={{personal_details.barcode}}"/>
					</div>
						<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:50px"> 	
			
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:20px;margin-top:30px">
				<table style="border:1px solid black;width:100%;page-break-inside:auto">
							<thead style=" display:table-header-group" >
						<tr style="page-break-inside:avoid; page-break-after:auto"><th>heading</th></tr>
					</thead>
					<tfoot style="display:table-footer-group">
						<tr style="page-break-inside:avoid; page-break-after:auto"><td>notes</td></tr>
					</tfoot>
					<tr style="height: 25px;page-break-inside:avoid; page-break-after:auto">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Patient ID</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:25%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Date</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Cash</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Card</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;page-break-inside:avoid; page-break-after:auto" ng-repeat="op in display_op">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.patient_id}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.date}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.cashamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.cardamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{op.totalamt}}</td>
					</tr>
			  	
					<tr style="page-break-inside:avoid; page-break-after:auto">
					   <td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Cash Total:{{cash}}</td>
						
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Card Total:{{card}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Balance:{{opbalance}}</td>
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

<!-- Print setion ip strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printip">
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
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Bill NO</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Patient ID</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:25%">Patient </th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Date</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Payment</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Cash</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Card</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Advance</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Balance</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Payer Amount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Patient Amount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Discount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Service Tax</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					
					<tr style="height:10px;" ng-repeat="ip in display_ip">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{ip.bill_no}}</td>
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{ip.patient_id}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.date}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.cashamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.cardamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.advance}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.balance}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.amount_payer}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.amount_patient}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.discount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.service_tax}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{ip.totalamt}}</td>
					</tr>
			  	
					<tr>
					   <td colspan="7" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Cash Total:{{cashamt}}</td>
						
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Card Total:{{cardamt}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Advance Total:{{advance}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Balance:{{ipbalance}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Payer Amount :{{amountpayer}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Patient Amount :{{amountpatient}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Discount:{{totaldiscount}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Service Tax:{{totservice_tax}}</td>
						<td  style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left;padding:2px;">Total Amount:{{totalamt}}</td>
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

<!-- Print setion package strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printpackage">
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
					<tr style="height:10px;" ng-repeat="package in package_disp">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package.date}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package.cashamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package.cardamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{package.totalamt}}</td>
					</tr>
			  
					<tr>
					   <td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Cash Total:{{packagecash}}</td>
						
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Card Total:{{packagecard}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Balance:{{package_balance}}</td>
						<td  style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left;padding:2px;">Total Amount:{{packageamt}}</td>
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

<!-- Print setion test strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printtest">
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
					<tr style="height:10px;" ng-repeat="test in testdetails">
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.date}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.cashamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.cardamt}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.totalamt}}</td>
					</tr>
			  	 
					<tr>
					   <td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Cash Total:{{testcash}}</td>
						
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Card Total:{{testcard}}</td>
						<td style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left">Balance:{{test_balance}}</td>
						<td  style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:left;padding:2px;">Total Amount:{{testamount}}</td>
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
   <script src="../../js/reportscript/reportscript.js"></script> 
</body> <!-- Body End -->
</html>