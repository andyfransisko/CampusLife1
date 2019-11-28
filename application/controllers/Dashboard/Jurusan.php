<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Jurusan','M_Admin'));
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
		$data['jurusan']=$this->M_Jurusan->tampilkanData()->result();
		$data['count']=$this->M_Jurusan->tampilkanData()->num_rows();
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
		redirect('Dashboard/Jurusan/index');
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
		redirect('Dashboard/Jurusan/index');
	}
	
	function hapusData($id_jurusan){
		$this->load->model('M_Jurusan');
		$where = array('id_jurusan' => $id_jurusan);

		$this->M_Jurusan->hapusRecord($where,'jurusan');
		redirect('Dashboard/Jurusan/index');
	}

	function exportPDF()
	{
		$data['jurusan']=$this->M_Jurusan->tampilkanData()->result();
		$this->load->view('Dashboard/E_Jurusan',$data);
	}
}
?>