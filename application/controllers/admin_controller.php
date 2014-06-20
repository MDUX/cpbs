<?php
 class Admin_controller extends CI_Controller{
     function __construct() {
         parent::__construct();
         if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('status')!=='admin') {
             redirect('logout');
        }
     }
     function index(){
        
        $this->load->view('admin/admin_view');
       
     }

 function testpdf(){
$this->load->helpers('dompdf','file');
$this->load->view('pages/admin_home',TRUE);
}
 }
