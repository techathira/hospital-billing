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
  <link rel="stylesheet" href="../../css/style.css">
  <link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' media='print' />
  <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
   
  <script src="../../js/jquery.min.js"></script> 
  <script src="../../js/bootstrap.min.js"></script> 
  <script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>  



  

</head>

<body ng-app="patient">
<div class=" container-fluid" ng-controller="patient_controller" ng-cloak >
<div class="row"  >
 <div ng-include="'../../reception/include/header.html'">
 </div>

<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
		
 </div>
 
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#add_patient" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Register</span></span></button>
 </div>
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#edit_patient" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Edit Patient</span></span></button>
 </div>
 </div>
 

<div class="">

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  


 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
   
	      <div class="group col-md-6 col-sm-6 col-lg-6"> 
					<div class="col-md-12 col-sm-12 col-lg-12">	
						  <input type="text" required class="module-input "  id="patientid"  ng-model="patient_id" ng-change="display_patient_details()">
					  <span class="bar"></span>
					  <label class="label-text">Enter Patient ID/Phone No</label>
					      <div ng-show="errormsg" class="error-color" >Patient Doesn't Exist, Kindly Register.</div>
					      <div ng-show="errormsg2" class="error-color">Patient Hasn't Taken Services/Consultation Yet.</div>
					      <div ng-show="errormsg3" class="error-color">Please Enter patient Id.</div>
					  </div>
					  
					
					</div>
			 <div class="form-group align-input-space font-lato-12-bold col-md-6 col-sm-6 col-lg-6">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: -7%;" for="name">Referal Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<!--		<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="referal.ref_doctor_list"  >
			  -->
							 <select class="form-control drop-down-btn" style="margin-left: 1%;"  ng-model="referal.ref_doctor_list" >
							    <option  value=""selected="selected">If any</option>
								<option name="" ng-repeat="ref in display_ref_doc" value="{{ref.ref_doc_id}}">{{ref.ref_name}}</option>
								
							  </select>  
							  
				 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
					<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" ng-show="show_button" >
						<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
							<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#consultation" ng-click="consultation()"><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Consultation</span></span></button>
						</div>
						<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
							<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#add_service" ng-click="services()"><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Service</span></span></button>
						</div>
						
					</div>
					
		
			
						
			<!--	<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4  doct-tab tab-shadow tab-gap" style="margin-top: 10px;overflow-x:auto;" data-toggle = "modal" data-target = "#displaydetails" ng-repeat="spe in display_specialization | filter:search ">
			 -->
					<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space" ng-show="doctor_hide">
					
					  
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th >Description </th>
										<th >Quantity</th>
										<th >Amount</th>
										<th >Total</th>
										
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="spe in show_service_taken "> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										
										<td class=" left-padding">{{$index+1}}</td>
										<td> {{spe.description}}</td>
										<td >{{spe.quantity}}</td>
										<td >{{spe.amount}}</td>
										<td>{{spe.total}}</td>
										
										
										
									  </tr>
									
									  
								
									</tbody>
					  </table>
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
					 <div class="col-md-10 col-sm-10 col-lg-10">&nbsp;</div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						Total Amount 
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" ng-model="totalamt" readonly/>
					 </div>
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">&nbsp;</div>
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
						<div class="col-md-4 col-sm-4 col-lg-4 col-xs-4">&nbsp;</div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Cash <input type="radio" name="payment" id=""  value="Cash" ng-model="payment_mode" checked required /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Card <input type="radio" name="payment" id="" value="Card" ng-model="payment_mode" required  /></div>
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2">Devide<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="payment_mode" ng-click="click_payment(payment_mode)" required >
						<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2" ng-show="devide">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" />
												
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{totalamt - display_pay_details.devidecash}}"/> 
												Total <input type="number" name="totalamount" ng-model="totalamt" />		
										</div>

					 </div>
					  <div class="col-md-1 col-sm-1 col-lg-1">
						Balance
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<input type="text" name="" id="" value="0" ng-model="balance"/>
					 </div>
					 </div> 
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">&nbsp;</div>
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 ">
					 <div class="col-md-10 col-sm-10 col-lg-10">&nbsp;</div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						
					 </div>
					 <div class="col-md-1 col-sm-1 col-lg-1">
						<button type = "submit" class = "btn btn-primary align-submit"  ng-click="print_receipt()">
               Print
            </button>
					 </div>
					 
					 </div> 
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
		
		
	
			 
			</div>
				
				
			
 </div>
 


<!-- Add Patient Modal -->
<div class = "adjust-model modal fade" id = "add_patient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form class="form-horizontal" name="add_patient"  ng-submit="add_patients()" novalidate >
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_name" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_add.patient_name"  placeholder="Enter Patient Name" required>
			    <span class="err" ng-show="add_patient.patient_name.$error.required">Please Enter Patient Name</span>   
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-1 col-md-1">
			  
			  </div>
			</div>
			
			
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Date of Birth</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text"  class="form-control  align-input-ele font-lato-12-bold calender-input" ng-model="patient_add.date_of_birth"  placeholder="Enter Date of Birth" >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			   
			  </div>
			</div>
			
			
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Age</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" name="patient_age" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_add.age"  placeholder="Enter Age" required>
				<span class="err" ng-show="add_patient.patient_age.$error.required">Please Enter Patient Age</span> 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Gender</label>
			   <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;text-align: left;" >
					  
								 <label class="radio-inline">
										<input type="radio" name="gender" value="Male" checked="checked" ng-model="patient_add.gender">Male
								</label>
								<label class="radio-inline">
								  <input type="radio" name="gender" value="Female" ng-model="patient_add.gender">Female
								</label>				
					  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Address</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text"  name="patient_address" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_add.address" placeholder="Enter Address" required>
				<span class="err" ng-show="add_patient.patient_address.$error.required">Enter Patient Address</span>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Phone</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_phone" class="form-control align-input-ele font-lato-12-bold" maxlength="10" ng-model="patient_add.phone"  placeholder="Enter Pnone No"  required>
				<span class="err" ng-show="add_patient.patient_phone.$error.required">Enter Phone Number</span>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Email Id</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_mail" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_add.email"  placeholder="Enter Email" >
				<span class="err" ng-show="add_patient.patient_mail.$error.required">Enter Email Address</span>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit"  class = "btn btn-primary align-submit">
               Add
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content  ng-disabled="add_patient.$invalid"  -->
   </div><!-- /.modal-dialog -->
  
<!-- edit Patient Modal -->
<div class = "adjust-model modal fade" id = "edit_patient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form class="form-horizontal"   novalidate >
		  
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Phone</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold  " ng-model="edit.patient_id" id="patientid1" ng-change="edit_patient()" >
					
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_name" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_edit.patient_name" >
			     
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-1 col-md-1">
			  
			  </div>
			</div>
			
			
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Date of Birth</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text"  class="form-control  align-input-ele font-lato-12-bold calender-input" ng-model="patient_edit.dob"  placeholder="Enter Date of Birth" >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			   
			  </div>
			</div>
			
			
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Age</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_age" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_edit.age"  placeholder="Enter Age" >
				
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Gender</label>
			   <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;text-align: left;" >
					  
								 <label class="radio-inline">
										<input type="radio" name="gender" value="Male" checked="checked" ng-model="patient_edit.gender">Male
								</label>
								<label class="radio-inline">
								  <input type="radio" name="gender" value="Female" ng-model="patient_edit.gender">Female
								</label>				
					  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Address</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text"  name="patient_address" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_edit.address" placeholder="Enter Address" required>
				
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Phone</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_phone" class="form-control align-input-ele font-lato-12-bold" maxlength="10" ng-model="patient_edit.phone"  placeholder="Enter Pnone No"  readonly>
				
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Email Id</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" name="patient_mail" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_edit.email"  placeholder="Enter Email" >
				
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" ng-click="update_patient()" class = "btn btn-primary align-submit">
               Update
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content  ng-disabled="add_patient.$invalid"  -->
   </div><!-- /.modal-dialog -->
  

  
<!-- Consultation Modal -->
<div class = "adjust-model modal fade" id = "consultation" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Consult Doctor
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Patient Id</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patientname.patient_id"  placeholder="Enter Patient ID" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="patientname.patient_name" readonly >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			   
			  </div>
			</div>
			
			
				 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: -7%;" for="name">Select Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			  
			  
							  <select class="form-control drop-down-btn" style="margin-left: 1%;"  ng-model="doctors.doctor_list"   ng-change="doctor_details()">
							    <option  value=""selected="selected">Select Doctors</option>
								<option name="" ng-repeat="doctors in display_doctor" value="{{doctors.doctor_id}}">{{doctors.doctor_name}},{{doctors.specialization}}</option>
								
							  </select>
							  
				 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold" ng-show="others">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Doctor Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="doctor_specialization.specialization">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>

			<div class="form-group align-input-space font-lato-12-bold" ng-show="specia">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Specialization</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="doctor_specialization.specialization"  readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Consultation Fee</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold"  ng-model="doctor_specialization.fee"  >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>

			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="addConsutation()" >
               Consult
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  

  
  
<!-- Add  service Modal -->
<div class = "adjust-model modal fade" id = "add_service" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Service
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-top: -3%;" for="name">Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="patientname.patient_id">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-top: -3%;" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="patientname.patient_name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
		 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: -7%;" for="name">Select Service</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			  
			  
							  <select class="form-control drop-down-btn" style="margin-left: 1%;" ng-model="service.list_service"  ng-change="service_price()">
							    <option  value=""selected="selected">Select Service</option>
								<option name="" ng-repeat="services in display_service" value="{{services.service_id}}">{{services.service_name}}</option>
								
							  </select>
				 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="display_service_price.price"  placeholder="Enter Service Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;">
				   <a id="add-emp"  href="#" ng-click="add_temp_service(serviceS)">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;" >Add Service</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			  
			<div class=" col-md-12 col-sm-12 col-lg-12 tbl-back-color" ng-show="show_div">
							
							
								
								<table id="tbl"  class="table service-lab-tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Patient ID</th>
										<th  >Service Name</th>
									
										<th >Price</th>
										<th></th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="names in disp_service">
										  <td class="hidden">{{$index  }}</td>
										<td class=" left-padding" >{{patientname.patient_id}}</td>
										<td  >{{names.service_name}}</td>
										<td>{{names.price}}</td>
										
										<td><a href="#" ><img src="../../icons/employee/addemp.png"  ng-click="delete_temp_service($index)" ></a></td>
										<td class="hidden">{{$index + 1}}</td>
									  </tr>
									</tbody>
								</table>
							
							<div class=" col-md-1 col-sm-1 col-lg-1 " >&nbsp;</div>
					  </div>
    </div>
     		 
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit"  ng-click-options ="{preventDoubleClick:true}" ng-click="service_add_details()" ng-disabled="disbale_button">
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   

 
   <!--display Modal -->
<div class = "adjust-model modal fade" id = "select_doctor" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Display Details
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  <input type="hidden" class="form-control align-input-ele font-lato-12-bold" ng-model="select_doctor.doctor_id"  placeholder="Enter Doctor Name">
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="select_doctor.doctor_name"  placeholder="Enter Doctor Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" readonly ng-model="select_doctor.patient_id"  placeholder="Enter Patient ID">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " readonly ng-model="select_doctor.patient_name"  placeholder="Enter Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Consultation Fees</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="select_doctor.fee"  placeholder="Enter Consultation Fees">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Age</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold calender-input" ng-model="select_doctor.age"  readonly >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Payment Mode </label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;margin-top: 10px;" >
				 <input type="radio" name="payment" value="cash" checked style="margin-left: -14%;" ng-model="select_doctor.payment" > Cash
				<input type="radio" name="payment" value="card" style="margin-left: 11%;" ng-model="select_doctor.payment" > Card
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="print_receipt(patient_id)" >
               Print
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
 
 
 
 
 </div>
 
  <div class=" hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printsection">
	        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	             
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 30px;">SRI LAKSHMI HOSPITAL</p></center>
						<center><p style="font-size: 15px;">#5,6 & 7,Nagappareddy Layout,Kaggadasapura</p></center>
						<center><p style="font-size: 15px;">C.V Raman Nagar Post Bangalore-560093</p></center>
						<center><p style="font-size: 15px;">Ph:080 41676336,M:9535566566</p></center>
						<img src="print_barcode.php?barcode_to_print={{make_payment.barcode}}"/>
						
					</div>
			<div style="height:20px;"><hr style="height:2px;"></div>
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:100px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:300px;">
					<table cellpadding="10" >
						<tr>
							<td >Patient Id </td>
							<td>{{make_payment.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name  </td>
							<td>{{make_payment.patient_name}}</td>
							
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
			
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-6" style="width:350px;margin-top:-240px;margin-left:300px;" >
					<table cellpadding="10" >
					    <tr>
							<td >Refered Doctor </td>
							<td>{{make_payment.ref_name}}</td>
							
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
					<tr style="height: 58px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:55%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Amount</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Total</th>
					</tr>
					
					<tr style="height: 50px;" ng-repeat="print in show_service_taken">
						<td style="border-right:1px solid black;padding-left:5px;padding:14px;">{{$index + 1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.description}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.quantity}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.amount}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{print.total}}</td>
					</tr>
				
					<tr>
						<td colspan="4" style="border-right:1px solid black;border-top:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Sub Total</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{totalamt}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Balance</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{balance}}</td>
					</tr>
					
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding: 10px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{totalamt-balance}}</td>
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
 
 
 
 </div>
 
 
 
 </div> <!-- Row End -->
</div>  <!-- Container End -->
<script src="../../js/datepicker/jquery.js"></script>
<script src="../../js/datepicker/jquery-ui.js"></script>

<script>
   $("#dob").datepicker({
	inline: true
   });


</script>
<script type="text/javascript" src="../op-user/opbilling.js"></script>

</body> <!-- Body End -->

</html>
