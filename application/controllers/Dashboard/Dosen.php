<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Dosen','M_User'));
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
		$data['dosen'] = $this->M_Dosen->tampilkanData()->result();
		$this->head();
		$this->load->view('Dashboard/V_Dosen',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nidn', 'NIDN', 'required|trim|is_unique[mahasiswa.nim]');
		$this->form_validation->set_rules('nama_dosen', 'Name', 'required|trim');
		$this->form_validation->set_rules('tipe_dosen', 'Lecturer Type', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
		$this->form_validation->set_rules('agama', 'Religion', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password]');

		
		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_dosen = array(
				'nidn' => htmlspecialchars($this->input->post('nidn')), 
				'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen')), 
				'tipe_dosen' => htmlspecialchars($this->input->post('tipe_dosen')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
				'email_dosen' => htmlspecialchars($this->input->post('email')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')),
				'user_add' => htmlspecialchars($this->input->post('nidn')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);
	
			$data_user = array(
				'username' => htmlspecialchars($this->input->post('nidn'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),   
				'images' => 'default.jpg', 
				'tipe_akun'=> '2',
				'status' => '0'
			);

			$this->M_Dosen->insertTable('dosen',$data_dosen);
			$this->M_User->insertTable('user',$data_user);
			redirect('Dashboard/Dosen/index');

		}

	}

	function editData($nidn) {
		$this->load->model('M_Dosen');
		$where = array('nidn' => $nidn);
		$data['user'] = $this->M_User->tampilkanData()->result();
		$data['DosenEdit'] = $this->M_Dosen->editRecord($where,'dosen')->result();
		$this->load->view('Dashboard/V_Edit_Dosen',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_dosen', 'Name', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('tipe_dosen', 'Lecturer Type', 'required|trim');
		$this->form_validation->set_rules('email_dosen', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
		$this->form_validation->set_rules('agama', 'Religion', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_dosen = array(
				'nama_dosen' => htmlspecialchars($this->input->post('nama_dosen')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
				'email_dosen' => htmlspecialchars($this->input->post('email_dosen')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')), 
				'user_edit' => $this->session->userdata('username'),  
			);

			$where = array(
				'nidn' => $this->input->post('nidn'),
			);
			$this->M_Dosen->updateRecord($where,$data_dosen,'dosen');
			redirect('Dashboard/Dosen/index');

		}
	}
	
	function hapusData($nidn){
		$this->load->model('M_Dosen');
		$where = array('nidn' => $nidn);

		$this->M_Dosen->hapusRecord($where,'Dosen');
		redirect('Dosen/index');
	}
}
?>