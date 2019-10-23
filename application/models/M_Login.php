<?php 
class M_Login extends CI_Model
{
    function login_cek($table, $where){
        
        return $this->db->get_where($table, $where)->num_rows();
        
    }

    function join_user($table, $where){
        
        $this->db->select('*');
        $this->db->from($table[0]);
        for($i=1; $i < count($table);$i++){
            $this->db->join($table[$i], $where);
        }

        $query = $this->db->get();
        


    }





}







?>