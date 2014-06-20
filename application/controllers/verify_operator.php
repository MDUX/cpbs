<?php
 class Verify_operator extends CI_Controller{
     function __construct() {
         parent::__construct();
          if(!$this->session->userdata('logged_in')){
             redirect('logout');
         }elseif ($this->session->userdata('status')!=='operator') {
             redirect('logout');
        }
     }
     function index(){
        
        $this->load->view('operator/operator_view_home');
        
     }
     function view_operator(){
        $res=  $this->db->get_where('users',array('status'=>'user'));
        if($res->num_rows()>0){
            $data['records']=$res;
            $this->load->view('operator/operator_view',$data);
        }  else {
        $data['warning']='<p class="alert-warning">No records found..!</p>';
        $this->load->view('operator/operator_view',$data);
        }
     }
       function delete_operator($username){
        $res=  $this->db->get_where('users',array('username'=>$username));
        if($res->num_rows()>0){
            $this->db->where('username',$username);
            $this->db->delete('users');
        $data['delete']='<p class="alert-success">Deleted</p>';
        $this->load->view('operator/operator_view',$data);
        }  else {
        $data['warning']='<p class="alert-warning">No records found..!</p>';
        $this->load->view('operator/operator_view',$data);
        }
        
    }
    function password_change(){
        
        $this->load->view('operator/change_password');
        
    }
    function change(){
        $this->load->model('register_form');
        $sn=  $this->session->userdata('username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpd','Current password','trim|required|xss_clean');
        $this->form_validation->set_rules('npd','New password','trim|required|xss_clean');
        $this->form_validation->set_rules('confpd','Confirm password','trim|required|matches[npd]|xss_clean');
        if($this->form_validation->run()===FALSE){
        $this->load->view('operator/change_password');
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
              $this->load->view('operator/change_password',$data);
          }
        }
    }
    function deleteall(){
        $res=  $this->db->get_where('users',array('status'=>'user'));
        if($res->num_rows()>0){
            $this->db->where('status','user');
            $this->db->delete('users');
            $data['delete']='<p class=" alert alert-success">Deleted</p>';
        $this->load->view('operator/operator_view',$data);
        }  else {
        $data['deleted']='<p class="alert alert-danger">No data found</p>';
        $this->load->view('operator/operator_view',$data);
        }
    }
    function manage(){
      $this->load->view('operator/manage_slots');
    }
    function slotAdd(){
        $this->load->view('operator/slots_form');
    }
    function slot_insert(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nsl','Slot name','trim|required|xss_clean');
        $this->form_validation->set_rules('slocation','Location','trim|required|xss_clean');
        $this->form_validation->set_rules('amnt','Amount','trim|required|numeric|min_length[3]|max_length[5]|xss_clean');
        $this->form_validation->set_rules('slotc','Category','trim|required|xss_clean');
         if(isset($_POST['save'])){
        if($this->form_validation->run()===FALSE){
            $this->load->view('operator/slots_form');
        }  else {
            $this->load->model('operator_model');
            $name=  $this->input->post('nsl');
            $location=  $this->input->post('slocation');
            $amount=  $this->input->post('amnt');
            $category=  $this->input->post('slotc');
            $this->operator_model->slotAdd($name,$location,$category,$amount);
            echo'<p class="alert alert-success">Slots added</p>';
            $this->load->view('operator/slots_form');
         }
         }
    }
    function manageparking(){
        $res=  $this->db->get('location');
        if($res->num_rows()>0){
            $data['num']=$res;
            $this->load->view('operator/parking_manage',$data);
        }  else {
           $this->load->view('operator/parking_manage'); 
        }
    }
    function deleteslot($id){
        $res=  $this->db->get_where('location',array('id'=>$id),1);
        if($res->num_rows()===1){
            $this->db->where('id',$id);
            $this->db->delete('location');
            $data['delete']='<p class="alert alert-success"> successifuly deleted</p>';
            $this->load->view('operator/parking_manage',$data); 
            
        }
    }
    function Editparking($id){
        $data['data']=$id;
        $this->load->view('operator/slots_rename',$data);
    }
    function slot_edit($id){
      $this->load->library('form_validation');
        $this->form_validation->set_rules('nsl','Slot name','trim|required|xss_clean');
        $this->form_validation->set_rules('slocation','Location','trim|required|xss_clean');
        $this->form_validation->set_rules('amnt','Amount','trim|required|numeric|min_length[3]|max_length[5]|xss_clean');
        $this->form_validation->set_rules('slotc','Category','trim|required|xss_clean');
         if(isset($_POST['save'])){
        if($this->form_validation->run()===FALSE){
            $this->load->view('operator/slots_rename');
        }  else {
            $this->load->model('operator_model');
            $name=  $this->input->post('nsl');
            $location=  $this->input->post('slocation');
            $amount=  $this->input->post('amnt');
            $category=  $this->input->post('slotc');
            $this->operator_model->slotEdit($id,$name,$location,$category,$amount);
            echo'<p class="alert alert-success">Slots updated</p>';
            $this->load->view('operator/slots_rename');
         }
         }  
    }
 }
        
        
        
        
        
        
       
