<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwalcustom extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Jadwalcustom','M_Mahasiswa'));
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
		$data['jadwal_custom'] = $this->M_Jadwalcustom->tampilkanRecord()->result();
		$this->head();
		$this->load->view('V_Jadwalcustom',$data);
		$this->close();
	}

	public function lihatInsertData()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$this->load->view('Dashboard/V_inputJadwalcustom',$data);
	}

	public function insertData()
	{
		$tangkapIdJadwalcustom = $this->input->post('id_jadwal_custom');
		$tangkapNim = $this->input->post('nim');
		$tangkapNamakegiatan = $this->input->post('nama_kegiatan');
		$tangkapHari = $this->input->post('hari');
		$tangkapJammulai = $this->input->post('jam_mulai');
		$tangkapJamselesai = $this->input->post('jam_selesai');
		$tangkapTempat = $this->input->post('tempat');

		$data=array(
			'nim' =>$tangkapNim,
			'nama_kegiatan' =>$tangkapNamakegiatan,
			'hari' =>$tangkapHari,
			'jam_mulai' =>$tangkapJammulai,
			'jam_selesai' =>$tangkapJamselesai,
			'id_jadwal' =>$tangkapIdJadwalcustom,
		);


		$this->M_Jadwalcustom->insertTable('jadwal_custom',$data);
		redirect('Jadwalcustom');
	}

	function editData($nim) {
		$this->load->model('M_Jadwalcustom');
		$where = array('id_jadwal' => $id_jadwalcustom);
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$data['JadwalcustomEdit'] = $this->M_Jadwalcustom->editRecord($where,'jadwal_custom')->result();
		$this->load->view('Dashboard/V_Edit_Jadwalcustom',$data);
	}

	function updateData(){
		$tangkapIdJadwalcustom = $this->input->post('id_jadwal_custom');
		$tangkapNim = $this->input->post('nim');
		$tangkapNamakegiatan = $this->input->post('nama_kegiatan');
		$tangkapHari = $this->input->post('hari');
		$tangkapJammulai = $this->input->post('jam_mulai');
		$tangkapJamselesai = $this->input->post('jam_selesai');
		$tangkapTempat = $this->input->post('tempat');

		$data=array(
			'nim' =>$tangkapNim,
			'nama_kegiatan' =>$tangkapNamakegiatan,
			'hari' =>$tangkapHari,
			'jam_mulai' =>$tangkapJammulai,
			'jam_selesai' =>$tangkapJamselesai,
			'id_jadwal' =>$tangkapIdJadwalcustom,
		);

		$where = array(
			'id_jadwal' => $tangkapIdJadwalcustom
		);

		$this->M_Jadwalcustom->updateRecord($where,$data,'jadwal_custom');
		redirect('Jadwalcustom');
	}
	
	function hapusData($nim){
		$this->load->model('M_Jadwalcustom');
		$where = array('id_jadwal' => $id_jadwalcustom);

		$this->M_Jadwalcustom->hapusRecord($where,'jadwal_custom');
		redirect('Jadwalcustom');
	}
}
?>