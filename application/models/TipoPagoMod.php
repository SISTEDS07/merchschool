<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoPagoMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getListAll($datos=''){
    return $this->GlobalMod->get_list_Where('*','t_tipopago',$datos);
  }


  public function Insert($datos=''){
    return $this->GlobalMod->proc_insert_id($datos,'_tipo_pago');
  }
  public function Update($datosset='',$datawhere){
    return $this->GlobalMod->proc_update($datosset,'_tipo_pago',$datawhere);
  }

}
