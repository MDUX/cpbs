<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_home extends CI_Controller{
     function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }
        }
    function home($page='demo'){
        $data['title']= ucfirst($page);
        $this->load->view('template/head',$data );
        $this->load->view('template/main');
        $this->load->view('pages/user_home', $data);
        $this->load->view('template/foot');
    }
    
    function reserve($page='cpbs'){
        $data['title']= ucfirst($page);
        $this->load->view('template/head',$data );
        $this->load->view('template/main');
        $this->load->view('pages/user_home1', $data);
        $this->load->view('template/foot');
    }
    
}

