<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class User_list extends CI_Model {

        var $title   = '';
        var $content = '';
        var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_users()
    {
   $query = $this->db->query('SELECT id,username, email,phonenumber FROM users');
    return $query;
    

//    foreach ($query->result_array() as $row)
//    {
//    echo $row['fname'];
//    echo $row['lname'];
//    echo $row['username'];
//    }
    }
    }