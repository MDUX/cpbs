<?php include_once 'operatorheader.php';?>
<div class="container">
    <div class="col-lg-9">
        <div class="well well-sm">
    <label>Registered users</label>
        </div>
        <table class="table table-stripped tableborder" id="conts">
           <?php if(isset($warning)){ echo $warning;}?>
           <?php 
            $records= $this->db->get_where('users',array('status'=>'user'));
           if($records->num_rows()>0){
            echo '<tr><th>Select</th><th>Username</th><th>Email</th><th>Phone number</th><th>Action</th></tr>';
            foreach ($records->result() as $row){
                echo '<tr><td><input type="checkbox" value="'.$row->username.'"  class="clz" onclick="deleteAll(\''.$row->id.'\')"></td><td>'.$row->username.'</td><td>'.$row->email.'</td><td>'.$row->phonenumber.'</td><td>'.anchor('verify_operator/delete_operator/'.$row->username,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?.')")).'</td></tr>';
            }
             echo '<div class="col-md-3">
                <button class="btn btn-primary btn-xs Toggleall">select all</button>'. anchor('verify_operator/deleteall','<button class="btn btn-danger btn-xs pull-right">delete all</button>',array('onclick'=>"alert('Are you sure you want to delete all user ?.')")).'
             </div>';
            
             }else {
                
               }
             ?>
             <?php if(isset($delete)){ echo $delete;}?>
              <?php if(isset($deleted)){ echo $deleted;}?>
         </table>
    </div>
</div>
<?php include_once 'footer.php';?>