<?php

#Desarrollado por : Edson Suarez
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model(array('UsuarioMod'));

  }

  public function index(){
    $data['xd']='';
    $this->load->view('Login', $data);
  }

  public function Acceso(){
      $datadecode = file_get_contents("php://input");
      $request = json_decode($datadecode);

      $user = $request->user;
      $clave = sha1(sha1(md5($request->clave)));

      $datos = array('nameuser' => $user,'claveuser'=>$clave,'estadouser'=>1);
      $datarest = 0;
      $lista = $this->UsuarioMod->get_list($datos);
      foreach ($lista as $key ) {
          $datarest = $key->estadouser;
          $this->session->set_userdata('__sessidp',$key->identificadorsujeto);
          $this->session->set_userdata('__sessidr',$key->roluser);
          $this->session->set_userdata('__sessidu',$key->sident);
          $this->session->set_userdata('__sessids',$key->idtempresa);
          break;
      }
      $data = array('responsex'=>$datarest);
      echo json_encode($data);

  }

}
