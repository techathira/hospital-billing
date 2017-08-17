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
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css" /> 
	  
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <script type="text/javascript" src="../js/angular.min.js"></script>
	  <script type="text/javascript" src="js/bootstrap-notify.js"></script>

</head>

<body ng-app="doctor_profile" ng-controller="profileCtrl" ng-clock>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Hospital Billing</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">View Appointment</a></li>
      <li class="active"><a href="#">Profile</a></li>
      <li><a href="#">Report</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../login/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>

    <!-- Page Content -->
    <div class="container-fluid" >
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>
		
		<div class="col-md-2 col-sm-2 col-lg-2 col-xs-12 "></div>
		<div class="col-md-8 col-sm-8 col-lg-8 col-xs-12 padding-none bg-white">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-16">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2 padding-none">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
				<img src="../icons/doctor.jpg" alt=""     style="height: 130px;" />
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none text-center font-blue">
				Upload Photo
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none text-center font-blue cursor-pointer" data-toggle="modal" data-target="#change_password">
				Change Password
			</div>
			</div>	
			<div class="col-md-10 col-sm-10 col-lg-10 col-xs-12  ">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-16 font-grey margin-bottom">My Account</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Name</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">Dr. {{display_data.doctor_name}}</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Email</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">{{display_data.email}}</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom" ng-init="show='edit'">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Phone</div>
					
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 " ng-show="show=='edit'"><input type="text" value="{{display_data.phone}}" class="phone"  readonly />  <span class="phone-edit padding-left-16 font-blue" ng-click="show='save'"><i class="glyphicon glyphicon-pencil phone-edit"></i></span></div>
					
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 " ng-show="show=='save'"><input type="text" value="{{display_data.phone}}" class="phone" ng-model="display_data.phone"  />  <span class="phone-edit padding-left-16 font-blue"><i class="glyphicon glyphicon-saved" ng-click="show='edit';change_phone(display_data.doctor_id,display_data.phone)"></i></span></div>
				
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Specialization</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">{{display_data.specialization}}</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14 padding-none margin-bottom">
					<div class="col-md-2 col-sm-2 col-lg-2 col-xs-6 ">Timing</div>
					<div class="col-md-4 col-sm-4 col-lg-4 col-xs-6 ">&nbsp;</div>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 font-14  margin-bottom">
					<table class="table">
						<tr>
							<td>Day</td>
							<td>Morning</td>
							<td>Afternoon</td>
							<td>Evening</td>
							<td>Night</td>
						</tr>
						<tr>
							<td>Monday</td>
							<td></td>
							<td>01:30 - 3:00</td>
							<td>05:00 - 07:45</td>
							<td>10:00 - 11:30</td>
						</tr>
						<tr>
							<td>Tuesday</td>
							<td>08:00 - 10:00 </td>
							<td>01:30 - 3:00</td>
							<td></td>
							<td>10:00 - 11:30</td>
						</tr>
						<tr>
							<td>Wednesday</td>
							<td></td>
							<td>01:30 - 3:00</td>
							<td>05:00 - 07:45</td>
							<td></td>
						</tr>
						<tr>
							<td>Thursday</td>
							<td>08:00 - 10:00 </td>
							<td></td>
							<td></td>
							<td>10:00 - 11:30</td>
						</tr>
						<tr>
							<td>Friday</td>
							<td> </td>
							<td>01:30 - 3:00</td>
							<td></td>
							<td>10:00 - 11:30</td>
						</tr>
						<tr>
							<td>Saturday</td>
							<td></td>
							<td>01:30 - 3:00</td>
							<td>05:00 - 07:45</td>
							<td></td>
						</tr>
						<tr>
							<td>Sunday</td>
							<td>08:00 - 10:00 </td>
							<td>01:30 - 3:00</td>
							<td>05:00 - 07:45</td>
							<td></td>
						</tr>
					</table>
				</div>
				
			</div>
		</div>
		</div>

    </div>
    <!-- /.container -->
	
	
<!-- Modal -->


<!--Change password Modal -->
<div id="change_password" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="col-md-12 col-sm-12 col-lg-12 col-xs-1 modal-body">
	  <form class="form-horizontal" name="password"  ng-submit="change_password()"  >
        <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 padding-none font-16 padding-top-16">Old Password</div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 padding-none font-16">
			<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="password"  class="module-input" ng-model="password.old" required=""  />
				  <span class="bar"></span>
				  <label class="label-text" >Old password</label>
				  </div>
				</div>
		</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 padding-none font-16 padding-top-16">New Password</div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 padding-none font-16">
			<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="password"  class="module-input" ng-model="password.newpassword" required />
				  <span class="bar"></span>
				  <label class="label-text" >Enter the new password</label>
				  </div>
				</div>
		</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
        <div class="col-md-3 col-sm-3 col-lg-3 col-xs-6 padding-none font-16 padding-top-16">Re-enter Password</div>
        <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6 padding-none font-16">
			<div class="group col-md-12 col-sm-12 col-lg-12 padding-none"> 
				<div class="col-md-12 col-sm-12 col-lg-12 padding-none">	
					  <input type="password"  class="module-input" ng-model="password.reenter" ng-match="password.newpassword" required	 />
				  <span class="bar"></span>
				  <label class="label-text" >Re-enter your new password</label>
				  </div>
				  <span class="font-red font-12" ng-show="password.newpassword != password.reenter">Confirm Password should match with New Password</span>
				</div>
		</div>
		</div>
		
		
			
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" ng-disabled="password.newpassword != password.reenter">Save</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>

<!-- SCRIPT -->
<script type="text/javascript" src="js/profile/profile.js"></script>
</body>

</html>
