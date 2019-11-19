<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Admin');
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
		$data['admin']=$this->M_Admin->tampilkanData()->result();
		$this->head();
		$this->load->view('V_Admin',$data);
		$this->foot();
	}

	public function insertData()
	{
		$tangkapIdadmin = $this->input->post('id_admin');
		$tangkapNamaadmin = $this->input->post('nama_admin');
		$tangkapKeterangan = $this->input->post('keterangan');
		
		

		$data=array(

			'id_admin' => $tangkapIdadmin,
			'nama_admin' => $tangkapNamaadmin,
			'keterangan' => $tangkapKeterangan
			
		);

		$this->M_Admin->insertTable('admin',$data);
		redirect('Admin/index');
	}

	function editData() {
		$id_admin = $this->input->post('id_admin');
		$listAdmin = $this->M_Admin->get_record_ajax($id_admin);
		print_r($listAdmin);
		foreach($listAdmin->result() as $a)
		{
			$abc = array(
				'nama_admin' => $a->nama_admin,
				'keterangan' => $a->keterangan,
			);
		}
		echo json_encode($abc);
	}

	function updateData(){
		$tangkapIdadmin = $this->input->post('id_admin');
		$tangkapNamaadmin= $this->input->post('nama_admin');
		$tangkapKeterangan = $this->input->post('keterangan');
		
		

		$data=array(
			'id_admin' =>$tangkapIdadmin,
			'nama_admin' =>$tangkapNamaadmin,
			'keterangan' =>$tangkapKeterangan,
			
		);


		$where = array(
			'id_admin' => $tangkapIdadmin
		);

		$this->M_Admin->updateRecord($where,$data,'admin');
		redirect('Admin/index');
	}
	
	function hapusData($id_admin){
		$this->load->model('M_Admin');
		$where = array('id_admin' => $id_admin);

		$this->M_Admin->hapusRecord($where,'admin');
		redirect('Admin/index');
	}
}
?>