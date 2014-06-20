<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Login extends CI_controller{
    function __construct() {
         parent::__construct();
         $this->load->helper('url','form','html');
         $this->load->library('form_validation');
}
    
        public function index(){
        $this->form_validation->set_rules('username','username or email','trim|required|xss_clean');
        $this->form_validation->set_rules('password','password','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE){
        $this->load->view('pages/login');

        }else
        {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $res=  $this->db->get_where('users',array('email'=>$username,'password'=>$password));
        $res2= $this->db->get_where('users', array('username'=>$username,'password'=>$password),1);
          $row2=$res2->row();
           if ($res2->num_rows()===1){
             $sess_data=array(
               'username'=>$username,
               'email'=>$row2->email,
               'logged_in'=>TRUE              
           );
           $this->session->set_userdata($sess_data);
           $this->ok($username);
        }elseif ($res->num_rows()===1) {
                $row=$res->row();
                $sess_data=array(
                    'username'=>$row->username,
                    'email'=>$username,
                    'logged_in'=>TRUE
                );
                $this->session->set_userdata($sess_data);
                $this->ok($username);
            }
          else {
     //if not successfully logged in.
            $data['nouser']='<p>Username or Password is incorrect</p>';
            $this->load->view('pages/login',$data);

     }
        
  }
        }
function ok($username){
    $res=  $this->db->get_where('users',array('username'=>$username,'status'=>'admin'));
    $res1= $this->db->get_where('users',array('email'=>$username,'status'=>'admin'));
    $res2=  $this->db->get_where('users',array('username'=>$username,'status'=>'user'));
    $res3= $this->db->get_where('users',array('email'=>$username,'status'=>'user'));
    $res4=  $this->db->get_where('users',array('username'=>$username,'status'=>'operator'));
    $res5= $this->db->get_where('users',array('email'=>$username,'status'=>'operator'));
    if($res->num_rows()===1){
        $ses=array('status'=>'admin');
        $this->session->set_userdata($ses);
        redirect('admin_controller');
    }elseif ($res1->num_rows()===1) {
        $ses=array('status'=>'admin');
        $this->session->set_userdata($ses);
        redirect('admin_controller');
      }elseif($res2->num_rows()===1) {
        $ses=array('status'=>'user');
        $this->session->set_userdata($ses);
        redirect('verify');
      }elseif($res3->num_rows()===1) {
        $ses=array('status'=>'user');
        $this->session->set_userdata($ses);
        redirect('verify');
     }elseif($res4->num_rows()===1) {
        $ses=array('status'=>'operator');
        $this->session->set_userdata($ses);
         redirect('verify_operator');
     }elseif($res5->num_rows()===1) {
        $ses=array('status'=>'operator');
        $this->session->set_userdata($ses);
        redirect('verify_operator');
}
}
}