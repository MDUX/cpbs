<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Model{
    
    function slot(){
    
 $this->ci->db->select("users.*", FALSE);
 $this->ci->db->select("book.*", FALSE);
 $this->ci->db->from("users");
 $this->ci->db->join("book", "book.book_id = users.id",'inner');
 $this->ci->db->where(array('users.id'=>$book_id), NULL, FALSE);
    }
    function add_book($sn,$plate_number,$day){
           $array_data=array(
               'booker_name'=>$sn,
               'PlateNo'=>$plate_number,
               'day'=>$day
           );
           $query=  $this->db->get_where('book',array('booker_name'=>$sn,'PlateNo'=>$plate_number),1);
           if($query->num_rows()===1){
               $this->db->where('booker_name',$sn);
               $this->db->update('book',$array_data);
           }  else {
               $this->db->insert('book',$array_data);
           }
    }
    
}