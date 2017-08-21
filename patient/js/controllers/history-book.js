var app = angular.module('book-appointment', []);

app.controller('bookhistory_controller', ['$scope', '$http','$window', function ($scope, $http,$window) {
        
        $scope.patient_history={};
		$http.get("includes/get-booking-hostory.php")
						.success(function(data){
							$scope.patient_history = data;
							console.log($scope.patient_history)
				
						})
						.error(function() {
							$scope.data = "error in fetching data";
		});


/*Update Profile information Script
		$scope.update_profile_details=function(){
          		
          		
          		$http.post("includes/update-patient-profile.php",{patient_details : $scope.patient_details.personal})
					 .success(function(data,status,headers,config){
							if(status==200){
                         
                                  $scope.patient_details = data;
                                 
                                    $.notify({
										                icon: 'ti-check',
                										message: "Your profile has been updated sucessfully"

									},{
                										type: 'success',
                										timer: 4000
            						});
    
							}
							                            
												   
					}).error(function(data, status) {
							alert("error");
				}); 
                         
		};
		*/
     
}]);
