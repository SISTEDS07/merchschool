<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GradoInstruccion extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('GradoInstruccionMod'));
  }

  function index(){
    $this->load->view('GradoInstruccion');
  }
  public function delete($id=''){
    $datos_set = array('_estado_gi'=>0);
    $datos_con = array('_id_grado_instruccion' =>$id);
    $this->GradoInstruccionMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_grado_instruccion' =>NULL ,'_nombre_gi'=>$descripcion,'_estado_gi'=>1);
    $datos_set = array('_nombre_gi'=>$descripcion,'_estado_gi'=>1);
    $datos_con = array('_id_grado_instruccion' =>$ident);
    if($accion=='Editar'){
      $this->GradoInstruccionMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->GradoInstruccionMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadogradoinst'=>1,'identificadorgradoinst'=>$request->id);
    $lista = $this->GradoInstruccionMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->nombregradoinst);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadogradoinst'=>1);
    $lista = $this->GradoInstruccionMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadorgradoinst;
      $data[$pos]['descripcion']=$key->nombregradoinst;
      $pos++;
    }

    echo json_encode($data);
  }

}
