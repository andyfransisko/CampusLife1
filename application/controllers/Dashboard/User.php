<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Admin','M_User'));
	}
	public function head(){
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		if($this->session->userdata('tipe_akun')== 2){
			$data2['dosen'] = $this->M_Dosen->getRecord($this->session->userdata('username'))->row_array();
		}else{
			$data2['admin'] = $this->M_Admin->getRecord($this->session->userdata('username'))->row_array();
		}
		$this->load->view('Dashboard/Template/left', $data2);
	}
	
	public function foot(){
		$this->load->view('Dashboard/Template/js');
		$this->load->view('Dashboard/Template/body-close');

	}
	public function index()
	{
		$data['user']=$this->M_User->tampilkanData()->result();
		$this->head();
		$this->load->view('Dashboard/V_User',$data);
		$this->foot();
	}

	public function lihatInsertData()
	{
		$this->load->view('Dashboard/V_Input_User',$data);
	}

	public function insertData()
	{
		$tangkapUsername = $this->input->post('username');
		$tangkapPassword= $this->input->post('password');
		$tangkapImages = $this->input->post('images');
		$tangkapTipeakun= $this->input->post('tipe_akun');
		$tangkapStatus = $this->input->post('status');
		

		$data=array(
			'username' =>$tangkapUsername,
			'password' =>$tangkapPassword,
			'images' =>$tangkapImages,
			'tipe_akun' =>$tangkapTipeakun,
			'status' =>$tangkapStatus
		);

		$this->M_User->insertTable('user',$data);
		redirect('User');
	}

	function editData($nidn) {
		$this->load->model('M_User');
		$where = array('username' => $username);
		$data['UserEdit'] = $this->M_User->editRecord($where,'user')->result();
		$this->load->view('Dashboard/V_Edit_User',$data);
	}

	function updateData(){
		$tangkapUsername = $this->input->post('username');
		$tangkapPassword= $this->input->post('password');
		$tangkapImages = $this->input->post('images');
		$tangkapTipeakun= $this->input->post('tipe_akun');
		$tangkapStatus = $this->input->post('status');
		

		$data=array(
			'username' =>$tangkapUsername,
			'password' =>$tangkapPassword,
			'images' =>$tangkapImages,
			'tipe_akun' =>$tangkapTipeakun,
			'status' =>$tangkapStatus
		);

		$where = array(
			'username' => $tangkapUsername
		);

		$this->M_User->updateRecord($where,$data,'user');
		redirect('User');
	}
	
	function hapusData($nidn){
		$this->load->model('M_User');
		$where = array('username' => $username);

		$this->M_User->hapusRecord($where,'user');
		redirect('User');
	}

	function exportPDF()
	{
		$data['user']=$this->M_User->tampilkanData()->result();
		$this->load->view('Dashboard/E_User',$data);
	}
}
?>