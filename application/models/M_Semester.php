<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Semester extends CI_Model {

	function tampilkanData()
	{
		$query=$this->db->get('semester');
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

	function tampilkanDataSemesterEnroll($where)
	{
		$query = $this->db->query('SELECT DISTINCT a.id_semester
        FROM enroll a 
        JOIN semester b ON a.id_semester = b.id_semester
		WHERE a.nim ='.$where);
		return $query;
	}

	function tampilkanMatkul($where)
	{
		$query = $this->db->query('SELECT id_mata_kuliah,id_semester
        FROM enroll a 
		WHERE a.nim ='.$where);
		return $query;
	}

	function tampilkanNilai($idm,$nim)
	{
		$query = $this->db->query('SELECT *
        FROM nilai_mhs a 
		JOIN enroll b
		ON a.id_enroll = b.id_enroll 
		WHERE b.nim ='.$nim.' AND b.id_mata_kuliah ="'.$idm.'"');
		return $query;
	}
}
?>