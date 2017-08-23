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
<html lang="en">
<head>
<meta charset="UTF-8">

 
  <link rel="stylesheet" href="../../css/sidebar-menu.css">
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/style.css">

      <link rel="stylesheet" href="../../css/bootstrap-clockpicker.min.css">
  
  <script src="../../js/jquery-2.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script> 
  <script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>  
<script src="../../js/bootstrap-clockpicker.min.js"></script>	
 
</head>

<body ng-app="doctor">
<div class=" container-fluid" >
<div class="row"  ng-controller="doctor_controller">
 <div ng-include="'../include/header.html'">
 </div>

<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9">
		
 </div>
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#adddoctor" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Add Doctor</span></span></button>
 </div>
 </div>
 

<div class="row">

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
     <div class="row " style="padding-bottom:10px;">
	        <div class="col-md-6 col-xs-6 col-lg-6 col-xs-6"> <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Specialzation" ng-model="searchbox"  >
            </div>

         
	 </div>
	
	 

			
	<div class="col-md-4 col-lg-4 col-xs-4 col-sm-4  doct-tab tab-shadow tab-gap" ng-repeat="doctor in display_doctor | filter:searchbox">
 
		<div class="dept-tab-header row font-lato-18-reg adjust-spaces " >
 
 
				<div class="col-md-9 col-xs-9 col-lg-9 col-sm-9" style="padding: 0px 0px 0px 7px;">
					<span >{{doctor.doctor_name}}</span>
				</div>
				 <div class="col-md-3 col-xs-3 col-lg-3 col-sm-3 adjust-edit-delete" >
					 <div>
							  <a href="" style="padding: 6%;" ng-click="edit_doctor(doctor.doctor_id)" ><img  src="../../icons/roles/edit.png" data-toggle = "modal" data-target = "#editdoctor"  ></span></a>
							   <a href="" ng-click="delete_doctor(doctor.doctor_id)"> <img  src="../../icons/roles/delete.png"></span></a>
								
						</div>
				  </div>
		
			<table class="doct-row-space row font-14 dept-table">
						
						<tr id="mailalias">
						   <td>Specialzation :</td><td>{{doctor.specialization}}</td>
						</tr>	
							
						<tr class="" id="parent_id">
						   <td>Ecperience :</td><td>{{doctor.experience}}</td>
						</tr>
						<tr id="mailalias">
						   <td>Gender :</td><td>{{doctor.gender}}</td>
						</tr>
           </table>	
	        <div class="col-md-7 col-xs-7 col-lg-7 col-sm-7" style="padding: 0px 0px 0px 7px;">
					&nbsp;
				</div>
				 <div class="col-md-5 col-xs-5 col-lg-5 col-sm-5 adjust-edit-delete" >
					<button type = "submit" class = "btn btn-primary align-doc-submit edit" data-toggle = "modal" data-target = "#settiming" id="" ng-click="get_doctor_details(doctor.doctor_id)" >
						Set Timing
                  </button>
				  </div>
 	</div>
 
</div>


 

 
 </div>
 


<!-- Add Doctor Modal -->
<div class = "adjust-model modal fade" id = "adddoctor" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Doctor
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -3%;" for="name">Doctor Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.name"  placeholder="Enter User Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">E-mail</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="email" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.email"  placeholder="Enter Mail Id">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Phone</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.phone"  placeholder="Phone Number">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Age</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.age"  placeholder="Enter Age">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>

			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label lable-add-input" for="name">Gender </label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				 <input type="radio" name="gender" ng-model="add_doct.gender" value="Male" checked style="margin-left: -29%;"> Male
				<input type="radio" name="gender" ng-model="add_doct.gender" value="Female" style=" margin-left: 20%;"> Female<br>
						    
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Experience</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.experience"  placeholder="Enter Experience">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Specialization</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.specialzation"  placeholder="Enter Specialization">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Fees</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="add_doct.fee"  placeholder="Enter Fees">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="add_doctor()" >
               Add
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
  
   <!-- Add ned Modal -->
<div class = "adjust-model modal fade" id = "settiming" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" style="width:100%!important;" >
   
   <div class = "modal-dialog " style="width:100%!important;">
      <div class = "modal-content  model-doc-size ">
         
         <div class = "modal-header" style="    padding: 25px;">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Set Timings
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">

	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		    <div class="form-group align-input-space font-lato-12-bold" >
		  	
				
					<label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" style="margin-top: 0%;" for="name" >Name</label>
			  
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="detail_doc.doctor_name" readonly>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group align-input-space font-lato-12-bold">
								  <label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" for="name" >Select Day</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs">
								  
								                 <select class="form-control drop-down-btn  " id="country" name="country" ng-model="day" ng-options="days as days.day for days in doc_days" ng-change="clear_array()" placeholder="select Day">
												 												
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
				<div class="form-group align-input-space font-lato-12-bold">
								  <label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" for="name" >Select Session</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs" >
								  
								      <div class=" col-sm-3 col-lg-3 col-xs-12 col-md-3 float-left-inputs" ng-repeat="sess in session">
												 <input type="radio" name="gender" value="{{sess.session_id}}" ng-model="filter.session_id" ng-click="display_time(sess.session_id)">{{sess.name}}</div>
												  
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
					  
					 <div class="form-group align-input-space font-lato-12-bold">
								  <label class="control-label col-sm-1 col-lg-1 col-xs-12 col-md-1 align-label" for="name" >Select Time</label>
								  <div class="col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs">
								  
								      <table style="width:100%">
									  <tr>
										<th>Start Time</th>
										<th>End Time</th> 
										<th>Interval</th>
										<th></th>
									  </tr>
									  <tr>
										<td class="text-left"><input type="text" id="start_time" class="input-small form-control align-input-ele font-lato-12-bold" ng-model="start_time" placeholder="Start Time" style="    width: 80%;" ></td>
										<td class="text-left"><input type="text"  id="end_time" class="input-small form-control align-input-ele font-lato-12-bold" ng-model="end_time"  placeholder="End Time" style="    width: 80%;"></td>
										<td class="text-left"><input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="interval"  placeholder="Enter No of Beds" style="    width: 80%;"></td>
										<td><button type = "submit" class = "btn btn-primary align-doc-submit edit" ng-click="check_time(filter.session_id)">Save</button></td>
									  </tr>
									 
									</table>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
			 <div class="form-group align-input-space font-lato-12-bold">&nbsp;</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8  adjust-restric" style="height: 100%;">
				   <a id="add-emp"  href="#" ng-click="display_timeings(day)">
				   <img src="../../icons/employee/add.png" ></img>
								<span style="padding-left:3px;" >Show Timing</span>
					</a>
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			

			  
			<div class="col-md-8 col-sm-8 col-lg-12 col-xs-12 table-responsive" id="myDiv" ng-show="show_timings_list"	>
		<table class="table table-border text-center" id="tablename">
			<tr >
				<th rowspan="3" class="text-center padding-top-5">Doctor Name</th>
				<th rowspan="3" class="text-center padding-top-5">Day</th>
				<th colspan="12" class="text-center">Timing</th>
				<th rowspan="3" colspan="2"></th>
				
			</tr>
			<tr>
				<th colspan="3" class="text-center">Morning</th>
				<th colspan="3" class="text-center">Afternoon</th>
				<th colspan="3" class="text-center">evening</th>
				<th colspan="3" class="text-center">Night</th>
				
			</tr>
			<tr>
				<th class="text-center">Start Time</th>
				<th class="text-center">End Time</th>
				<th class="text-center">Interval</th>
				<th class="text-center">Start Time</th>
				<th class="text-center">End Time</th>
				<th class="text-center">Interval</th>
                <th class="text-center">Start Time</th>
				<th class="text-center">End Time</th>
				<th class="text-center">Interval</th>
				<th class="text-center">Start Time</th>
				<th class="text-center">End Time</th>
				<th class="text-center">Interval</th>
			</tr>
			<div >
        
       <tbody ng-repeat="options in time" ng-init="show='edit'">
         <tr  ng-show="show=='save'">
			<td >{{detail_doc.doctor_name}}</td>
			<td >{{options.day}}</td>
			<td class="clockpicker"><input type="text"  class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.mor_start_time"  placeholder="Start Time" style="    width: 100%;"  ng-click="callclock()"id="tdid{{$index}}"  ></td>
			<td class="clockpicker"><input type="text"  class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.mor_end_time"  placeholder="Start Time" style="    width: 100%;" ng-click="callclock()" ></td>
			<td><input type="text"  class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.mor_interval"  placeholder="Start Time" style="    width: 100%;" ></td>
			<td class="clockpicker"><input type="text"  class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.aft_start_time"  placeholder="Start Time" style="    width: 100%;" ng-click="callclock()"  ></td>
			<td class="clockpicker"><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.aft_end_time"  placeholder="Start Time" style="    width: 100%;" ng-click="callclock()"  ></td>
			<td><input type="text"   class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.aft_interval"  placeholder="Start Time" style="    width: 100%;"  ></td>
			<td class="clockpicker"><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.eve_start_time"  ng-click="callclock()" placeholder="Start Time" style="    width: 100%;" ></td>
			<td class="clockpicker"><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.eve_end_time" ng-click="callclock()" placeholder="Start Time" style="    width: 100%;" ></td>
			<td><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.eve_interval"  placeholder="Start Time" style="    width: 100%;" ></td>
			<td class="clockpicker"><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.nig_start_time" ng-click="callclock()" placeholder="Start Time" style="    width: 100%;" ></td>
			<td class="clockpicker"><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.nig_end_time" ng-click="callclock()" placeholder="Start Time" style="    width: 100%;" ></td>
			<td><input type="text" class="input-small form-control align-input-ele font-lato-12-bold " ng-model="options.nig_interval"  placeholder="Start Time" style="    width: 100%;" ></td>
			<td ><div  ng-click="show='edit';save_timings(options,$index)" class="save pointer" id="{{$index}}">Save</div> </td>
			<td class="pointer" >Delete</td>
		</tr>
		<tr  class="line" id="trid{{$index}}" ng-show="show=='edit'">
			<td >{{detail_doc.doctor_name}}</td>
			<td >{{options.day}}</td>
			<td >{{options.mor_start_time}}</td>
			<td>{{options.mor_end_time}}</td>
			<td>{{options.mor_interval}}</td>
			<td>{{options.aft_start_time}}</td>
			<td>{{options.aft_end_time}}</td>
			<td>{{options.aft_interval}}</td>
			<td>{{options.eve_start_time}}</td>
			<td>{{options.eve_end_time}}</td>
			<td>{{options.eve_interval}}</td>
			<td>{{options.nig_start_time}}</td>
			<td>{{options.nig_end_time}}</td>
			<td>{{options.nig_interval}}</td>
			<td id="edit"><div  ng-click="show='save';" class="editonclick pointer" id="{{$index}}">Edit</div></td>
			<td class="pointer" ng-click="delete_temp_timing($index)" >Delete</td>
		</tr>
		<tbody>
	</table>
	</div>
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="save_timimgs()" >
               Add
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  

  
<!--Edit Doctor Model -->

<div class = "adjust-model modal fade" id = "editdoctor" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true"  id="editmodal">
   
  <!-- /.modal-content -->
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Doctor
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg" >
<form class="form-horizontal" name="edit_dept"  >
		  <input type="hidden" class="form-control  align-input-ele font-lato-12-bold" ng-model="edit_doct.doctor_id"   />
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -3%;" for="name">Doctor Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="edit_doct.doctor_name" >
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">E-mail</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="email" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="edit_doct.email"  placeholder="Enter Mail Id">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Phone</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="edit_doct.phone"  placeholder="Phone Number">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Age</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold"  ng-model="edit_doct.age"  placeholder="Enter Age">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>

			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Experience</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold"  ng-model="edit_doct.experience"  placeholder="Enter Experience">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>

			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Specialzation</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold"  readonly ng-model="edit_doct.specialization"  placeholder="Enter Specialzation">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
						<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Fees</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="edit_doct.fee"  placeholder="Enter Fees">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
	  
    </div>
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit edit" id="" ng-click="update_doctor()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div>
	   
   </div> 

 <script src="../../js/doctorscript/doctorscript.js"></script>  

 
 
 
 </div>
 
 </div>
 </div> <!-- Row End -->
</div>  <!-- Container End -->
    

</body> <!-- Body End -->

</html>
