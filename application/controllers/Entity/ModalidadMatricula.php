<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModalidadMatricula extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('ModalidadMatriculaMod'));
  }

  public function index(){
    $this->load->view('ModalidadMatricula');
  }

  public function delete($id=''){
    $datos_set = array('_estado_mod'=>0);
    $datos_con = array('_id_modalidad_matricula' =>$id);
    $this->ModalidadMatriculaMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_modalidad_matricula' =>NULL ,'_nombre_mod'=>$descripcion,'_estado_mod'=>1);
    $datos_set = array('_nombre_mod'=>$descripcion,'_estado_mod'=>1);
    $datos_con = array('_id_modalidad_matricula' =>$ident);
    if($accion=='Editar'){
      $this->ModalidadMatriculaMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->ModalidadMatriculaMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadomodalidadmatr'=>1,'identificadormodalidadmatr'=>$request->id);
    $lista = $this->ModalidadMatriculaMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->nombremodalidadmatr);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadomodalidadmatr'=>1);
    $lista = $this->ModalidadMatriculaMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadormodalidadmatr;
      $data[$pos]['descripcion']=$key->nombremodalidadmatr;
      $pos++;
    }

    echo json_encode($data);
  }

}
