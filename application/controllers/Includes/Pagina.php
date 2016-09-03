<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagina extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

public function header(){
  $this->load->view('Inc/Head');
}

public function aside(){
  $this->load->view('Inc/Aside');
}

public function footer(){
  $this->load->view('Inc/Footer');
}

}
