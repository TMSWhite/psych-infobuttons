<?php 

function name2id ($n) {
	
	//this is to decode the + sign to a whitespace in the drugname to map
	//if the drug name contains two or more words
	urldecode($n);
	require_once("conn.php");

	$names = explode(",", $n);
	$quoted = array();
	foreach($names as $nm)
		array_push($quoted, "'" . $nm . "'");

	$nms = implode(",", $quoted);			

	

	$query = "select medcode from drugs where druggenericname in (" . $nms . ")";

	$numbers = array();

	$res = mysql_query($query) or die(mysql_error());
	while($r = mysql_fetch_assoc($res))
		array_push($numbers, $r['medcode']);

	return implode(",", $numbers);

}

?>
