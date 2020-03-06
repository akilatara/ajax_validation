<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Crudmodel extends CI_model{
	public function showAllmain(){

        /*$this->db->order_by('city','desc');*/
		$query =$this->db->get('crud');

		if($query->num_rows() > 0)
            {

			return $query->result();

		}
            else
            {
			return false;
		}
	}
      public function addMain()
      {
      	$field =array(
      		'empname'=>$this->input->post('txtempname'),
      		'address'=>$this->input->post('txtaddress'),
      		'city'=>$this->input->post('txtcity')
      	);
      	$this->db->insert('crud',$field);
      	if($this->db->affected_rows() > 0)
            {
      		return true;

      	}else
            {
      		return false;
      	}
      }

            public function editMain(){
              $id = $this->input->get('id');
              $this->db->where('id',$id);
              $query = $this->db->get('crud');
              if($query->num_rows() > 0){
                return $query->row();
              }
              else
              {
                return false;
              }

            }

            public function updateMain(){
              $id = $this->input->post('txtId');
              $field = array(
                'empname'=>$this->input->post('txtempname'),
                'address'=>$this->input->post('txtaddress'),
                'city'=>$this->input->post('txtcity')
               );
              $this->db->where('id',$id);
              $this->db->update('crud',$field);
              if($this->db->affected_rows() > 0){
                return true;

              }else
              {
                return false;
              }
            }
          
            function deleteMain(){
              $id= $this->input->get('id');
              $this->db->where('id',$id);
              $this->db->delete('crud');
              if($this->db->affected_rows() > 0){
                return true;
              }
              else
              {
                return false;
              }
            }
      }   	

?>