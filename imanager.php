<?php

// imanager.php - log individual queries
session_start();
extract($_GET);
extract($_POST);

$initial_query = getenv('QUERY_STRING'); // pick up the initial query
$ip = getenv('REMOTE_ADDR');

$sess_key = $_COOKIE['PHPSESSID'];

require_once("inc/conn.php");

$query = sprintf("insert into sessions(ip, session_key, access_time, iquery, nquery) values('%s', '%s', now(), '%s', '%s')", $ip, $sess_key, mysql_escape_string($iquery), mysql_escape_string($nquery));

mysql_query($query) or die(mysql_error());

if(strpos("?", $nquery)!= false)
	header("Location: " . urldecode($nquery) . "%20%20&");
else 
	header("Location: " . urldecode($nquery));

?>
	
