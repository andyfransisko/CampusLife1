<?php 
class M_Login extends CI_Model
{
    function get_record($table, $where){
        
        return $this->db->get_where($table, $where);
        
    }

    function get_user_record_by_email($where){
        $this->db->select('*');
        $this->db->from('user a'); 
        $this->db->join('mahasiswa b', 'a.id = b.nim', 'left');
        $this->db->join('dosen c', 'a.id = c.nidn', 'left');
        $this->db->where('a.status', '1');
        $this->db->where('b.email_mhs',$where);
        $this->db->or_where('c.email_dosen',$where);         
        $query = $this->db->get(); 
    }

    function insert_record($table, $data){
        $this->db->insert($table, $data);
    }

    function update_record($table, $data, $where){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_record($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }
    



}







?>