<?php

require_once("../inc/conn.php");

$query = "select * from sessions order by access_time, ip";
$res = mysql_query($query);

$sessions = array();

while($r  = mysql_fetch_assoc($res))
	array_push($sessions, $r);

?>

<html>
<body bgcolor=black text=yellow font size="-1">
<tt><b><blink>CURRENT SESSION ACTIVITY</blink></b></tt>
<br><br>
<table border=1 width=90% align=center>
<tr>
	<td width=12%>
	<tt><b><a href="../admin/ip_sessions.php">Ip Address:</a></b></tt>
	</td>
	<td width=18%><tt><b><u>Creation Time:</u></b></tt></td>
	<td width=22%><tt><b><u>Session Key:</u></b></tt></td>
	<td width=23%><tt><b><u>Request URL:<br><sub>http://psychinformatics.nyspi.org/infobuttons?</sub></u></b></tt></td>
	<td width=18%><tt><b><u>Columbia Replied?:</u></b></tt></td>
	<td width=22%><tt><b><u>Processing Time (milliseconds):</u></b></tt></td>
	<td width=25%><tt><b><u>Redirect URL:<br><sub>http://infobuttons.dbmi.columbia.edu/infobuttons/cgi-bin/wc_infomanage.cgi?info_institute=NYOMH&info_context=InPatientDrugs&</sub></u></b></tt></td>
</tr>

<?php
	foreach($sessions as $s)
	{
		
		extract($s);
		
		// trim the hostname and path from the url
		$redirect_url = substr($redirect_url, 124);


		// if you need to show the full URL for the 
		// request_uri, uncomment these 2 lines:
/*	
		$url = "http://psychinformatics.nyspi.org/infobuttons/?";
		$request_uri = $url . $request_uri;

*/

		echo "<tr>\t
		<td><tt>$ip</tt></td>
		<td><tt>$access_time</tt></td>
		<td><tt>$session_key</tt></td>
		<td><tt>$request_uri</tt></td>
		<td><tt>$Columbia_Reply</tt></td>
		<td><tt>$processing_time</tt></td>
		<td><tt>$redirect_url</tt></td>
		</tr>\n";
	}
?>

</table>
</body>
</html>
