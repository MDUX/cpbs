<?php
class Verify extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->helper('url','form','html');
        $this->load->library('form_validation');
        if(!$this->session->userdata('logged_in')){
            redirect('logout');
        }elseif ($this->session->userdata('status')!=='user') {
             redirect('logout');
        }
    }
    function index(){
        $this->load->view('users/user_home');
    }
    function user_add(){
        $res=  $this->db->get_where('location',array('status'=>'no'));
        if($res->num_rows()>0){
         $data['rec']=$res; 
         $this->load->view('users/user_home_slot',$data);
        }  else {
         $this->load->view('users/user_home_slot'); 
        }
     }
    function change(){
        $this->load->model('register_form');
        $sn=  $this->session->userdata('username');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('cpd','Current password','trim|required|xss_clean');
        $this->form_validation->set_rules('npd','New password','trim|required|xss_clean');
        $this->form_validation->set_rules('confpd','Confirm password','trim|required|matches[npd]|xss_clean');
        if($this->form_validation->run()===FALSE){
        $this->load->view('users/change_password');
        }else{
        $current_pass=  $this->input->post('cpd');
        $new_password=  $this->input->post('npd');
        $res=  $this->db->get_where('users',array('username'=>$sn,'password'=>$current_pass),1);
          if($res->num_rows()===1){
              $this->db->where('username',$sn);
              $this->db->update('users',array('password'=>$new_password));
              $data['sms']='<p class="alert alert-success">Password successifully changed</p>';
              $this->load->view('users/change_password',$data); 
          }  else {
              $data['smz']='<p class="alert alert-danger">Invalid current password</p>';
              $this->load->view('users/change_password',$data);
          }
        }
    }
    function zahara($id){
        $data['id']=$id;
        $this->load->view('users/parking_booking',$data);
    }
    function userregister($id){
       $data['id']=$id;
        $res=  $this->db->get_where('location',array('id'=>$id));
        if($res->num_rows()===1){
            $row=$res->row();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('datefrom','Date From','trim|required|xss_clean');
        $this->form_validation->set_rules('dateend','Date End','trim|required|xss_clean');
        $this->form_validation->run();
        if(isset($_POST['save'])){
          if($this->form_validation->run()===FALSE){
              $data['active']=TRUE;
              unset($data['active1']);
              $this->load->view('users/parking_booking',$data);
          }  else {
              $data['active1']=TRUE;
              $this->load->model('user_model');
              $sn=  $this->session->userdata('username');
              $date_from=  $this->input->post('datefrom');
              $date_end=  $this->input->post('dateend');
              $total_amount=$row->amount;
              $this->user_model->userdata_add($id,$sn,$date_from,$date_end,$total_amount);
              unset($data['active']);
              $this->load->view('users/parking_booking',$data);
          }  
        }
        }
    }
    function fetch(){
        $sn=  $this->session->userdata('username');
        $res=  $this->db->get_where('booking',array('id'=>$sn));
        if($res->num_rows()===1){
            foreach ($res->result() as $row){
                $data_rec=array(
                    'id'=>$row->id,
                    'Totalamount'=>$row->amount
                );
            }
            unset($row);
            return $data_rec;
        }  else {
            $data_rec=array(
              'id'=>'',
               'Totalamount'=>''
                );
                return $data_rec;
        }
    }
    function checkajax($neno=''){
      $res=  $this->db->get_where('tb_code',array('code_set'=>$neno));
      if($res->num_rows()===1){
          echo '<label class="fa fa-check-square-o pull-right"></label>';
          echo '<td><button class="btn btn-success btn-sm" name="save">Reserve slot</button></td>';
      }  else {
          echo '<label class="fa fa-times pull-right"></label>';
      }
    }
    function addNest($sn){
        $data['id']=$sn;
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->join('users','users.username = booking.book_name');
        $this->db->where('loc_id',$sn);
        $res=  $this->db->get();
        if($res->num_rows()===1){
            $row=$res->row();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('carplate','Car plate','trim|required|exact_length[8]|alpha_numeric|xss_clean');
        $this->form_validation->set_rules('codez','Code number','trim|required|exact_length[7]|alpha_numeric|xss_clean');
        $this->form_validation->run();
        if(isset($_POST['save'])){
            $data['active1']=TRUE;
             unset($data['active']);
            if($this->form_validation->run()===FALSE){
             $this->load->view('users/parking_booking',$data);
            }  else {
              $username=  $this->session->userdata('username');
              $full_name= $row->email;
              $plateno=  $this->input->post('carplate');
              $receipt=  $this->input->post('codez');
              $this->load->model('user_model');
              $this->user_model->userdataEdit($sn,$full_name,$plateno,$receipt,$username);
              $this->db->where('id',$sn);
              $this->db->update('location',array('status'=>'booked'));
              echo '<p class="alert alert-success"> Slot reserved..</p>';
              $this->load->view('users/parking_booking',$data);
              
            }
        }
        
        }
    }
}