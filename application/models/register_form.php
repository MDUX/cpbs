<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register_form extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function insert($username,$email,$phonenumber,$password){
            $array_data=array(
                'username'=>$username,
                'email'=>$email,
                'phonenumber'=>$phonenumber,
                'password'=>$password
            );
            $this->session->set_userdata($array_data);
            $this->db->insert('users',$array_data);
            
            
    }
    function password($sn,$current_pass,$new_password){
        $data_array=array(
            'password'=>$new_password
        );
        $res=  $this->db->get_where('users',array('username'=>$sn),1);
          if($res->num_rows()===1){
            $this->db->where(array('username'=>$sn,'password'=>$current_pass));
            $this->db->update('users',$data_array);
      }  
    }
}