<?php
session_start();
include'connection.php';

$loc = "SELECT * FROM location";

$result = mysql_query($loc);

?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="home.css" rel="stylesheet">
<title>Home</title>
</head>

<body scrol="no" style="overflow:hidden">
<header>
<img src="../images/top.jpg" width="100%" height="81%">
<nav id="menu_bar">
<span id="image-bar">|
    <a href="home.php"><img src="../images/home.png" alt="Home"></a>|
    <a href="contact.php"><img src="../images/contact.png" alt="Contact"></a>|
    <a href="about.php"><img src="../images/about.png" alt="About Us"></a>|
</span>
</nav>
</header>

<section id="wrap">
<nav id="left">
    <table>
    <tr>
    <th style="text-align:left"><u>Location</u></th>
    </tr>

    <?php
		while($ass=mysql_fetch_array($result)){
		$id=$ass['id'];
	?>
    <tr>
        <td><?php echo "<a href='home.php?id=$id'>" ?><?=$ass['location']; ?></a></td>
    </tr>

    <?php
}
	?>
    </table>
    <span style="position:absolute; top:4%;left:80%">
        <table height="auto" width="370">
            <tr>
                <td> 
			<?php
            if(@$_GET['id'] >=1){
               include 'pac.php';
            }
            ?></br>
            <span style="color:blue">Choose one of the car park displayed above and provide your Car Plate number and Payment reference-id</span>
          </td></tr></table></span>
</nav>
<a href="logout.php" style="position:absolute; top:16%; left:1%">Logout</a>
<nav id="mid">
<nav class="form-1">
    <form id="p-no" action="book.php" method="POST">
    <label>Car plate number</label><br>
    <input type="text" required="required" name="plate_no" placeholder="STJ345" class="field" title="It must be a valid plate number"></br>                
    <input type="submit" name="submit" value="submit" class="field">
    </form></br></br>
 </nav>
 <nav class="form-2">
 	<span>Use the following numbers to send a valid amount,If you send less amount we will not consider you as a legal booker.<br><span style="color:#00C"><b>0713000000|0788000000</br>0754000000|0777000000</b></span></span></br>
    <form id="ref-id" action="ref_id.php" method="POST">
    <label for="payment-reference id">Payment reference id </label></br>
    <input type="text" name="ref_id" placeholder="1312040133577" maxlength="20" required="required" class="field" title="Mobile transaction id from M Pesa,Tigo Pesa,Airtel Money or Eazy Pesa"></br>
    <input type="submit" name="submit" value="SUBMIT" class="field">
    </form>
</nav>
<span class="contents">If you are not sure of the actual location,</br><b style:color>Please click</> <a href="https://maps.google.com/" alt="Google Map"><img src="../images/google.png" alt="HERE"></a>
</span>
</nav>
<nav id="right">
</nav>
</section>

<footer>
<span style="position:absolute; left:40%; top:50%;">Copyright &copy; 2014.All right reserved</span>
</footer>
</body>
</html>