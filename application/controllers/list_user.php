<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Users extends CI_Controller{
    public function list_users(){
        $this->load->model('users');
        $this->load->view('pages/wellcome');
    }
}
?>
