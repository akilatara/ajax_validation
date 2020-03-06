<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Register extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('RegisterModel');
         $this->load->library('form_validation','session');
         $this->load->helper('url');
         $this->id = $this->session->userdata('id');
        }
     
   
       

    public function post_register()
    {
 
        $this->form_validation->set_rules('fname', 'FName', 'required');
        $this->form_validation->set_rules('lname', 'LName', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('register');
        }
        else
        {   
            $data = array(
               'fname' => $this->input->post('fname'),
               'lname' => $this->input->post('lname'),
               'mobile' => $this->input->post('mobile'),
               'email' => $this->input->post('email'),
               'password' => md5($this->input->post('password')),
 
             );
   
            $check = $this->RegisterModel->insert_user($data);
 
            if($check != false){
 
                $user = array(
                 'user_id' => $check,
                 'email' => $this->input->post('email'),
                 'fname' => $this->input->post('fname'),
                 'lname' => $this->input->post('lname'),
                );
             }
  
             $this->session->set_userdata($user);
             redirect(base_url('Login/logon'));
            }
     }  

     function register_availability()
     {
        $this->load->view("register",$data);
     }


    function check_email_availability()
    {
        if(!filter_val($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            echo '<label  class="text-danger"><span class="glyphicon glyphicon-remove"</span>Invalid Email </label>'; 
        }
        else
        {
            $this->load->model('RegisterModel');
            if($this->RegisterModel->is_email_available($_POST["email"]))
            {
               echo '<label  class="text-danger"><span class="glyphicon glyphicon-remove"</span>Email already register</label>';  
            }
            else
            {
                
                  echo '<label  class="text-success"><span class="glyphicon glyphicon-ok"</span>Email available</label>';  
            }
        }
    }     
  
}
?>