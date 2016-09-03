<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('ServicioMod'));
  }

  public function index(){
    $this->load->view('Servicio');
  }
  public function delete($id=''){
    $datos_set = array('_estado_se'=>0);
    $datos_con = array('_id_servicio_educativo' =>$id);
    $this->ServicioMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_servicio_educativo' =>NULL ,'_nombre_se'=>$descripcion,'_estado_se'=>1);
    $datos_set = array('_nombre_se'=>$descripcion,'_estado_se'=>1);
    $datos_con = array('_id_servicio_educativo' =>$ident);
    if($accion=='Editar'){
      $this->ServicioMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->ServicioMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadoservicio'=>1,'identificadorservicio'=>$request->id);
    $lista = $this->ServicioMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombreservicio' =>$key->nombreservicio);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadoservicio'=>1);
    $lista = $this->ServicioMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadorservicio;
      $data[$pos]['descripcion']=$key->nombreservicio;
      $pos++;
    }

    echo json_encode($data);
    //echo '['.$data.']';
  }

}
