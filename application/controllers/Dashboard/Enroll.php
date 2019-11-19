<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Matakuliah','M_Enroll','M_Semester','M_Mahasiswa'));
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
		$data['enroll'] = $this->M_Enroll->tampilkanRecord()->result();
		$this->head();
		$this->load->view('V_Enroll',$data);
		$this->close();
	}

	public function lihatInsertData()
	{
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['semester'] = $this->M_Semester->tampilkanData()->result();
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$this->load->view('V_inputEnroll',$data);
	}

	public function insertData()
	{
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapIdmatakuliah= $this->input->post('id_matakuliah');
		$tangkapNim = $this->input->post('nim');
		$tangkapIdsemester = $this->input->post('id_semester');

		$data=array(
			'nim' =>$tangkapNim,
			'id_enroll' =>$tangkapIdenroll,
			'id_matakuliah' =>$tangkapIdmatakuliah,
			'id_semester' =>$tangkapIdsemester
		);


		$this->M_Enroll->insertTable('enroll',$data);
		redirect('Enroll');
	}

	function editData($nim) {
		$this->load->model('M_Enroll');
		$where = array('id_enroll' => $id_enroll);
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$data['semester'] = $this->M_Semester->tampilkanData()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['EnrollEdit'] = $this->M_Enroll->editRecord($where,'enroll')->result();
		$this->load->view('V_Edit_Enroll',$data);
	}

	function updateData(){
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapIdmatakuliah= $this->input->post('id_matakuliah');
		$tangkapNim = $this->input->post('nim');
		$tangkapIdsemester = $this->input->post('id_semester');

		$data=array(
			'nim' =>$tangkapNim,
			'id_enroll' =>$tangkapIdenroll,
			'id_matakuliah' =>$tangkapIdmatakuliah,
			'id_semester' =>$tangkapIdsemester
		);

		$where = array(
			'id_enroll' => $tangkapIdenroll
		);

		$this->M_Enroll->updateRecord($where,$data,'enroll');
		redirect('Enroll');
	}
	
	function hapusData($nim){
		$this->load->model('M_Enroll');
		$where = array('id_enroll' => $id_enroll);

		$this->M_Enroll->hapusRecord($where,'enroll');
		redirect('Enroll');
	}
}
?>