<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Jadwalcustom extends CI_Model {
	function getJadwal($nim){
        $query = $this->db->query('SELECT a.nama_kegiatan, a.tipe_kegiatan, 
        a.tanggal, a.jam_mulai, a.jam_selesai, a.tempat 
        FROM jadwal_custom a 
        WHERE a.user_id = '.$nim);

        return $query;

	}

	function tampilkanData()
	{
		$query=$this->db->get('jadwal_custom');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.id_jadwal, b.nama_mhs, a.nama_kegiatan, a.tipe_kegiatan, a.tanggal, a.jam_mulai, a.jam_selesai, a.tempat FROM jadwal_custom a JOIN mahasiswa b ON a.user_id = b.nim');
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