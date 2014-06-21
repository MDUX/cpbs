<?php
 class Admin_verify_user extends CI_Controller{
     function __construct() {
         parent::__construct();
          if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('status')!=='user') {
             redirect('logout');
        }
     }
     
    function password_change(){
        
        $this->load->view('users/change_password');  
    }
    
    function change(){
        $this->load->model('register_form');
        $sn=  $this->session->userdata('username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpd','Current password','trim|min_length[5|max_lenth[8]|required|xss_clean');
        $this->form_validation->set_rules('npd','New password','trim|min_length[5|max_lenth[8]|required|xss_clean');
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
              $this->load->view('operator/change_password',$data);
          }  else {
              $data['smz']='<p class="alert alert-danger">Invalid current password</p>';
              $this->load->view('users/change_password',$data);
          }
        }
    }

 }