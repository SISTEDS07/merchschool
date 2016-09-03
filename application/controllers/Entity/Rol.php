<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('RolMod'));
  }

  public function index(){
    $this->load->view('Rol');
  }
  public function delete($id=''){
    $datos_set = array('_estado_rol'=>0);
    $datos_con = array('_id_rol' =>$id);
    $this->RolMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_rol' =>NULL ,'_descripcion_rol'=>$descripcion,'_estado_rol'=>1);
    $datos_set = array('_descripcion_rol'=>$descripcion,'_estado_rol'=>1);
    $datos_con = array('_id_rol' =>$ident);
    if($accion=='Editar'){
      $this->RolMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->RolMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadorol'=>1,'identificadorrol'=>$request->id);
    $lista = $this->RolMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->descripcionrol);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadorol'=>1);
    $lista = $this->RolMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadorrol;
      $data[$pos]['descripcion']=$key->descripcionrol;
      $pos++;
    }

    echo json_encode($data);
  }

}
