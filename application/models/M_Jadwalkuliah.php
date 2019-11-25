<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jadwalkuliah extends CI_Model{

    function getJadwal($nim, $tahun, $oddeven){
        $query = $this->db->query('SELECT a.nim, e.nama_mhs, 
        d.nama_mata_kuliah, c.tahun, c.jenis_semester, b.hari, b.jam_mulai, b.jam_selesai, f.detail_ruangan 
        FROM enroll a 
        JOIN jadwal_kuliah b ON a.id_mata_kuliah = b.id_mata_kuliah 
        JOIN semester c ON a.id_semester = c.id_semester 
        JOIN matakuliah d ON a.id_mata_kuliah = d.id_mata_kuliah 
        JOIN mahasiswa e ON a.nim = e.nim
        JOIN ruangan f ON b.id_ruangan = f.id_ruangan
        WHERE a.nim = '.$nim.' AND c.tahun = '.$tahun.' AND c.jenis_semester = '.$oddeven);

        return $query;

	}
	
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