<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enroll extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this->load->model(array('M_Matakuliah','M_Enroll','M_Semester','M_Mahasiswa'));
	}
	
	public function head(){
		//$this->load->view('Dashboard/Template/bouncer');
		$this->load->view('Dashboard/Template/head-open');
		$this->load->view('Dashboard/Template/css');
		$this->load->view('Dashboard/Template/head-close');
		$this->load->view('Dashboard/Template/left');
	}
	
	public function foot(){
		$this->load->view('Dashboard/Template/js');
		// $this->load->view('Dashboard/Template/enroll-script');
		$this->load->view('Dashboard/Template/body-close');

	}

	public function index()
	{
		$data['title'] = "Enroll - Campus Life";

        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        }

        //$data['matkul'] = $this->M_Enroll->getMatkulEnroll(date('Y'), $date)->result();
        $data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
        $data['tahun'] = $this->M_Semester->tampilkanData()->result();
		
		$this->head();
		$this->load->view('Dashboard/V_Enroll',$data);
		$this->foot();
	}

	public function getEnrollByAjax(){
        $id_semester = $this->input->post('id_semester');

        $enrollList = $this->M_Enroll->getMatkulEnroll($id_semester)->result_array();

		
		if(count($enrollList) > 0){
			$response['status'] = true;
			$i=0;
			foreach($enrollList as $a){
				$response['message']['no'] = $i+1;
				$response['message']['namaMatkul'] = $a['nama_mata_kuliah'];
				$response['message']['jumlahMhs'] = $a['jumlah_mahasiswa'];
				$response['message']['idSemester'] = $a['id_semester'];
				$response['message']['idMatkul'] = $a['id_mata_kuliah'];
				$i++;
			}
			$response['count'] = count($enrollList);
		}
		else{
			$response['status'] = false;
		}

        echo json_encode($response);
	}
	
	public function enroll($semester, $matkul){
        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        } 
        

        $data['title'] = "Enroll - Campus Life";
        $data['mahasiswa'] = $this->M_Mahasiswa->tampilkanRecord()->result();
		
		$tangkapSemester = $semester;
		$tangkapMatkul = $matkul;
        $where = [
			'id_mata_kuliah' => $tangkapMatkul,
			'id_semester' 	 => $tangkapSemester
		];
        $data['mhs_enrolled'] = $this->M_Enroll->getMahasiswaEnroll($where['id_mata_kuliah'], $where['id_semester'])->result();
        $data['matkul_enrolled'] = $this->M_Matakuliah->getMatkulBySemester($where['id_mata_kuliah'], $where['id_semester'])->row_array();
        $data['enrolled'] = $this->M_Enroll->getAllEnrollCond($where)->row_array();
        $data['matkul'] = $this->M_Matakuliah->getAllMatkulCond($where)->row_array();
        $data['id'] = $matkul;
		$this->head();
		$this->load->view('Dashboard/V_Enroll_Matkul', $data);
		$this->foot();
    }
	
	
	public function lihatInsertData()
	{
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['semester'] = $this->M_Semester->tampilkanData()->result();
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$this->load->view('V_inputEnroll',$data);
	}

	public function insertData(){
        
        
        $id_enroll = htmlspecialchars($this->input->post('id_enroll'));
        $id_matkul = htmlspecialchars($this->input->post('id_mata_kuliah'));
        $mahasiswa = $this->input->post('mahasiswa');
        $id_semester = htmlspecialchars($this->input->post('id_semester'));

        foreach($mahasiswa as $a){
            $data = array(
                'id_enroll' =>$id_enroll,
                'id_mata_kuliah' =>$id_matkul,
                'nim' =>$a,
                'id_semester' =>$id_semester,
            );
            $this->M_Enroll->insertTable('enroll', $data);
		}
		redirect('Dashboard/Enroll/enroll/'.$id_semester.'/'.$id_matkul);
		
    }

	function editData($nim) {
		$this->load->model('M_Enroll');
		$where = array('id_enroll' => $id_enroll);
		$data['mahasiswa'] = $this->M_Mahasiswa->tampilkanData()->result();
		$data['semester'] = $this->M_Semester->tampilkanData()->result();
		$data['matakuliah'] = $this->M_Matakuliah->tampilkanData()->result();
		$data['EnrollEdit'] = $this->M_Enroll->editRecord($where,'enroll')->result();
		$this->load->view('V_Edit_Enroll',$data);
	}

	function updateData(){
		$tangkapIdenroll = $this->input->post('id_enroll');
		$tangkapIdmatakuliah= $this->input->post('id_matakuliah');
		$tangkapNim = $this->input->post('nim');
		$tangkapIdsemester = $this->input->post('id_semester');

		$data=array(
			'nim' =>$tangkapNim,
			'id_enroll' =>$tangkapIdenroll,
			'id_matakuliah' =>$tangkapIdmatakuliah,
			'id_semester' =>$tangkapIdsemester
		);

		$where = array(
			'id_enroll' => $tangkapIdenroll
		);

		$this->M_Enroll->updateRecord($where,$data,'enroll');
		redirect('Enroll');
	}
	
	function hapusData(){
		$id_enroll = htmlspecialchars($this->input->post('id_enroll'));
        $id_matkul = htmlspecialchars($this->input->post('id_mata_kuliah'));
        $mahasiswa = $this->input->post('mahasiswa');
        $id_semester = htmlspecialchars($this->input->post('id_semester'));

		
        foreach($mahasiswa as $a){
			$where = array(
				'id_enroll' => $a,
			);
            $this->M_Enroll->hapusRecord($where, 'enroll');
		}
		redirect('Dashboard/Enroll/enroll/'.$id_semester.'/'.$id_matkul);
	}
}
?>