<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_User');
	}
	public function index()
	{
		$data['user']=$this->M_User->tampilkanData()->result();
		$this->load->view('V_User',$data);
	}

	public function lihatInsertData()
	{
		$this->load->view('V_Input_User',$data);
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
		$this->load->view('V_Edit_User',$data);
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
}
?>