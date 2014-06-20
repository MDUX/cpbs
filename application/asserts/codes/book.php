<?php
include'connection.php';

$plate=$_POST['plate_no'];


$sql = "INSERT INTO booking(plate_no) VALUES ('$plate')";
$insert = mysql_query($sql) or die(mysql_error());

if($insert){
echo"Plate number submitted";

header('location:home.php');
}

else{

echo"Plate number not submitted";

header('location:home.php');
}
?>