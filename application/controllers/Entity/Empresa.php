<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model(array('EmpresaMod'));
    $this->load->library('upload');

  }

  public function index(){
    $this->load->view('Empresa');
  }

  public function Reporte(){
    echo "string";
  }

  public function get_listempresa(){
    $lista = $this->EmpresaMod->get_listempresa();
    echo json_encode($lista);
  }

  public function insert(){

          $ruta = '';
      		if ( ! empty($_FILES)){
            $config['upload_path'] = "./util/img";
      			$config['allowed_types'] = 'gif|jpg|png|mp4|ogv|zip';

      			$this->load->library('upload');
      			$files           = $_FILES;
      			$number_of_files = count($_FILES['file']['name']);
      			$errors = 0;

      			for ($i = 0; $i < $number_of_files; $i++){
      				$_FILES['file']['name'] = $files['file']['name'][$i];
      				$_FILES['file']['type'] = $files['file']['type'][$i];
      				$_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
      				$_FILES['file']['error'] = $files['file']['error'][$i];
      				$_FILES['file']['size'] = $files['file']['size'][$i];

      				// we have to initialize before upload
      				$this->upload->initialize($config);
      				if (! $this->upload->do_upload("file")) {
      					$errors++;
      				}
      			}

      			if ($errors > 0) {
      				echo $errors . "File(s) cannot be uploaded";
      			}

      		}
      		elseif ($this->input->post('file_to_remove'))
      		{
      			$file_to_remove = $this->input->post('file_to_remove');
      			unlink("./util/img" . $file_to_remove);
      		}
      		else {
      			$ruta=$this->listFiles();
      		}



    	}

    	private function listFiles(){
    		$this->load->helper('file');
    	  return	$files = get_filenames("./util/img");
    		//echo json_encode($files);
    	}


}
