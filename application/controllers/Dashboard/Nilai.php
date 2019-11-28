<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Enroll','M_Nilai', 'M_Matakuliah','M_Mahasiswa', 'M_Dosen'));
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
		$data['matkul'] = $this->M_Matakuliah->getMatkulByDosen($this->session->userdata('username'))->result();
		//$data['Nilai'] = $this->M_Nilai->tampilkanRecord()->result();
		$this->head();
		$this->load->view('Dashboard/V_Nilai',$data);
		$this->foot();
	}

	public function viewGrading($matkul, $semester){
		$where = array(
			'id_mata_kuliah' => $matkul,
		);
		$data['nama'] = $this->M_Matakuliah->getRecord($where, 'matakuliah')->row_array();


		$data['mhs'] = $this->M_Mahasiswa->getMhsByMatkul($matkul, $semester)->result();
		$data['count'] = $this->M_Matakuliah->getRecord($where,'matakuliah_nilai')->num_rows();
		$data['kat1'] = $this->M_Nilai->getNilaiMhs(1, $where['id_mata_kuliah'])->row_array();
		$data['kat2'] = $this->M_Nilai->getNilaiMhs(2, $where['id_mata_kuliah'])->row_array();
		$data['kat3'] =	$this->M_Nilai->getNilaiMhs(3, $where['id_mata_kuliah'])->row_array();
		$data['uts'] = $this->M_Nilai->getNilaiMhs(4, $where['id_mata_kuliah'])->row_array();
		$data['uas'] = $this->M_Nilai->getNilaiMhs(5, $where['id_mata_kuliah'])->row_array();
		
		$this->head();
		$this->load->view('Dashboard/V_Grading',$data);
		$this->foot();
	}

	public function lihatInsertData()
	{
		$data['enroll'] = $this->M_Enroll->tampilkanData()->result();
		$data['tugas'] = $this->M_Tugas->tampilkanData()->result();
		$this->load->view('Dashboard/V_inputNilai',$data);
	}

	public function insertData()
	{
		$tangkapIdnilai = $this->input->post('id_nilai');
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapTipenilai = $this->input->post('tipe_nilai');
		$tangkapNilai = $this->input->post('nilai');
		$tangkapIdtugas = $this->input->post('id_tugas');

		$data=array(
			'id_nilai' =>$tangkapIdNilai,
			'id_enroll' =>$tangkapIdmatakuliah,
			'tipe_nilai' =>$tangkapTipenilai,
			'nilai_mahasiswa' =>$tangkapNilai,
			'id_tugas' =>$tangkapIdtugas
		);


		$this->M_Nilai->insertTable('nilai',$data);
		redirect('Nilai');
	}

	function editData($nim) {
		$this->load->model('M_Nilai');
		$where = array('id_nilai' => $id_nilai);
		$data['enroll'] = $this->M_Enroll->tampilkanData()->result();
		$data['tugas'] = $this->M_Tugas->tampilkanData()->result();
		$data['NilaiEdit'] = $this->M_Nilai->editRecord($where,'nilai')->result();
		$this->load->view('Dashboard/V_Edit_Nilai',$data);
	}

	function updateData(){
		$matkul = $this->input->post('id_mata_kuliah');
		
		$where = array(
			'id_mata_kuliah'=>$matkul
		);

		$tangkapIdEnroll = $this->input->post('id_enroll');
		$count = $this->M_Matakuliah->getRecord($where,'matakuliah_nilai')->num_rows();
		
		$baris = $this->M_Nilai->getRecord(['id_enroll' => $tangkapIdEnroll], 'nilai_mhs')->num_rows();
		$tangkapNIM = $this->input->post('nim');
		$tangkapSemester = $this->input->post('id_semester');
		$nilai = $this->input->post('nilai');
		
		
		if($baris == 3){
			$i = 0;
			foreach($nilai as $a){
				$data = array(
					'nilai_mahasiswa' => $a,
				);
				switch ($i){
					case 0 : $indexTipe = 1;break;
					case 1 : $indexTipe = 4;break;
					case 2 : $indexTipe = 5;break;
				}
				$where = array(
					'tipe_nilai' => $indexTipe,
					'id_enroll' => $tangkapIdEnroll,
				);
				$this->M_Nilai->updateRecord($where,$data,'nilai_mhs');
				$i++;
			}
		}else if($baris == 4){
			$i = 0;
			foreach($nilai as $a){
				$data = array(
					'nilai_mahasiswa' => $a,
				);
				switch ($i){
					case 0 : $indexTipe = 1;break;
					case 1 : $indexTipe = 2;break;
					case 2 : $indexTipe = 4;break;
					case 3 : $indexTipe = 5;break;
				}
				$where = array(
					'tipe_nilai' => $indexTipe,
					'id_enroll' => $tangkapIdEnroll,
				);
				$this->M_Nilai->updateRecord($where,$data,'nilai_mhs');
				$i++;
			}
		}
		else{
			$i = 0;
			foreach($nilai as $a){
				$data = array(
					'nilai_mahasiswa' => $a,
				);
				$where = array(
					'tipe_nilai' => (($i == 0) ? 1: ($i == 1) ? 2: ($i == 2) ? 3 : ($i == 3) ? 4 : 5),
					'id_enroll' => $tangkapIdEnroll,
				);
				$this->M_Nilai->updateRecord($where,$data,'nilai_mhs');
				$i++;
			}
		}
		
		
		redirect('Dashboard/Nilai/viewGrading/'.$matkul.'/'.$tangkapSemester);
	}
	
	function hapusData($nim){
		$this->load->model('M_Nilai');
		$where = array('id_nilai' => $id_nilai);

		$this->M_Nilai->hapusRecord($where,'nilai');
		redirect('Nilai');
	}
}
?>