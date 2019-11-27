<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Dosen','M_Mahasiswa','M_User','M_Matakuliah','M_Semester'));
	}
	public function index()
	{
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanRecord()->result();
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/index-css');
		$this->load->view('Dashboard/Template/head-close');
		$this->load->view('Dashboard/Template/left');
		$this->load->view('Dashboard/index',$data);
		$this->load->view('Dashboard/Template/index-js');
		$this->load->view('Dashboard/Template/body-close');
		$data['hitungmahasiswa'] = $this->M_Mahasiswa->hitungJumlahMahasiswa();
	}
	public function Activating($username)
	{
		$data = ['status'=>'1'];
		$this->db->where('username',$username);
		$this->db->update('user',$data);
		redirect('Dashboard/Welcome');
	}
}
