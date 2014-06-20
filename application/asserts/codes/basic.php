<?php
session_start();
include'connection.php';
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="admin.css" rel="stylesheet">
<title>Administrator</title>
</head>

<body scrol="no" style="overflow:hidden">
<header>
<img src="../images/top.jpg" width="100%" height="81%">
<nav id="menu_bar"></nav>
</header>


<section>
<div id="left"></div>
<div id="right"></div>

</section>

<footer>
<span style="position:absolute; left:40%; top:50%;">Copyright &copy; <?php echo date("Y");?>.All right reserved</span>
</footer>

</body>
</html>