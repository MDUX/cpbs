<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href= "<?php echo base_url();?>css/index.css" rel="stylesheet">
<link href= "<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
<link href= "<?php echo base_url();?>css/bootstrap.css" rel="stylesheet">
<script src= "<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src= "<?php echo base_url();?>js/jquery-1.8.0.min.js"></script>
<title>CPBS</title>
</head>
<body scrol="no" style="overflow:hidden">
<header>
    <img src="<?php echo base_url();?>images/top.jpg" width="100%" height="81%">
    <nav id="menu_bar">
    <marquee style="font-size:33px; color:blue">CPBS INSURES PARKING SPACE AROUND CITY CENTRE</marquee>
    </nav>
</header>

<section id="wrap">
    <nav id="left">
    <section id="animate-images">
    <span id="animate"><img src="<?php echo base_url();?>images/picha.gif"></span>
</section>
</nav>
<nav id="right">
<nav class="info">
    <div class="">
    <?php if(!empty($smg)){ echo $smg;}?>
   <strong>Provide your account details</strong>
   <?php echo form_open('login');?>
   <table class="table table-stripped">
   <tr> <td><label for="username">Username</label>
    <input type="text" name="username" required="required" class="form-control"></td></tr>
    <tr><td><label for="password">Password</label>
    <input type="password" name="password" required="required" class="form-control"></td></tr>
    <tr><td><input type="submit" value="login" name="login" class="field btn btn-primary"></td><td>
   <input type="button" value="Register" id="register" style="position:absolute; left:65%;" class="btn btn-primary"></td></tr></table>
    <?php echo form_close();?>
    </div>
</nav>

<nav class="reg" id="slide" style="Display:none">
    <div class="">
    <div><label>Create your own CPBS account</label>
      <?php echo form_open('pages/view');?>
        
    <?php echo form_close();?></div>
    </div>
</nav>
</nav>
</section>

<footer>
<span style="position:absolute; left:40%; top:50%;">Copyright &copy; <?php echo date("Y");?> .All right reserved</span>
</footer>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/index.js"></script>
</body>
</html>