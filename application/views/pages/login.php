<?php include_once 'header.php';?>
<div class="container">
    <div class="col-lg-5">
        <div class="well"><img src="<?php echo base_url();?>images/picha.gif" width="100%"></div>
    </div>
    <div class="col-lg-4" style="padding-top: 10px;">
        <div class="panel panel-success">
            <div class="panel panel-heading">
                <label>Login</label>
            </div>
            <div class="panel-body">
                <?php echo form_open('login',array('class'=>'form-horizontal'));?>
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="username" required="required" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="username">Password</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="password" name="password" required="required" class="form-control">
                    </div>
                </div>
                <div class="col-md-8 col-lg-push-4"><button class="btn btn-primary btn-block pull-right">Login</button></div>
                <?php echo form_close();?>
            </div>
            <div>
                <font color="red"><?php if(!empty($nouser)){ echo $nouser;}?></font>
                </div>
            
        </div>
        <div><label><a href="">Forgot password.?</a></label><label class="pull-right"><a href="<?php echo site_url('pages/register_view');?>">Create account</a></label></div>
    </div>
</div>

<?php include_once 'footer.php';?>

