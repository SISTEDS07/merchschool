<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaginaMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
  }

  public function get_listpagina(){
    return $this->GlobalMod->get_list_Where('*','v_u_permiso_',array('estadoperm'=>1,'identuser'=>$_SESSION['__sessidu']));
  }
  public function get_listpagina_id($id=''){
    return $this->GlobalMod->get_list_Where('*','v_u_permiso_',array('identificadorpag'=>$id,'estadoperm'=>1,'identuser'=>$_SESSION['__sessidu']));
  }

}
