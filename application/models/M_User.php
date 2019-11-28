<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_User extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('user');
		return $query;
		
	}

	function getAccountMhs(){
		$this->db->select('a.username, a.status, b.nama_mhs');
        $this->db->from('user a'); 
        $this->db->join('mahasiswa b', 'a.username = b.nim', 'left');
		$query = $this->db->get();
		return $query;
	}

	function getAccountDosen(){
		$this->db->select('a.username, a.status, b.nama_dosen');
        $this->db->from('user a'); 
        $this->db->join('dosen b', 'a.username = b.nidn', 'left');
		$query = $this->db->get();
		return $query;
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