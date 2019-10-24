<?php 
class M_Login extends CI_Model
{
    function login_cek($table, $where){
        
        return $this->db->get_where($table, $where);
        
    }

    function insert_record($table, $data){
        $this->db->insert($table, $data);
    }
}







?>