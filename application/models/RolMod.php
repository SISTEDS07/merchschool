<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RolMod extends CI_Model{

  public function __construct(){
    parent::__construct();

  }
  public function getListAll($datos=''){
    return $this->GlobalMod->get_list_Where('*','t_rol',$datos);
  }


  public function Insert($datos=''){
    return $this->GlobalMod->proc_insert_id($datos,'_rol');
  }
  public function Update($datosset='',$datawhere){
    return $this->GlobalMod->proc_update($datosset,'_rol',$datawhere);
  }

}
