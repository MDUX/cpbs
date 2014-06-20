<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Operator_model extends CI_Model{
     function __construct() {
         parent::__construct();
     }
     function slotAdd($name,$location,$category,$amount){
         $record_add=array(
             'slot_name'=>$name,
             'location'=>$location,
             'category'=>$category,
             'amount'=>$amount
         );
         $res=  $this->db->get_where('location',array('location'=>$location,'slot_amount'=>$name));
         if($res->num_rows()===1){
             $this->db->where('location',$location);
             $this->db->update('location',$record_add);
         }  else {
             $this->db->insert('location',$record_add);
         }
         
     }
 }