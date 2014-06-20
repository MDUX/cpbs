<?php
include'connection.php';

$ref=$_POST['ref_id'];


$sql = "INSERT INTO booking(ref_id) VALUES ('$ref')";
$insert = mysql_query($sql) or die(mysql_error());

if($insert){
echo"Ref_id number submitted";
header('location:home.php');	
}

else{

echo"Ref_id number not submitted";
header('location:home.php');
}
?>