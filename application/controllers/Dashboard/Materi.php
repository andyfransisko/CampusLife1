<?php  

class Materi extends CI_Controller
{
    function __construct(){
        parent::__construct();
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

    function index(){
        //$data['materi'] = $this->M_Jadwalcustom->tampilkanRecord()->result();
        $data ="";
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
		$tangkapDirektorifile = $this->input->post('direktori_file');
		

		$data=array(
			'id_materi' => $tangkapIdmateri,
			'id_mata_kuliah' => $tangkapIdmatakuliah,
			'judul_materi' => $tangkapJudulmateri,
			'penjelasan_materi' => $tangkapPenjelasanmateri,
			'kali_pertemuan' => $tangkapKalipertemuan,
			'direktori_file' => $tangkapDirektorifile
		);

		$this->M_Materi->insertTable('materi',$data);
		redirect('Ruangan/index');
	}
}










?>