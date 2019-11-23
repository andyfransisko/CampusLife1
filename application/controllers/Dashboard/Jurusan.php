<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Jurusan');
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
		$data['jurusan']=$this->M_Jurusan->tampilkanData()->result();
		$this->head();
		$this->load->view('Dashboard/V_Jurusan',$data);
		$this->foot();
	}


	public function insertData()
	{
		$tangkapIdjurusan = $this->input->post('id_jurusan');
		$tangkapNamajurusan= $this->input->post('nama_jurusan');
		$tangkapKeteranganjurusan = $this->input->post('keterangan_jurusan');
		

		$data=array(
			'id_jurusan' =>$tangkapIdjurusan,
			'nama_jurusan' =>$tangkapNamajurusan,
			'keterangan_jurusan' =>$tangkapKeteranganjurusan
		);

		$this->M_Jurusan->insertTable('jurusan',$data);
		redirect('Jurusan/index');
	}

	function editData($id_jurusan) {
		$this->load->model('M_Jurusan');
		$where = array('id_jurusan' => $id_jurusan);
		$data['JurusanEdit'] = $this->M_Jurusan->editRecord($where,'Jurusan')->result();
		$this->load->view('Dashboard/V_Edit_Jurusan',$data);
	}

	function updateData(){
		$tangkapIdjurusan = $this->input->post('id_jurusan');
		$tangkapNamajurusan= $this->input->post('nama_jurusan');
		$tangkapKeteranganjurusan = $this->input->post('keterangan_jurusan');
		

		$data=array(
			'id_jurusan' =>$tangkapIdjurusan,
			'nama_jurusan' =>$tangkapNamajurusan,
			'keterangan_jurusan' =>$tangkapKeteranganjurusan
		);

		$where = array(
			'id_jurusan' => $tangkapIdjurusan
		);

		$this->M_Jurusan->updateRecord($where,$data,'jurusan');
		redirect('Jurusan/index');
	}
	
	function hapusData($id_jurusan){
		$this->load->model('M_Jurusan');
		$where = array('id_jurusan' => $id_jurusan);

		$this->M_Jurusan->hapusRecord($where,'jurusan');
		redirect('Jurusan/index');
	}
}
?>