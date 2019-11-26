<?php 
class M_Login extends CI_Model
{
    function getRecord($table, $where){
        
        return $this->db->get_where($table, $where);
        
    }

    function getRecordNameMhs($where){
        return $this->db->query('SELECT * FROM user a JOIN mahasiswa b ON a.username=b.nim WHERE a.username = '.$where['username']);
        
    }

    function getRecordNameDosen($where){
        $this->db->select('b.nama_dosen, a.tipe_akun');
        $this->db->from('user a'); 
        $this->db->join('dosen b', 'a.username = b.nidn', 'left');
        $this->db->where($where);
        $query = $this->db->get(); 
    }

    function getUserRecordByEmail($where){
        $this->db->select('*');
        $this->db->from('user a'); 
        $this->db->join('mahasiswa b', 'a.id = b.nim', 'left');
        $this->db->join('dosen c', 'a.id = c.nidn', 'left');
        $this->db->where('a.status', '1');
        $this->db->where('b.email_mhs',$where);
        $this->db->or_where('c.email_dosen',$where);         
        $query = $this->db->get(); 
    }

    function insertTable($a,$b)
	{
		$this->db->insert($a,$b);
	}
	function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function updateRecord($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	function hapusRecord($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
    



}







?>