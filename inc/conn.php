<?php 

$host = "127.0.0.1";
$user = "javauser";
$password = "javadude";
$db = "psychotropics";

$conn = mysql_pconnect($host, $user, $password) or die(mysql_error());
mysql_select_db($db, $conn) or die(mysql_error()); 

?>
