<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalkuliah extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Jadwalkuliah','M_Dosen','M_Matakuliah','M_Ruangan'));
	}
	
	public function head(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		$this->load->view('Dashboard/Template/left');
	}
	
	public function foot(){
		$this->load->view('Dashboard/Template/js');
		$this->load->view('Dashboard/Template/body-close');

	}

	public function index()
	{
		$data['jadwal_kuliah'] = $this->M_Jadwalkuliah->tampilkanRecord()->result();
		$this->head();
		$this->load->view('Dashboard/V_Jadwalkuliah',$data);
		$this->foot();
	}

	public function lihatInsertData()
	{
		$data['dosen'] = $this->M_Dosen->tampilkanData()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['ruangan'] = $this->M_Ruangan->tampilkanData()->result();
		$this->load->view('Dashboard/V_inputJadwalkuliah',$data);
	}

	public function insertData()
	{
		$tangkapIdjadwalkuliah = $this->input->post('id_jadwal_kuliah');
		$tangkapNidn = $this->input->post('nidn');
		$tangkapIdmatakuliah = $this->input->post('id_mata_kuliah');
		$tangkapHari = $this->input->post('hari');
		$tangkapJammulai = $this->input->post('jam_mulai');
		$tangkapJamselesai = $this->input->post('jam_selesai');
		$tangkapIdruangan = $this->input->post('id_ruangan');

		$data=array(
			'nidn' =>$tangkapNidn,
			'id_jadwal' =>$tangkapIdjadwalkuliah,
			'id_mata_kuliah' =>$tangkapIdmatakuliah,
			'hari' =>$tangkapHari,
			'jam_mulai' =>$tangkapJammulai,
			'jam_selesai' =>$tangkapJamselesai,
			'id_ruangan' =>$tangkapIdruangan

		);


		$this->M_Jadwalkuliah->insertTable('jadwal_kuliah',$data);
		redirect('Jadwalkuliah');
	}

	function editData($nim) {
		$this->load->model('M_Jadwalkuliah');
		$where = array('id_jadwal' => $id_jadwalkuliah);
		$data['dosen'] = $this->M_Dosen->tampilkanData()->result();
		$data['ruangan'] = $this->M_Ruangan->tampilkanData()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['JadwalkuliahEdit'] = $this->M_Jadwalkuliah->editRecord($where,'jadwal_custom')->result();
		$this->load->view('Dashboard/V_Edit_Jadwalkuliah',$data);
	}

	function updateData(){
		$tangkapIdjadwalkuliah = $this->input->post('id_jadwal_kuliah');
		$tangkapNidn = $this->input->post('nidn');
		$tangkapIdmatakuliah = $this->input->post('id_mata_kuliah');
		$tangkapHari = $this->input->post('hari');
		$tangkapJammulai = $this->input->post('jam_mulai');
		$tangkapJamselesai = $this->input->post('jam_selesai');
		$tangkapIdruangan = $this->input->post('id_ruangan');

		$data=array(
			'nidn' =>$tangkapNidn,
			'id_jadwal' =>$tangkapIdjadwalkuliah,
			'id_mata_kuliah' =>$tangkapIdmatakuliah,
			'hari' =>$tangkapHari,
			'jam_mulai' =>$tangkapJammulai,
			'jam_selesai' =>$tangkapJamselesai,
			'id_ruangan' =>$tangkapIdruangan

		);

		$where = array(
			'id_jadwal' => $tangkapIdjadwalkuliah
		);

		$this->M_Jadwalkuliah->updateRecord($where,$data,'jadwal_kuliah');
		redirect('Jadwalkuliah');
	}
	
	function hapusData($nim){
		$this->load->model('M_Jadwalkuliah');
		$where = array('id_jadwal' => $id_jadwalkuliah);

		$this->M_Jadwalkuliah->hapusRecord($where,'jadwal_kuliah');
		redirect('Jadwalkuliah');
	}
}
?>