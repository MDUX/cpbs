<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.css');?>">
<link href= "<?php echo base_url();?>assets/css/index.css" rel="stylesheet">
<link href= "<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href= "<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet">
<link href= "<?php echo base_url();?>assets/css/jquery.dataTables.css" rel="stylesheet">
<link href= "<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<script src= "<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src= "<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
<script src= "<?php echo base_url();?>assets/js/jquery-2.0.3.min.js"></script>
<script src= "<?php echo base_url();?>assets/js/bootstrap-tab.js"></script>
<script src="<?php echo base_url('assets/js/bootstrap-modal.js') ?>"></script>
<script src="<?php echo base_url('assets/js/datepicker.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-alert.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-dropdown.js');?>"></script>
<script src="<?php echo base_url('assets/js/tabcordion.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-popover.js');?>"></script>
<title>CPBS</title>
</head>
<body scrol="no" style="overflow">
    <div class="col-lg-12">
        <div>
       <img src="<?php echo base_url();?>images/top.jpg" width="100%" height="20%">
        </div>
        <div class="col-lg-10 col-lg-offset-1 menu_bar">
            <span class="pull-right"><strong>Logged in as:</strong> <?php echo $this->session->userdata('username');?></span>
       </div>
    </div>
    <div class="left">
        <table class="table">
            <tr class="well well-sm"><td><button class="btn btn-info btn-block">USER</button></td></tr>
            <tr><td><a href="<?php echo site_url('verify/user_add');?>">Reserve slot</a></td></tr>
            <tr><td><a href="<?php echo site_url('verify/change');?>">change password</a></td></tr>
            <tr><td><a href="<?php echo site_url('logout');?>">Logout</a></td></tr>
        </table>
    </div>
    
        
    
