<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  class Main extends CI_Controller{

  	function __construct(){
  		parent:: __construct();
  		$this->load->model('crudmodel','m');
  	}
  	function index(){
  		
  		$this->load->view('layout/header');
        $this->load->view('employee/index');
        $this->load->view('layout/footer');
  
  	}
  	   public function showAllMain(){
  	   	$result=$this->m->showAllMain();
  	   	echo json_encode($result);
  	   }


  	   public function addMain(){
  	   	$result = $this->m->addMain();
  	   	$msg['success']=false;
        $msg['type']='add';
  	   	if($result){
  	   		$msg['success'] =true;
  	   	}
  	   	echo json_encode($msg);
  	   }

       public function editMain(){
        $result =$this->m->editMain();
        echo json_encode($result);
        }

        public function updateMain(){
          $result = $this->m->updateMain();
          $msg['success'] = false;
          $msg['type'] = 'update';
          if($result){
            $msg['success'] = true;
          }
            echo json_encode($msg);
        }

           public function deleteMain(){
            $result =$this->m->deleteMain();
            $msg['success']=false;
            if($result){
              $msg['success']=true;
            }
            echo json_encode($msg);
           }

  	  }
  	  ?>