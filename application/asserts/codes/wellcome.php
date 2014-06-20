<?php 

session_start();


 ?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="wellcome.css" rel="stylesheet">
<title>Wellcome</title>
</head>

<body scrol="no" style="overflow:hidden">
<header>
<img src="../images/top.jpg" width="100%" height="81%">
<nav id="menu_bar"></nav>
</header>

<section id="wrap">
<nav id="left">
</nav>
<nav id="mid">
    <p style=" text-align:center; font-size:24px; color:#00C"><u>Wellcome at CPBS</u></p>
    <p>Thank you <span style="color:#00C; font-weight:900"> <?php echo $_SESSION['fname'];?></span> for registration.</br>You registration is successfull, from now on enjoy online booking using CPBS as your favourite 		       online booking system in <span style="color:#00C">Tanzania.</span></br>Make sure you always remember your CPBS <b>password</b> and
       <b>username</b> so as to ensure continous CPBS accessibility.
    </p>
    </p>
    <table>
    <tr>
    <th>Username</th>
    <th>Password</th>
    </tr>
    <tr>
    <td><?php echo $_SESSION['username']; ?></td>
    <td><?php echo $_SESSION['password']; ?></td>
    </tr>
    </table>
    <span style=""><a href="home.php"><img src="../images/continue-blue.png" alt="Continue"></a></span>
</nav>
<nav id="right">
</nav>

</section>

<footer>
<span style="position:absolute; left:40%; top:50%;">Copyright &copy; 2014.All right reserved</span>
</footer>
</body>
</html>