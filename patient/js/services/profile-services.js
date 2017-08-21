app.service('fileUpload', function($q,$compile,$http) {
     
     this.uploadFileToUrl = function(file, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        
        var promise = $http({method: 'POST', url: uploadUrl, data: fd,transformRequest: angular.identity,
            headers: {'Content-Type': undefined} });

        
       return promise;
    }
});

