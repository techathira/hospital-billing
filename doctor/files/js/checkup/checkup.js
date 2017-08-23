var app = angular.module('checkup', []);

app.controller('checkupCtrl', ['$scope', '$http', function ($scope, $http) {

//docotor information
	$http.get("include/profile_details.php").success(function(data){
		$scope.display_data = data;
	}).error(function() {
		$scope.data = "error in fetching data";
	});
	
	//patient_info	
		$http.get("include/patient_details.php")
		.success(function(data){
			
			$scope.patient_details=data['patient_details'][0];
			$scope.appointment_id=data['appointment_id'][0];
		})
		.error(function() {
			$scope.data = "error in fetching data";
		});
/*
	$scope.check_up = function() {
		console.log(patient_id);
		window.location.href="checkup.php?"+patient_id;
	};*/
	
	
	$scope.histroy = function() {
		window.location.href="histroy.php";
	};
	//add new drug
	$scope.add_drug=function(){
		$http({     
							method : 'POST' ,
							url: 'include/add_drug.php',
							data:{drug_name:$scope.prescription.drug_name}
							
					}).success(function(data){
					if(data[0].message==1) {
							  $.notify({
									message: 'New drug added Successfully',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'info'
							});
							$scope.prescription.drug_name=data[1].drug_name;
							$scope.prescription.drug_id=data[2].drug_id;
						}
					else
						console.log(data);
				   }).error(function(data, status) {
							 alert("error");
		   });  
	};
	$scope.temp=[];
	$scope.add_prescription = function() {
	$scope.prescription_table=true;
	$scope.temp.push($scope.prescription);
	$scope.prescription="";
	console.log($scope.prescription.drug_id);
	if($scope.prescription.drug_id="undefined"){
		 $.notify({
									message: 'Please add the new drug',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'danger'
							});
	}
		console.log($scope.temp);
	};
	$scope.delete_prescription = function(name) {  
		  $scope.temp.splice(name,1);				  
		};
		$scope.editpres_id="";
		//edit prescription
	$scope.edit_prescription= function(name) {  
			$scope.editpres_id=name;
		  $scope.editpres=$scope.temp[name];				  
		};
		
		//change prescription
		$scope.change_prescription= function() {
		var i=$scope.editpres_id;
			$scope.temp.splice(i, 1, $scope.editpres);
			
		};
		
		//submit_prescription
		$scope.submit_prescription= function() {
			$http({     
							method : 'POST' ,
							url: 'include/prescribe.php',
							data:$scope.temp
							
					}).success(function(data){
					console.log(data);
						if(data==1) {
							  $.notify({
									message: 'Prescribed Successfully',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'info'
							});
							$scope.prescription_table=false;
							$scope.temp="";
						}
						window.location.href="index.php";
				   }).error(function(data, status) {
							 alert("error");
		   });
		};
		
		
	//autocomplete
	$(function() {
      $("#drugname" ).autocomplete({
      source: 'drug_details.php',
	  select: function( event, ui ) {
			var result;
			result=ui.item.value.split(":");
            var drug_name = result[0];
			ui.item.value=drug_name;
			$scope.drug_name=drug_name;
			$scope.prescription.drug_id=parseInt(result[1]);

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