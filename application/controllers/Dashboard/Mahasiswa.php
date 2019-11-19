<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Jurusan','M_Mahasiswa','M_User'));
	}
	public function index()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		$this->load->view('V_Mahasiswa',$data);
	}


	public function insertData()
	{
		$tangkapNim = $this->input->post('nim');
		$tangkapNama= $this->input->post('nama_mahasiswa');
		$tangkapJeniskelamin = $this->input->post('jenis_kelamin');
		$tangkapEmail = $this->input->post('email_mahasiswa');
		$tangkapIdjurusan = $this->input->post('jurusan');
		$tangkapTgllahir= $this->input->post('tanggal_lahir');
		$tangkapTmptlahir = $this->input->post('tempat_lahir');
		$tangkapAlamat= $this->input->post('alamat');
		$tangkapNotelp = $this->input->post('no_telpon');
		$tangkapAgama= $this->input->post('agama');
		$tangkapUsername = $this->input->post('username');

		$data=array(
			'nim' =>$tangkapNim,
			'nama_mhs' =>$tangkapNama,
			'jenis_kelamin' =>$tangkapJenisKelamin,
			'id_jurusan' =>$tangkapIdjurusan,
			'email_mhs' =>$tangkapEmail,
			'tgl_lahir' =>$tangkapTgllahir,
			'tmpt_lahir' =>$tangkapTmptlahir,
			'alamat_rumah' =>$tangkapAlamat,
			'no_telp' =>$tangkapNotelp,
			'agama' =>$tangkapAgama,
			'username' =>$tangkapUsername
		);

		$data2 = array('username' =>$tangkapUsername);

		$this->M_Mahasiswa->insertTable('mahasiswa',$data);
		$this->M_User->insertTable('user',$data2);
		redirect('Mahasiswa/index');
	}

	function editData($nim) {
		$this->load->model('M_Mahasiswa');
		$where = array('nim' => $nim);
		$data['jurusan'] = $this->M_Jurusan->tampilkanData()->result();
		$data['user'] = $this->M_User->tampilkanData()->result();
		$data['mahasiswaEdit'] = $this->M_Mahasiswa->editRecord($where,'mahasiswa')->result();
		$this->load->view('V_Edit_Mahasiswa',$data);
	}

	function updateData(){
		$tangkapNim = $this->input->post('nim');
		$tangkapNama= $this->input->post('nama_mahasiswa');
		$tangkapJeniskelamin = $this->input->post('jenis_kelamin');
		$tangkapEmail = $this->input->post('email_mahasiswa');
		$tangkapIdjurusan = $this->input->post('jurusan');
		$tangkapTgllahir= $this->input->post('tanggal_lahir');
		$tangkapTmptlahir = $this->input->post('tempat_lahir');
		$tangkapAlamat= $this->input->post('alamat');
		$tangkapNotelp = $this->input->post('no_telpon');
		$tangkapAgama= $this->input->post('agama');
		$tangkapUsername = $this->input->post('username');

		$data=array(
			'nim' =>$tangkapNim,
			'nama_mhs' =>$tangkapNama,
			'jenis_kelamin' =>$tangkapJenisKelamin,
			'id_jurusan' =>$tangkapIdjurusan,
			'email_mhs' =>$tangkapEmail,
			'tgl_lahir' =>$tangkapTgllahir,
			'tmpt_lahir' =>$tangkapTmptlahir,
			'alamat_rumah' =>$tangkapAlamat,
			'no_telp' =>$tangkapNotelp,
			'agama' =>$tangkapAgama,
			'username' =>$tangkapUsername
		);

		$data2 = array('username' =>$tangkapUsername);

		$where = array(
			'nim' => $tangkapNim
		);

		$this->M_Mahasiswa->updateRecord($where,$data,'mahasiswa');
		$this->M_User->updateRecord($where,$data2,'user');
		redirect('Mahasiswa/index');
	}
	
	function hapusData($nim){
		$this->load->model('M_Mahasiswa');
		$where = array('nim' => $nim);

		$this->M_Mahasiswa->hapusRecord($where,'mahasiswa');
		redirect('Mahasiswa/index');
	}
}
?>