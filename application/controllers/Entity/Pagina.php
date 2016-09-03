<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('PaginaMod'));
  }

  function index(){

  }

  public function get_listpagina($param=''){
   $lista = $this->PaginaMod->get_listpagina();
   echo json_encode($lista);
  }
  public function getcontroller($id=''){
    $lista = $this->PaginaMod->get_listpagina_id($id);
    foreach ($lista as $key) {
      $data = array('contradorurl' => $key->controladorpag );
    }
    echo json_encode($data);
  }

}
