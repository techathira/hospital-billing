var app = angular.module('book-appointment', []);

app.controller('profile_controller', ['$scope', '$http','$window','fileUpload', function ($scope, $http,$window,fileUpload) {
        
        $scope.patient_details={};
		$http.get("includes/get-user-profile.php")
						.success(function(user){
							$scope.patient_details = user;
				
							 $.notify({icon: 'ti-check',message: "Logged in as"+' '+$scope.patient_details.personal.patient_name
									},{
                						type: 'success',
                						timer: 400
            				});

						})
						.error(function() {
							$scope.data = "error in fetching data";
		});


//Update Profile information Script
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

//Switch Profiles Script
		$scope.switch_profile=function(account_id){
        
			  $http.post("includes/switch-profile.php",{patient_id : account_id})
					.success(function(data,status,headers,config){
                    
							if(data.status_code == 200){

                                 $window.location.href = data.redirect_to;

							}else{
                       
                                  $.notify({
										                icon: 'ti-close',
                										message: "Could'nt Switch profile !, please try again"
									},{
                										type: 'success',
                										timer: 500
            						});
							}
														   
					}).error(function(data, status) {
						alert("error");
					});  
		};


	$scope.display_save=false;
   
	$scope.uploadfile=function(){
		 angular.element('#upload').trigger('click');
		
	}

	$scope.show_save_btn=function(){

         //console.log($scope.myFile);

	}

	$scope.uploadFile = function(){
        var file = $scope.myFile;
        
        var uploadUrl = "includes/upload-profile-pic.php";
        fileUpload.uploadFileToUrl(file, uploadUrl).then(function(data,status) {
				//if suceess of updating profile pic
				console.log(data);
				if(data.data.status_code == 200){
					console.log("pass");
					 $scope.patient_details.personal.profile_pic=data.data.updated_src;
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
                						type: 'danger',
                						timer: 400
            		});
				}
    });
}
			
     
}]);
