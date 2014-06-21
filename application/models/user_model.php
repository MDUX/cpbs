<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function userdata_add($id,$sn,$date_from,$date_end,$total_amount){
        $res=  $this->db->get_where('location',array('id'=>$id));
        if($res->num_rows()===1){
            $data_array=array(
                'book_name'=>$sn,
                'start_date'=>$date_from,
                'end_date'=>$date_end,
                'amount'=>$total_amount*(substr($date_end, 4,2)-substr($date_from, 4,2)),
                'loc_id'=>$id
            );
                $resz=  $this->db->get_where('booking',array('loc_id'=>$id));
                if($resz->num_rows()===1){
                    $this->db->where('loc_id',$id);
                    $this->db->update('booking',$data_array);
                }  else {
                   $this->db->insert('booking',$data_array);  
                }
            }
        }
        function userdataEdit($sn,$full_name,$plateno,$receipt,$username){
            $data_rec=array(
                'full_name'=>$full_name,
                'plate_no'=>$plateno,
                'receipt_number'=>$receipt
            );
            $res=  $this->db->get_where('booking',array('loc_id'=>$sn,'book_name'=>$username),1);
            if($res->num_rows()===1){
                $this->db->where(array('loc_id'=>$sn,'book_name'=>$username));
                $this->db->update('booking',$data_rec);
            }  else {
                return FALSE;
            }
        }
    }
