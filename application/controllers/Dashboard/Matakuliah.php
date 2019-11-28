<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model('M_Matakuliah');
		$this->load->model('M_Semester');
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
		$data['matakuliah']=$this->M_Matakuliah->tampilkanRecord()->result();
		$data['semester']=$this->M_Semester->tampilkanData()->result();
		$data['count']=$this->M_Matakuliah->tampilkanData()->num_rows();
		$this->head();
		$this->load->view('Dashboard/V_Matakuliah',$data);
		$this->foot();
	}

	public function insertData()
	{
		$tangkapIdmatakuliah = $this->input->post('id_mata_kuliah');
		$tangkapNamamatakuliah= $this->input->post('nama_mata_kuliah');
		$tangkapSks = $this->input->post('sks');
		$tangkapIdsemester = $this->input->post('id_semester');
		$tangkapJumlahPenilaian = $this->input->post('nilai');

		$data=array(
			'id_mata_kuliah' =>$tangkapIdmatakuliah,
			'nama_mata_kuliah' =>$tangkapNamamatakuliah,
			'sks' =>$tangkapSks,
			'id_semester' => $tangkapIdsemester,
			'jumlah_penilaian' => count($tangkapJumlahPenilaian)
		);

		$this->M_Matakuliah->insertTable('matakuliah',$data);

		foreach($tangkapJumlahPenilaian as $a){
			$data2 = array(
				'id_nilai'			=>	count($this->M_Matakuliah->getAllNilaiMatkul()->result())+1,
				'id_mata_kuliah'	=> 	$tangkapIdmatakuliah,
				'id_tipe_nilai'		=> 	$a,
			);

			$this->M_Matakuliah->insertTable('matakuliah_nilai',$data2);
		}

		$this->load->model('M_Materi');
		$baris_materi = $this->M_Materi->tampilkanData()->num_rows();
		for($i = 1; $i <= 16; $i++){
			$data3 = array(
				'id_materi'			=> 	'MTR-'.($baris_materi+$i),
				'id_mata_kuliah'	=> 	$tangkapIdmatakuliah,
				'judul_materi'		=> 	'Ini Adalah Judul Materi',
				'penjelasan_materi'	=> 	'Ini Adalah Penjelasan Materi',
				'kali_pertemuan'	=> 	$i,
				'direktori_file'	=> 	'',
			);

			$this->M_Matakuliah->insertTable('materi',$data3);
		}
		redirect('Dashboard/Matakuliah/index');
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
		$tangkapJumlahPenilaian = $this->input->post('nilai');

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

		$baris = $this->M_Matakuliah->getRecord($where,'matakuliah_nilai')->num_rows();

		if(count($tangkapJumlahPenilaian) == 3){//berkurang tipe penilaian barunya, bisa dari 4 atau 5
			if($baris == 4){
				$where2 = array(
					'id_mata_kuliah' => $tangkapIdmatakuliah,
					'id_tipe_nilai' => 2,
				);
				$this->M_Matakuliah->hapusRecord($where2, 'matakuliah_nilai');
			}
			else{
				for($i = 2; $i <= 3; $i++){
					$where2 = array(
						'id_mata_kuliah' => $tangkapIdmatakuliah,
						'id_tipe_nilai' => $i,
					);
					$this->M_Matakuliah->hapusRecord($where2, 'matakuliah_nilai');
				}
			}
		}
		else if(count($tangkapJumlahPenilaian) == 4){//bisa berkurang atau bertambah tipe penilaian barunya
			if($baris < count($tangkapJumlahPenilaian)){
				$where2 = array(
					'id_mata_kuliah' => $tangkapIdmatakuliah,
					'id_tipe_nilai' => 2,
				);
				$this->M_Matakuliah->insertTable('matakuliah_nilai', $where2 );
			}else{
				$where2 = array(
					'id_mata_kuliah' => $tangkapIdmatakuliah,
					'id_tipe_nilai' => 3,
				);
				$this->M_Matakuliah->hapusRecord($where2, 'matakuliah_nilai');
			}
		}else{//bertambah tipe penilaian barunya
			for($i = 2; $i <= 3; $i++){
				$where2 = array(
					'id_mata_kuliah' => $tangkapIdmatakuliah,
					'id_tipe_nilai' => $i,
				);
				$this->M_Matakuliah->insertTable('matakuliah_nilai', $where2);
			}
		}
		redirect('Dashboard/Matakuliah/index');
	}
	
	function hapusData($id_matakuliah){
		$this->load->model('M_Matakuliah');
		$where = array('id_mata_kuliah' => $id_matakuliah);

		$this->M_Matakuliah->hapusRecord($where,'matakuliah');
		redirect('Dashboard/Matakuliah/index');
	}

	function exportPDF()
	{
		$data['matakuliah']=$this->M_Matakuliah->tampilkanRecord()->result();
		$data['semester']=$this->M_Semester->tampilkanData()->result();
		$data['count']=$this->M_Matakuliah->tampilkanData()->num_rows();
		$this->load->view('Dashboard/E_Matakuliah',$data);
	}
}
?>