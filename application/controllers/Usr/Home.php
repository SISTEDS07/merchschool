<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');

    if(isset($_SESSION['__sessidp'])&& isset($_SESSION['__sessidu'])&& isset($_SESSION['__sessidr'])&& isset($_SESSION['__sessids'])){
      $having = array('identuser' =>$_SESSION['__sessidu'] ,'estadopag'=>1 );
      $group = array('titulopag','identuser');
      $data['_listgroupNAVTitle'] = $this->NavMod->get_view_group_title($having,$group);
      $this->load->view('Home',$data);

    }else{
      header('Location:'.base_url());
    }
  }

  function index(){

  }

}
