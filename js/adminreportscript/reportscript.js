var app = angular.module('reports', []);

app.controller('reports_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_doctor={};
        $scope.display_specialization={};
		$scope.add_doct={};
		$scope.edit_doct={};
		$scope.total=0;
		$scope.totalamt=0;
		$scope.packageamt=0;
		
        		
		
		$scope.patient_add={};
		$scope.patient_details={};
		$scope.op={};
		$scope.ip={};
		$scope.testdetails={};
		$scope.package1={};
		$scope.receptionists={};
		$scope.testamount=0;
		
		$scope.display_ip={};
		$scope.show_test=false;
		$scope.show_package=false;
		$scope.show_ip=false;
		$scope.show_all=true;
		$scope.show_op=false;
		
		$scope.show_op_div=false;
		$scope.show_ip_div=false;
		$scope.show_package_div=false;
		$scope.show_test_div=false;
		$scope.show_all_inside=false;
		$http({     
						                method : 'POST' ,
										url: 'get_receptionists.php',
										
										
								}).success(function(data){
										$scope.receptionists=data;
					                
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
		$scope.get_all_report=function(){ 
		               $scope.re.fromdate="";
		               $scope.re.todate="";
					   $scope.re.recep_id="";
					   $scope.show_all_inside=false;
					   $scope.show_test=false;
					   $scope.show_package=false;
					   $scope.show_op=false;
					   $scope.show_ip=false;
					   $scope.show_all=true;
		};
		$scope.get_ip_report=function(){ 
						$scope.ip.fromdate="";
						$scope.ip.todate="";
					    $scope.ip.recep_id="";
					    $scope.show_ip_div=false;
						$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_op=false;
						$scope.show_ip=true;
						$scope.show_all=false;
		};
		$scope.get_op_report=function(){
						$scope.op.fromdate="";
						$scope.op.todate="";
  					    $scope.op.recep_id="";
						$scope.show_op_div=false;
						$scope.show_test=false;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=true;
						$scope.show_all=false;
		};
		$scope.get_tests_report=function(){
						$scope.package1.fromdate="";
						$scope.package1.todate="";
					    $scope.package1.recep_id="";
					    $scope.show_package_div=false;
						$scope.show_test=true;
						$scope.show_package=false;
						$scope.show_ip=false;
						$scope.show_op=false;
						$scope.show_all=false;
		};
		$scope.get_package_report=function(){
					    $scope.op_test.fromdate="";
					    $scope.op_test.todate="";
						$scope.op_test.recep_id="";
						$scope.show_op_test_div=false;
    					$scope.show_test=false;
						$scope.show_package=true;
						$scope.show_ip=false;
						$scope.show_op=false;
						$scope.show_all=false;
		};
		
		
	   $scope.reset_from_date_reports=function(){
		   $scope.re.todate="";
		   $scope.re.recep_id="";
		   $scope.show_all_inside=false;
		   
	   };
	   $scope.reset_to_date_reports=function(){
		   
		   $scope.re.recep_id="";
		   $scope.show_all_inside=false;
		   
	   };
	   $scope.reset_from_date_op_reports=function(){
		   $scope.op.todate="";
		   $scope.op.recep_id="";
		   $scope.show_op_div=false;
		   
	   };
	   $scope.reset_to_date_op_reports=function(){
		   
		  $scope.op.recep_id="";
		   $scope.show_op_div=false;
		   
	   };
		$scope.reset_from_date_ip_reports=function(){
		   $scope.ip.todate="";
		   $scope.ip.recep_id="";
		   $scope.show_ip_div=false;
		   
	   };
	   $scope.reset_to_date_ip_reports=function(){
		   
		  $scope.ip.recep_id="";
		   $scope.show_ip_div=false;
		   
	   };
		$scope.reset_from_date_pack_reports=function(){
		   $scope.package1.todate="";
		   $scope.package1.recep_id="";
		   $scope.show_package_div=false;
		   
	   };
	   $scope.reset_to_date_pack_reports=function(){
		   
		  $scope.package1.recep_id="";
		   $scope.show_package_div=false;
		   
	   };
		$scope.reset_from_date_test_reports=function(){
		   $scope.op_test.todate="";
		   $scope.op_test.recep_id="";
		   $scope.show_op_test_div=false;
		   
	   };
	   $scope.reset_to_date_test_reports=function(){
		   
		  $scope.op_test.recep_id="";
		   $scope.show_test_div=false;
		   
	   };
		
		 $scope.cash=0;
		                $scope.card=0;
        
		$scope.displayallreports = function() {
			
			
		                $scope.total=0;
		                $scope.cash=0;
		                $scope.card=0;
		               
								$scope.show_all_inside=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'report.php',
										data: $scope.re
										
								}).success(function(data){
										$scope.display_all=data;
										
										for(var i in data)
										{
							                	 	$scope.total+= parseInt(data[i][3],10);	     
							                	 	$scope.cash+= parseInt(data[i][5],10);	     
							                	 	$scope.card+= parseInt(data[i][6],10);	     
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		$scope.displayreports = function() {
			
			
		                $scope.total=0;
		                $scope.cash=0;
		                $scope.card=0;
		               $scope.opbalance=0;
								$scope.show_op_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'op_report.php',
										data: $scope.op
										
								}).success(function(data){
										$scope.display_op=data;
										
										for(var i in data)
										{
							                	 	$scope.total+= parseInt(data[i][3],10);	     
							                	 	$scope.cash+= parseInt(data[i][5],10);	     
							                	 	$scope.card+= parseInt(data[i][6],10);	     
							                	 	$scope.opbalance+= parseInt(data[i][7],10);	     
										}
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		 $scope.advance=0;
		$scope.cashamt=0;
                      $scope.cardamt=0;
		 $scope.displayipreports = function() {
		
                      $scope.totalamt=0;
                      $scope.cashamt=0;
                      $scope.cardamt=0;
					   $scope.advance=0;
					   $scope.ipbalance=0;
			         $scope.show_ip_div=true;
						$http({     
						                method : 'POST' ,
										url: 'ip_patient_report.php',
										data: $scope.ip 
										
								}).success(function(data){
										$scope.display_ip=data;
                                       
										for(var i in data)
										{
							                	 	$scope.totalamt+= parseInt(data[i][3],10);	     
							                	 	$scope.cashamt+= parseInt(data[i][5],10);	     
							                	 	$scope.cardamt+= parseInt(data[i][6],10);
							                	 	$scope.ipbalance+= parseInt(data[i][8],10);
                                                    $scope.advance+= parseInt(data[i][7],10);													
										}
										
										
										
										
										
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

        
		 $scope.testcash=0;
		                $scope.testcard=0;
      $scope.testreport = function() {
		                $scope.testamount=0;
		                $scope.testcash=0;
		                $scope.testcard=0;
		                $scope.test_balance=0;
					
						$scope.show_test_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'op_test_report.php',
										data: $scope.op_test 
										
								}).success(function(data){
										$scope.testdetails=data;
										 console.log(data);
										for(var i in data)
										{
							                	 	$scope.testamount+= parseInt(data[i][3],10);	     
							                	 	$scope.testcash+= parseInt(data[i][5],10);	     
							                	 	$scope.testcard+= parseInt(data[i][6],10);	
							                	 	$scope.test_balance+= parseInt(data[i][7],10);	
                                                    													
										}
								
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		    $scope.packagecash=0;
		                $scope.packagecard=0;
			$scope.packageamount=0;
		$scope.packagereport = function() {
		                $scope.packageamt=0;
		                $scope.packagecash=0;
		                $scope.packagecard=0;
						$scope.packageamount=0;
						$scope.package_balance=0;
						$scope.show_package_div=true;
			      
						$http({     
						                method : 'POST' ,
										url: 'package_report.php',
										data: $scope.package1
										
								}).success(function(data){
										$scope.package_disp=data;
										
										for(var i in data)
										{
							                	 	$scope.packageamt+= parseInt(data[i][3]);	
							                	 	$scope.packagecash+= parseInt(data[i][5]);	
							                	 	$scope.packagecard+= parseInt(data[i][6]);	
							                	 	$scope.package_balance+= parseInt(data[i][7]);	
													
										}
									
									
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		
		$scope.opreportprint=function(){
			   
			                  setTimeout(function(){
													var innerContents = document.getElementById("printop").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											setTimeout(function(){
											   //window.location.reload();
											  },600);
		};
     $scope.ipreportprint=function(){
			   
			                  setTimeout(function(){
													var innerContents = document.getElementById("printip").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											setTimeout(function(){
											   //window.location.reload();
											  },600);
		};
     $scope.packagereportprint=function(){
			   
			                  setTimeout(function(){
													var innerContents = document.getElementById("printpackage").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											setTimeout(function(){
											   //window.location.reload();
											  },600);
		};
     $scope.testreportprint=function(){
			   
			                  setTimeout(function(){
													var innerContents = document.getElementById("printtest").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											setTimeout(function(){
											   //window.location.reload();
											  },600);
		};
     
}]);
