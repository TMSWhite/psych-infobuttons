<?php

require_once("../inc/conn.php");

$query = "select * from sessions where iquery is not null order by access_time, ip";

$res = mysql_query($query);

$sessions = array();

while($r  = mysql_fetch_assoc($res))
        array_push($sessions, $r);

?>

<html>
<body bgcolor=black text=yellow font size="-1">
<tt><b><blink>CURRENT REDIRECT SESSION</blink></b></tt>
<br><br>
<table border=1 width=90% align=center>
<tr>
        <td width=12%><tt><b><u>Ip Address:</u></b></tt></td>
        <td width=18%><tt><b><u>Access Time:</u></b></tt></td>
	<td width=20%><tt><b><u>Session Time:</u></b></tt></td>
	<td width=25%><tt><b><u>iQuery:</u></b></tt></td>
	<td width=25%><tt><b><u>nQuery:</u><b></tt></td>
</tr>

<?php
        foreach($sessions as $s)
        {

                extract($s);

                // trim the hostname and path from the url
                //$redirect_url = substr($redirect_url, 124);


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
		<td><tt>$iquery</tt></td>
		<td><tt>$nquery</tt></td>
                </tr>\n";
        }
?>

</table>
</body>
</html>

