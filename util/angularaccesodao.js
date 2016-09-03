var base_url="http://127.0.0.1/school/";
angular.module("accesodao",[])
.controller("controldatos",function($scope,$http,$window){

  $scope.param={};
  $scope.mensaje='';

$scope.validaracceso = function () {
  $http.post(base_url+"Login/Acceso",{
    user:$scope.param.user,
    clave:$scope.param.clave
   }).success(function (response) {
      if(response.responsex==1){
        $window.location.href = base_url+'Usr/Home';
      }else{
        $scope.mensaje='Error de Acceso';
      }
  }).error(function (error) {

  });
};



});
