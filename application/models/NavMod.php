<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NavMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
  }

  public function get_view_group_title($having='',$group){
  return $this->GlobalMod->get_list_group('*',$group,1,$having,'v_u_permiso_');
  }

  public function get_element_a($param=''){
    $datos = array('titulopag'=>$param,'estadopag'=>1,'identuser'=>$_SESSION['__sessidu']);
    return $this->GlobalMod->get_list_Where('*','v_u_permiso_',$datos);
  }

}
