<?php 

session_start();

$ip = getenv('REMOTE_ADDR');
require_once("/var/www/html/infobuttons/inc/conn.php");

$query = "insert into sessions (ip, access_time, session_key, request_uri) values('$ip', sysdate(), '" . session_id() . "','". getenv("QUERY_STRING") . "')";


mysql_query($query) or die(mysql_error());



?>
