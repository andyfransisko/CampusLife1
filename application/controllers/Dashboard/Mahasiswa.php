<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Jurusan','M_Mahasiswa','M_User', 'M_Jurusan'));
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
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		$data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$this->head();
		$this->load->view('Dashboard/V_Mahasiswa',$data);
		$this->foot();
	}


	public function insertData()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[mahasiswa.nim]');
		$this->form_validation->set_rules('nama_mhs', 'Name', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('id_jurusan', 'Major Name', 'required|trim');
		$this->form_validation->set_rules('angkatan', 'Batch', 'required|trim');
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
			$data_mhs = array(
				'nim' => htmlspecialchars($this->input->post('nim')), 
				'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
				'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
				'angkatan' => htmlspecialchars($this->input->post('angkatan')), 
				'email_mhs' => htmlspecialchars($this->input->post('email')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')),
				'user_add' => htmlspecialchars($this->input->post('nim')),  
				'user_edit' => '',  
				'user_delete' => '',
				'status_delete' => 1
			);
	
			$data_user = array(
				'username' => htmlspecialchars($this->input->post('nim'), true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),   
				'images' => 'default.jpg', 
				'tipe_akun'=> '1',
				'status' => '0'
			);

			$this->M_Mahasiswa->insertTable('mahasiswa',$data_mhs);
			$this->M_User->insertTable('user',$data_user);
			redirect('Dashboard/Mahasiswa/index');

		}

		
	}

	function editData($nim) {
		$this->load->model('M_Mahasiswa');
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$data['user'] = $this->M_User->tampilkanData()->result();
		$data['mahasiswaEdit'] = $this->M_Mahasiswa->editRecord($where,'mahasiswa')->result();
		$this->load->view('Dashboard/V_Edit_Mahasiswa',$data);
	}

	function updateData(){
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nama_mhs', 'Name', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Sex', 'required|trim');
		$this->form_validation->set_rules('id_jurusan', 'Major Name', 'required|trim');
		$this->form_validation->set_rules('angkatan', 'Batch', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('tmpt_lahir', 'Place of Birth', 'required|trim');
		$this->form_validation->set_rules('tgl_lahir', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Address', 'required|trim');
		$this->form_validation->set_rules('no_telp', 'Telephone Number', 'required|trim|numeric');
		$this->form_validation->set_rules('agama', 'Religion', 'required|trim');

		if($this->form_validation->run() == false){
			echo validation_errors();
		}
		else{
			$data_mhs = array(
				'nama_mhs' => htmlspecialchars($this->input->post('nama_mhs')), 
				'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin')), 
				'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan')), 
				'angkatan' => htmlspecialchars($this->input->post('angkatan')), 
				'email_mhs' => htmlspecialchars($this->input->post('email')), 
				'tgl_lahir' => date('Y-m-d', strtotime(htmlspecialchars($this->input->post('tgl_lahir')))),
				'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir')), 
				'alamat_rumah' => htmlspecialchars($this->input->post('alamat')), 
				'no_telp' => htmlspecialchars($this->input->post('no_telp')), 
				'agama' => htmlspecialchars($this->input->post('agama')), 
				'user_edit' => $this->session->userdata('username'),  
			);

			$where = array(
				'nim' => $this->input->post('nim'),
			);
			$this->M_Mahasiswa->updateRecord($where,$data_mhs,'mahasiswa');
			redirect('Dashboard/Mahasiswa/index');

		}

		
	}
	
	function hapusData($nim){
		$this->load->model('M_Mahasiswa');
		$this->load->model('M_User');
		$where = array('nim' => $nim);
		$where_user = array('username' => $nim);
		$this->M_Mahasiswa->hapusRecord($where,'mahasiswa');
		$this->M_User->hapusRecord($where_user,'user');
		redirect('Mahasiswa/index');
	}

	function exportPDF()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		$data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$this->load->view('Dashboard/E_Mahasiswa',$data);
	}
}
?>