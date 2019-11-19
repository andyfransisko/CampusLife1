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
		$this->load->view('V_Dosen',$data);
		$this->close();
	}


	public function insertData()
	{
		$tangkapNidn = $this->input->post('nidn');
		$tangkapNama= $this->input->post('nama_dosen');
		$tangkapTipedosen = $this->input->post('tipe_dosen');
		$tangkapEmail = $this->input->post('email_dosen');
		$tangkapTgllahir= $this->input->post('tanggal_lahir');
		$tangkapTmptlahir = $this->input->post('tempat_lahir');
		$tangkapAlamat= $this->input->post('alamat');
		$tangkapNotelp = $this->input->post('no_telpon');
		$tangkapAgama= $this->input->post('agama');
		$tangkapUsername = $this->input->post('username');
		$tangkapPassword = $this->input->post('password');

		$data=array(
			'nidn' =>$tangkapNidn,
			'nama_dosen' =>$tangkapNama,
			'tipe_dosen' =>$tangkapTipedosen,
			'email_dosen' =>$tangkapEmail,
			'tgl_lahir' =>$tangkapTgllahir,
			'tmpt_lahir' =>$tangkapTmptlahir,
			'alamat_rumah' =>$tangkapAlamat,
			'no_telp' =>$tangkapNotelp,
			'agama' =>$tangkapAgama,
			'username' =>$tangkapUsername,
		);

		$data2 = array(
			'username' => $tangkapUsername,
			'password' => $tangkapPassword,
			'tipe_akun' => "2",
			'status' => "1",

	);

		$this->M_Dosen->insertTable('dosen',$data);
		$this->M_User->insertTable('user',$data2);
		redirect('Dosen/index');
	}

	function editData($nidn) {
		$this->load->model('M_Dosen');
		$where = array('nidn' => $nidn);
		$data['user'] = $this->M_User->tampilkanData()->result();
		$data['DosenEdit'] = $this->M_Dosen->editRecord($where,'dosen')->result();
		$this->load->view('V_Edit_Dosen',$data);
	}

	function updateData(){
		$tangkapNidn = $this->input->post('nidn');
		$tangkapNama= $this->input->post('nama_dosen');
		$tangkapTipedosen = $this->input->post('tipe_dosen');
		$tangkapEmail = $this->input->post('email_dosen');
		$tangkapTgllahir= $this->input->post('tanggal_lahir');
		$tangkapTmptlahir = $this->input->post('tempat_lahir');
		$tangkapAlamat= $this->input->post('alamat');
		$tangkapNotelp = $this->input->post('no_telpon');
		$tangkapAgama = $this->input->post('agama');

		$data=array(
			'nidn' =>$tangkapNidn,
			'nama_dosen' =>$tangkapNama,
			'tipe_dosen' =>$tangkapTipedosen,
			'email_dosen' =>$tangkapEmail,
			'tgl_lahir' =>$tangkapTgllahir,
			'tmpt_lahir' =>$tangkapTmptlahir,
			'alamat_rumah' =>$tangkapAlamat,
			'no_telp' =>$tangkapNotelp,
			'agama' =>$tangkapAgama,
		);

		$where = array(
			'nidn' => $tangkapNidn
		);

		$this->M_Dosen->updateRecord($where,$data,'dosen');
		redirect('Dosen/index');
	}
	
	function hapusData($nidn){
		$this->load->model('M_Dosen');
		$where = array('nidn' => $nidn);

		$this->M_Dosen->hapusRecord($where,'Dosen');
		redirect('Dosen/index');
	}
}
?>