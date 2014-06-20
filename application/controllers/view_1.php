<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View_1 extends CI_Controller{
    function pages_1(){
        $data['title']='CPBS';
        $this->load->view('template/head',$data );
        $this->load->view('template/main');
        $this->load->model('User_list');
        $data['records']=$this->User_list->get_users();
        $this->load->view('pages/demo');
        $this->load->view('template/foot');
    }
    
}
