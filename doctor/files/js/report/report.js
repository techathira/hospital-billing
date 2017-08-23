var app = angular.module('report', []);

app.controller('reportCtrl', ['$scope', '$http', function ($scope, $http) {

//Doctor profile
	$http.get("include/profile_details.php")
	.success(function(data){
		$scope.display_data = data;
		
	})
	.error(function() {
		$scope.data = "error in fetching data";
	});


	//appointment	list
	$scope.appointment = [];
	$http.get("include/report.php")
                .success(function(data){
				//console.log(data);
				 if(data.length <= 0)
						{
						    $scope.show_no_data=true;
							$scope.show_data_div=false;
						}
						else
						{ 
						  $scope.report_details = data;
						  $scope.show_data_div=true;
						  $scope.show_no_data=false;
						}
					
                })
                .error(function() {
                    $scope.data = "error in fetching data";
                });
				
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
	
	
	 //filter_report by date
	$scope.filter_report = function() {
	
		$http({     
					method : 'POST' ,
					url: 'include/filter_report.php',
					data:{from_date:$scope.from_date,to_date:$scope.to_date}
							
					}).success(function(data){
						if(data.length <= 0)
						{
						    $scope.show_no_data=true;
							$scope.show_data_div=false;
						}
						else
						{ 
						   $scope.report_details = data;
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