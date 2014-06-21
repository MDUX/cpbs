<?php

class Pages extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url','form','html');
        $this->load->library('form_validation');
    }


    function index(){
        
    $this->load->view('pages/login');
    }
    
    function view(){
       $this->form_validation->set_rules('username','Username','trim|required|is_unique[users.username]|xss_clean');
       $this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|is_unique[users.email]');
       $this->form_validation->set_rules('phonenumber','Phone Number','trim|required|is_unique[users.phonenumber]|exact_length[10]|xss_clean|numeric');
       $this->form_validation->set_rules('password','Password','trim|required|matches[password2]|min_lentgh[5]|max_length[8]|xss_clean');
       $this->form_validation->set_rules('password2','password2','trim|required|xss_clean');
       if($this->form_validation->run()===FALSE){
           $this->load->view('pages/register_view');
       }else{
       $this->load->model('register_form');
       $username=  $this->input->post('username');
       $email=  $this->input->post('email');
       $phonenumber=  $this->input->post('phonenumber');
       $password=  $this->input->post('password');
       $this->register_form->insert($username,$email,$phonenumber,$password);
       $data['smg']=$username;
       $this->load->view('pages/wellcome',$data);
       
       //Sms notification to the registered Operator.
       $gatewayURL = 'http://localhost:9333/ozeki?';
       $request = 'login=admin';
       $request .= '&password=abc123';
       $request .= '&action=sendMessage';
       $request .= '&messageType=GSMSMS';
       $request .= '&recepient='.urlencode($phonenumber);
       $request .= '&messageData='.urlencode
            ("Hello". $username. "Welcome at CPBS,Your password is" .$password . ",
            email is ".$email ."You can login using email or username");
       $url = $gatewayURL . $request;
       //Open the URL to send the message
       file($url);
       }
    }
    function register_view(){
       $this->load->view('pages/register_view');
       
    }
    
}
