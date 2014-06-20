<?php
session_start();
include'connection.php';

$let="SELECT * FROM users";
$result=mysql_query($let);
$num=mysql_num_rows($result);

echo $num;


$data=mysql_fetch_array($result);
$fname=$data['fname'];
//$lname=$data['lname'];
//$phone=$data['phone'];
//$email=$data['email'];
//$username=$data['username'];
$do=0;
while($data=mysql_fetch_array($result)){
	echo $fname;
	$do++;
	}
echo $fname;

$delete="DELETE FROM `cpbs`.`users` WHERE `users`.`username`=1";
mysql_query($delete);
?>