<?php 
if($this->session->userdata('username') == null){
    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center p-t-25 p-b-50" role="alert">Unauthorized Access!<br> Please Login First!</div>');
    redirect('Login');
}




?>