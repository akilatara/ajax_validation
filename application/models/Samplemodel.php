<?php
class Samplemodel extends CI_Model
 {

  public function __construct()
    {
        $this->load->database();
    }
     
    public function insert_user($data)
    {
 
        $insert = $this->db->insert('ARN', $data);
        if ($insert) {
           return $this->db->insert_id();
        } 
        else 
        {
            return false; 
        }
    }

   
function get_username($username) 
{
    $this->db->where('username', $username);

    $query = $this->db->get('ARN');

    if ($query->num_rows() > 0)
     {
      return TRUE;
    }
    else
    {
    return FALSE;
  }
}


}
?>