var app = angular.module('lab', []);

app.controller('lab_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_test={};
		$scope.add_test={};
		$scope.edit_test={};		
		$scope.test_name={};		
		$scope.display_package={};
		$scope.add_package={};
		$scope.edit_package={};		
		$scope.tests = {};
		$scope.total = 0;
		$scope.totalprice=0;
		//on load funtions
		//display test
		$scope.show_test_div=false;
		$scope.show_package=false;
		$scope.click=function(){
			$scope.show_test_div=true;
		$scope.show_package=false;
		};
		$scope.click_package=function(){
			$scope.show_test_div=false;
		$scope.show_package=true;
		};
		$http.get("display_test.php")
                .success(function(data){
				    
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
				
		
		
		// on click funtions
		
		// add test
        $scope.test_add = function() {
				$http({     
						                method : 'POST' ,
										url: 'add_test.php',
										data: {name:$scope.add_test.name, test_cat_id:$scope.category.test_cat_id, price:$scope.add_test.price}
										
								}).success(function(data){
							           
										$scope.display_test = data;
										angular.element('#add_test').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific user
         $scope.test_edit = function(test_id) {
                   
                                 				 
													$http.post("edit_test.php",{test_id : test_id})
														.success(function(data,status,headers,config){
														   //alert(data);
														   $scope.edit_test = data;
													angular.element('#test_user').modal('hide');
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update doctor
	   
	   
		$scope.update_test = function() {
		
		             // alert("comimg in update");
					  $http({     
						                method : 'POST' ,
										url: 'update_test.php',
										data:$scope.edit_test
										
								}).success(function(data){
									    //alert(data);
										alert("Updated Succesfully");
										$scope.display_test = data;
										angular.element('#edit_test').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.test_delete = function(test_id) {
								//alert("coming");
								$scope.test_id=test_id;
								//alert($scope.test_id);
                                $http.post("delete_test.php",{test_id : $scope.test_id})
														.success(function(data,status,headers,config){
														      $scope.display_test = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };
	 // $scope.show_div = false;
	 $scope.testname={
		 selected:{}
	}; 
	
	
  $scope.user = {
    testnames: []
  };
  
  
  // add package
        $scope.package_add = function() {
			
						$http({     
						                method : 'POST' ,
										url: 'add_package.php',
										data: {tests : $scope.tests, package_name : $scope.package_name, offer : $scope.offer}
										
								}).success(function(data){
							          //   alert(data);
									  alert("Package is added!!!");
										 
										$scope.display_package = data;
										angular.element('#addpackage').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };
		
	// category type
	$scope.category_type=function()
	{
		$http.get("category_type.php")
                .success(function(data){
				    
                    $scope.test_category_details = data;
					
				
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	}
	
	// display test in category
	$scope.show_test=false;
	
		
		$http({     
						                method : 'POST' ,
										url: 'test_display_category.php',
										
										
								}).success(function(data){
							          
									 
										
										$scope.display_test_category = data;
										$scope.show_test=true;
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
		

  
	
     
}]);

