var app = angular.module('view_histroy', []);

app.controller('histroyCtrl', ['$scope', '$http', function ($scope, $http) {

	//appointment	list
	$http.get("include/patient_info.php")
                .success(function(data){
                   $scope.patient_name = data.name[0];	
                   $scope.patient_info = data.history;	
					if(data.length <= 0)
						{
						    $scope.show_no_data=true;
							$scope.show_data_div=false;
						}
						else
						{ 
						  $scope.show_data_div=true;
						  $scope.show_no_data=false;
						}
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
	$scope.filter_history = function() {
	
		$http({     
					method : 'POST' ,
					url: 'include/filter_history.php',
					data:{from_date:$scope.from_date,to_date:$scope.to_date}
							
					}).success(function(data){
					
						if(data.length <= 0)
						{
						    $scope.show_no_data=true;
							$scope.show_data_div=false;
						}
						else
						{ 
						  	$scope.patient_info = data;
						  $scope.show_data_div=true;
						  $scope.show_no_data=false;
						}
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
		dateFormat: 'yy-mm-dd' ,
        onSelect: function(dateText) {
          scope.$apply(function() {
            ngModel.$setViewValue(dateText);
          });
        }
      });
    }
  };
});