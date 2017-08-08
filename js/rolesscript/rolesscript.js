var app = angular.module('roles', []);

app.controller('roles_controller', ['$scope', '$http', function ($scope, $http) {
        // scope variables
        $scope.display_user={};
		$scope.add_user={};
		$scope.edit_user={};		
		
		
		//on load funtions
		
		$http.get("display_user.php")
                .success(function(data){
	
                    $scope.display_user = data;
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
		
		
		// on click funtions
		
		// add users
        $scope.user_add = function() {
						$http({     
						                method : 'POST' ,
										url: 'add_user.php',
										data: $scope.add_user
										
								}).success(function(data){
						
										$scope.display_user = data;
										//$scope.display_user = data;
										angular.element('#add_user').modal('hide');
							            
						       }).error(function(data, status) {
						                 alert("error");
					   });  
	    };

		//edit specific user
         $scope.user_edit = function(user_id) {
                   
                                 				 
													$http.post("edit_user.php",{user_id : user_id})
														.success(function(data,status,headers,config){
													
														   $scope.edit_user = data;
															
														}).error(function(data, status) {
														   alert("error");
													   });  
      };		

       //update doctor
	   
	   
		$scope.update_user = function() {
		
		              
					  $http({     
						                method : 'POST' ,
										url: 'update_user.php',
										data:$scope.edit_user
										
								}).success(function(data){
									   
										$scope.display_user = data;
										angular.element('#edit_user').modal('hide');
							
						       }).error(function(data, status) {
						                 alert("error");
					   });  
				 
				 
	
        };
		// delete doctor
	      $scope.delete_user = function(user_id) {
							
								$scope.user_id=user_id;
							
                                $http.post("delete_user.php",{user_id : $scope.user_id})
														.success(function(data,status,headers,config){
														      $scope.display_user = data;
														}).error(function(data, status) {
														   alert("error");
													   });  
      };

     
}]);

