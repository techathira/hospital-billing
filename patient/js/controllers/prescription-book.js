var app = angular.module('book-appointment', []);

app.controller('prescrbook_controller', ['$scope', '$http','$window', function ($scope, $http,$window) {
        
        $scope.prescription_history={};
		$http.get("includes/get-prescription-book.php")
						.success(function(data){
						
							 
							if(data.status_code==200){

							   $scope.prescription_history = data.history;
					
							}else{

								window.location="../login/login.php";
							}
							
						})
						.error(function(){
							$scope.data = "error in fetching data";
		});



  $scope.check_prescription=function(){

      	

  }

  //Show drug prescription on modal
	$scope.check_prescription=function(appointment_id){
	  $http({     
					method : 'POST' ,
					url: 'includes/show_drug_description.php',
					data:{appointment_id:appointment_id}
					
			}).success(function(data){
  				 console.log(data);
				
				angular.element('#prescription-modal').modal('show');
				$scope.drugs=data;
			
		   }).error(function(data, status) {
					 alert("Error !");
		});
	};

     
}]);
