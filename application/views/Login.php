<!DOCTYPE html>
<html ng-app="accesodao" >
  <head>
    <meta charset="utf-8">
    <title>MERCSCHOOL</title>
    <link rel="stylesheet" href="<?= base_url()?>util/bootstrap.css" type="text/css" charset="utf-8">
    <script src="<?= base_url()?>util/angular.min.js" charset="utf-8"></script>
    <script src="<?= base_url()?>util/angularaccesodao.js" charset="utf-8"></script>
    <style media="screen">
      body{
        -webkit-box-shadow: inset -4px -2px 76px 44px rgba(0,0,0,0.45);
        -moz-box-shadow: inset -4px -2px 76px 44px rgba(0,0,0,0.45);
        box-shadow: inset -4px -2px 76px 44px rgba(0,0,0,0.45);
        background-size: 100%;
        background-image: url("https://i.ytimg.com/vi/M6ohuHoocqs/maxresdefault.jpg");
        background-repeat: repeat-x;
      }
    </style>
  </head>
    <div class="row" style="width:100%;padding:2%">
      <div class="col-md-9">

      </div>
      <div class="col-xs-12 col-md-3" style="padding:2%;background-color:#E5EBE7">
        <div class="col-xs-3 col-md-4">
        </div>
        <div class="col-xs-6 col-md-4">
            <img style="width:100%" src="https://scontent-mia1-1.xx.fbcdn.net/v/t1.0-9/13934892_1219872774731708_7602086582355084669_n.jpg?oh=e9563504c9c477c885dc2950d335665d&oe=584C5BCB" class="img-responsive img-circle" alt="Responsive image">
        </div>
        <div class="col-xs-3 col-md-4">
        </div>
        <div class="col-md-12">
          <div class="text-center">
            <h4>Welcome a <strong>MERCSCHOOL</strong></h4>
            <hr>
            <p>
              descripcion del sistema y/o slogan
            </p>
          </div>
        </div>
        <div class="col-md-12" ng-controller="controldatos"><br><br>
          <form ng-submit="validaracceso()">
            <div class="form-group">
              <label for="txtuser" style="color:#000">Usuario.:</label>
              <input type="text" class="form-control" id="txtuser" ng-model="param.user" placeholder="usuario">

            </div>
            <div class="form-group">
              <label for="txtpass">Clave.:</label>
              <input type="password" class="form-control" id="txtpass" ng-model="param.clave" placeholder="Password">
            </div>

                  <input type="submit" name="name" value="Entrar" class="btn btn-primary">
                  <a href="#" class="btn btn-danger">Registrarme</a>
                  <a href="#" >Lo Olvide!</a>
            </form>
            <div class="text-center">
                {{mensaje}}
            </div>
        </div>

      </div>
    </div>
<br><br><br><br><br>
  <div style="opacity:0.7;background-color:#000;color:#FFF;width:100%;padding:1%" class="text-center">
    Todos los derechos reservados a (C) #MERCSCHOOL - Panama
  </div>
</html>
