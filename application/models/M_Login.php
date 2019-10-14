<?php 
class M_Login extends CI_Model
{
    function login_cek($username, $password){
        $where = array(
            'username' => $username,
            'password' => $password
        
        );
        $a = $this->db->get_where('Login', $where)->result();
        if($a->num_rows() > 0)
        {
            return $username;
        }
        else
        {
            return null;
        }
        

    }





}







?>