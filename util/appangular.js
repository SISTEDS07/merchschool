var base_url="http://127.0.0.1/school/";
(function () {
  'use strict'
  function Hola() {
    var vm = this;
    vm.msg="hehheheh";
  }
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
  };

    $scope.get_list_empresa = function(){
        $http.get(base_url+'Entity/Empresa/get_listempresa').success(function(response){
            $scope.list_empresa = response;
      });
    };

  })
  .controller('BindAngularDirectiveCtrl', function ($scope,$http, $compile, DTOptionsBuilder, DTColumnBuilder) {
      var vm = this;
      vm.message = '';

      vm.registro = registro;
      vm.edit = edit;
      vm.delete = deleteRow;
      vm.reloadData = reloadData;
      vm.dtInstance = {};

      vm.registroROL = registroROL;
      vm.editROL = editROL;
      vm.deleteROL = deleteROL;
      vm.reloadDataROL = reloadDataROL;
      vm.dtInstanceROL = {};

      vm.registromodalidadmatricula = registromodalidadmatricula;
      vm.editmodalidadmatricula = editmodalidadmatricula;
      vm.deletemodalidadmatricula = deletemodalidadmatricula;
      vm.redloadDataModMat = redloadDataModMat;
      vm.dtInstanceModMat = {};

      vm.registroCurso = registroCurso;
      vm.editCurso = editCurso;
      vm.deleteCurso = deleteCurso;
      vm.redloadDataCurso = redloadDataCurso;
      vm.dtInstanceCurso = {};

      vm.registroGradoInstruccion = registroGradoInstruccion;
      vm.editGradoInstruccion = editGradoInstruccion;
      vm.deleteGradoInstruccion = deleteGradoInstruccion;
      vm.redloadDataGradoInstruccion = redloadDataGradoInstruccion;
      vm.dtInstanceGradoInstruccion = {};

      vm.registroTipoPago = registroTipoPago;
      vm.editTipoPago = editTipoPago;
      vm.deleteTipoPago = deleteTipoPago;
      vm.redloadDataTipoPago = redloadDataTipoPago;
      vm.dtInstanceTipoPago = {};

      vm.registroEntidad = registroEntidad;
      vm.editEntidad = editEntidad;
      vm.deleteEntidad = deleteEntidad;
      vm.redloadDataEntidad = redloadDataEntidad;
      vm.dtInstanceEntidad = {};



      vm.dtOptions = DTOptionsBuilder.fromSource(base_url+'Entity/Servicio/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumns = [
        DTColumnBuilder.newColumn('nrow').withTitle('#'),
        DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
              .renderWith(actionsHtml),
        DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];

      vm.dtOptionsROL = DTOptionsBuilder.fromSource(base_url+'Entity/Rol/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsROL = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
                  .renderWith(actionsHtmlROL),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];
      vm.dtOptionsMODALIDADMATRICULA = DTOptionsBuilder.fromSource(base_url+'Entity/ModalidadMatricula/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsMODALIDADMATRICULA = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
                  .renderWith(actionsHtmlModalidadMatricula),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];
      vm.dtOptionsCurso = DTOptionsBuilder.fromSource(base_url+'Entity/Curso/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsCurso = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
                  .renderWith(actionsHtmlCurso),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];
      vm.dtOptionsGradoInstruccion = DTOptionsBuilder.fromSource(base_url+'Entity/GradoInstruccion/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsGradoInstruccion = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
                  .renderWith(actionsHtmlGradoInstruccion),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];
      vm.dtOptionsTipoPago = DTOptionsBuilder.fromSource(base_url+'Entity/TipoPago/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsTipoPago = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable()
                  .renderWith(actionsHtmlTipoPago),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion')
      ];
      vm.dtOptionsEntidad = DTOptionsBuilder.fromSource(base_url+'Entity/Entidad/getListAll')
          .withPaginationType('full_numbers')
          .withOption('createdRow', createdRow);
      vm.dtColumnsEntidad = [
            DTColumnBuilder.newColumn('nrow').withTitle('#'),
            DTColumnBuilder.newColumn('accion').withTitle('Acciones').notSortable().renderWith(actionsHtmlEntidad),
            DTColumnBuilder.newColumn('logo').withTitle('Logo'),
            DTColumnBuilder.newColumn('descripcion').withTitle('Descripcion'),
            DTColumnBuilder.newColumn('ruc').withTitle('Ruc'),
            DTColumnBuilder.newColumn('razonsocial').withTitle('Razon Social')
      ];



      function registromodalidadmatricula(){
       $http.post(base_url+'Entity/ModalidadMatricula/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          redloadDataModMat();
        }
        ).error(function (error) {alert('error de registro ');
        });
      }
      function registroEntidad(){
       $http.post(base_url+'Entity/Entidad/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
        //Entidad();
        }
        ).error(function (error) {alert('error de registro ');
        });
      }
      function registroTipoPago(){
       $http.post(base_url+'Entity/TipoPago/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          redloadDataTipoPago();
        }
        ).error(function (error) {alert('error de registro ');
        });
      }

      function registroGradoInstruccion(){
       $http.post(base_url+'Entity/GradoInstruccion/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          redloadDataGradoInstruccion();
        }
        ).error(function (error) {alert('error de registro ');
        });
      }
      function registroCurso() {
       $http.post(base_url+'Entity/Curso/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          redloadDataCurso();
        }
        ).error(function (error) {alert('error de registro ');
        });

      }
     function editmodalidadmatricula(id) {
          $scope.datos.accion='Editar';
          $scope.datos.identificador=id;
          $scope.datos.descripcion='';
          $http.post(base_url+'Entity/ModalidadMatricula/getListID/',{
            id:id
          }).success(function (response) {
              $scope.datos.descripcion = response.nombre;
          });

      }
      function editEntidad(id) {
           $scope.datos.accion='Editar';
           $scope.datos.identificador=id;
           $scope.datos.descripcion='';
           $http.post(base_url+'Entity/Entidad/getListID/',{
             id:id
           }).success(function (response) {
               $scope.datos.descripcion = response.nombre;
           });

       }
      function editTipoPago(id) {
           $scope.datos.accion='Editar';
           $scope.datos.identificador=id;
           $scope.datos.descripcion='';
           $http.post(base_url+'Entity/TipoPago/getListID/',{
             id:id
           }).success(function (response) {
               $scope.datos.descripcion = response.nombre;
           });

       }
      function editGradoInstruccion(id) {
           $scope.datos.accion='Editar';
           $scope.datos.identificador=id;
           $scope.datos.descripcion='';
           $http.post(base_url+'Entity/GradoInstruccion/getListID/',{
             id:id
           }).success(function (response) {
               $scope.datos.descripcion = response.nombre;
           });

       }
      function editCurso(id) {
           $scope.datos.accion='Editar';
           $scope.datos.identificador=id;
           $scope.datos.descripcion='';
           $http.post(base_url+'Entity/Curso/getListID/',{
             id:id
           }).success(function (response) {
               $scope.datos.descripcion = response.nombre;
           });

       }
      function deletemodalidadmatricula(id) {
         $http.get(base_url+'Entity/ModalidadMatricula/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             redloadDataModMat();
         });
      }
      function deleteCurso(id) {
         $http.get(base_url+'Entity/Curso/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             redloadDataCurso();
         });
      }
      function deleteGradoInstruccion(id) {
         $http.get(base_url+'Entity/GradoInstruccion/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             redloadDataGradoInstruccion();
         });
      }
      function deleteTipoPago(id) {
         $http.get(base_url+'Entity/TipoPago/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             redloadDataTipoPago();
         });
      }
      function deleteEntidad(id) {
         $http.get(base_url+'Entity/Entidad/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             redloadDataTipoPago();
         });
      }

      function registroROL() {
       $http.post(base_url+'Entity/Rol/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcion
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          reloadDataROL();
        }
        ).error(function (error) {alert('error de registro ');
        });

      }
     function editROL(id) {
          $scope.datos.accion='Editar';
          $scope.datos.identificador=id;
          $scope.datos.descripcion='';
          $http.post(base_url+'Entity/Rol/getListID/',{
            id:id
          }).success(function (response) {
              $scope.datos.descripcion = response.nombre;
          });

      }
      function deleteROL(id) {
         $http.get(base_url+'Entity/Rol/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             reloadDataROL();
         });

      }

      function registro() {
        $http.post(base_url+'Entity/Servicio/grabardatos',{
          ident:$scope.datos.identificador,
          accion:$scope.datos.accion,
          descripcion:$scope.datos.descripcionservicio
       }).success(function (response) {
         var msg = 'registro exito'
        if(response.success=='E'){
          msg = 'registro Modificado';
        }
          alert(msg);
          $scope.datos={};
          reloadData();
        }
        ).error(function (error) {alert('error de registro ');
        });
      }
      function edit(id) {
          $scope.datos.accion='Editar';
          $scope.datos.identificador=id;
          $scope.datos.descripcionservicio='';
          $http.post(base_url+'Entity/Servicio/getListID/',{
            id:id
          }).success(function (response) {
              $scope.datos.descripcionservicio = response.nombreservicio;
          });

      }
      function deleteRow(id) {
         $http.get(base_url+'Entity/Servicio/delete/'+id).success(function (data) {
           alert('Registro Eliminado');
             reloadData();
         });

      }



      function createdRow(row, data, dataIndex) {
          $compile(angular.element(row).contents())($scope);
      }
      function actionsHtml(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalservicio" class="btn btn-info btn-xs" ng-click="showCase.edit(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.delete(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlROL(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalrol" class="btn btn-info btn-xs" ng-click="showCase.editROL(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deleteROL(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlModalidadMatricula(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalmodalidadmatricula" class="btn btn-info btn-xs" ng-click="showCase.editmodalidadmatricula(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deletemodalidadmatricula(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlCurso(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalcurso" class="btn btn-info btn-xs" ng-click="showCase.editCurso(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deleteCurso(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlGradoInstruccion(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalgradoinstruccion" class="btn btn-info btn-xs" ng-click="showCase.editGradoInstruccion(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deleteGradoInstruccion(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlTipoPago(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalTipoPago" class="btn btn-info btn-xs" ng-click="showCase.editTipoPago(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deleteTipoPago(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }
      function actionsHtmlEntidad(data, type, full, meta) {
          return '<a data-toggle="modal" data-target="#modalEntidad" class="btn btn-info btn-xs" ng-click="showCase.editEntidad(' + data + ')">' +
              '   <i class="fa fa-edit"></i>' +
              'Editar</a>&nbsp;' +
              '<a class="btn btn-danger btn-xs" ng-click="showCase.deleteEntidad(' + data + ')" )"="">' +
              '   <i class="fa fa-trash-o"></i>' +
              'Elimnar</a>';
      }

        function reloadData() {
              var resetPaging = true;
              vm.dtInstance.reloadData(callback, resetPaging);

        }
        function reloadDataROL() {
              var resetPaging = true;
              vm.dtInstanceROL.reloadData(callback, resetPaging);
        }
        function redloadDataModMat() {
              var resetPaging = true;
              vm.dtInstanceModMat.reloadData(callback, resetPaging);
        }
        function redloadDataCurso() {
              var resetPaging = true;
              vm.dtInstanceCurso.reloadData(callback, resetPaging);
        }
        function redloadDataGradoInstruccion() {
              var resetPaging = true;
              vm.dtInstanceGradoInstruccion.reloadData(callback, resetPaging);
        }
        function redloadDataTipoPago() {
              var resetPaging = true;
              vm.dtInstanceTipoPago.reloadData(callback, resetPaging);
        }
        function redloadDataEntidad() {
              var resetPaging = true;
              vm.dtInstanceEntidad.reloadData(callback, resetPaging);
        }

        function callback(json) {
              console.log(json);
        }
  })

  .controller('HomeCtrl', ['$scope', 'upload', function ($scope, upload,saludador,Hola){
    $scope.datos  = {};
  	$scope.uploadFile = function(){
      var name = $scope.datos.descripcion;
  		var file = $scope.datos.file;
      var razonsocial = $scope.datos.razonsocialentidad;
      var rucentidad = $scope.datos.rucentidad;
  		upload.uploadFile(file, name,razonsocial,rucentidad).then(function(res){
  			console.log(res);
        $scope.datos={};

  		})
  	}

    
  }])
  .directive('uploaderModel', ["$parse", function ($parse) {
  	return {
  		restrict: 'A',
  		link: function (scope, iElement, iAttrs)
  		{
  			iElement.on("change", function(e)
  			{
  				$parse(iAttrs.uploaderModel).assign(scope, iElement[0].files[0]);
  			});
  		}
  	};
  }])
  .service('upload', ["$http", "$q", function ($http, $q){
  	this.uploadFile = function(file, name,razonsocial,rucentidad){
  		var deferred = $q.defer();
  		var formData = new FormData();
  		formData.append("name", name);
  		formData.append("file", file);
      formData.append("razonsocial", razonsocial);
      formData.append("rucentidad", rucentidad);
  		return $http.post(base_url+'Entity/Entidad/grabardatos', formData, {
  			headers: {
  				"Content-type": undefined
  			},
  			transformRequest: angular.identity
  		})
  		.success(function(res){
        alert('registro Exitoso');

  			//deferred.resolve(res);
  		})
  		.error(function(msg, code){
  			//deferred.reject(msg);
  		})
  		return deferred.promise;
  	}
  }])
})();
