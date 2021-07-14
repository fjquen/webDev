<?php
class Services extends CI_Model {

    
    public function get_user_service($id)
    {
            $query = $this->db->get_where('service', array('id'=>$id));
            return $query->row();
    }


    public function get_service_user(){
        $query = $this->db->get('service');
        return $query->result();
    }
}