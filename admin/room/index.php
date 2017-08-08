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

<body ng-app="category">
<div class=" container-fluid" >
<div class="" ng-controller="category_controller" >
 <div ng-include="'../include/header.html'">
 </div>

<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9">
		
 </div>
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"> 
		<button type="button" class="btn add-dep-btn font-12 adjust-add pull-right" data-toggle = "modal" data-target = "#add_category" ><span><span><img src="../../icons/add.png" ></img></span class="font-12">&nbsp;&nbsp;<span>Add Room</span></span></button>
 </div>
 </div>
 

<div class="row">

<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" >
		
<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>  
 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
		
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3  room-tab tab-shadow tab-gap" ng-repeat="category in display_category">
 
		<div class="dept-tab-header row font-lato-18-reg adjust-spaces " >
 
 
				<div class="col-md-9 col-xs-9 col-lg-9 col-sm-9" style="padding: 0px 0px 0px 7px;">
					<span >{{category.room_name}}</span>
				</div>
				 <div class="col-md-3 col-xs-3 col-lg-3 col-sm-3 adjust-edit-delete" >
					 <div>
							  <a href="" style="padding: 6%;" ng-click="category_edit(category.room_id)"><img  src="../../icons/roles/edit.png" data-toggle = "modal" data-target = "#edit_category" ></span></a>
							   <a href="" ng-click="delete_category(category.room_id)" ><img  src="../../icons/roles/delete.png"></span></a>
								
						</div>
				  </div>
		
			<table class="doct-row-space row font-14 dept-table">
						
						<tr id="mailalias">
						   <td>Rooms No :</td><td>{{category.number_of_room}}</td>
						</tr>
						<tr id="mailalias">
						   <td>Floor :</td><td>{{category.floor}}</td>
						</tr>	
							
						<tr class="" id="parent_id">
						   <td>Price :</td><td>{{category.price}}</td>
						</tr>
						
           </table>	
	       
	        <div class="col-md-9 col-xs-9 col-lg-9 col-sm-9" style="padding: 0px 0px 0px 7px;">
					&nbsp;
				</div>
				 <div class="col-md-3 col-xs-3 col-lg-3 col-sm-3 adjust-edit-delete" >
					<button type = "submit" class = "btn btn-primary align-submit edit" data-toggle = "modal" data-target = "#addbed" id="" ng-click="display_beds(category.room_id)" >
						Add Beds
                  </button>
				  </div> 
				  
 	</div>
     <div class="col-md-12 col-xs-12 col-lg-12 col-sm-12" >
					&nbsp;
				</div>   
</div>


 

 
 </div>
 


<!-- Add Dept Modal -->
<div class = "adjust-model modal fade" id = "add_category" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Category
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -3%;" for="name">Category Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="add_category.room_name"  placeholder="Enter Category Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -1%;" for="name">Number Of Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="add_category.number_of_room"  placeholder="Enter No of Room ">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -1%;" for="name">Floor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="add_category.floors"  placeholder="Enter digits ">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="number" class="form-control align-input-ele font-lato-12-bold" ng-model="add_category.price"  placeholder="Enrer Price">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="category_add()" >
               Add
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
<!--Edit Dept Model -->

<div class = "adjust-model modal fade" id = "edit_category" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true"  id="editmodal">
   
  <!-- /.modal-content -->
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Category
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg" >
<form class="form-horizontal" name="edit_dept"  >
		  <input type="hidden" class="form-control  align-input-ele font-lato-12-bold" ng-model="edit_category.room_id"   />
		 <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -3%;" for="name">Category Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="edit_category.room_name" readonly placeholder="Enter Category Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">No Of Room</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="edit_category.number_of_room"  placeholder="Enter No of Room ">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="    margin-top: -1%;" for="name">Floor</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" readonly ng-model="edit_category.floors"  placeholder="Enter digits ">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="edit_category.price" placeholder="Enrer Price">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
    </div>
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit edit" id="" ng-click="category_update()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div>
	   
   </div> 
 
 
 <!-- Add ned Modal -->
<div class = "adjust-model modal fade" id = "addbed" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true" >
   
   <div class = "modal-dialog ">
      <div class = "modal-content model-size ">
         
         <div class = "modal-header">
		  
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Beds
            </h4>
         </div>
         
<div class = "modal-body body-size row model-bg">
	<form  novalidate class="form-horizontal" name="add_dept" id="add_dept" method="post">
		  
		    <div class="form-group align-input-space font-lato-12-bold" ng-repeat="ward in display_beds">
		  	
				
					<label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-top: 0%;" for="name" >{{ward.ward_name}}</label>
			  
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control align-input-ele font-lato-12-bold" ng-model="wardids[ward.ward_id]"  placeholder="Enter No of Beds">
			  </div>
			  
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			
			
			
			
		
    </div>	
         <div class = "modal-footer">
            <a><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "submit" class = "btn btn-primary align-submit"  ng-click="add_beds()" >
               Add
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
     
    <script src="../../js/roomscript/roomscript.js"></script>
</body> <!-- Body End -->

</html>
