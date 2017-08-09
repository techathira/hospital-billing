var app = angular.module('category', []);

app.controller('category_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_category={};
		$scope.add_category={};
		$scope.edit_category={};		
				
			
		
		
		//on load funtions
		
		$http.get("display_category.php")
                .success(function(data){
				     //alert(data);
                    $scope.display_category = data;
					console.log(data);
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		
		// add users
        $scope.category_add = function() {
						$http({     
						                method : 'POST' ,
										url: 'add_room_category.php',
										data: $scope.add_category
										
								}).success(function(data){
							             //alert(data);
										$scope.display_category = data;
										angular.element('#add_category').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific user
         $scope.category_edit = function(room_id) {
                   
                                 				   //alert(room_id);
													$http.post("edit_category.php",{room_id : room_id})
														.success(function(data,status,headers,config){
														   
														   $scope.edit_category = data;
														 
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update category
	   
	   
		$scope.category_update = function() {
		
		              alert("comimg in update");
					  $http({     
						                method : 'POST' ,
										url: 'update_category.php',
										data:$scope.edit_category
										
								}).success(function(data){
									    //alert(data);
										$scope.display_category = data;
										angular.element('#edit_category').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.delete_category = function(room_id) {
								//alert("coming");
								$scope.room_id=room_id;
								//alert($scope.room_id);
                                $http.post("delete_category.php",{room_id : $scope.room_id})
														.success(function(data,status,headers,config){
														      $scope.display_category = data;
															 // alert(data);
														}).error(function(data, status) {
														   alert("error");
													   });  
      };
	  
	  $scope.add_bed = function(ward_id,number_of_bed) {
		
		              //alert("comimg in bed");
		
				 
				 
	
        };
		$scope.display_beds = function(room_id) {
						
		              //alert("comimg in update");
					  $http.post("display_beds.php",{room_id : room_id})
						.success(function(data,status,headers,config){
							
							$scope.display_beds_for_room = data;
							
						})
						.error(function() {
							$scope.data = "error in fetching data";
						});  
				 
					
        };
		
		
	   $scope.wardids={};
	   
	   
	  $scope.add_beds = function() {
		
		           
	                    console.log($scope.wardids);
						$http({     
						                method : 'POST' ,
										url: 'add_beds.php',
										data:$scope.wardids
										
								}).success(function(data){
									 
									  angular.element('#addbed').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
			
        };
	
	
     
}]);

