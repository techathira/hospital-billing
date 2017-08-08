var app = angular.module('user_lab', []);

app.controller('user_lab_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
		$scope.tests = {};
		$scope.display_ref_doc = {};
		$scope.test_name = {};
		$scope.addtional=[];
		$scope.addsum=[];
		$scope.total = 0;
		$scope.total1 = 0;
		$scope.totalprice=0;
		$scope.balance=0;
		$scope.balancepackage=0;
		$scope.paymentmode="Cash";
		$scope.devide=false;
		$scope.hide_button=false;
		$scope.devidepackage=false;
		$scope.show_test = false;
		$scope.show_package = false;
		$scope.totalbox=false;
    $scope.click = function() {
		$scope.show_package = false;
			$scope.show_test = true;
			$http.get("category_type.php")
                .success(function(data){
				    
                    $scope.test_category_details = data;
					
				
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
			
	}; 
			  $http.get("ref_doc.php")
						.success(function(data){
							 
							$scope.display_ref_doc = data;
						  
						})
						.error(function() {
							$scope.data = "error in fetching data";
			});
	$scope.click_package = function() {
		$scope.show_test = false;
		$scope.show_package = true;

			
	};
	//on load funtions
		//display test
	   $http.get("display_test.php")
                .success(function(data){
				     //alert(data);
                    $scope.display_test = data;
					
				
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
// display package
				$http.get("display_package.php")
                .success(function(data){
				
                    $scope.display_package = data;
					
				
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				
				//check list of package
				
				$scope.addCheck = function (test) {
					if(test.checked) {
						$scope.tests[test.test_id] = test;
						$scope.total+=parseInt(test.price);
						
					
					}
					else {
						
						delete $scope.tests[test.test_id];
						$scope.total-=parseInt(test.price);
						
					}
					
				}
				$scope.caloffer=function(offer){
				
				         var offer_given=parseInt(offer);
	                     $scope.totalprice=$scope.total;					
				         $scope.offerprice= parseFloat(offer/100) * $scope.totalprice ;
						 $scope.totalprice= parseFloat($scope.total-$scope.offerprice);
						 
				
				}
				//check list of test
				
				$scope.addtest = function (test_name) {
				
			
					if(test_name.checked) {
					
					
						$scope.test_name[test_name.test_id] = test_name;
						$scope.total1+=parseInt(test_name.price);
			
			
		
						
					}
					else {
						
						
						delete $scope.test_name[test_name.test_id];
						$scope.total1-=parseInt(test_name.price);
		
				
					
					}
					
				}

				$scope.caloffer=function(offer){
				
				         var offer_given=parseInt(offer);
	                     $scope.totalprice=$scope.total;					
				         $scope.offerprice= parseFloat(offer/100) * $scope.totalprice ;
						 $scope.totalprice= parseFloat($scope.total-$scope.offerprice);
				
				}
			 // edit package
        $scope.package_edit = function(package_id) {
						$scope.package_id=package_id;
					//	alert($scope.package_id);
						 $http.post("edit_package.php",{package_id : $scope.package_id})
						
										
								.success(function(data){
							             //alert(data);
									
								
										 $scope.total=data.totalprice;
										$scope.edit_package = data;
										
							            
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
					   $http.post("list_test.php",{package_id : $scope.package_id})
						.success(function(data){
							           //  alert(data);
										
										$scope.list_test = data;
										
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		$scope.click_paymentmodepackage=function(id){
		   
		   
	
		      
			  if(id=="Cash" || id=="Card")
			  {
			        
			         
					 $scope.devidepackage=false;
					
			  
			  }
			  else{
			  
			       $scope.devidepackage=true;
			       
			  
			  }
			    
			  $scope.show_print_discharge=true;
			  
			  
			  
		   };
		$scope.print_op_lab=function(packade_id){
		
		         $http({     
						                method : 'POST' ,
										url:'lab_screen_print.php',
										data:{ package_id:$scope.edit_package.package_id, patient_id:$scope.patient_id, paymentmode: $scope.paymentmode, flag:$scope.flag,amount:$scope.total,paymode:$scope.display_pay_details1,balance:$scope.balancepackage}
												
						}).success(function(data){
							      

										$scope.screen_print = data;
										
									  setTimeout(function(){
														var innerContents = document.getElementById("packageprintsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		

											},500);
											angular.element('#edit_package').modal('hide');
											$scope.show_package = false;
							            
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
				
		
		};
		
		
		
		
			$(function() {
				
			  $("#patientid" ).autocomplete({
			  source: 'patient-details.php',
			  select: function( event, ui ) {
				
					var patient_id = ui.item.value;
					$scope.patient_id=patient_id;
					
				 }	 
			  
			});

		
				
				$( "#doctorid" ).autocomplete({
				 source: 'doctor-details.php',
				 select: function( event, ui ) {
						var doctor_name = ui.item.value;
						$scope.doctor_name=doctor_name;
					
				}
				 
				 
				});
	
			});
  
		
		 
		
		$scope.total2=0;
			$scope.click_paymentmode=function(id){
		   
		   
	              $scope.devide=false;
		      
			  if(id=="Cash" || id=="Card")
			  {
			        
			         
					 $scope.devide=false;
					 
			  
			  }
			  else{
			  
			       $scope.devide=true;
			        
			  
			  }
			    
			  $scope.show_print_discharge=true;
			   
			  
			  
		   };
	      $scope.check_total=function(){
			   
			 
			  angular.forEach($scope.test_name, function(value, key) {
					    
					            
					             $scope.addsum[key]=parseInt(value.price)+parseInt($scope.addtional[key]);
						          $scope.total2+=$scope.addsum[key];
								  
					          
   
                       }); 
					  
					  $scope.totalbox=true;
					  $scope.hide_button=false;
		  };
		
		 $scope.click_payment=function(){
		      $scope.show_print_discharge=true;
		   };
		
		// edit package
			
			
			  $scope.cal_toalsum = function() {
	          
			      
			
			
			};
	 $scope.ref_doc={};
	   $scope.referal={};
        $scope.print_screen = function(patient_id) {
		
		               angular.forEach($scope.test_name, function(value, key) {
					   
					          
					             $scope.addsum[key]=parseInt(value.price)+parseInt($scope.addtional[key]);
						          $scope.total1+=$scope.addsum[key];
					          
   
                       });
					   
					   if($scope.referal.ref_doctor_list==null)
				$scope.ref_doc=0;
				else
				$scope.ref_doc=$scope.referal.ref_doctor_list;
					 
						$http({     
						                method : 'POST' ,
										url:'print_screen.php',
										data:{testnames:$scope.test_name, patient_id:patient_id, paymentmode: $scope.paymentmode, flag:$scope.flag,amount:$scope.total2,paymode:$scope.display_pay_details,add_charge:$scope.charges,addsum:$scope.addsum,balance:$scope.balance,ref_doc: $scope.ref_doc}
												
						}).success(function(data){
							             
						               
										$scope.screen_print = data;
                                         console.log(data);
									
									  setTimeout(function(){
														var innerContents = document.getElementById("printsection").innerHTML;
														var popupWinindow = window.open('', '_blank', 'width=600,height=700,scrollbars=no,menubar=no,toolbar=no,location=no,status=no,titlebar=no');  
														popupWinindow.document.open();
														popupWinindow.document.write('<html><head><link rel="stylesheet" type="text/css" href="style.css" /></head><body onload="window.print()">' + innerContents + '</html>');
														popupWinindow.document.close();		
                                                         
											},500);
												$scope.show_test = false;
												$scope.totalbox = false;
											 //window.location.reload(10000);
						       }).error(function(data, status) {
						                 alert("error");
					   }); 
									
	    };
		
	// test _display 
	$scope.test_display=function()
	{
		
		$http({     
						                method : 'POST' ,
										url: 'test_display_category.php',
										data: {test_cat_id : $scope.category.test_cat_id }
										
								}).success(function(data){
							          
									 
										
										$scope.display_test = data;
										$scope.show_test=true;
										$scope.hide_button=true;
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
		
	}
	
	
     
}]);

