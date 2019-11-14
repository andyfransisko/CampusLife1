<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Mahasiswa extends CI_Model
{
    function get_data_mahasiswa(){
        $query = $this->db->query('SELECT a.nim, a.nama_mhs, b.nama_jurusan, a.angkatan
        FROM mahasiswa a
        JOIN jurusan b ON a.id_jurusan = b.id_jurusan');
        return $query;
    }

    function get_all_mahasiswa(){
        return $this->db->get('mahasiswa');
    }
}



?>