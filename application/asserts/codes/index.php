<?php
session_start();
include'connection.php';
if(isset($_POST['login'])){
	
    $username = $_POST['username'];
    $password = md5($_POST['password']);

$user = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysql_query($user);

$row = mysql_num_rows($result);
 
if($row==1){
	$userdata=mysql_fetch_array($result);
	
	$_SESSION['username']=$userdata['username'];
	$_SESSION['password']=$userdata['password'];
	
	header('Location:home.php');

}
else { 
	  $er = "<font color='red'>invalid username or password</font>";
	  header('Location:?page=index&12='.$er);
}
}
if(isset($_POST['submit'])){

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$verify=md5($_POST['password2']);

$_SESSION['fname']=$_POST['fname'];
$_SESSION['lname']=$_POST['lname'];
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=$_POST['password'];

if ($password==$verify){

		$sql = "INSERT INTO users(fname,lname,phone,email,username,password)
		VALUES('$fname','$lname','$phone','$email','$username','$password')";
		
		$insert = mysql_query($sql) or die(mysql_error());

if($insert){
	//$error = "<font color='red'>Congaturation!, Your account is created successifully</font>";
	
	header('Location:wellcome.php');
}

else{
		$error = "<font color='red'>You fail to create an acount try again</font>";
		header('Location:?page=index&err='.$error);
	}
}

else{
		$error = "<font color='red'>There is password mismatch</font>";
		header('Location:?page=index&err='.$error);
}
}
 ?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="index.css" rel="stylesheet">
<title>CPBS</title>
</head>
<body scrol="no" style="overflow:hidden">
<header>
    <img src="../images/top.jpg" width="100%" height="81%">
    <nav id="menu_bar">
    <marquee style="font-size:33px; color:blue">CPBS INSURES PARKING SPACE AROUND CITY CENTRE</marquee>
    </nav>
</header>

<section id="wrap">
    <nav id="left">
    <section id="animate-images">
    <span id="animate"><img src="../images/picha.gif"></span>
</section>
</nav>
<nav id="right">
<nav class="info">
   <legend><strong>Provide your account details</strong></legend>
   <form action="" method="POST">
                <?PHP   if(isset($_GET['12'])){
					echo $_GET['12'];} ?><br>
    
    <label for="username">Username</label>
    <input type="text" name="username" required="required" class="field"></br>
    <label for="password">Password</label>
    <input type="password" name="password" required="required" class="field"></br>
    <input type="submit" value="login" name="login" class="field">
    <input type="button" value="Register" id="register" style="position:absolute; left:65%; background-color:#CCE;">
    </form>
</nav>

<nav class="reg" id="slide" style="Display:none">
    <legend>Create your own CPBS account</legend>
     <form action="" method="POST">
                    <?PHP   if(isset($_GET['err'])){

echo $_GET['err'];
}?><br>
    <label for="fname">First Name</label>
    <input type="text" name="fname" placeholder="John" required="required" class="field"></br>
    <label for="lname">Last Name</label>
    <input type="text" name="lname" placeholder="Doe" required="required" class="field"></br>
    <label for="phone">phone number</label>
    <input type="text" name="phone"required="required" class="field"></br>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="mkulima@gmail.com" required="required" class="field"></br>
    <label for="username">Username</label>
    <input type="text" name="username" required="required" class="field"></br>
    <label for="password">Password</label>
    <input type="password" name="password" required="required" class="field"></br>
    <label for="verify">Verify Password</label>
    <input type="password" name="password2" required="required" class="field"></br>
    <input type="submit" value="submit" name="submit" class="field">
    </form>
</nav>
</nav>
</section>

<footer>
<span style="position:absolute; left:40%; top:50%;">Copyright &copy; <?php echo date("Y");?> .All right reserved</span>
</footer>
<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/index.js"></script>
</body>
</html>