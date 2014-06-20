<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_register_operator extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('html', 'url','form');
    }
    
    function index($username,$email,$phonenumber,$password,$status){
        
        $array=array(
            'username'=>$username,
            'email'=>$email,
            'phonenumber'=>$phonenumber,
            'password'=>$password,
            'status'=>$status
        );
        $this->db->insert('users',$array);
    }
}