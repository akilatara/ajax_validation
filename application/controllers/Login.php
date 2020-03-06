 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Login extends CI_Controller 
{
  
     public function __construct()
        {
         parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('form_validation','session');
        $this->load->helper('url');
        
        }
     function logon()
     {
        $this->load->view("login");
     }

     function post_login()
     {  $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if($this->form_validation->run())
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            if($this->LoginModel->can_login($email,$password))
            {
                $session_data = array(
                    'email' =>$email
            );
                $this->session->set_userdata($session_data);
                redirect(base_url().'Login/Board');
            }
            else
            {
                $this->session->set_flashdata('error','Invalid email and password');
                redirect(base_url().'Login/logon');
            }
        }
          else
          {
            $this->load->view('login');
   
              }

       }

       function Board()
       {
         $this->load->view('dashboard');
        }
 }
 ?>