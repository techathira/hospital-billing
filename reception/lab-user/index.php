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
<html lang="en">
<head>
<meta charset="UTF-8">

 
<link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css" >
<link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' />

  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
<script src='../../js/jquery.min.js'></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../../js/angular.min.js"></script>
<script src="../../js/checklist-model.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>



  

</head>

<body ng-app="user_lab">
<div class=" container-fluid" >
<div class="row" ng-controller="user_lab_controller" ng-cloak>
 <div ng-include="'../include/header.html'">
 </div>

<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9">
		
 </div>
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<!--<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#addpatient" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Register</span></span></button>-->
 </div>
 </div>
 

<div class="">

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
		
			<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
			 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont " id="box">
					  <div class="col-md-1 col-lg-1 col-xs-1 col-sm-1 ">&nbsp;</div>
					  <div class="col-md-10 col-lg-10 col-xs-10 col-sm-10 user-lab-tab tab-shadow tab-gap ">
						<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
							<div class="group col-md-6 col-sm-6 col-lg-6"> 
								<div class="col-md-12 col-sm-12 col-lg-12">	
									  <input type="text" required class="module-input" ng-model="patient_id" id="patientid">
								  <span class="bar"></span>
								  <label class="label-text">Enter Patient Id/ Phone No</label>
								  </div>
								</div>
								<div class="group col-md-6 col-sm-6 col-lg-6"> 
								<div class="col-md-12 col-sm-12 col-lg-12">	
									  <input type="text" required class="module-input " ng_model="doctor_name"  id="doctorid">
								  <span class="bar"></span>
								  <label class="label-text">Enter Doctor Name </label>
								  </div>
								</div>
						<div class="group align-input-space font-lato-12-bold col-md-6 col-sm-6 col-lg-6">
							  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: -7%;" for="name">Referal Doctor</label>
							  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
							  
							  
											  <select class="form-control drop-down-btn" style="margin-left: 1%;"  ng-model="referal.ref_doctor_list" >
												<option  value=""selected="selected">If any</option>
												<option name="" ng-repeat="ref in display_ref_doc" value="{{ref.ref_doc_id}}">{{ref.ref_name}}</option>
												
											  </select>
											  
								 
							  </div>
							  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div> 
					  <div class="col-md-12 col-sm-12 col-lg-12 form-group align-input-space font-lato-12-bold">
					  <div class="col-md-4 col-sm-4 col-lg-4 ">&nbsp;</div>
					        
						  <label class="control-label col-sm-2 col-lg-2 col-xs-12 col-md-2 align-label lable-add-input" for="name"> Select </label>
						  <div class=" col-sm-3 col-lg-3 col-xs-12 col-md-3" style="height: 100%;margin-top: 10px;" >
							 <input type="radio" name="tests" value="test" id="test"  ng-model="flag" style="margin-left: -29%;" ng-click="click()" ng-model="test" > Test
							<input type="radio" name="tests" value="package" id="package" ng-model="flag" style=" margin-left: 20%;"  ng-click="click_package()" ng-model="test"> Package<br>
						  </div>
						  <div class=" col-sm-3 col-lg-3 col-xs-12 col-md-3">
						  
						  </div>
						</div>
						<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
							
						

					<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="show_test" >
						       <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Test Name" ng-model="serachbox"  >
							<div class=" col-md-12 col-sm-12 col-lg-12 tbl-back-color" >
							   
							
								<div class="form-group align-input-space font-lato-12-bold">
									 <div class=" col-md-3 col-sm-3 col-lg-3 " ng-repeat="test_name in display_test | filter:serachbox" style="text-align: left;">
										 <input type="checkbox" name="test" ng-model="test_name.checked" ng-click="addtest(test_name)"style="margin-right:5%;text-align: left;" >{{test_name.test_name}}
										
								    </div> 
										 
										
									  
							</div>
							
					  </div>
					</div>
					
					
					
					<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12"  ng-show="show_package" >
						      <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">&nbsp;</div>
						      <div class="col-md-2 col-lg-2 col-xs-12 col-sm-2"><center><p>Package Selected</p></center></div>
						      <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">&nbsp;</div>
							 
							<div class=" col-md-12 col-sm-12 col-lg-12 tbl-back-color" >
							
							
								
								<table id="tbl"  class="table user-lab-tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th  >Package Name</th>
										<th >No of Test</th>
										<th >Price</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm"  ng-repeat="package in display_package">
										
										<td class=" left-padding" >{{$index + 1}}</td>
										<td> {{package.package_name}}</td>
										<td> {{package.no_of_test}}</td>
										<td  >{{package.totalprice}}</td>
										<td>		<a href="#" class="adjustedit" data-toggle = "modal" data-target = "#edit_package"  ng-click="package_edit(package.package_id)"  >Select</a> </td>
									  </tr>
									</tbody>
								</table>
							

					  </div>
					</div>

					
					<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >&nbsp;</div>
					<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9" >&nbsp;</div>
					<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 " >
							<div class=" col-md-12 col-sm-12 col-lg-12 tbl-back-color" ng-show="show_test" >
							   
							
								<div class="form-group align-input-space font-lato-12-bold">
									 <div class=" col-md-12 col-sm-12 col-lg-12 " >
									       
							  <table id="tbl"  class="table user-lab-tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th  >Test Name</th>
										<th >Test Price</th>
										<th >Additional Charges</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm"  ng-repeat="selected_test in test_name" >
										
										<td class=" left-padding" >{{$index + 1}}</td>
										<td> {{selected_test.test_name}}</td>
										<td> {{selected_test.price}}</td>
										<td ><input type="text" required class="module-input " value="0" ng-model="addtional[selected_test.test_id]"></td>
									  </tr>
									</tbody>
								</table>
										
								    </div> 
										 
										
									  
							</div>
							
					  </div>
					</div>
					<div class="group col-md-3 col-lg-3 col-xs-3 col-sm-3" > 
						
								
				    </div>
				    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
					    
				        <div class="col-md-7 col-lg-7 col-xs-12 col-sm-7" ng-show="totalbox">
							<div class="col-md-12 col-sm-12 col-lg-12 form-group align-input-space font-lato-12-bold">
					        
						    <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name" style="margin-top: 2%;">Payment Mode </label>
						    <div class=" col-sm-7 col-lg-7 col-xs-12 col-md-7" style="height: 100%;margin-top: 10px;" >
							 <input type="radio" name="payment" value="Cash" checked="checked" id="Cash" style="margin-left: -29%;" ng-model="paymentmode" ng-click="click_payment(paymentmode)" >Cash
							<input type="radio" name="payment" value="Card" style=" margin-left: 20%;"  id="Card"  ng-model="paymentmode" ng-click="click_payment(paymentmode)" >Card
							<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="paymentmode" ng-click="click_paymentmode(paymentmode)"> Devide
										<div ng-show="devide" >
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{total2 - display_pay_details.devidecash}}"/>  </br>
												Total <input type="number" name="totalamount" ng-model="total2" />		
										</div>
							
						    </div>
							<div class="col-md-1 col-sm-1 col-lg-1" style="margin-top: 10px;margin-left: -10%;">
						     Balance
					        </div>
							 <div class="col-md-1 col-sm-1 col-lg-1" style="margin-top: 10px;" >
								<input type="text" name="" id="" value="0" ng-model="balance"/>
							 </div>
						   <div class=" col-sm-1 col-lg-2 col-xs-12 col-md-2">
						  
						   </div>
						  </div>
					
					</div>
					<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" ng-show="show_test" ><button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" ng-click="check_total()" >check total</button></div>
					    <div class="form-group align-input-space font-lato-12-bold" ng-show="totalbox" >
							
							 <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2" style="height: 100%;">
						<input type="text" class="form-control font-lato-12-bold" id="name" style="height: 30px!important;" ng-model="total2" readonly>
							  </div>
							  
						</div>
					
					<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >&nbsp;</div>
					<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9" >
							
					
					</div>
					<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3" ng-show="show_test"> 
						<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#addpatient"   ng-click="print_screen(patient_id)" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Print</span></span></button>
				    </div>
				    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
				 </div>
				 <div class="col-md-1 col-lg-1 col-xs-1 col-sm-1 ">&nbsp;</div>			
							
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
                 Add Package
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="padding-top:0px;" for="name">Package Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="edit_package.package_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
		
			  </div>
			</div>
			 			
 
	     <div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="total" readonly>
			  </div>
			  
		</div> 
			 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
							<div class="col-md-12 col-sm-12 col-lg-12 form-group align-input-space font-lato-12-bold">
					       
					        
						    <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Payment Mode </label>
						    <div class=" col-sm-6 col-lg-6 col-xs-12 col-md-6" style="height: 100%;margin-top: 10px;" >
								<input type="radio" name="payment1" value="Cash" checked="checked" style="margin-left: -26%;" ng-model="paymentmode" >Cash
								<input type="radio" name="payment1" value="Card" style=" margin-left:8%;" ng-model="paymentmode" > Card
								<input type="radio" name="payment" value="Both" style="margin-left: 5%;" ng-model="paymentmode" ng-click="click_paymentmodepackage(paymentmode)"> Devide
										<div ng-show="devidepackage">
												Cash <input type="number" name="cash" ng-model="display_pay_details1.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="display_pay_details1.devidecard" value="{{total - display_pay_details1.devidecash}}"/></br> 
												Total <input type="number" name="totalamount" value="{{total}}"/>		
										</div>
						    </div>
							<div class="col-md-1 col-sm-1 col-lg-1" style="margin-top: 10px;margin-left: -10%;">
						     Balance
					        </div>
							 <div class="col-md-1 col-sm-1 col-lg-1" style="margin-top: 10px;" >
								<input type="text" name="" id="" value="0" ng-model="balancepackage"/>
							 </div>
						   <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
						  
						   </div>
						  </div>
					
					
			  
		</div> 
			
			
		  
    </div>
     		    
        
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="print_op_lab(edit_package.package_id)" >
               Print 
            </button>
         </div>
		  </form>
         </div> 
      </div>
 
 
 
 
 </div>
 
 </div>
  <!-- print -->
 <div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="packageprintsection">
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
					<table cellpadding="2">
						<tr>
							<td >Patient ID  </td>
							<td>{{screen_print.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{screen_print.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{screen_print.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{screen_print.age}}</td>
								
						</tr>
					</table>
				</div>
			
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
					    <tr>
							<td >Patient Name  </td>
							<td>{{screen_print.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{screen_print.date}}</td>
						</tr>
						<tr>
							<td >Package Bill Number</td>
							<td>{{screen_print.billno}}</td>
						</tr>
						<tr>
							<td ></td>
							<td></td>
						</tr>
					</table>	
				</div>
		  </div> 
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Payment</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;" >
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.totalamount}}</td>
					</tr>
					
					<tr>
						<td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{screen_print.totalamount}}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{balancepackage}}</td>
					</tr>
				    <tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Package Discount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.offer}}%</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.totalamount-balancepackage}}</td>
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
					<table cellpadding="2">
						<tr>
							<td >Patient ID  </td>
							<td>{{screen_print.personal.patient_id}}</td>
							
						</tr>
						 <tr>
							<td >Patient Name  </td>
							<td>{{screen_print.personal.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Contact number : &nbsp;</td>
							<td>{{screen_print.personal.phone}}</td>
								
						</tr>
						<tr>
							<td >Gender : &nbsp;</td>
							<td>{{screen_print.personal.gender}}</td>
						</tr>
						<tr>
							<td >Age : &nbsp;</td>
							<td>{{screen_print.personal.age}}</td>
								
						</tr>
					</table>
				</div>
			
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-110px;margin-left:300px;" >
					<table cellpadding="2" >
                      
						<tr>
							<td >Refered Doctor : &nbsp;</td>
							<td>{{screen_print.personal.ref_name}}</td>
						</tr>						
					   <tr>
							<td >Consulted To : &nbsp;</td>
							<td>{{doctor_name}}</td>
						</tr>
						<tr>
							<td >Date</td>
							<td>{{screen_print.personal.date}}</td>
						</tr>
						<tr>
							<td >Lab Bill Number</td>
							<td>{{screen_print.personal.billno}}</td>
						</tr>
						<tr>
							<td ></td>
							<td></td>
						</tr>
					</table>	
				</div>
				
								
		  </div> 
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:100px;">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Payment</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;" ng-repeat="test in screen_print.testdata">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.test_name}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.personal.paymentmode}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{test.price}}</td>
					</tr>
					
					<tr>
						<td colspan="3" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding:2px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{screen_print.personal.total_sum}}</td>
					</tr>
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{balance}}</td>
					</tr>
				
					<tr>
						<td colspan="3" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{screen_print.personal.total_sum-balance}}</td>
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
	
	
	
	  
     <!-- print ends -->
 </div> <!-- Row End -->

</div>  <!-- Container End -->
<script src="../../js/datepicker/jquery.js"></script>
<script src="../../js/datepicker/jquery-ui.js"></script>
 

<script>
   $("#dob").datepicker({
	inline: true
   });
</script>
<script type="text/javascript" src="../../js/user_labscript/user_labscript.js"></script>

</body> <!-- Body End -->

</html>
