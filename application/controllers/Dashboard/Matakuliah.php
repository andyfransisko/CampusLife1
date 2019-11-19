<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Matakuliah');
	}
	public function index()
	{
		$data['matakuliah']=$this->M_Matakuliah->tampilkanData()->result();
		$this->load->view('V_Matakuliah',$data);
	}

	public function insertData()
	{
		$tangkapIdmatakuliah = $this->input->post('id_mata_kuliah');
		$tangkapNamamatakuliah= $this->input->post('nama_mata_kuliah');
		$tangkapSks = $this->input->post('sks');
		$tangkapIdruangan= $this->input->post('id_ruangan');
		$tangkapIdsemester = $this->input->post('id_semester');

		$data=array(
			'id_mata_kuliah' =>$tangkapIdmatakuliah,
			'nama_mata_kuliah' =>$tangkapNamamatakuliah,
			'sks' =>$tangkapSks,
			'id_ruangan' =>$tangkapIdruangan,
			'id_semester' =>$tangkapIdsemester
		);

		$this->M_Matakuliah->insertTable('matakuliah',$data);
		redirect('Matakuliah/index');
	}

	function editData($id_matakuliah) {
		$this->load->model('M_Matakuliah');
		$where = array('id_matakuliah' => $id_matakuliah);
		$data['MatakuliahEdit'] = $this->M_Matakuliah->editRecord($where,'matakuliah')->result();
	}

	function updateData(){
		$tangkapIdmatakuliah = $this->input->post('id_mata_kuliah');
		$tangkapNamamatakuliah= $this->input->post('nama_mata_kuliah');
		$tangkapSks = $this->input->post('sks');
		$tangkapIdruangan= $this->input->post('id_ruangan');
		$tangkapIdsemester = $this->input->post('id_semester');

		$data=array(
			'id_mata_kuliah' =>$tangkapIdmatakuliah,
			'nama_mata_kuliah' =>$tangkapNamamatakuliah,
			'sks' =>$tangkapSks,
			'id_ruangan' =>$tangkapIdruangan,
			'id_semester' =>$tangkapIdsemester
		);

		$where = array(
			'id_mata_kuliah' => $tangkapIdmatakuliah
		);

		$this->M_Matakuliah->updateRecord($where,$data,'matakuliah');
		redirect('Matakuliah/index');
	}
	
	function hapusData($id_matakuliah){
		$this->load->model('M_Matakuliah');
		$where = array('id_mata_kuliah' => $id_matakuliah);

		$this->M_Matakuliah->hapusRecord($where,'matakuliah');
		redirect('Matakuliah/index');
	}
}
?>