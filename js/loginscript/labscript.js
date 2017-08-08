var app = angular.module('login', []);

app.controller('loginCtrl', ['$scope', '$http', function ($scope, $http) {
        // scope variables
       
		
				
				$scope.login = function () {
					
			    $http({     
						                method : 'POST' ,
										url: 'login.php',
										data: $scope.patient_add
										
								}).success(function(data){
										$scope.patient_details=data;
										
										$scope.patient_id=$scope.patient_details.patient_id;
										
										
										angular.element('#add_patient').modal('hide');
							            alert("register successfully");
						       }).error(function(data, status) {
						                 alert("error");
					   });
					
					
					};
					
				
	
     
}]);

