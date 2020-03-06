<?php
class RegisterModel extends CI_Model
 {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function insert_user($data)
    {
 
        $insert = $this->db->insert('drone', $data);
        if ($insert) {
           return $this->db->insert_id();
        } 
        else 
        {
            return false;
        }
    }

   function is_email_available($email)
   {
    $this->db->where('email',$email);
    $query = $this->db->get('drone');
    if($query->num_rows() > 0)
    {
    return true;

    }
    else
    {
      return false;
    }
   }
}
?>