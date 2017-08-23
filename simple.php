<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	<link rel="stylesheet" href="css/sidebar-menu.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
 <link rel="stylesheet" href="css/bootstrap-clockpicker.min.css">
   
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
  <script src="js/angular.min.js"></script>
<script src="js/custom.js"></script>  
    
  <script src="js/bootstrap-clockpicker.min.js"></script>	
</head>
<body ng-app="doctor">
<div ng-controller="doctor_controller">
<div class="clockpicker"> 
<input class="" type="text"  ng-model="gymtime.start_time" ng-click="callclock()" />
 </div>
	 <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
         <div class="clockpicker" > 

		 <input class="" type="text"  ng-model="time.start_time" ng-click="callclock()" /> 
		 <input class="" type="text"  ng-model="time.end_time" ng-click="callclock()" />
 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	
	</div>
	 <script src="simple.js"></script>  
</body>
</html>