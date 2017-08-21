
   <?php
session_start();
if(isset($_SESSION['name']) && $_SESSION['name']=='patient') {

}
else{
    header('Location: ../login/index.html');
    die();  
}

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

  <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>
     <link href="css/style.css" rel="stylesheet"/>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/themify-icons.css" rel="stylesheet">
   



     <!--   Core JS Files   -->
    <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
     <script src="js/angular.min.js"></script>
     
    <!--  Checkbox, Radio & Switch Plugins -->
    <script src="js/bootstrap-checkbox-radio.js"></script>

    <!--  Charts Plugin -->
    <script src="js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyATUxnXEYwOrIyMOJ8c5Q0rLl8upLH--LQ"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
    <script src="js/paper-dashboard.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body ng-app="book-appointment" ng-controller="prescrbook_controller">

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Hospital Name
                </a>
            </div>

            <ul class="nav">
                
                <li>
                    <a href="index.php">
                        <i class="ti-view-list-alt"></i>
                        <p>Book a Doctor</p>
                    </a>
                </li>
                  <li class="active">
                    <a href="prescription-book.php">
                        <i class="ti-pencil-alt2"></i>
                        <p>Prescription Book</p>
                    </a>
                </li>
                <li >
                    <a href="user-profile.php">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="booking-history.php">
                        <i class="ti-text"></i>
                        <p>Booking History</p>
                    </a>
                </li>
              
              
                <li>
                    <a href="dashboard.php">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">User Profile</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                       <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-settings"></i>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a  href="../login/logout.php">logout</a></li>
                                <li><a href="#">Change Password</a></li>
                              </ul>
                        </li>
                    
                    </ul>

                </div>
            </div>
        </nav>
         <div class="content" ng-cloak>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Doctors Table</h4>
                                
                            </div>
                        <div class="content">    
<!--                             <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Select per page</label>
                     <select  class="form-control input-sm" ng-model="pageSize" ng-change="pageSizeChanged()">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                &nbsp;
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Search</label>
                    <input type="search" class="form-control input-sm" aria-controls="example" placeholder="Search by name or specialization"ng-model="searchText" ng-change="searchTextChanged()">
                </div>
            </div>
</div> -->
                        </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Reference No</th>
                                        <th>Doctor Name</th>
                                        <th>Date</th>
                                        <th>Reason</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                    <!--ng-repeat="doctor in display_doctor | filter:searchbox" -->
                                        <tr ng-repeat="each_pre in prescription_history">
                                            <td>{{each_pre.appointment_id}}</td>
                                            <td>{{each_pre.doctor_name}}</td>
                                            <td>{{each_pre.date}}</td>
                                            <td>{{each_pre.reason}}</td>
                                            <td><button type="button" ng-click="check_prescription(each_pre.appointment_id)" class="btn btn-success">Show Prescription</button></td>
                                        </tr>


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                 </div>
             </div>
           </div> 

        

        <footer class="footer">
            <div class="container-fluid">
            
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://athiratechnologies.com">Athira Technologies</a>
                </div>
            </div>
        </footer>

    </div>
</div>

<!-- Model to show prescription in detailed -->
<!-- Modal -->
  <div class="modal fade" id="prescription-modal" role="dialog">
    <div class="modal-dialog slots-modal">
    
      <!-- Modal content-->
      <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> <h4 class="modal-title">Prescription for date {{fordate}}</h4></h4>
                    </div>
                    <div class="modal-body">

                            <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="header text-center">
<!--                                 <h3 class="title">Paper Dashboard</h3>
                              <p class="category">Are you looking for more components? Please check our Premium Version of Paper Dashboard Pro.</p>
                                 -->                              <br>
                            </div>
                            <div class="content table-responsive table-full-width table-upgrade">
                                <table class="table table-border text-center">
            <tr >
                <th rowspan="3" class="text-center padding-top-5">Drug Name</th>
                <th rowspan="3" class="text-center padding-top-5">Dosage</th>
                <th colspan="6" class="text-center">Timing</th>
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
            
         <tr ng-repeat="display_drug in drugs">
            <td>{{display_drug.drug_name}}</td>
            <td>{{display_drug.dosage}}</td>
            <td>{{display_drug.mbf=="1" ? '&#x2714;' : '&#x2716;'}}</td>
            <td>{{display_drug.maf=="1" ? '&#x2714;' : '&#x2716;'}}</td>
            <td>{{display_drug.abf=="1" ? '&#x2714;' : '&#x2716;'}}</td>
            <td>{{display_drug.aaf=="1" ? '&#x2714;' : '&#x2716;'}}</td>
            <td>{{display_drug.nbf=="1" ? '&#x2714;' : '&#x2716;'}}</td>
            <td>{{display_drug.naf=="1" ? '&#x2714;' : '&#x2716;'}}</td>

        </tr>
          
    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<!-- Ends Here -->
<!-- Angular Stuff -->
    
     <script src="js/controllers/prescription-book.js" type="text/javascript"></script>
 
   <!-- Angular Stuff End here -->
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


</body>

   
</html>
