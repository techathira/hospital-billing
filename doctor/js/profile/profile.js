var app = angular.module('doctor_profile', []);

app.controller('profileCtrl', ['$scope', '$http', function ($scope, $http) {

	$http.get("include/profile_details.php")
                .success(function(data){
                    $scope.display_data = data;
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
	$scope.change_password = function() {
		  $http({     
							method : 'POST' ,
							url: 'include/change_password.php',
							data:$scope.password
							
					}).success(function(data){
					if(data==1) {
						angular.element('#change_password').modal('hide');
							  $.notify({
									message: 'Password Changed Successfully',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'info'
							});
						$scope.password="";
						}
					else
						console.log(data);
				   }).error(function(data, status) {
							 alert("error");
		   });  
    };
	
	 $scope.change_phone = function(doctor_id,phone) {
		$http({     
							method : 'POST' ,
							url: 'include/change_phone.php',
							data: {doctor_id:doctor_id,phone:phone}
							
					}).success(function(data){
						$scope.display_data = data;
						$.notify({
									message: 'Phone number Changed Successfully',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'info'
							});
				   }).error(function(data, status) {
							 alert("error");
		   });  
	 };
     
}]);
