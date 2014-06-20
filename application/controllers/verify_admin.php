<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Verify_admin extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url','form','html');
        $this->load->library('form_validation');
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('status')!=='admin') {
            redirect('logout');
        }
    }
    function index(){
        $this->load->view('admin/admin_add');
        
    }
    function view_operator(){
        $res=  $this->db->get_where('users',array('status'=>'operator'));
        if($res->num_rows()>0){
            $data['records']=$res;
            
            $this->load->view('admin/admin_view_user',$data);
             
        }  else {
        $data['warning']='<p class="alert-warning">No records found..!</p>';
         $this->load->view('admin/admin_view_user',$data);
        }
    }
    function delete_operator($username){
        $res=  $this->db->get_where('users',array('username'=>$username));
        if($res->num_rows()>0){
            $this->db->where('username',$username);
            $this->db->delete('users');
           $data['delete']='<p class="alert-success">Deleted</p>';
           $this->load->view('admin/admin_view_user',$data);
         }  else {
         $data['warning']='<p class="alert-warning">No records found..!</p>';
         $this->load->view('admin/admin_view_user',$data);
        }
        
    }
    function admin_user(){
        $res=  $this->db->get_where('users',array('status'=>'user'));
        if($res->num_rows()>0){
            $data['view']=$res;
            $this->load->view('admin/admin_user',$data);
        }else{
            $data['nouser']='<p class="alert alert-warning">No records found</p>';
            $this->load->view('admin/admin_user',$data);
        }
    }
}