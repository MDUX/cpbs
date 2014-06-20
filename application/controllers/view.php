<?php

class View extends CI_Controller{
    function pages(){
        $data['title']= 'CPBS';
        $this->load->view('template/head',$data );
        $this->load->view('template/main');
        $this->load->model('User_list');
        $data['records']=$this->User_list->get_users();
        $this->load->view('pages/wellcome');
        $this->load->view('template/foot');
    }
    
}
?>
