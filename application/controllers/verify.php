<?php
class Verify extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url','form','html');
        $this->load->library('form_validation');
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('status')!=='user') {
             redirect('logout');
        }
    }
    function index(){
        $this->load->view('users/user_home');
    }
    function user_add(){
       /* $config['smtp_host']="";
        $config['smtp_user']="tuzoengelbert@gmail.com";
        $config['smtp_pass']="";
        $this->load->library('email',$config);
       */


        $this->form_validation->set_rules('plateno','Plate Number','trim|required|alpha_numeric|exact_length[8]|xss_clean');
        $this->form_validation->set_rules('myselect','Select day','trim|required|xss_clean');
        if($this->form_validation->run()===FALSE){
        $this->load->view('users/user_home_slot');
        
        }  else {
            $this->load->model('book');
            /* $this->email->from('cpbs@gmail.com','CPBS TEAM');
             $this->email->to(set_value('em'));
             $this->email->subject('PASSWORD RECOVERY');
             $htnl=""
             $this->email->message($htnl);
             $this->email->send();
             */
            $sn=  $this->session->userdata('username');
            $plate_number=  $this->input->post('plateno');
            $day=  $this->input->post('myselect');
            $this->book->add_book($sn,$plate_number,$day);
            $data['success']='<p class="alert alert-success">Well posted</p>';
         $this->load->view('users/user_home_slot',$data);
        }
    }
    function change(){
        $this->load->model('register_form');
        $sn=  $this->session->userdata('username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpd','Current password','trim|required|xss_clean');
        $this->form_validation->set_rules('npd','New password','trim|required|xss_clean');
        $this->form_validation->set_rules('confpd','Confirm password','trim|required|matches[npd]|xss_clean');
        if($this->form_validation->run()===FALSE){
        $this->load->view('users/change_password');
        }else{
        $current_pass=  $this->input->post('cpd');
        $new_password=  $this->input->post('npd');
        $res=  $this->db->get_where('users',array('username'=>$sn,'password'=>$current_pass),1);
          if($res->num_rows()===1){
              $this->db->where('username',$sn);
              $this->db->update('users',array('password'=>$new_password));
              $data['sms']='<p class="alert alert-success">Password successifully changed</p>';
              $this->load->view('users/change_password',$data); 
          }  else {
              $data['smz']='<p class="alert alert-danger">Invalid current password</p>';
              $this->load->view('users/change_password',$data);
          }
        }
    }
}