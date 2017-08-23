<?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='doctor') {

}
else{
	header('Location: ../../login/index.html');
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

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/style.css" />
	  <link rel="stylesheet" href="css/Jquery-ui.css" />
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">



    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	
	    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
<script type="text/javascript" src="../../js/angular.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>


	<script type="text/javascript">
	$(document).ready(function(){
		var windowHeight = $(window).innerHeight();
		$(".main_container").css("min-height",windowHeight);
	});
	</script>
	
  </head>

  <body class="nav-md" class="nav-md" ng-app="dashboard" ng-controller="dashboardCtrl" ng-cloak>
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
                <img ng-src="{{doctor_info.photo}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{doctor_info.doctor_name}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home </a>

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
                    <img ng-src="{{doctor_info.photo}}" alt="">{{doctor_info.doctor_name}}
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
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <i class="fa fa-user"></i><span class="count_top" style="margin-left:10px;"> Total No of Patient</span>
              <div class="count text-center">{{doctor_info.total}}</div>
           
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <i class="fa fa-clock-o"></i><span class="count_top" style="margin-left:10px;">Patient for today</span>
              <div class="count green text-center">{{doctor_info.today}}</div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <i class="fa fa-user"></i><span class="count_top" style="margin-left:10px;"> Consulted this week</span>
              <div class="count  text-center">{{doctor_info.this_week}}</div>
            
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <i class="fa fa-user"></i> <span class="count_top" style="margin-left:10px;">Consulted this month</span>
              <div class="count text-center">{{doctor_info.this_month}}</div>
             
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <i class="fa fa-user"></i> <span class="count_top" style="margin-left:10px;">Remaining Patients</span>
              <div class="count green text-center">{{doctor_info.remaining}}</div>              
            </div>

          </div>
          <!-- /top tiles -->



          <div class="row">


            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_360">
                <div class="x_title">
                  <h2>Appointment for this week</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                  <div class="widget_summary" ng-repeat="app_info in appointment_info"> 
                    <div class="w_left w_25">
                      <span>{{app_info.day}}</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{app_info.total}}" aria-valuemin="0" aria-valuemax="100" style="width: {{app_info.width}}%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{app_info.total}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_360">
                <div class="x_title">
                  <h2>Session Details</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  
                  <div class="widget_summary" ng-repeat="sess_info in session_info"> 
                    <div class="w_left w_25">
                      <span>{{sess_info.name}}</span>
                    </div>
                    <div class="w_center w_55">
                      <div class="progress">
                        <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{sess_info.session_count}}" aria-valuemin="0" aria-valuemax="100" style="width: {{sess_info.width}}%;">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </div>
                    <div class="w_right w_20">
                      <span>{{sess_info.session_count}}</span>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                </div>
              </div>
            </div>


            <div class="col-md-4 col-sm-4 col-xs-12">

            </div>

          </div>



        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            A Product by Athira Technologies
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<!-- SCRIPT -->
<script type="text/javascript" src="js/dashboard/dashboard.js"></script>

  </body>
</html>
