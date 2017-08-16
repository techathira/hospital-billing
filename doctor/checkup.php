<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {

}
else{
	header('Location: ../login/index.html');
	die();	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hospital Billing</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="css/style.css" />
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Hospital Billing</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">View Appointment</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li><a href="#">Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <!-- Page Content -->
	<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12">&nbsp;</div>
    <div class="col-md-10 col-sm-10 col-lg-8 col-xs-12  bg-white">
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20">Name:</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-20">
				Rahul Patel S G
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16">Prescription:</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16">
				<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required=""/>
				  <span class="bar"></span>
				  <label class="label-text" >EG: Crocin</label>
				  </div>
				</div>
			</div>
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20 pointer padding-none"><i class="glyphicon glyphicon-plus"></i></div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-16">Dosage:</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16">
				<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="text"  class="module-input" required=""/>
				  <span class="bar"></span>
				  <label class="label-text" >EG: 10 tablet / 50 ML</label>
				  </div>
				</div>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2 font-16">Timing:</div>
			<div class="col-md-10 col-sm-10 col-lg-10 col-xs-10 font-16 table-responsive" >
				<table  class="table table-border">
					<tr class="text-center">
						<td colspan="2" class="table-head-padding">Morning</td>
						<td colspan="2">Afternoon</td>
						<td colspan="2">Night</td>
					</tr>
					<tr class="table-content-padding text-center">
						<td >Before Food</td>
						<td>After Food</td>
						<td>Before Food</td>
						<td>After Food</td>
						<td>Before Food</td>
						<td>After Food</td>
					</tr>
					<tr class="text-center">
						<td><input type="checkbox" name="" id="" /></td>
						<td><input type="checkbox" name="" id="" /></td>
						<td><input type="checkbox" name="" id="" /></td>
						<td><input type="checkbox" name="" id="" /></td>
						<td><input type="checkbox" name="" id="" /></td>
						<td><input type="checkbox" name="" id="" /></td>
						
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-4 font-20">&nbsp;</div>
			<div class="col-md-3 col-sm-3 col-lg-3 col-xs-4 font-16">
				<input type="button" value="ADD" class="btn btn-primary" />
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>

	<div class="col-md-8 col-sm-8 col-lg-12 col-xs-12 table-responsive">
		<table class="table table-border text-center">
			<tr >
				<th rowspan="3" class="text-center padding-top-5">Drug Name</th>
				<th rowspan="3" class="text-center padding-top-5">Dosage</th>
				<th colspan="6" class="text-center">Timing</th>
				<th rowspan="3" colspan="2"></th>
				
			</tr>
			<tr>
				<th colspan="2" class="text-center">Morning</th>
				<th colspan="2" class="text-center">Afternoon</th>
				<th colspan="2" class="text-center">Night</th>
				
			</tr>
			<tr>
				<th class="text-center">BF</th>
				<th class="text-center">AF</th>
				<th class="text-center">BF</th>
				<th class="text-center">AF</th>
                <th class="text-center">BF</th>
				<th class="text-center"> AF</th>
			</tr>
			
         <tr>
			<td>Crosin</td>
			<td>10</td>
			<td>yes</td>
			<td></td>
			<td></td>
			<td>yes</td>
			<td></td>
			<td></td>
            <td>Edit</td>
			<td>Delete</td>
		</tr>
		  <tr>
			<td>Crosin</td>
			<td>10</td>
			<td>yes</td>
			<td></td>
			<td></td>
			<td>yes</td>
			<td></td>
			<td></td>
            <td>Edit</td>
			<td>Delete</td>
		</tr>
	</table>
	</div>
		
		

<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
 </div><!-- /.container -->




</body>

</html>
