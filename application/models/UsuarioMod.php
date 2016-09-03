<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_list($array=''){
    return $this->GlobalMod->get_list_Where('*','v_u_acceso_',$array);
  }

}
