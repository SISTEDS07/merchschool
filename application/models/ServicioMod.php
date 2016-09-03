<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioMod extends CI_Model{

  public function __construct(){
    parent::__construct();

  }

  public function getListAll($datos=''){
    return $this->GlobalMod->get_list_Where('*','t_servicio',$datos);
  }


  public function Insert($datos=''){
    return $this->GlobalMod->proc_insert_id($datos,'_servicio_educativo');
  }
  public function Update($datosset='',$datawhere){
    return $this->GlobalMod->proc_update($datosset,'_servicio_educativo',$datawhere);
  }

}
