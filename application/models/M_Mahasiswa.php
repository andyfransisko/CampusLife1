<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Mahasiswa extends CI_Model
{
    function tampilkanData()
	{
		$query=$this->db->get('mahasiswa');
		return $query;
		
	}
	function tampilkanRecord()
	{
		return $this->db->query('SELECT a.nim, a.nama_mhs,a.jenis_kelamin, a.email_mhs, b.id_jurusan, b.nama_jurusan, a.tgl_lahir, a.tmpt_lahir, a.alamat_rumah, a.no_telp, a.agama, a.angkatan, c.username, c.status, c.tipe_akun FROM mahasiswa a JOIN jurusan b ON a.id_jurusan = b.id_jurusan JOIN user c ON a.nim=c.username');
	}

	function getMhsByMatkul($matkul, $semester)
	{
		return $this->db->query('SELECT a.nim, a.nama_mhs, b.id_jurusan, b.nama_jurusan, a.angkatan, c.id_enroll, d.id_mata_kuliah, e.id_semester
		FROM mahasiswa a 
		JOIN jurusan b ON a.id_jurusan = b.id_jurusan 
		JOIN enroll c ON a.nim=c.nim
		JOIN matakuliah d ON c.id_mata_kuliah = d.id_mata_kuliah
		JOIN semester e ON c.id_semester = e.id_semester
		WHERE d.id_mata_kuliah = '.$matkul.' AND e.id_semester = '.$semester);
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
	function hitungJumlahMahasiswa()
	{
		$query = $this->db->get('mahasiswa');
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
	function tampilkanRecordProfile($nim)
	{
		return $this->db->query('SELECT a.nim, a.nama_mhs,a.jenis_kelamin, a.email_mhs, b.id_jurusan, b.nama_jurusan, a.tgl_lahir, a.tmpt_lahir, a.alamat_rumah, a.no_telp, a.agama, a.angkatan, c.username, c.status, c.tipe_akun FROM mahasiswa a JOIN jurusan b ON a.id_jurusan = b.id_jurusan JOIN user c ON a.nim=c.username WHERE a.nim='.$nim);
	}
}



?>