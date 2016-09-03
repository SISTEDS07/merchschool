<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-xs-12 col-md-12">
      <h3>Mantenimiento Servicio Educativo</h3>
    </div>
    <div class="col-xs-12 col-md-12">
      <div >
          <p>
              <button ng-click="showCase.reloadData()" type="button" class="btn btn-info">
                  <i class="fa fa-refresh"></i>&nbsp;Refresh Tabla
              </button>
              <a href="#" data-toggle="modal" data-target="#modalservicio" class="btn btn-info ">Nuevo registro</a>
          </p>
           <p class="text-danger"><strong>{{ showCase.message }}</strong></p>
          <div class="table-responsive" >
            <table datatable="" dt-options="showCase.dtOptions" dt-columns="showCase.dtColumns" dt-instance="showCase.dtInstance" class="table table-bordered"></table>

          </div>
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
