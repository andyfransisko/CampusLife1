<?php 
class M_User extends CI_Model
{
    function get_where($table, $where){
        
        return $this->db->get_where($table, $where);
        
    }

}







?>