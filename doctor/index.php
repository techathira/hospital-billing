<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=="doctor")
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


<link rel="stylesheet" href="../css/sidebar-menu.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
<link href='../css/fullcalendar.css' rel='stylesheet' />
<link href='../css/fullcalendar.print.css' rel='stylesheet' media='print' />

  <link rel="stylesheet" href="../css/datepicker/jquery-ui.css" >
<script src='../js/jquery.min.js'></script>
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/angular.min.js"></script>
<script src="../js/custom.js"></script>
<script src="../js/custom_jquery.js"></script>	
	
<script src='../js/moment.min.js'></script>
<script src='../js/moment.min.js'></script>
<script src="../js/datepicker/jquery-ui.js"></script>

</head>

<body ng-app="doctor">
	
<div class=" container-fluid" ng-controller="doctor_controller" >




		
		

<div ng-include="'include/header.html'"></div>
		

	
<div class="col-md-9 col-lg-9 col-xs-9 col-sm-9 adjust-margin disp-dept-cont">
<div class="col-md-8 col-lg-8 col-xs-8 col-sm-8">
		
 </div>

 </div>
	
	
<div class="row" >


		
		
	</div>
 
 
 
 
</div> 
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
   <script src="../js/doctorscreen/doctorscript.js"></script> 
</body> <!-- Body End -->
</html>