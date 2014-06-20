<?php
include'connection.php';
$id=$_GET['id'];

 $local = "SELECT * FROM paking where id='$id' ";
$result = mysql_query($local);

while($userdata=mysql_fetch_array($result)){


 echo "<a href='home.php'>". $userdata['name']."<br> </a>";

}

?>