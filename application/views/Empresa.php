<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <h3>Registro de Empresas Asociadas</h3>
    </div>
    <div class="col-xs-12 col-md-12">
        <a href="#" data-toggle="modal" data-target="#modalempresa" class="btn btn-info ">Nuevo registro</a>
    </div>
    <div class="col-xs-12 col-md-12" >
      <br>
      <input type="text" ng-model="search" class="form-control" placeholder="Buscar..." style="width:30%"/>
      <br>
<!-- table that shows product record list -->
<div class="table-responsive">
  <table class="table table-bordered">
      <thead >
          <tr>
              <th class="success" style="width:30px"></th>
              <th class="success text-align-center">Action</th>
              <th class="success width-30-pct">Razon Social</th>
              <th class="success width-30-pct">Nombre</th>
              <th class="success text-align-center">RUC.</th>
              <th class="success text-align-center">Telf.</th>
              <th class="success text-align-center">Celular.</th>
              <th class="success text-align-center">Direccion.</th>

          </tr>
      </thead>

      <tbody ng-init="get_list_empresa()">
          <tr ng-repeat="d in list_empresa | filter:search">
              <td class="text-align-center"><img class="imgrow"src="<?= base_url()?>util/img/{{ d.logotipoemp }}" alt="" /></td>
              <td>
                  <a ng-click="readOne(d.telef001empr)" class="btn btn-primary btn-xs left">Edit</a>
                  <a ng-click="deleteProduct(d.telef001empr)" class="btn btn-danger btn-xs left">Delete</a>
                  <a ng-click="readOne(d.telef001empr)" class="btn btn-success btn-xs left">View</a>
              </td>
              <td>{{ d.razonscempr }}</td>
              <td>{{ d.nombreempr }}</td>
              <td class="text-align-center">{{ d.rucempr }}</td>
              <td class="text-align-center">{{ d.telef001empr }}</td>
              <td class="text-align-center">{{ d.celularempr }}</td>
              <td class="text-align-center">{{ d.direccempr }}</td>

          </tr>
      </tbody>
  </table>

</div>
</div>
</div>
</div>
<style media="screen">
  .imgrow{
    width: 30px;
    height: 30px;
    border-radius: 10px 10px ;
  }
</style>
<div id="modalempresa"  class="modal fade " tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#42DE8D;color:#FFF">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">Registro de empresa</h4>
      </div>
      <div class="modal-body">
        <form class="" ng-submit="generarregistroempresa()">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="razonscempr">razon social.:</label>
                <input type="text" class="form-control" ng-model="razonscempr" id="razonscempr" placeholder="razon social">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nombreempr">nombre.:</label>
                <input type="text" class="form-control" ng-model="nombreempr" id="nombreempr" placeholder="nombre">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rucempr">ruc.:</label>
                <input type="text" class="form-control" ng-model="rucempr" id="rucempr" placeholder="ruc">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="razonsocial">razon social.:</label>
                <input type="text" class="form-control" ng-model="razonsocial" id="razonsocial">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="logotipoemp">LogoTipo.:</label>
                <input type="file" class="form-control" file-model="logotipoemp" id="logotipoemp">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telef001empr">Telefono 01.:</label>
                <input type="text" class="form-control" ng-model="telef001empr" id="telef001empr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="telef002empr">Telefono 02.:</label>
                <input type="text" class="form-control" ng-model="telef002empr" id="telef002empr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="celularempr">Celular.:</label>
                <input type="text" class="form-control" ng-model="celularempr" id="celularempr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="idservempr">Servicio.:</label>
                <select class="form-control" name="idservempr" ng-model="idservempr" id="idservempr">
                  <option>seleccione</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="sitiowebempr">Sitio web.:</label>
                <input type="text" class="form-control" ng-model="sitiowebempr" id="sitiowebempr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="codigopostempr">Codigo Postal.:</label>
                <input type="text" class="form-control" ng-model="codigopostempr" id="codigopostempr">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="localizacionemp">Mapa Localizacion.:</label>
                <input type="text" class="form-control" ng-model="localizacionemp" id="localizacionemp">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="direccempr">Direccion.:</label>
                <input type="text" class="form-control" ng-model="direccempr" id="direccempr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="dvempr">DV.:</label>
                <input type="text" name="dvempr" value="" ng-model="dvempr" id="dvempr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="cantidadsedeempr">Sedes.:</label>
                <input type="text" class="form-control" ng-model="cantidadsedeempr" id="cantidadsedeempr">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="cedempr">Ced.:</label>
                <input type="text" class="form-control" ng-model="cedempr" id="cedempr">
              </div>
            </div>
          </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
