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

<body ng-app="balance">
	
<div class=" container-fluid" ng-controller="balance_controller" >




		
		

<div ng-include="'../include/header.html'"></div>
		

	
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
										<th >Paying</th>
										<th >Balance</th>
										<th ></th>
										<th ></th>
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
										<td> <input type="text" class="form-control" ng-model="paying"></td>
										<td> {{reportall.balance-paying}}</td>
										<td><a href="#" ng-click="balanceprint(reportall.bill_no,reportall.description,reportall.balance,paying)"><img src="../../icons/newicons/print.png" data-toggle = "modal" data-target = "#edit_package" title="PRINT"></a></td>
										
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
					    <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2"></div>
						
					  
					 
					 
		</div>
 </div>
</div> 

	


</div> 	
		
	
 <!--edit package -->
<div class = "adjust-model modal fade" id = "edit_package" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-package-model-size">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Balance
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="padding-top:0px;" for="name">Bill NO</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="balance_bill_no" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
		
			  </div>
			</div>
			 			
 
	     <div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Description</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="des" readonly>
			  </div>
			  
		</div>  
		<div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient ID</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="patient_id" readonly>
			  </div>
			  
		</div>
		
		<div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Paying</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="payable" readonly>
			  </div>
			  
		</div> 
		<div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Balance</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="bal" readonly>
			  </div>
			  
		</div> 
			 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
							<div class="col-md-12 col-sm-12 col-lg-12 form-group align-input-space font-lato-12-bold">
					       
					        
						    <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Payment Mode </label>
						    <div class=" col-sm-6 col-lg-6 col-xs-12 col-md-6" style="height: 100%;margin-top: 10px;" >
								<input type="radio" name="payment1" value="Cash" checked="checked" style="margin-left: -26%;" ng-model="paymentmode" >Cash
								<input type="radio" name="payment1" value="Card" style=" margin-left:8%;" ng-model="paymentmode" > Card
								<input type="radio" name="payment" value="Both" style="margin-left: 5%;" ng-model="paymentmode" ng-click="click_paymentmodepackage(paymentmode)"> Devide
										<div ng-show="devidebalance">
												Cash <input type="number" name="cash" ng-model="display_pay_details1.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="display_pay_details1.devidecard" value="{{payable - display_pay_details1.devidecash}}"/></br> 
												Total <input type="number" name="totalamount" value="{{payable}}"/>		
										</div>
						    </div>
							
						   <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
						  
						   </div>
						  </div>
					
					
			  
		</div> 
			
			
		  
    </div>
     		    
        
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="printbalance()" >
               Print 
            </button>
         </div>
		  </form>
         </div> 
      </div>
 
 
 
 
 </div>	
	
 
 
<!-- Print setion of op strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printsection">
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
			            <div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient ID  </td>
							<td>{{make_payment.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{make_payment.phone}}</td>
								
						</tr>
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;margin-top:-170px;margin-left:300px;">
					<table cellpadding="10">
						<tr>
							<td >Patient Name  </td>
							<td>{{make_payment.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Date : &nbsp;</td>
							<td>{{make_payment.date}}</td>
								
						</tr>
						
					</table>
				</div>
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:20px;margin-top:30px">
				<table style="border:1px solid black;width:100%;">
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:25%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Payment Mode</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Payed</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:15%">Balance</th>
						
					</tr>
					<tr style="height:20px;" >
						<td style="border-right:1px solid black;padding-left:5px;padding:4px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">Balance Amount - {{make_payment.bill_no}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment.paying}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{make_payment.balance}}</td>
						
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