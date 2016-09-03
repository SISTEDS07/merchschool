<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPago extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('TipoPagoMod'));
  }

  function index(){
    $this->load->view('TipoPago');
  }

  public function delete($id=''){
    $datos_set = array('_estado_tp'=>0);
    $datos_con = array('_id_tipo_pago' =>$id);
    $this->TipoPagoMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_tipo_pago' =>NULL ,'_nombre_tp'=>$descripcion,'_estado_tp'=>1);
    $datos_set = array('_nombre_tp'=>$descripcion,'_estado_tp'=>1);
    $datos_con = array('_id_tipo_pago' =>$ident);
    if($accion=='Editar'){
      $this->TipoPagoMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->TipoPagoMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadotipopago'=>1,'identificadortipopago'=>$request->id);
    $lista = $this->TipoPagoMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->nombretipopago);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadotipopago'=>1);
    $lista = $this->TipoPagoMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadortipopago;
      $data[$pos]['descripcion']=$key->nombretipopago;
      $pos++;
    }

    echo json_encode($data);
  }

}
