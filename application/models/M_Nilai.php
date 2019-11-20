<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nilai extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('nilai');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_nilai, b.id_enroll, a.tipe_nilai, a.nilai_mahasiswa, c.id_tugas FROM nilai a JOIN enroll b ON a.id_enroll = b.id_enroll JOIN tugas c ON a.id_tugas = c.id_tugas');
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