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
        $data = $this->;
        $this->head();
		$this->load->view('Dashboard/V_Materi',$data);
		$this->foot();
    }
}










?>