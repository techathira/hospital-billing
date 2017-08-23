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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hospital</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/Jquery-ui.css" />

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
	    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="../../js/angular.min.js"></script>
	<!--  <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	  <script type="text/javascript" src="js/Jquery1-ui.js"></script>
		-->
	
	<script type="text/javascript" src="js/bootstrap-notify.js"></script> <!-- for Notify js -->
	
	<script type="text/javascript">
	$(document).ready(function(){
		var windowHeight = $(window).innerHeight();
		$(".main_container").css("min-height",windowHeight);
	});
	</script>
	
  </head>

  <body class="nav-md" ng-app="doctor_profile" ng-controller="profileCtrl" ng-cloak >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Hospital</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img ng-src="{{display_data.photo}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{display_data.doctor_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home </a>

                  </li>
                  <li><a href="appointment.php"><i class="fa fa-edit"></i> View Appointment</a>
                  
                  </li>

                  <li><a href="profile.php"><i class="fa fa-table"></i> Profile</a>
                    
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
                       <li><a href="report.php">Patient Report</a></li>
                    </ul>
                  </li>

                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img ng-src="{{display_data.photo}}" alt=""> {{display_data.doctor_name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                   
                    <li><a href="../../login/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
		 <div class="main_container right_col" role="main" >
       <div class="container-fluid" >
		
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">&nbsp;</div>

		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none ">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-16">
			<div class="col-md-2 col-sm-2 col-lg-2 col-xs-2 padding-none">
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none margin-bottom">
				<img ng-src="{{display_data.photo}}"  style="height: 130px;" />
			</div>
			
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 padding-none text-center font-blue cursor-pointer" ng-click="uploadfile()" >
				Upload Photo
			</div>
			
			<div class="text-center" ng-init="show_save_btn=false" ng-show="show_save_btn">
				<button  ng-click="uploadFile()" class="btn btn-primary">save me</button>
				{{myFile.name}}
		   </div>
			<!-- Hidden file button -->
			 <div class="form-group" style="display:none;" > 
				<input type="file" name="file"  id="upload"  file-model="myFile" >
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
							<td ng-repeat="monday in display_timing.Monday">{{monday.from_time}} - {{monday.to_time}}</td>
						</tr>
						<tr>
							<td>Tuesday</td>
							<td ng-repeat="tuesday in display_timing.Tuesday">{{tuesday.from_time}} - {{tuesday.to_time}}</td>
						</tr>
						<tr>
							<td>Wednesday</td>
							<td ng-repeat="wednesday in display_timing.Wednesday">{{wednesday.from_time}} - {{wednesday.to_time}}</td>
						</tr>
						<tr>
							<td>Thursday</td>
							<td ng-repeat="Thursday in display_timing.Thursday">{{Thursday.from_time}} - {{Thursday.to_time}}</td>
						</tr>
						<tr>
							<td>Friday</td>
							<td ng-repeat="Friday in display_timing.Friday">{{Friday.from_time}} - {{Friday.to_time}}</td>
						</tr>
						<tr>
							<td>Saturday</td>
							<td ng-repeat="Saturday in display_timing.Saturday">{{Saturday.from_time}} - {{Saturday.to_time}}</td>
						</tr>
						<tr>
							<td>Sunday</td>
							<td ng-repeat="Sunday in display_timing.Sunday">{{Sunday.from_time}} - {{Sunday.to_time}}</td>
						</tr>
					</table>
				</div>
				
			</div>
		</div>
		</div>

    </div>
    </div>
        <!-- /page content -->
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
					  <input type="password"  name="oldpassword" class="module-input" ng-model="password.old" required=""  old-password/>
				  <span class="bar"></span>
				  <label class="label-text" >Old password</label>
				   <span ng-show="password.oldpassword.$error.oldPassword" class="font-12 font-red">Enter the Old Password</span>
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
        <!-- footer content -->
   
        <!-- /footer content -->
      </div>
    </div>

	 <!-- Custom Theme Scripts -->
   <script src="../build/js/custom.min.js"></script>
	
<!-- SCRIPT -->
<script type="text/javascript" src="js/profile/profile.js"></script>
<script type="text/javascript" src="js/directives/custom-directives.js"></script>
<script type="text/javascript" src="js/services/profile-services.js" ></script>

  </body>
</html>
