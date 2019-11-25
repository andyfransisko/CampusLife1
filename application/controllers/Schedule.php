<?php 
class Schedule extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Jadwalkuliah');
        $this->load->model('M_Jadwalcustom');

    }

    private function head(){
        $this->load->view('LandingPage/Template/html-open');
        $this->load->view('LandingPage/Template/head-open');
        $data['title'] = "Schedule";
        $this->load->view('LandingPage/Template/template-header', $data);
        //$this->load->view('Template/schedule-css');
        //$this->load->view('Template/timeline-css');
        $this->load->view('LandingPage/Template/new');
        $this->load->view('LandingPage/Template/head-close');
        $this->load->view('LandingPage/Template/body-open');
        
    }

    private function foot(){
        $this->load->view('LandingPage/Template/preloader');
        $this->load->view('LandingPage/Template/footer');
        $this->load->view('LandingPage/Template/template-footer');
        //$this->load->view('Schedule/calendar-script');
        $this->load->view('LandingPage/Template/body-close');
        $this->load->view('LandingPage/Template/html-close');
        
    }

    public function index()
    {
        if(intval(date('m')) < 5){
            $date = 2;
        }
        else if(intval(date('m')) >= 5 && intval(date('m')) < 8){
            $date = 3;
        }
        else{
            $date = 1;
        } 
        $data['nav'] = "Schedule";
        $data['jadwal'] = $this->M_Jadwalkuliah->getJadwal($this->session->userdata('username'), date('Y'), $date)->result();
        $data['jadwal_custom'] = $this->M_Jadwalcustom->getJadwal($this->session->userdata('username'))->result();
        $this->head();
        $this->load->view('LandingPage/Template/nav', $data );
        $this->load->view("LandingPage/Schedule/V_schedule", $data);
        $this->foot();

    }

    public function addCustomJadwal(){
        $mulai = htmlspecialchars($this->input->post('jam_mulai').":00");
        $selesai = htmlspecialchars($this->input->post('jam_selesai').":00");



        $baris = $this->M_Jadwalcustom->tampilkanData()->num_rows();
        $idJadwal = "JDL-CUS-".($baris+1);
        $user_id = $this->session->userdata('username');
        $namaAcara = htmlspecialchars($this->input->post('eventName'));
        $tanggal = date('Y-m-d', strtotime(htmlspecialchars($this->input->post('date'))));
        $jam_mulai = date('H:i:s', strtotime($mulai));
        $jam_selesai = date('H:i:', strtotime($selesai));
        $tempat = htmlspecialchars($this->input->post('tempat'));
        $tipe_kegiatan = htmlspecialchars($this->input->post('tags'));
        
        $data = array(
            'id_jadwal' => $idJadwal,
            'user_id' => $user_id,
            'nama_kegiatan' => $namaAcara,
            'tipe_kegiatan' => $tipe_kegiatan,
            'tanggal' => $tanggal,
            'jam_mulai' => $jam_mulai,
            'jam_selesai' => $jam_selesai,
            'tempat' => $tempat,
        );
        
        //var_dump($data);
        $this->M_Jadwalcustom->insertTable('jadwal_custom', $data);
        redirect('Schedule');

    }


}










?>