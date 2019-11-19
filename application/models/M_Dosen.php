<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dosen extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('dosen');
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