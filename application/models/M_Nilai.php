<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Nilai extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('nilai_mhs');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_nilai_mhs, b.id_enroll, a.tipe_nilai, a.nilai_mahasiswa, c.id_tugas FROM nilai_mhs a JOIN enroll b ON a.id_enroll = b.id_enroll JOIN tugas c ON a.id_tugas = c.id_tugas');
	}

	function getNilaiMhs($id){
		return $this->db->query('SELECT a.nim, a.tipe_nilai, e.detail_penilaian, a.nilai_mahasiswa, c.id_tugas 
		FROM nilai_mhs a 
		JOIN enroll b ON a.id_enroll = b.id_enroll 
		JOIN tugas c ON a.id_tugas = c.id_tugas
		JOIN matakuliah d ON d.id_mata_kuliah = b.id_mata_kuliah
		JOIN matakuliah_nilai e ON e.id_tipe_penilaian = a.tipe_nilai
		WHERE a.tipe_nilai = '.$id);
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