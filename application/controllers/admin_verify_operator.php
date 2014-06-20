<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_verify_operator extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('html', 'url','form');
    }
    
    function index(){
        $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]|xss_clean');
        $this->form_validation->set_rules('email','email','trim|required|is_unique[users.email]|xss_clean');
        $this->form_validation->set_rules('phonenumber','phonenumber','trim|required|is_unique[users.phonenumber]|alpha_numeric|exact_length[10]|xss_clean');
        $this->form_validation->set_rules('password','password','trim|required|xss_clean');
        $this->form_validation->set_rules('password2','confirm password','trim|required|matches[password]|xss_clean');
        
        if($this->form_validation->run()===FALSE){
        $this->load->view('admin/admin_add');
        }else {
            $this->load->model('admin_register_operator');
            $username=  $this->input->post('username');
            $email=  $this->input->post('email');
            $phonenumber=  $this->input->post('phonenumber');
            $password=  $this->input->post('password');
            $status=  $this->input->post('myselect');
            $this->admin_register_operator->index($username,$email,$phonenumber,$password,$status);
            
            //Sms notification to the registered Operator.
            $gatewayURL = 'http://localhost:9333/ozeki?';
            $request = 'login=admin';
            $request .= '&password=abc123';
            $request .= '&action=sendMessage';
            $request .= '&messageType=GSMSMS';
            $request .= '&recepient='.urlencode($phonenumber);
            $request .= '&messageData='.urlencode
            ("Hello". $username. "Welcome at CPBS,Your password is" .$password . ",
            email is ".$email ."You can login using email or username and your password");
            $url = $gatewayURL . $request;
            //Open the URL to send the message
            file($url);
            
            $data['sms']='<p class="alert alert-success">Successifully added</p>';
            $this->load->view('admin/admin_add',$data);
 }
    }
}