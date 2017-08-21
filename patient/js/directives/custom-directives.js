
app.directive('fileModel', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);


app.directive('datepicker', function() {
  return {
    require: 'ngModel',
    link: function(scope, el, attr, ngModel) {
      $(el).datepicker({
        dateFormat: 'yy-mm-dd' ,
          minDate: '0' ,

        onSelect: function(dateText) {
          scope.$apply(function() {
            ngModel.$setViewValue(dateText);
          });
        }
      });
    }
  };
});


app.directive('oldPassword', function($http) {
  var runing;
  return {
    restrict: 'A',
    require: 'ngModel',
    link: function(scope, elem, attr, ctrl) { 
     
      scope.$watch(attr.ngModel, function(value) {

       
           if(runing) clearTimeout(runing);

     
           runing = setTimeout(function(){
            $http.get('includes/validate.php?oldpassword=' + value).success(function(data) {
                console.log(data);
                ctrl.$setValidity('oldPassword', data.isValid);
            });
        }, 200);
      })
    }
  }
});