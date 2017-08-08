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

 
  <link rel="stylesheet" href'"../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/sidebar-menu.css">
 

    <link href='../../css/fullcalendar.css' rel='stylesheet' />
<link href='../../css/fullcalendar.print.css' rel='stylesheet' media='print' />

 <link rel="stylesheet" href="../../css/datepicker/jquery-ui.css" >
  <script src="../../js/jquery.min.js"></script> 
  <script src="../../js/bootstrap.min.js"></script> 
  <script src="../../js/angular.min.js"></script>
  <script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>
<script src="../../js/datepicker/jquery-ui.js"></script>

<script src="../../js/custom.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="admit_show"]').tooltip();   
    $('[data-toggle="admit"]').tooltip();   
    $('[data-toggle="shift"]').tooltip();   
    $('[data-toggle="draft"]').tooltip();   
    $('[data-toggle="print"]').tooltip();   
});
</script>
</head>

<body ng-app="reception">


<div class=" container-fluid" >
<div class="row"  ng-controller="reception_controller"  ng-cloak>
 <div ng-include="'include/header.html'">
 </div>


<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9">
		
 </div>

  

<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<!-- <button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#addpatient" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Register</span></span></button>-->
 </div>
 </div>
 

<div class="">
<div id="allot" ng-show="admit_patient_show">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
             <div>ADMIT PATIENT</div>
			 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>  
	      <div class="group col-md-12 col-sm-12 col-lg-12"> 
		             
					  <div  class=" col-md-3 col-sm-3 col-lg-3"> 
							<label class="control-label" for="name"> Select Type of Room</label>
					  </div>		
                        <div  class="col-md-8 col-sm-8 col-lg-8 " >					   
						 <select class=" form-control room-type-drop" ng-model="roomid"  ng-change="room_type()">
							    <option  value=""selected="selected" >Select Room Type</option>
								<option name="" ng-repeat="room in display_room_type" value="{{room.room_id}}">{{room.room_name}}</option>

							  </select>
				   
					  </div>
					  </div>
            </div>
  		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12" ng-show="admit_show_category">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow">
					<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Category type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Total Beds</th>
										<th >Occupied Beds</th>
										<th >Available Beds</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="room_category in display_room_category" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{room_category.room_name}}</td>
										<td>{{room_category.floor}}</td>
										<td>{{room_category.ward_name}}</td>
										<td  >{{room_category.number_of_bed}}</td>
										<td  >{{room_category.number_of_bed - room_category.status}}</td>
										<td  >{{room_category.status}}</td>
										<td><a href="#" ng-click="shows_beds(room_category.ward_id)" ><img src="../../icons/newicons/show.png" data-toggle="admit_show" title="Show"></a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
		         
		  
				
		  </div>
		  </div>
</div>		  
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md- 12 col-lg-12 col-xs-12 col-sm-12" ng-show="admit_show_beds" >
				  <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
				  <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8 room-beds-tab tab-shadow">
						       <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 align-header"> <span class="font-lato-18-bold"> Beds Information </span></div>
								<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead height="100" >
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Categoty Type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Price</th>
										<th ></th>
										
									
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="beds in beds_shows"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{beds.room_name}}</td>
										<td>{{beds.floor}}</td>
										<td>{{beds.ward_name}}</td>
										<td  >{{beds.bed_id}}</td>
										<td  >{{beds.price}}</td>
										<td ><a href="#" data-toggle = "modal" data-target = "#admitpatient" ng-click="admit(beds.bed_id,beds.room_id,beds.ward_id)" ><img src="../../icons/newicons/admit.png" data-toggle="admit" title="Admit"></a></td>
										
									</tr>
									
	
									  
								
									</tbody>
					  </table>
				</div>
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
				  
				   <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
				</div>			
		</div>			
</div>		


<div id="shift" ng-show="shift_patient_show">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
			<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
			    <div>SHIFT PATIENT</div>
							<div class="col-md-6 col-sm-6 col-lg-6">	
									  <input type="text" required class="module-input " ng-model="a.b">
								  <span class="bar"></span>
								  <label class="label-text">Enter Patient Id/ Phone No</label>
								  <div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
								
							</div>
							 
							
							
			</div>
			   
</div>
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" ng-show="shift_show_patient_category">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
		  <table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class="left-padding" >Patien Id</th>
										<th >Name</th>
										<th >Category</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Date of Allocation</th>
										<th >Total Days</th>
										
										<th></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{display_bed_allot.patient_id}}</td>
										<td>{{display_bed_allot.patient_name}}</td>
										<td>{{display_bed_allot.room_name}}</td>
										<td  >{{display_bed_allot.floor}}</td>
										<td  >{{display_bed_allot.ward_name}}</td>
										<td  >{{display_bed_allot.bed_id}}</td>
										<td  >{{display_bed_allot.from_date}}</td>
										<td  >{{display_bed_allot.number_of_days}}</td>
										<td><a href="#"  ng-click="dis_room_type(display_bed_allot.room_id)"><img src="../../icons/newicons/shift.png" data-toggle="shift" title="Shift"></a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
	</div>
</div>

<div id="showbeds">
<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box" ng-show="shift_select_show">
	      <div class="group col-md-12 col-sm-12 col-lg-12"> 
					  <div  class=" col-md-3 col-sm-3 col-lg-3"> 
							<label class="control-label" for="name"> Select Type of Room</label>
					  </div>		
                        <div  class="col-md-8 col-sm-8 col-lg-8 " >					   
						 <select class=" form-control room-type-drop" ng-model="room_id"  ng-change="shift_room_type()">
							    <option  value=""selected="selected" >Select Room Type</option>
								<option name="" ng-repeat="room in shift_display_room_type" value="{{room.room_id}}">{{room.room_name}}</option>

							  </select>
				   
					  </div>
					  </div>
            </div>
  		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
		     <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
			 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow" ng-show="shift_show_category">
					<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Category type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Total Beds</th>
										<th >Occupied Beds</th>
										<th >Available Beds</th>
										
										<th  ></th>
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="room_category in shift_display_room_category" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{room_category.room_name}}</td>
										<td>{{room_category.floor}}</td>
										<td>{{room_category.ward_name}}</td>
										<td  >{{room_category.number_of_bed}}</td>
										<td  >{{room_category.number_of_bed - room_category.status}}</td>
										<td  >{{room_category.status}}</td>
										<td><a href="#" ng-click="shift_shows_beds(room_category.ward_id)" ><img src="../../icons/newicons/show.png" data-toggle="admit_show" title="Show"></a></td>
									</tr>
									
									  
								
									</tbody>
					  </table>
		         
		  
				
				
		  </div>
		  </div>
		  </div>
</div>		  
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
			<div class="col-md- 12 col-lg-12 col-xs-12 col-sm-12" >
				  <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
				  <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
						<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8 room-beds-tab tab-shadow" ng-show="shift_show_bed">
						       <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12 align-header"> <span class="font-lato-18-bold"> Beds Information </span></div>
								<table id="tbl"  class="table  table-condensed " cellpadding="10"  cellspacing="10">
									<thead height="100" >
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Categoty Type</th>
										<th >Floor</th>
										<th >Room</th>
										<th >Bed No</th>
										<th >Price</th>
										<th ></th>
										
									
									  </tr>
									</thead>
									<tbody>
									 <tr class="border-btm" ng-repeat="beds in shift_beds_shows"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
										<td class=" left-padding" >{{beds.room_name}}</td>
										<td>{{beds.floor}}</td>
										<td>{{beds.ward_name}}</td>
										<td  >{{beds.bed_id}}</td>
										<td  >{{beds.price}}</td>
										<td ><a href="#" data-toggle = "modal" data-target = "#shiftpatient" ng-click="shift_admit(beds.bed_id,beds.room_id,beds.ward_id)" ><img src="../../icons/newicons/shift.png" data-toggle="shift" title="Shift"></a></td>
										
									</tr>
									
	
									  
								
									</tbody>
					  </table>
				</div>
						<div class="col-md-2 col-lg-2 col-xs-2 col-sm-2"></div>
				  
				   <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
				</div>			
		</div>			
</div>		
</div>



<div id="discharge" ng-show="discharge_patient_show">

		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
			<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
					<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
					      <div>DISCHARGE PATIENT</div>
									<div class="col-md-12 col-sm-12 col-lg-12">	
											  <input type="text" required class="module-input " id="skills" ng-model="dpatient_id" ng-change="patient_display()">
										  <span class="bar"></span>
										  <label class="label-text">Enter Patient Id/ Email Id/ Phone No</label>
										  <div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
									</div>
					</div>
					   
		</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">&nbsp;</div>
				  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					 <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>
					 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 room-book-tab tab-shadow" ng-show="show_dischagre_patient" >
							<table id="tbl"  class="table  table-condensed " cellpadding="10" cellspacing="10">
											<thead>
											  <tr class=" font-14 font-os-semibold border-btm" >
												<th class=" left-padding" >Patient Id</th>
												<th >Name</th>
												<th >Category</th>
												<th>Floor</th>
												<th >Room</th>
												<th >Bed No</th>
												<th >Date of Allotment</th>
												<th >Date of Discharge</th>
												<!--<th >Total Days</th>-->
												<th  ></th>
												<th></th>
											  </tr>
											</thead>
											<tbody>
											 <tr class="border-btm" > <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
												<td class=" left-padding" >{{display_patient_details.patient_id}}</td>
												<td>{{display_patient_details.patient_name}}</td>
												<td>{{display_patient_details.room_name}}</td>
												<td  >{{display_patient_details.floor}}</td>
												<td  >{{display_patient_details.ward_name}}</td>
												<td  >{{display_patient_details.bed_id}}</td>
												<td  >{{display_patient_details.from_date}}</td>
												<td  >{{display_patient_details.to_date}}</td>
												<!--<td  >{{display_patient_details.total_days}}</td>-->
												
											</tr>
										
										
											</tbody>
							  </table>
						       <div class="form-group align-input-space font-lato-12-bold">
									  
									  <div class=" col-sm-6 col-lg-6 col-xs-12 col-md-6" ng-show="draft" >
									  <label class="control-label col-sm-2 col-lg-2 col-xs-12 col-md-2 align-label lable-add-input" for="name"> Payment Mode </label>
										 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Cash
										<input type="radio" name="payment" value="Card" style="margin-left: 11%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Card
										<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="display_patient_details.payment" ng-click="click_payment(display_patient_details.payment)"> Devide
										<div ng-show="devide">
												Cash <input type="number" name="cash" ng-model="display_pay_details.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="display_pay_details.devidecard" value="{{totalamt - display_pay_details.devidecash}}"/> 
												Total <input type="number" name="totalamount" ng-model="display_pay_details.devidetotalamt" />		
										</div>
									  </div>
									  <div class="col-md-1 col-sm-1 col-lg-1" ng-show="draft" style="margin-left: -8%;">
										Balance
									 </div>
									 <div class="col-md-1 col-sm-1 col-lg-1" ng-show="draft">
										<input type="text" name="" id="" value="0" ng-model="balance"/>
									 </div>
									   <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2"  >
									            
										         <a href="#" data-toggle = "modal" data-target = "#makepayment" ng-click="discharge()"><img src="../../icons/newicons/draft_copy.png" data-toggle="draft" title="Draft Copy" style="margin-right: -41%;"></a>
								
									  </div>
									  <div class=" col-sm-2 col-lg-2 col-xs-12 col-md-2"  ng-show="show_print_discharge">
									
										         
								<a href="#" ng-click="insurance()" ><img src="../../icons/newicons/print.png" data-toggle="print" title="Print & Discharge"></a>
									  </div>
								</div>
				      
						
				  </div>
				  </div>
</div>


<div id="enquiry" ng-show="enquiry">

				
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					   
					   
					   <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox"  >
					   </div>
					 <div>
					 </div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th>Patient ID</th>
										<th>Patient Name</th>
										<th>Phone Number</th>
										<th>Floor</th>
										<th>Room</th>
										<th>Ward</th>
										<th>Bed</th>
										<th>Insurance Name</th>
										<th></th>
									  </tr>
										
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient in display_details_patient | filter:serachbox" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{patient.patient_id}}</td>
										<td>{{patient.patient_name}}</td>
										<td>{{patient.phone}}</td>
										<td>{{patient.floor}}</td>
										<td>{{patient.room_name}}</td>
										<td>{{patient.ward_name}}</td>
										<td>{{patient.bed_id}}</td>
										<td>{{patient.company_name}}</td>
										
										
										
									
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
 </div>


</div>
<div id="enquiry" ng-show="advance_tab">

				
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>

	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 table-top-space">
					    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
					   
					     <center> <a href="#" data-toggle = "modal" data-target = "#advance" >ADD Advance</a></center>
					  
					  
					   </div>
					    <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >&nbsp;</div>
					   <div>
					      <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Patient Name" ng-model="serachbox2"  >
					   </div>
					 <div>
					 </div>
						 <table id="tbl"  class="table tble-size  table-condensed tbl-shadow " cellpadding="10"  cellspacing="10">
									<thead>
									  <tr class=" font-14 font-os-semibold border-btm" >
										<th class=" left-padding" >Sl No</th>
										<th>Patient ID</th>
										<th>Patient Name</th>
										<th>Date</th>
										<th>Time</th>
										<th>Payment Mode</th>
										<th>Cash Amount</th>
										<th>Card Amount</th>
										<th>Amount</th>
										
									  </tr>
										
									</thead>
									<tbody>
									  <tr class="border-data-btm" ng-repeat="patient in display_advance | filter:serachbox2" > 
										
										<td class=" left-padding" >{{$index+1}}</td>
										<td>{{patient.patient_id}}</td>
										<td>{{patient.patient_name}}</td>
										<td>{{patient.date}}</td>
										<td>{{patient.time}}</td>
										<td>{{patient.paymentmode}}</td>
										<td>{{patient.cashamt}}</td>
										<td>{{patient.cardamt}}</td>
										<td>{{patient.advance}}</td>
										
										
										
										
									
									  
								
									</tbody>
					  </table>
					  
					  <div class="calender-size hidden"  id="cal" >
							<div id='calendar' class="inner-calender" ></div>
					  </div>
					  
					  
					 
					 
		</div>
 </div>


</div>
<!-- add service section -->		


<div id="Addservive">

<div class = "adjust-model modal fade" id ="addpatientservice" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-service-model-sieze ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Services
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addservice">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Id</label>
			  
				<div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 " style="height: 100%;">
					<input type="text" class="form-control  align-input-ele font-lato-12-bold  " ng-model="service.patient_id" id="patientid" ng-change="display_name()" >
					<div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
					
				</div>
			 
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="naming" value="" ng-model="name_of_patient.patient_name" readonly>
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 3%;" for="name">Select Service</label>
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
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 3%;" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			      <input type="text" class="form-control  align-input-ele font-lato-12-bold " style="margin-left: 1%;" ng-model="display_service_price.price">
				  
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>			
						
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;text-align:right !important;margin-left: -14px;">
				   <a id="add-emp"  href="#" ng-click="add_temp_service()">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;">Add Service</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>   
			<div class="col-sm-12 col-lg-12 col-xs-12 col-md-12 tbl-back-color" ng-show="show_div" ng-init="index=0">
		     <div>
		        <table class="table table-hover table-responsive">
						<thead class="font-lato-12-bold" > 
						  <tr>
							
							<th>Patient Id</th>
							<th>Service</th>
							<th>Price</th>
							<th></th>
						  </tr>
						</thead>
						<tbody class="font-lato-11-reg" ng-repeat="names in disp_service"  >
						  <tr>
						    <td class="hidden">{{$index  }}</td>
							<td>{{names.patient_id}}</td>
							<td>{{names.service_name}}</td>
							<td>{{names.price}}</td>
							<td><a href="#" ><img src="../../icons/employee/addemp.png"  ng-click="delete_temp_service($index)" ></a></td>
						     <td class="hidden">{{$index + 1}}</td>
						  </tr>
			
						  
						</tbody>
				</table>
		   </div>
        </div>
	
			
	  
    </div>
     		   
        
         <div class = "modal-footer" ng-show="show_div">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="service_add_details()">
               Add Service
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   

</div> 




</div>

<!-- Advance section -->		


<div id="Addservive">

<div class = "adjust-model modal fade" id ="advance" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-service-model-sieze ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                Advance
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addservice">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Id</label>
			  
				<div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 " style="height: 100%;">
					<input type="text" class="form-control  align-input-ele font-lato-12-bold  " ng-model="advance.patient_id" id="patientida" ng-change="display_name()" >
					<div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
					
				</div>
			 
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="naming" value="" ng-model="advance_name.patient_name" readonly>
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 3%;" for="name">Advance</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			      <input type="number" class="form-control  align-input-ele font-lato-12-bold " style="margin-left: 1%;" ng-model="advance.amount">
				  
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>			
			 <div class=" form-group align-input-space font-lato-12-bold"  >
			<label class="control-label col-sm-2 col-lg-2 col-xs-12 col-md-2 align-label lable-add-input" for="name"> Payment Mode </label>
										 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;" ng-model="advance.payment" ng-click="advance_payment(advance.payment)"> Cash
										<input type="radio" name="payment" value="Card" style="margin-left: 11%;" ng-model="advance.payment" ng-click="advance_payment(advance.payment)"> Card
										<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="advance.payment" ng-click="advance_payment(advance.payment)"> Devide
										<div ng-show="devide_advance">
												Cash <input type="number" name="cash" ng-model="advance.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="advance.devidecard" value="{{advance.amount - advance.devidecash}}"/> <br />
												Total <input type="number" name="totalamount" ng-model="advance.amount" />		
										</div>
									  </div>			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;text-align:right !important;margin-left: -14px;">
				   <a id="add-emp"  href="#" ng-click="advance_patient()">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;">Submit</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>   
		
	
			
	  
    </div>
     		   
        
        
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   

</div> 






<!-- Make payment section -->

<div class = "adjust-model modal fade" id ="makepayment" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content make_payment_model ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
               Make Payment
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee">
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 form-group align-input-space font-lato-12-bold">
		  
			  <label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" for="name">Patient Id</label>
			  <div class=" col-sm-4 col-lg-4 col-xs-12 col-md-4" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="dpatient_id" placeholder="Enter Employee ID">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
		
			
		
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
	            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
			 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 room-book-tab tab-shadow" ng-show="show_dischagre_patient" >
							<table id="tbl"  class="table  table-condensed table_text_align" cellpadding="10" cellspacing="10">
											<thead>
											  <tr class=" font-14 font-os-semibold border-btm" >
												<th class=" left-padding table_th_td1_width" style="text-align:center;" >Sl No</th>
												<th class="table_th_td2_width" style="text-align:center;">Description</th>
												<th style="text-align:center;">Price</th>
												<th style="text-align:center;">Quantity</th>
												<th style="text-align:center;">Amount</th>
												<th  ></th>
											  </tr>
											</thead>
											<tbody ng-init="index=0">
											 <tr class="border-btm"  ng-repeat="beds_taken in discharge_patient"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
												<td class=" left-padding" >{{$index + 1}}</td>
												<td>{{beds_taken[1]}}</td>
												<td>{{beds_taken[3]}}</td>
												<td>{{beds_taken[2]}}</td>
												<td>{{beds_taken[4]}}</td>
												
												
											</tr>
											
											
											  <tr>
											       <td class="font-14 font-os-semibold border-btm" colspan="4" style="text-align:right;">Advance</td>  
												   <td style="text-align:center;">{{advance.advance}}</td>
											  </tr>
										      <tr>
											       <td class="font-14 font-os-semibold border-btm" colspan="4" style="text-align:right;">Total</td>  
												   <td style="text-align:center;">{{totalamt}}</td>
											  </tr>
										
										</tbody>
											
							  </table>
						 
				  
						
				  </div>
				  </div>
			
		
			
            
		
           			
						
    </div>
     		   
        
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel </span></a>
            <!--<button type = "button" class = "btn btn-primary align-submit" ng-click="finalprint()">
               Print
            </button>-->
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

<!-- Insurance section -->

<div class = "adjust-model modal fade" id ="insurance" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content make_payment_model ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
               <center>Summary Bill</center>
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee">
		  <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 form-group align-input-space1 font-lato-12-bold">
		      <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
			  <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3" >Provider Name</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" value="SRI LAKSHMI SUPER SPECILITY HOSPITAL" readonly >
			  </div>
			  <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4  padding3" >Registration No</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="registration" id="name"  >
			  </div>
			  <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3" >Address</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text-area" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly value="#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093" >
			  </div>
			  <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3" >Patient Id</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="dpatient_id" placeholder="Enter Employee ID">
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4  padding3" >Patient Name</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="personal_details.patient_name" >
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3 " >Payer Name</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<select class="form-control drop-down-btn loc-input-size dropdown_category1" id="country" name="country" ng-model="insurance_bill.company_name" >
													<option  value=""selected="selected">Select Category</option>
													<option name="" ng-repeat="insurance in display_insurance" value="{{insurance.company_name}}">{{insurance.company_name}}</option>
													
												  </select>
			  </div>
			  </div>
			   <div class="col-md-6 col-sm-6 col-lg-6 col-xs-12">
			      <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4  padding3" >Bill No</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="advance.bill_no" >
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3 " >Bill Date</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold datepicker"  ng-model="insurance_bill.bill_date" placeholder="Enter Bill Date">
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3" >PAN Number</div>
			  <div class="col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name"  ng-model="insurance_bill.pan_number" placeholder="Enter Pan Number">
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4  padding3" >Service Tax(%)</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name"  ng-model="insurance_bill.service_tax_per" placeholder="Enter Service Tax">
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4 padding3" >Date Of Admission</div>
			  <div class="col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" readonly ng-model="personal_details.date_of_admission" >
			  </div>
			   <div class="col-sm-4 col-lg-4 col-xs-12 col-md-4  padding3" >Date Of Discharge</div>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold datepicker"   ng-model="insurance_bill.date_of_discharge" placeholder="Enter Date of Discharge">
			  </div>
			   
			   </div>
			</div>
	            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
			 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
					
					 <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 room-book-tab tab-shadow" ng-show="show_dischagre_patient" >
							<table id="tbl"  class="table  table-condensed table_text_align" cellpadding="10" cellspacing="10">
											<thead>
											  <tr class=" font-14 font-os-semibold border-btm" >
												<th class=" left-padding table_th_td1_width" style="text-align:center;" >Sl No</th>
												<th class="table_th_td2_width" style="text-align:center;">Description</th>
												<th style="text-align:center;">Price</th>
												<th style="text-align:center;">Quantity</th>
												<th style="text-align:center;">Amount</th>
												<th  ></th>
											  </tr>
											</thead>
											<tbody ng-init="index=0">
											 <tr class="border-btm"  ng-repeat="beds_taken in discharge_patient"> <!-- ng-repeat=" employee in empdata |  filter:searchbox" --> 
												<td class=" left-padding" >{{$index + 1}}</td>
												<td>{{beds_taken[1]}}</td>
												<td>{{beds_taken[3]}}</td>
												<td>{{beds_taken[2]}}</td>
												<td>{{beds_taken[4]}}</td>
												
												
											</tr>
											
											
											  <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Advance</td>  
												   <td style="text-align:center;">{{advance.advance}}</td>
											  </tr>
										      <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Total</td>  
												   <td style="text-align:center;">{{totalamt - advance.advance}}</td>
											  </tr>
										       <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Amount Paid by payer</td>  
												   <td style="text-align:center;"><input type="number" class="form-control  align-input-ele font-lato-12-bold" id="name"  style="text-align: center;" ng-model="insurance_bill.amount_member" ></td>
											  </tr>
											  <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Amount chargerd to patient</td>  
												   <td style="text-align:center;">{{totalamt - insurance_bill.amount_member}}</td>
											  </tr>
											  
											  <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Discount Amount</td>  
												   <td ><input type=" number" class="form-control  align-input-ele font-lato-12-bold" id="name"  ng-model="insurance_bill.discount"  style="text-align: center;" ></td>
											  </tr>
											  <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Service Tax</td>  
												   <td style="text-align:center;"><input type="number" class="form-control  align-input-ele font-lato-12-bold"  style="text-align: center;" id="name" ng-model="insurance_bill.service_tax" ></td>
											  </tr>
											  <tr>
											       <td class="font-14 font-os-semibold border-btm padding3" colspan="4" style="text-align:right;">Amount Payable</td>  
												   <td style="text-align:center;">{{totalamt - insurance_bill.discount + insurance_bill.service_tax }}</td>
											  </tr>
										</tbody>
											
							  </table>
						 
				  
						
				  </div>
				  </div>
			
		
			
            
		
           			
						
    </div>
     		   
        
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel </span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="finalprint()">
               Print  
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->


 
 


<!-- Admit patient Modal -->
<div class = "adjust-model modal fade" id = "admitpatient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content admit-model-size">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Admit Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Enter Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;" >
				<input type="text" class="form-control align-input-ele font-lato-12-bold" id="patientid1" ng-model="patient_admit.patient_id" value="" placeholder="Enter Patient ID" ng-change="pateint_details_name()">
				<div ng-show="errormsg" class="error-color" >Please Enter Proper patientid/Phone.</div>
				<div ng-show="errormsg4" class="error-color" >Patient is already admited.</div>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" id="name1" ng-model="patient_admit.patient_name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Category</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_admit.room_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient_admit.ward_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name" value="1000" disable>Bed No</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_admit.bed_id" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient_admit.price" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" style="margin-left: 1em;margin-top: -1%;" for="name">Referal Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<!--		<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="referal.ref_doctor_list"  >
			  -->
							 <select class="form-control drop-down-btn" style="margin-left: 1%;"  ng-model="patient_admit.ref_doctor_list" >
							    <option  value=""selected="selected">If any</option>
								<option name="" ng-repeat="ref in display_ref_doc" value="{{ref.ref_doc_id}}">{{ref.ref_name}}</option>
								
							  </select>  
							  
				 
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Advance </label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" value="0" ng-model="patient_admit.advance">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			
			 <div class="form-group adjust-loc-inputs font-12">
								  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" for="name" style="margin-left: 2em;margin-top: -1%;">Select Insurance</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs" style="height: 27px;">
								  
								  
												  <select class="form-control drop-down-btn loc-input-size dropdown_category" id="country" name="country" ng-model="patient_admit.insurance_id" >
													<option  value=""selected="selected">Select Category</option>
													<option name="" ng-repeat="insurance in display_insurance" value="{{insurance.insurance_id}}">{{insurance.company_name}}</option>
													
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
			 
			  <div class=" form-group align-input-space font-lato-12-bold"  >
			<label class="control-label col-sm-2 col-lg-2 col-xs-12 col-md-2 align-label lable-add-input" for="name"> Payment Mode </label>
										 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;" ng-model="patient_admit.payment" ng-click="advance_payment(patient_admit.payment)"> Cash
										<input type="radio" name="payment" value="Card" style="margin-left: 11%;" ng-model="patient_admit.payment" ng-click="advance_payment(patient_admit.payment)"> Card
										<input type="radio" name="payment" value="Both" style="margin-left: 11%;" ng-model="patient_admit.payment" ng-click="advance_payment(patient_admit.payment)"> Devide
										<div ng-show="devide_advance">
												Cash <input type="number" name="cash" ng-model="patient_admit.devidecash" /> </br>
												Card <input type="number" name="card" ng-model="patient_admit.devidecard" value="{{patient_admit.advance - patient_admit.devidecash}}"/> <br />
												Total <input type="number" name="totalamount" ng-model="patient_admit.advance" />		
										</div>
									  </div>
		 
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit" ng-disabled="enable_button" ng-click="admit_to_bed()"  >
               Admit
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   
   
   
   
   
  
  <!-- shift patient Model -->
  
  <div class = "adjust-model modal fade" id = "shiftpatient" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content admit-model-size">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Shift Patient
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.patient_id"  placeholder="Enter Patient ID"  readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  {{shift_patient_admit.patient_id}}
			  </div>
			</div>
			
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Category</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="shift_patient_admit.room_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="shift_patient_admit.ward_name" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name" value="1000" disable>Bed No</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.bed_id" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="shift_patient_admit.price" readonly>
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
				
			
			
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="shift_admit_to_bed()" >
               Shift
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  


<!-- payment section Ends here --> 

<!-- Print setion strats here -->

<div class="hidden col-md-12 col-lg-12 col-sm-12 col-xs-12" id="printdischarge">
  <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"  >
	            
              </div>
				
					<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
						<center><p style="font-size: 20px;">SUMMARY BILL</p></center>
						
					</div>
						<div style="height:20px;"><hr style="height:2px;"></div>
			
	         
             <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="margin-left:50px"> 	
			
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;">
					<table cellpadding="10">
						<tr>
							<td >Provider Name:</td>
							<td>SRI LAKSHMI SUPER SPECILITY HOSPITAL</td>
							
						</tr>
						<tr>
							<td >Registration No : </td>
							<td>{{registration}}</td>
						</tr>
						<tr>
							<td >Address : </td>
							<td>#5,6 & 7,Nagappareddy Layout,Kaggadasapura,C.V Raman Nagar Post Bangalore-560093</td>
						</tr>
						
						<tr>
							<td >Patient Id :</td>
							<td>{{personal_details.patient_id}}</td>
							
						</tr>
						<tr>
							<td >Patient Name : </td>
							<td>{{personal_details.patient_name}}</td>
							
						</tr>
						<tr>
							<td >Payer Name:</td>
							<td>{{insurance_bill.company_name}}</td>
								
						</tr>
						
						
						
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				
				<div class="col-md-6 col-sm-6 col-xs-6" style="width:350px;margin-top:-420px;margin-left:380px;">
					<table cellpadding="10">
						<tr>
							<td >Bill No </td>
							<td>{{advance.bill_no}}</td>
							
						</tr><tr>
							<td >Bill Date </td>
							<td>{{insurance_bill.bill_date}}</td>
							
						</tr>
						<tr>
							<td >PAN Number </td>
							<td>{{insurance_bill.pan_number}}</td>
							
						</tr>
						<tr>
							<td >Service Tax(%)</td>
							<td>{{insurance_bill.service_tax_per}}</td>
							
						</tr>
						
						<tr>
							<td >Date Of Admission : &nbsp;</td>
							<td>{{personal_details.date_of_admission}}</td>
								
						</tr>
						<tr>
							<td >Date Of Discharge : &nbsp;</td>
							<td>{{insurance_bill.date_of_discharge}}</td>
								
						</tr>
					</table>
				</div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				<div style="height:20px;"></div>
				
				
				<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12"> 	
			<div class="col-md-2 col-lg-2 col-sm-2 col-xs-12">&nbsp;</div>
			<div class="col-md-10 col-lg-10 col-sm-10 col-xs-12" style="margin-left:40px;margin-top:10px">
				<table style="border:1px solid black;width:82%;">
					<tr style="height: 25px;">
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%;">Sl.no</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:65%">Discription</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Price</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;width:10%">Quantity</th>
						<th style="border-right:1px solid black;border-bottom:1px solid black;padding-left:5px;">Amount</th>
					</tr>
					<tr style="height:10px;" ng-repeat="beds_taken in final_patient_details">
						<td style="border-right:1px solid black;padding-left:5px;padding:2px;">{{$index+1}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[1]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[3]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[2]}}</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{beds_taken[4]}}</td>
					</tr>
					
					
					<tr>
						<td colspan="4" style="border-top:1px solid black;border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Advance</td>
						<td style="border-right:1px solid black;padding-left:5px;border-top:1px solid black;">{{advance.advance}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Total Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{totalsum}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Amount Paid by payer</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{insurance_bill.amount_member}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Amount chargerd to patient</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{totalsum-insurance_bill.amount_member}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Discount Amount</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{insurance_bill.discount}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Service Tax</td>
						<td style="border-right:1px solid black;padding-left:5px;">{{insurance_bill.service_tax}}</td>
					</tr>
					<tr>
						<td colspan="4" style="border-bottom:1px solid black;border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Amount Paid</td>
						<td style="border-bottom:1px solid black;border-right:1px solid black;padding-left:5px;"> {{totalsum - insurance_bill.discount +insurance_bill.service_tax }}</td>
					</tr>
					<tr>
						<td colspan="1" style="border-right:1px solid black;padding-left:5px;text-align:right;padding:2px;">Amount in words</td>
						<td colspan="4" style="border-right:1px solid black;padding-left:5px;"> {{amount_in_words}}</td>
					</tr>
					
				
					
					
					
				</table>
				
				<div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" style="padding-top:60px;" >
				
				<div style=" width:80px ;border-top:1px solid black;margin-left:50px ">
				Patient Signature 
				</div>
				<div style=" width:80px ;border-top:1px solid black;margin-left:500px;margin-top:-35px; ">
				 Authorized Signature 
				</div>
				
				</div>
				</div>
		
		  </div>

	</div>
 </div>
</div>

<!-- print section ends here -->











	
			
						
				
			
			
  
  


 
   <!--display Modal -->
<div class = "adjust-model modal fade" id = "displaydetails" tabindex = "-1" role = "dialog" 
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
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Doctor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="patient.Doc_name"  placeholder="Enter Doctor Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Patient ID</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold"  ng-model="patient.id"  placeholder="Enter Patient ID">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Patient Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold " ng-model="patient.name"  placeholder="Enter Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Consultation Fees</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="patient.fees"  placeholder="Enter Consultation Fees">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Date of Birth</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold calender-input" id="date1" ng-model="patient.dob"  placeholder="Enter Date of Birth">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>	
			 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name"> Payment Mode </label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;margin-top: 10px;" >
				 <input type="radio" name="payment" value="Cash" checked style="margin-left: -14%;"> Cash
				<input type="radio" name="payment" value="Card" style="margin-left: 11%;"> Card
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
		
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="insertdata()" >
               Print
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
 
 
 
 
 </div>
 
 </div>
 </div> <!-- Row End -->
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

<script src="../../js/receptionscript/receptionscript.js"></script> 

</body> <!-- Body End -->

</html>
