<?php  

class Materi extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->model('M_Matakuliah');
		$this->load->model('M_Materi');
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

    function index(){
        //$data['materi'] = $this->M_Jadwalcustom->tampilkanRecord()->result();
        $data['count'] = $this->M_Materi->tampilkanData()->num_rows();
        $data['matkul'] = $this->M_Matakuliah->getMatkulByDosen($this->session->userdata('username'))->result();
        $this->head();
		$this->load->view('Dashboard/V_Matakuliah_Materi',$data);
		$this->foot();
	}

	function viewMateri($id_matkul){
		$data['count'] = $this->M_Materi->tampilkanData()->num_rows();
		$data['matkul'] = $this->M_Matakuliah->getAllMatkulCond(['id_mata_kuliah'=>$id_matkul])->row_array();
		$data['materi'] = $this->M_Materi->getRecord(['id_mata_kuliah' => $id_matkul],'materi')->result();
        $this->head();
		$this->load->view('Dashboard/V_Materi',$data);
		$this->foot();
	}
	public function insertData()
	{
		$tangkapIdmateri = $this->input->post('id_materi');
		$tangkapIdmatakuliah= $this->input->post('id_mata_kuliah');
		$tangkapJudulmateri = $this->input->post('judul_materi');
		$tangkapPenjelasanmateri = $this->input->post('penjelasan_materi');
		$tangkapKalipertemuan = $this->input->post('kali_pertemuan');
		//$tangkapDirektorifile = $this->_uploadFile($tangkapJudulmateri);
		

		$data=array(
			'id_materi' => $tangkapIdmateri,
			'id_mata_kuliah' => $tangkapIdmatakuliah,
			'judul_materi' => $tangkapJudulmateri,
			'penjelasan_materi' => $tangkapPenjelasanmateri,
			'kali_pertemuan' => $tangkapKalipertemuan,
			'direktori_file' => $tangkapDirektorifile
		);

		$this->M_Materi->insertTable('materi',$data);
		redirect('Dashboard/Materi');
	}

	/*private function _uploadFile($judul){
		if (!is_dir('./materi/dosen/'.$this->session->userdata('username').'/')) {
			mkdir('./materi/dosen/'.$this->session->userdata('username'), 0777, TRUE);
		
		}
		$config['upload_path']          = './materi/dosen/'.$this->session->userdata('username').'/';
		$config['allowed_types']        = 'docx|pptx|pdf';
		$config['file_name']            = $judul;
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->_uploadFile('direktori_file'))
		{
				$error = array('error' => $this->upload->display_errors());

				redirect('Dashboard/Materi');
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());

				return $config['file_name'];
		}
		
	}
	*/
	public function updateData(){
		$tangkapIdmateri = $this->input->post('id_materi');
		$tangkapIdmatakuliah= $this->input->post('id_mata_kuliah');
		$tangkapJudulmateri = $this->input->post('judul_materi');
		$tangkapPenjelasanmateri = $this->input->post('penjelasan_materi');
		$tangkapKalipertemuan = $this->input->post('kali_pertemuan');
		//$tangkapDirektorifile = $this->_uploadFile();
		

		$data=array(
			'judul_materi' => $tangkapJudulmateri,
			'penjelasan_materi' => $tangkapPenjelasanmateri,
			'direktori_file' => $tangkapDirektorifile
		);

		$where = array(
			'id_materi'=>$tangkapIdmateri,
			'kali_pertemuan' => $tangkapKalipertemuan,
		);

		$this->M_Materi->updateRecord($where,$data, 'materi');
		redirect('Dashboard/Materi/viewMateri/'.$tangkapIdmatakuliah);
	}
}










?>