var app = angular.module('view_appointment', []);

app.controller('appointmentCtrl', ['$scope', '$http', function ($scope, $http) {

	//appointment	list
	$http.get("include/appointment.php")
                .success(function(data){
                    $scope.appointment = data;
				 //console.log($scope.appointment);
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				

	
	$scope.check_up=function(patient_id,appointment_id){
		  $http({     
							method : 'POST' ,
							url: 'include/patient_details.php',
							data:{patient_id:patient_id,appointment_id:appointment_id}
							
					}).success(function(data){
						//console.log(data);
						window.location.href="checkup.php";
				   }).error(function(data, status) {
							 alert("error");
		   });  
	};
	
	//Histroy
	$scope.histroy = function(patient_id,appointment_id) {
		//window.location.href="histroy.php";
		$http({     
					method : 'POST' ,
					url: 'include/check_history.php',
					data:{patient_id:patient_id,appointment_id:appointment_id}
							
					}).success(function(data){
						//console.log(data);
						if(data=="0") {
							  $.notify({
									message: 'There is no record for the Perticular patient',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'danger'
							});
							
						}
					else
						window.location.href="histroy.php";
						
				   }).error(function(data, status) {
							 alert("error");
		   });
	};

}]);

app.directive('datepicker', function() {
  return {
    require: 'ngModel',
    link: function(scope, el, attr, ngModel) {
      $(el).datepicker({
		dateFormat: 'dd-mm-yy' ,
        onSelect: function(dateText) {
          scope.$apply(function() {
            ngModel.$setViewValue(dateText);
          });
        }
      });
    }
  };
});