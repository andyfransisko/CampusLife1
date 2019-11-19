<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Semester');
	}
	public function index()
	{
		$data['semester']=$this->M_Semester->tampilkanData()->result();
		$this->load->view('V_Semester',$data);
	}

	public function insertData()
	{
		$tangkapIdsemester = $this->input->post('id_semester');
		$tangkapJenissemester= $this->input->post('jenis_semester');
		$tangkapTahun = $this->input->post('tahun');
		

		$data=array(
			'id_semester' =>$tangkapIdsemester,
			'jenis_semester' =>$tangkapJenissemester,
			'tahun' =>$tangkapTahun
		);

		$this->M_Semester->insertTable('semester',$data);
		redirect('Semester/index');
	}

	function editData($id_semester) {
		$this->load->model('M_Semester');
		$where = array('id_semester' => $id_semester);
		$data['SemesterEdit'] = $this->M_Semester->editRecord($where,'semester')->result();
		$this->load->view('V_Edit_Semester',$data);
	}

	function updateData(){
		$tangkapIdsemester = $this->input->post('id_semester');
		$tangkapJenissemester= $this->input->post('jenis_semester');
		$tangkapTahun = $this->input->post('tahun');
		

		$data=array(
			'id_semester' =>$tangkapIdsemester,
			'jenis_semester' =>$tangkapJenissemester,
			'tahun' =>$tangkapTahun
		);

		$where = array(
			'id_semester' => $tangkapIdsemester
		);

		$this->M_Semester->updateRecord($where,$data,'semester');
		redirect('Semester/index');
	}
	
	function hapusData($id_semester){
		$this->load->model('M_Semester');
		$where = array('id_semester' => $id_semester);

		$this->M_Semester->hapusRecord($where,'semester');
		redirect('Semester/index');
	}
}
?>