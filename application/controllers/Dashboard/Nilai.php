<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Enroll','M_Nilai','M_Tugas'));
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
		$data['Nilai'] = $this->M_Nilai->tampilkanRecord()->result();
		$this->head();
		$this->load->view('Dashboard/V_Nilai',$data);
		$this->foot();
	}

	public function lihatInsertData()
	{
		$data['enroll'] = $this->M_Enroll->tampilkanData()->result();
		$data['tugas'] = $this->M_Tugas->tampilkanData()->result();
		$this->load->view('Dashboard/V_inputNilai',$data);
	}

	public function insertData()
	{
		$tangkapIdnilai = $this->input->post('id_nilai');
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapTipenilai = $this->input->post('tipe_nilai');
		$tangkapNilai = $this->input->post('nilai');
		$tangkapIdtugas = $this->input->post('id_tugas');

		$data=array(
			'id_nilai' =>$tangkapIdNilai,
			'id_enroll' =>$tangkapIdmatakuliah,
			'tipe_nilai' =>$tangkapTipenilai,
			'nilai_mahasiswa' =>$tangkapNilai,
			'id_tugas' =>$tangkapIdtugas
		);


		$this->M_Nilai->insertTable('nilai',$data);
		redirect('Nilai');
	}

	function editData($nim) {
		$this->load->model('M_Nilai');
		$where = array('id_nilai' => $id_nilai);
		$data['enroll'] = $this->M_Enroll->tampilkanData()->result();
		$data['tugas'] = $this->M_Tugas->tampilkanData()->result();
		$data['NilaiEdit'] = $this->M_Nilai->editRecord($where,'nilai')->result();
		$this->load->view('Dashboard/V_Edit_Nilai',$data);
	}

	function updateData(){
		$tangkapIdnilai = $this->input->post('id_nilai');
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapTipenilai = $this->input->post('tipe_nilai');
		$tangkapNilai = $this->input->post('nilai');
		$tangkapIdtugas = $this->input->post('id_tugas');

		$data=array(
			'id_nilai' =>$tangkapIdNilai,
			'id_enroll' =>$tangkapIdmatakuliah,
			'tipe_nilai' =>$tangkapTipenilai,
			'nilai_mahasiswa' =>$tangkapNilai,
			'id_tugas' =>$tangkapIdtugas
		);

		$where = array(
			'id_nilai' => $tangkapIdnilai
		);

		$this->M_Nilai->updateRecord($where,$data,'nilai');
		redirect('Nilai');
	}
	
	function hapusData($nim){
		$this->load->model('M_Nilai');
		$where = array('id_nilai' => $id_nilai);

		$this->M_Nilai->hapusRecord($where,'nilai');
		redirect('Nilai');
	}
}
?>