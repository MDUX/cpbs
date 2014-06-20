<?php include_once 'adminheader.php';?>
<div class="container">
    <div class="col-lg-8">
        <div class="well well-sm">
            <label>Operators present</label>
        </div>
         <table class="table table-condensed table-striped table-bordered alert alert-success" id="myplugin">
            <thead>
                <tr><th>Username</th><th>Email</th><th>Phone number</th><th>Action<b class="caret"></b></th></tr>
            </thead>  
             <?php if(isset($warning)){ echo $warning;}?>
             <?php if(isset($records)){
            //echo '<tr><th>Username</th><th>Email</th><th>Phone number</th><th>Action</th></tr>';
            foreach ($records->result() as $row){
                echo '<tr><td>'.$row->username.'</td><td>'.$row->email.'</td><td>'.$row->phonenumber.'</td><td> <i class="fa fa-trash-o"></i> <button class="btn btn-warning btn-xs">'.anchor('verify_admin/delete_operator/'.$row->username,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?.')")).'</button></td></tr>';
            }
             }?>
             <?php if(isset($delete)){ echo $delete;}?>
         </table>
</div>
<?php include_once 'footer.php';?>
