<?php include_once 'userheader.php';?>
<div class="container">
    <div class="col-lg-9">
        <div class="col-lg-8" style="padding-top: 30px;">
            <?php echo form_open('verify/change',array('class'=>'form-horizontal'));?>
             <div class="panel panel-default">
             <div class="panel-heading">Change Password</div>
             <div class="panel-body">
               <?php
                 if(!empty($sms)){
                     echo ''.$sms;
                 }if(!empty($smz)){
                     echo ''.$smz;
                 }
                 
                 ?>
                 <table class="table">
                 <tr><td><label>Current Password</label></td><td><font color="red" class="small"><?php echo form_error('cpd');?></font><input type="password" name="cpd" class="form-control"></td></tr>
                 <tr><td><label>New Password</label></td><td><font  color="red" class="small"><?php echo form_error('npd');?></font><input type="password" name="npd" class="form-control"></td></tr>
                 <tr><td><label>Confirm Password</label></td><td><font  color="red" class="small"><?php echo form_error('confpd');?></font><input type="password" name="confpd" class="form-control"></td></tr>
                <tr><td colspan="1"></td><td><button class="btn btn-primary btn-sm">Update Password</button></td></tr>
            </table>
            </div>
            </div>
            <?php echo form_close();?>
                </div>
    </div>
</div>
<?php include_once 'footer.php';?>