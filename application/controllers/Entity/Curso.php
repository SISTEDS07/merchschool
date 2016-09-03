<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('CursoMod'));
  }

  public function index(){
    $this->load->view('Curso');
  }
  public function delete($id=''){
    $datos_set = array('_estado_curs'=>0);
    $datos_con = array('_id_curso' =>$id);
    $this->CursoMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $descripcion = $request->descripcion;
    $ident = $request->ident;
    $accion = $request->accion;

    $id=0;
    $datos = array('_id_curso' =>NULL ,'_nombre_curs'=>$descripcion,'_estado_curs'=>1);
    $datos_set = array('_nombre_curs'=>$descripcion,'_estado_curs'=>1);
    $datos_con = array('_id_curso' =>$ident);
    if($accion=='Editar'){
      $this->CursoMod->Update($datos_set,$datos_con);
      $id='E';
    }else{
        $id = $this->CursoMod->Insert($datos);
    }

    $data = array('success' => $id);
    echo json_encode($data);
  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadocurso'=>1,'identificadorcurso'=>$request->id);
    $lista = $this->CursoMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->nombrecurso);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadocurso'=>1);
    $lista = $this->CursoMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identificadorcurso;
      $data[$pos]['descripcion']=$key->nombrecurso;
      $pos++;
    }

    echo json_encode($data);
  }

}
