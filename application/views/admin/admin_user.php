<?php include_once 'adminheader.php';?>
<div class="container">
    <div class="col-lg-8">
        
        <div class="well well-sm">
            <label>Users present</label>
        </div>
        
        <table class="table table-condensed table-striped table-bordered alert alert-success" id="mytable">
            <thead>
                <tr><th>Username</th><th>Email</th><th>Phone number</th><th>Action<b class="caret"></b></th></tr>
            </thead>
            <tbody>
                <?php
                if(isset($view)){
                foreach ($view->result() as $user){
          echo '<tr><td>'.$user->username.'</td><td>'.$user->email.'</td><td>'.$user->phonenumber.'</td><td><button class="btn btn-warning btn-xs">'.anchor('verify_admin/delete_operator/'.$user->username,'Delete',array('onclick'=>"return confirm('Are you sure you want to delete this person ?.')")).'</button></td></tr>';
                }
                }
                ?>
            </tbody>
        </table>
    </div> 
</div>

<?php include_once 'footer.php';?>
