var app = angular.module('view_appointment', []);

app.controller('appointmentCtrl', ['$scope', '$http', function ($scope, $http) {

	$scope.check_up = function() {
		window.location.href="checkup.php";
	};
	$scope.histroy = function() {
		window.location.href="histroy.php";
	};
	
	$scope.add_drug=function(){
		  $http({     
							method : 'POST' ,
							url: 'include/add_drug.php',
							data:{drug_name:$scope.drug_name}
							
					}).success(function(data){
					if(data==1) {
							  $.notify({
									message: 'New drug added Successfully',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'info'
							});
						}
					else
						console.log(data);
				   }).error(function(data, status) {
							 alert("error");
		   });  
	};
	
	$(function() {
      $("#drugname" ).autocomplete({
      source: 'drug_details.php',
	  select: function( event, ui ) {
	    
            var drug_name = ui.item.value;
			$scope.drug_name=drug_name;
			//$scope.display_patient_details();
		 }	 
	  
    });
  });

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