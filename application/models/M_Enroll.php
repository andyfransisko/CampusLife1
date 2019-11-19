<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Enroll extends CI_Model{

    function get_matkul_enroll($year, $oddEven){
            $query = $this->db->query('SELECT c.id_enroll, a.id_mata_kuliah, a.nama_mata_kuliah,b.id_semester, b.jenis_semester, b.tahun, COUNT(nim) AS jumlah_mahasiswa
            FROM matakuliah a
            JOIN semester b ON a.id_semester = b.id_semester
            JOIN enroll c ON c.id_mata_kuliah = a.id_mata_kuliah AND c.id_semester = b.id_semester
            WHERE b.tahun = '.$year.' AND b.jenis_semester = '.$oddEven);
        return $query;
    }

    function get_all_enroll_cond($where){
        return $this->db->get_where('enroll',$where);
    }

    function tampilkanData()
	{
		$query=$this->db->get('enroll');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_enroll, b.nama_matakuliah, c.nama_mhs, d.jenis_semester, d.tahun FROM enroll a JOIN matakuliah b ON a.id_matakuliah = b.id_matakuliah JOIN mahasiswa c ON a.nim = c.nim JOIN semester d ON a.id_semester = d.id_semester');
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