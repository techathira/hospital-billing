var app = angular.module('login', []);

app.controller('loginCtrl', ['$scope', '$http', function ($scope, $http) {
				$scope.login = function () {
					
			    $http({     
						                method : 'POST' ,
										url: 'login.php',
										data: $scope.user
										
								}).success(function(data){
										$scope.patient_details=data;
						       }).error(function(data, status) {
						                 alert("error");
					   });
					
					
					};
					
				
	
     
}]);

