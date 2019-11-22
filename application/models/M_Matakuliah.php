<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Matakuliah extends CI_Model{

    function getAllMatkul(){
        $query=$this->db->get('matakuliah');
		return $query;
    }
    
    function getAllMatkulCond($where){
        return $this->db->get_where('matakuliah',$where);
    }
    
    function getMatkul($nim, $tahun, $oddeven){
        $query = $this->db->query('SELECT a.nim, a.id_mata_kuliah, d.nama_mata_kuliah, c.tahun, c.jenis_semester
        FROM enroll a 
        JOIN semester c ON a.id_semester = c.id_semester 
        JOIN matakuliah d ON a.id_mata_kuliah = d.id_mata_kuliah 
        WHERE a.nim = '.$nim.' AND c.tahun = '.$tahun.' AND c.jenis_semester = "'.$oddeven.'"');

        return $query;

    }

    function getJadwalMatkul($id){
        $query = $this->db->query('SELECT a.nim, 
        d.nama_mata_kuliah, c.tahun, c.jenis_semester, b.hari, b.jam_mulai, b.jam_selesai, e.nama_dosen, f.detail_ruangan 
        FROM enroll a 
        JOIN jadwal_kuliah b ON a.id_mata_kuliah = b.id_mata_kuliah 
        JOIN semester c ON a.id_semester = c.id_semester 
        JOIN matakuliah d ON a.id_mata_kuliah = d.id_mata_kuliah 
        JOIN dosen e ON b.nidn = e.nidn 
        JOIN ruangan f ON b.id_ruangan = f.id_ruangan
        WHERE a.id_mata_kuliah = '.$id);

        return $query;        

    }

    function get_matkul_this_semester($year){
        $query = $this->db->query('SELECT a.id_mata_kuliah, a.nama_mata_kuliah, b.tahun, b.jenis_semester
        FROM matakuliah a
        JOIN semester b ON a.id_semester = b.id_semester
        WHERE b.tahun = '.$year);
        return $query;
    }

    function tampilkanData()
	{
		$query=$this->db->get('matakuliah');
		return $query;
		
    }
    
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_matakuliah, a.nama_mata_kuliah, a.sks, b.id_semester, c.id_ruangan FROM matakuliah a JOIN semester b ON a.id_semester = b.id_semester JOIN ruangan c ON a.id_ruangan = c.id_ruangan');
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