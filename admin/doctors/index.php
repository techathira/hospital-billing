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
   
  <script src="../../js/jquery.min.js"></script> 
  <script src="../../js/bootstrap.min.js"></script> 
  <script src="../../js/angular.min.js"></script>
<script src="../../js/custom.js"></script>  



  
  <script>
    $(document).ready(function(){
	   
	});
  
  </script>
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
 

 
 
 
 
 </div>
 
 </div>
 </div> <!-- Row End -->
</div>  <!-- Container End -->
     <script src="../../js/doctorscript/doctorscript.js"></script>  
</body> <!-- Body End -->

</html>
