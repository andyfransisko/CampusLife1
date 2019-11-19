<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Ruangan');
	}
	public function index()
	{
		$data['ruangan']=$this->M_Ruangan->tampilkanData()->result();
		$this->load->view('V_Ruangan',$data);
	}


	public function insertData()
	{
		$tangkapIdruangan = $this->input->post('id_ruangan');
		$tangkapDetail= $this->input->post('detail_ruangan');
		$tangkapKapasitas = $this->input->post('kapasitas');
		

		$data=array(
			'id_ruangan' =>$tangkapIdruangan,
			'detail_ruangan' =>$tangkapDetail,
			'kapasitas' =>$tangkapKapasitas
		);

		$this->M_Ruangan->insertTable('ruangan',$data);
		redirect('Ruangan/index');
	}

	function editData($id_ruangan) {
		$this->load->model('M_Ruangan');
		$where = array('id_ruangan' => $id_ruangan);
		$data['RuanganEdit'] = $this->M_Ruangan->editRecord($where,'ruangan')->result();
		$this->load->view('V_Edit_Ruangan',$data);
	}

	function updateData(){
		$tangkapIdruangan = $this->input->post('id_ruangan');
		$tangkapDetail= $this->input->post('detail_ruangan');
		$tangkapKapasitas = $this->input->post('kapasitas');
		

		$data=array(
			'id_ruangan' =>$tangkapIdruangan,
			'detail_ruangan' =>$tangkapDetail,
			'kapasitas' =>$tangkapKapasitas
		);

		$where = array(
			'id_ruangan' => $tangkapIdruangan
		);

		$this->M_Ruangan->updateRecord($where,$data,'ruangan');
		redirect('Ruangan/index');
	}
	
	function hapusData($id_ruangan){
		$this->load->model('M_Ruangan');
		$where = array('id_ruangan' => $id_ruangan);

		$this->M_Ruangan->hapusRecord($where,'ruangan');
		redirect('Ruangan/index');
	}
}
?>