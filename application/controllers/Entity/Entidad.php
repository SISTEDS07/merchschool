<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entidad extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('EntidadMod'));
  }

  function index(){
    $this->load->view('Entidad');
  }

  public function delete($id=''){
    $datos_set = array('_estado'=>0);
    $datos_con = array('_id_entidad' =>$id);
    $this->EntidadMod->Update($datos_set,$datos_con);
  }
  public function grabardatos(){
    $file = $_FILES["file"]["name"];
    $descripcion = $this->input->post('name');
    $razonsocial= $this->input->post('razonsocial');
    $rucentidad = $this->input->post('rucentidad');
    if(!is_dir("files/"))
    	mkdir("files/", 0777);
    if($file && move_uploaded_file($_FILES["file"]["tmp_name"], "files/".$file)){
    	 $file;
    }
    $datos = array('_id_entidad' =>NULL ,'_nombre'=>$descripcion,'_razon_social'=>$razonsocial,'_ruc'=>$rucentidad,'_logotipo_'=>$file,'_estado'=>1);
    $id = $this->EntidadMod->Insert($datos);
    $data = array('success' => $id);
    echo json_encode($data);

  }

  public function getListID($id=''){
    $datadecode = file_get_contents("php://input");
    $request = json_decode($datadecode);
    $datos = array('estadoentidad'=>1,'identifadorentidad'=>$request->id);
    $lista = $this->EntidadMod->getListAll($datos);
    $data='';
    foreach ($lista as $key ) {
      $data = array('nombre' =>$key->nombreentidad);
    }
    echo json_encode($data);
  }

  public function getListAll(){
    $datos = array('estadoentidad'=>1);
    $lista = $this->EntidadMod->getListAll($datos);
    $pos = 0;
    $data='';
    foreach ($lista as $key ) {
      $data[$pos]['nrow']=$pos+1;
      $data[$pos]['accion']=$key->identifadorentidad;
      $data[$pos]['descripcion']=$key->nombreentidad;
      $data[$pos]['razonsocial']=$key->razonsocialentidad;
      $data[$pos]['ruc']=$key->razonsocialentidad;
      $data[$pos]['logo']='<img class="imgrow" style="width:50px"src="'.base_url().'files/'.$key->lgoentidad.'">';
      $pos++;
    }

    echo json_encode($data);
  }

}
