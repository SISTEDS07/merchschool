<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpresaMod extends CI_Model{

  public function __construct(){
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_listempresa(){
    return $this->GlobalMod->get_list_Where('*','t_empresa',array('estadoempr'=>1));
  }

}
