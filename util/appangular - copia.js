var base_url="http://127.0.0.1/school/";
angular.module('edsapp',['ui.bootstrap','datatables','ngResource'])
.controller('controllerpagina',function ($scope,$http) {
    $scope.newpag = base_url+'Entity/Dash';
    $scope.contador = 1;
    $scope.controlador = '';
    $scope.datos={};
/*
    $http.get(base_url+'Entity/Pagina/get_listpagina').success(function(data) {
    $scope.paginas = data;
  });*/

    $scope.paginanew = function(param) {
     $http.get(base_url+'Entity/Pagina/getcontroller/'+param).success(function(response){
      $scope.controlador= response.contradorurl;
      $scope.newpag = base_url+'Entity/'+$scope.controlador;

    }
  );
    //$scope.newpag = base_url+'Entity/'+$scope.controlador;
  };




  $scope.get_list_empresa = function(){
      $http.get(base_url+'Entity/Empresa/get_listempresa').success(function(response){
          $scope.list_empresa = response;
    });
  };

})
.controller('DataReloadWithPromiseCtrl', function ($scope,$http,DTOptionsBuilder, DTColumnBuilder, $resource) {
    var vm = this;
    $scope.editarservicio= function(id) {
      alert(id);
    }

    vm.dtOptions = DTOptionsBuilder.fromFnPromise(function() {
        return $resource(base_url+'Entity/Servicio/getListAll').query().$promise;
    }).withPaginationType('full_numbers');
    vm.dtColumns = [
        DTColumnBuilder.newColumn('nrow').withTitle('#'),
        DTColumnBuilder.newColumn('accion').withTitle('Accion'),
        DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')

    ];
    vm.registro = registro;
    vm.newPromise = newPromise;
    vm.reloadData = reloadData;
    vm.dtInstance = {};
    function registro() {
      $http.post(base_url+'Entity/Servicio/Insert',{
        ident:1,
        descripcion:$scope.datos.descripcionservicio
     }).success(function (response) {
       var resetPaging = true;

       if(response.success>0){
         alert('registro exito');
         $scope.datos={};
         reloadData();
       }else {alert('error de registro ');}
      }
      ).error(function (error) {alert('error de registro ');
      });

    }



  function newPromise() {
        return $resource(base_url+'Entity/Servicio/getListAll').query().$promise;
  }

    function reloadData() {
        var resetPaging = true;
        vm.dtInstance.reloadData(callback, resetPaging);
    }

    function callback(json) {
        console.log(json);
    }
});
