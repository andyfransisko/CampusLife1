<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Semester');
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
		$data['semester']=$this->M_Semester->tampilkanData()->result();
		$data['count'] = $this->M_Semester->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/V_Semester',$data);
		$this->foot();
	}

	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('id_semester', 'Semester ID', 'required|trim|is_unique[semester.id_semester]');
		$this->form_validation->set_rules('jenis_semester', 'Semester Type', 'required|trim|numeric');
		$this->form_validation->set_rules('tahun', 'Year', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_sem = array(
				'id_semester' => htmlspecialchars($this->input->post('id_semester')), 
				'jenis_semester' => htmlspecialchars($this->input->post('jenis_semester')), 
				'tahun' => htmlspecialchars($this->input->post('tahun')), 
				'user_add' => $this->session->userdata('username'),  
				'user_edit' => '',  
				'user_delete' => '',  
				'status_delete' => 1,  
			);

			$this->M_Semester->insertTable('semester', $data_sem);
			redirect('Dashboard/Semester/index');

		}
	}

	function editData($id_semester) {
		$this->load->model('M_Semester');
		$where = array('id_semester' => $id_semester);
		$data['SemesterEdit'] = $this->M_Semester->editRecord($where,'semester')->result();
		$this->load->view('Dashboard/V_Edit_Semester',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('jenis_semester', 'Semester Type', 'required|trim|numeric');
		$this->form_validation->set_rules('tahun', 'Year', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_sem = array(
				'jenis_semester' => htmlspecialchars($this->input->post('jenis_semester')), 
				'tahun' => htmlspecialchars($this->input->post('tahun')), 
				'user_edit' => $this->session->userdata('username'),  
			);

			$where = array(
				'id_semester' => $this->input->post('id_semester'),
			);
			$this->M_Semester->updateRecord($where,$data_sem,'semester');
			redirect('Dashboard/Semester/index');

		}
	}
	
	function hapusData($id_semester){
		$this->load->model('M_Semester');
		$where = array('id_semester' => $id_semester);

		$this->M_Semester->hapusRecord($where,'semester');
		redirect('Semester/index');
	}
}
?>