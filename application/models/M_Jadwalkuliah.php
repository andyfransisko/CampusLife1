<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jadwalkuliah extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('jadwal_kuliah');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_jadwal, b.nama_matakuliah, c.nama_dosen, a.hari, a.jam_mulai, a.jam_selesai, d.detail_ruangan FROM jadwal_kuliah a JOIN matakuliah b ON a.id_mata_kuliah = b.id_mata_kuliah JOIN dosen c ON a.nidn = c.nidn JOIN ruangan d ON a.id_ruangan = d.id_ruangan');
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