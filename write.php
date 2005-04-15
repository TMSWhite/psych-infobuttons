<?php
$upd = $_GET["update"];

if($upd == "app")
{

$appname = $_GET["appname"];
$plat = $_GET["plat"];

echo $appname;
echo $plat;

$db = mysql_connect($hostn, $usern,$passn);
mysql_select_db($dbname,$db);

//$str = "insert into VisitorTable values ('','".$rip."','".$hostname."','".$time."','".$day."','".$fname."')";
	//echo($str);
//	mysql_query($str,$db);
	//mysql_free_result($result);

}
else
{
include 'params.php';

$db = mysql_connect($hostn, $usern,$passn);
mysql_select_db($dbname,$db);

	//IpAddress of visitor
	$rip = $_SERVER['REMOTE_ADDR'];


	$today = getdate();
	//Time of the visit
	$time = $today['hours'].":".$today['minutes'].":".$today['seconds'];
	//Date of the Visit
	$day = $today['year']."-".$today['mon']."-".$today['mday'];
	//HostName of the visitor
	$hostname = gethostbyaddr($rip);
	//current file name
        $fname = $_SERVER['SCRIPT_NAME'];

	$str = "insert into VisitorTable values ('','".$rip."','".$hostname."','".$time."','".$day."','".$fname."')";
	//echo($str);
	mysql_query($str,$db);
	//mysql_free_result($result);
}
?>
