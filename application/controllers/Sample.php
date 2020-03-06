<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Sample extends CI_Controller 
{  
	 public function __construct()
        {
         parent::__construct();
        $this->load->model('Samplemodel');
        $this->load->library('form_validation','session');
        $this->load->helper('url');
        
        }
  
     function index()  
    {  
       $this->load->view('sample/fetch');
		
	}
	 function post_submit()
     {  $this->load->library('form_validation');
        $this->form_validation->set_rules('username','UserName','required');
        $this->form_validation->set_rules('arnnumber','ARN','required');
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('sample/fetch');
        }
        else
        {   
            $data = array(
               'username' => $this->input->post('username'),
               'arnnumber' => $this->input->post('arnnumber')
               );
   
            $check = $this->Samplemodel->insert_user($data);
 
            if($check != false){
 
                $user = array(
                 'user_id' => $check,
                 'username' => $this->input->post('username'),
                 'arnnumber' => $this->input->post('arnnumber')
                );
             }
  
             $this->session->set_userdata($user);
             redirect(base_url('Sample/index'));
            }
     } 


       function sample () 
       {
          $this->load->view('sample/fetch');
       }

  function get_username_availability()
   {
    $this->load->model('Samplemodel');
    if (isset($_POST['username']))
     {
      $username = $_POST['username'];
    

      $results = $this->Samplemodel->get_username($username);
      if ($results === TRUE) 
      {
        echo '<span style="color:red;">Username already exists</span>';
      }
       else 
       {
        echo '<span style="color:green;">Username available</span>';
      }
    } 
    else
     {
      echo '<span style="color:red;">Username is required field.</span>';
    }
  }
}

?>