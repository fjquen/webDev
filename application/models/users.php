<?php
class Users extends CI_Model {

    
    public function get_user()
    {
            $query = $this->db->get('users');
            return $query->result();
    }
    
    public function get_user_one($id)
    {
        $query = $this->db->get_where('users', array('id_service'=>$id));
        return $query->result();
    }

    public function delete_user_one($id)
    {
        return $query = $this->db->delete('users', array('id' => $id));
    }

    public function add_user($data){
        
        $this->db->set($data);
        $this->db->insert('users',$data);
    }
}