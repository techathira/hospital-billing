var app = angular.module('view_histroy', []);

app.controller('histroyCtrl', ['$scope', '$http', function ($scope, $http) {

	//appointment	list
	$http.get("include/patient_info.php")
                .success(function(data){
                   $scope.patient_name = data.name[0];	
                   $scope.patient_info = data.history;	
					//console.log(data.history);
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				

	
	$scope.check_up=function(){
		window.location.href="checkup.php";
	};
	
	//prescription
	$scope.prescription=function(appointment_id,date){
	  $http({     
					method : 'POST' ,
					url: 'include/patient_prescription.php',
					data:{appointment_id:appointment_id}
					
			}).success(function(data){
				$scope.drugs=data;
				$scope.fordate=date;
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