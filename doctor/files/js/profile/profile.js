var app = angular.module('doctor_profile', []);

app.controller('profileCtrl', ['$scope', '$http','fileUpload', function ($scope, $http,fileUpload) {

//docotor information
	$http.get("include/profile_details.php")
	.success(function(data){
		$scope.display_data = data;
		
	})
	.error(function() {
		$scope.data = "error in fetching data";
	});
	

	//Get doctor timing
	$http.get("include/doctor_timing.php")
	.success(function(data){
		$scope.display_timing = data;
		console.log(data.Monday);
	})
	.error(function() {
		$scope.data = "error in fetching data";
	});
				
		//change password		
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
	 
	 
	 	$scope.show_save_btn=false;
  // console.log($scope.show_save_btn);
	$scope.uploadfile=function(){
		angular.element('#upload').trigger('click');
		$scope.show_save_btn=true;
	}

	$scope.show_save_btn=function(){
         
	}
 
	$scope.uploadFile = function(){
	$scope.show_save_btn=false;
        var file = $scope.myFile;
        if(!file){	

        			$.notify({
									message: 'Please Choose the file',	
							},{
								placement: {
									from: "top",
									align: "center"
								},
								type: 'danger',
								timer: 100
							});
        	}else{


        var uploadUrl = "include/upload-profile-pic.php";
        fileUpload.uploadFileToUrl(file, uploadUrl).then(function(data,status) {
				//if suceess of updating profile pic
			
				if(data.data.status_code == 200){
					
					 $scope.display_data.photo=data.data.updated_src;
					  $.notify({icon: 'ti-check',message: "Your Profile Pic Has been updated successfully"
									},{
                						type: 'success',
                						timer: 400
            				});
				}
				//if failed to update profile pic
				if(data.data.status_code == 404){

					
					 $.notify({icon: 'ti-close',message: "failed to update! please check the size and format of image"
									},{
										placement: {
									from: "top",
									align: "center"
								},
                						type: 'danger',
                						timer: 400
            		});
				}
    });


        	}

}
     
}]);
