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
		return $this->db->query('SELECT a.id_nilai_mhs, b.id_enroll, a.tipe_nilai, a.nilai_mahasiswa  FROM nilai_mhs a JOIN enroll b ON a.id_enroll = b.id_enroll');
	}

	function getNilaiMhs($id, $matkul){	
		return $this->db->query('SELECT b.id_enroll, b.nim, a.tipe_nilai, a.nilai_mahasiswa 
		FROM nilai_mhs a 
		JOIN enroll b ON b.id_enroll = a.id_enroll  
		WHERE a.tipe_nilai ='.$id.' AND b.id_mata_kuliah =' .$matkul);
	}
	function insertTable($a,$b)
	{
		$this->db->insert($a,$b);
	}
	function editRecord($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function getRecord($where,$table)
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