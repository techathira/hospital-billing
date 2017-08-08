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
<script src="../../js/checklist-model.js"></script>
<script src="../../js/custom.js"></script>
<script src="../../js/custom_jquery.js"></script>	
	
<script src='../../js/moment.min.js'></script>
<script src='../../js/moment.min.js'></script>

</head>

<body ng-app="lab">
	
<div class=" container-fluid" ng-controller="lab_controller" ng-init="total=0"  >

<div ng-include="'../include/header.html'"></div>
		

		
	<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin">
					<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
							
					 </div>
					<div class="col-md-6 col-lg-6 col-xs-6 col-sm-6"> 
					         
					         
									<button type="button" class="btn add-emp-btn font-12 adjust-add pull-right "  data-toggle = "modal" data-target = "#addpackage" ng-click="category_type()" ><span><span></span class="font-12">&nbsp;&nbsp;<span>Add Package</span></span></button>
					
						   
									<button type="button" class="btn add-emp-btn font-12 adjust-add pull-right "  data-toggle = "modal" data-target = "#add_test" ng-click="category_type()" ><span><span></span class="font-12">&nbsp;&nbsp;<span>Add Test</span></span></button>
							
										
						     
						</div>
	</div>
	
	
<div class="row" >

  <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3"></div>
		<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 ">
			<div class="row " style="padding-bottom:10px;">
	        <div class="col-md-6 col-xs-6 col-lg-6 col-xs-6"> <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Test Name" ng-model="serachbox"  >
            </div>

          
	 </div>
			
	  </div>
 </div>
 
 
 
 
 
 <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>

	 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
     <div class="row " style="padding-bottom:10px;">
	        <p class="lab-test-p" >	Test Category<p>
	 </div>
	
	 

			
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3  test-tab tab-shadow tab-gap" ng-repeat="test in display_test | filter:serachbox">
 
		<div class="row font-lato-18-reg lab-tab-header " >
             
				
				
				<a href="" style="    margin-left: 80%;" ng-click="test_edit(test.test_id)" ><img  src="../../icons/roles/edit.png"data-toggle = "modal" data-target = "#edit_test" ></span></a>
				<a href=""ng-click="test_delete(test.test_id)"><img  src="../../icons/roles/delete.png"></span></a>
				  
		</div>
        <div class="row font-lato-18-reg " >   		
			 <table class="row-space font-14 dept-table" >
				<tr>
					<td>Test Name:</td>
					<td> {{test.test_name}}</td>
				</tr>
				<tr>
					<td>price :</td>
					<td>{{test.price}}</td>  			
					
				 
				  
		        </tr>
			
											
				
					 
           </table>	
	
 	</div>
 
</div>


 

 
 </div>
    
	
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3">&nbsp;</div>

	 <div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 disp-dept-cont" id="box">
	 <div class="row " style="padding-bottom:10px;">
	        <div class="col-md-6 col-xs-6 col-lg-6 col-xs-6"> <input type="text" class="form-control doctor-search-btn " id="usr" placeholder="Search Package Name" ng-model="serachbox1"  >
            </div>

          
	 </div>
     <div class="row " style="padding-bottom:10px;">
	        <p class="lab-test-p" >	Package Category<p>
	 </div>
	
	 

			
	<div class="col-md-3 col-lg-3 col-xs-3 col-sm-3  test-tab tab-shadow tab-gap" ng-repeat="package in display_package | filter:serachbox1">
 
		<div class="row font-lato-18-reg lab-tab-header " >
          	<a href="" style="    margin-left: 80%;" ><img  src="../../icons/roles/edit.png"data-toggle = "modal" data-target = "#editpackage" ></span></a>
				<a href=""><img  src="../../icons/roles/delete.png"></span></a>
			</div>
        <div class="row font-lato-18-reg " >   		
			 <table class="row-space font-14 dept-table" >
				<tr>
					<td>Package Name :</td>
					<td> {{package.package_name}}</td>
				</tr>
				<tr>
					<td>price :</td>
					<td>{{package.totalprice}}</td>  			
				</tr>
			</table>
 	</div>
</div>

 </div>
 
	</div>
 
 
 
 
</div> 
 
 
 

<!-- Add  test Modal -->
<div class = "adjust-model modal fade" id = "add_test" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Add Test
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Test Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="add_test.name" placeholder="Enter Test Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			 <div class="form-group adjust-loc-inputs font-12">
								  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 adjust-label" for="name" style="margin-left: -1em;margin-top: -2%;">Select Category</label>
								  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8 float-left-inputs">
								  
								  
												  <select class="form-control drop-down-btn loc-input-size dropdown_category" id="country" name="country" ng-model="category.test_cat_id" >
													<option  value=""selected="selected">Select Category</option>
													<option name="" ng-repeat="category in test_category_details" value="{{category.test_cat_id}}">{{category.category_name}}</option>
													
												  </select>
									 
								  </div>
										  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
										  
										  </div>
					 </div>
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Test Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="add_test.price"  placeholder="Enter Test Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
          	  
    </div>
     		   
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="test_add()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   <!-- Edit  test Modal -->
<div class = "adjust-model modal fade" id = "edit_test" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Test
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		   <input type="hidden" class="form-control  align-input-ele font-lato-12-bold" ng-model="edit_test.test_id"   />
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Test Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="edit_test.test_name" placeholder="Enter Test Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Test Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="edit_test.price"  placeholder="Enter Test Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
		  
    </div>
     		   
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="update_test()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   

<!-- Add  Packaage Modal -->
<div class = "adjust-model modal fade" id = "addpackage" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add_package_model">
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
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="padding-top: 0px; margin-left: -9em;margin-top: 1%;" for="name">Package Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="package_name" placeholder="Enter Package Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="padding-top: 0px; margin-left: -9em;margin-top: 1%;" for="name"></label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
			     
    
				<input type="text" class="form-control  align-input-ele font-lato-12-bold input-icon" id="name" ng-model="search_test_name" placeholder="Search test here">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
				
	<div class="form-group align-input-space font-lato-12-bold test-block" ng-show="show_test">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" style="margin-left: -9em!important;"for="name">select test</label>
             <div class=" col-sm-9 col-lg-9 col-xs-12 col-md-9" style="height: 100%;text-align:left;width: 88%;"  >
			 

			 
			 
			 
			   <div class=" col-sm-3 col-lg-3 col-xs-3 col-md-3 adjust-tests" ng-repeat="name in display_test_category | filter:search_test_name" >
				<input type="checkbox" class="check-title-gap" ng-model="name.checked" ng-click="addCheck(name)">{{name.test_name}}
				</div>
	
			  </div>
		</div> 
				   
        <div class="  tbl-back-color" >
		     <div>
		        <table class="table table-hover table-responsive">
						<thead class="font-lato-12-bold" > 
						  <tr>
							<th>Test Name</th>
							<th>Price</th>
							
						  </tr>
						</thead>
						<tbody class="font-lato-11-reg">
						  <tr ng-repeat="(key, val) in tests">
							<td >{{val[2]}}</td>
							<td >  {{val[3]}} </td>							 
						
						  </tr>
						  
						  
						</tbody>
				</table>
		  </div>
        </div>
	     <div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Price</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="total">
			  </div>
			  
		</div> 
			
	     <div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Offer</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name"  ng-model="offer"  ng-change="caloffer(offer)" placeholder="Enter Package %">
			  </div>
			  
		</div> 
			
	     <div class="form-group align-input-space font-lato-12-bold">
	         <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name" ">Total Price</label>
             <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="totalprice" placeholder="Enter Package Name">
			  </div>
			  
		</div> 
			
			
		  
    </div>
     		    
        
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="package_add()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   <!-- Edit  Employee Modal -->
<div class = "adjust-model modal fade" id = "editpackage" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog ">
      <div class = "modal-content add-emp-model-size ">
         <div class = "modal-header">
            <button type = "button" class = "close adjust-close" data-dismiss = "modal" aria-hidden = "true">
                    <img src="../../icons/close.png" ></img>
            </button>
            <h4 class = "modal-title align-model-header font-lato-18-bold" id = "myModalLabel">
                 Edit Package
            </h4>
         </div>
         
<div class = "modal-body  row body-size  model-bg" style="height:auto;" >
	<form class="form-horizontal" name="add_Employee" id="addemployeeform">
		  
		  <div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Package Name</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" id="name" ng-model="package.edit_name" placeholder="Enter Package Name">
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
			<div class="form-group align-input-space font-lato-12-bold">
			  <label class="control-label col-sm-3 col-lg-3 col-xs-12 col-md-3 align-label" for="name">Package Price</label>
			  <div class=" col-sm-8 col-lg-8 col-xs-12 col-md-8" style="height: 100%;">
				<input type="text" class="form-control  align-input-ele font-lato-12-bold" ng-model="package.edit_test_price"  placeholder="Enter Package Price" >
		
			  </div>
			  <div class=" col-sm-1 col-lg-1 col-xs-12 col-md-1">
			  
			  </div>
			</div>
			
		  
    </div>
     		   
       
	
         <div class = "modal-footer" >
            <a ng-click="cancel()"><span data-dismiss = "modal">
               Cancel or</span></a>
            <button type = "button" class = "btn btn-primary align-submit" ng-click="update_package()" >
               Save
            </button>
         </div>
		  </form>
         </div> 
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
   
   

 

</div>  <!-- Container End -->
 <script src="../../js/labscript/labscript.js"></script>
</body> <!-- Body End -->
</html>