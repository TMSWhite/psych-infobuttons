<html>
<head>
<style>
.bord
{
   border: #628600 solid 10px;
  border-bottom-width: 10px;
 }
</style>
</head>

<body topmargin=0 leftmargin=0 marginwidth=0 marginheight=0>
<?php

include 'params1.php';

//echo  $hostn;
//echo $usern;
//echo $passn;

$db = mysql_connect($hostn, $usern,$passn);
mysql_select_db($dbname,$db);

$limit = $_POST['limit'];
if($limit == "" || $limit == 0)
{
$limit =10;
}

$type = $_POST['type'];
if($type == "")
{
$type = 'all';
}


$day1 = $_POST['day1'];
$month1 = $_POST['month1'];
$year1 = $_POST['year1'];
$day2 = $_POST['day2'];
$month2 = $_POST['month2'];
$year2 = $_POST['year2'];

if($day1 == "")
{
$today = getdate();

$mon = $today['mon']; //month
$year = $today['year']; //this year
$day = $today['mday']; //this day

$day1 = $day;
$month1 = $mon;
$year1 = $year;

$day2 = $day;
$month2 = $mon;
$year2 = $year;
}


$date1 = $year1."-".$month1."-".$day1;
$date2 = $year2."-".$month2."-".$day2;

?>

<table align=center  valign=center height=100% width=100% border=0 cellpadding=0 cellspacing=0 class="bord">
<tr height=15%>
<td valign=top bgcolor="#628600">

<table align=center  valign=center width=100% border=1 cellpadding=0 cellspacing=0 bgcolor="#628600">
<tr align=center>
<td align=center valign=center bgcolor="#628600" style="font-size: 16px;"><br>
<font color="#C8FF02" style="font-size: 16px;"><b>Psychinformatics Visitor Tracker</b></font><br>
<a href="http://nyspi.org" >NYSPI</a>
<br><br>
</td>
</tr>
</table>

</td>
</tr>
<tr>
<td valign=top align=center>

<table align=center valign=top width=100% border=0 cellpadding=0 cellspacing=0>
<tr valign=top>
<td width=60% valign=top>
<br>
<div align=center style="font-size: 14px;">
<form name=myform method="post" action="reader.php" >The last
 <input type="Text" name="limit" size=5 value=<?php echo($limit); ?>> of
 <select name="type" size=1 value=<?php echo($type); ?>>
 <?php

 if($type == unique)
 {
 	echo "<option name=all value=all >all</option>";
	echo "<option name=unique value=unique selected>unique</option>";
 }
else
{
 	echo "<option name=all value=all selected >all</option>";
	echo "<option name=unique value=unique >unique</option>";
}
?>

 </select>visitors,  <br> From
 <select name="day1" size=1 value=<?php echo($day1); ?>>
	<?php

	$dd =0;
	while($dd<31)
	{
		$dd++;
		if($dd == $day1)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";
	}
	?>
 </select>
 <select name="month1" size=1 value=<?php echo($month1); ?>>
	<?php
	$dd = 0;

	while($dd< 12)
	{
		$dd++;
		if($dd == $month1)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";
	}
	?>
 </select>
 <select name="year1" size=1 value=<?php echo($year1); ?>>
	<?php
	$dd = 2003;

	while($dd< 2010)
	{
		$dd++;
		if($dd == $year1)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";

	}
	?>
 </select>
 to
 <select name="day2" size=1 value=<?php echo($day2); ?>>
	<?php
	$dd =0;
	while($dd<31)
	{
		$dd++;
		if($dd == $day2)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";
	}
	?>
 </select>
 <select name="month2" size=1 value=<?php echo($month2); ?>>
	<?php
	$dd = 0;

	while($dd< 12)
	{
		$dd++;
		if($dd == $month2)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";

	}
	?>
 </select>
 <select name="year2" size=1 value=<?php echo($year2); ?>>
	<?php
	$dd = 2003;

	while($dd< 2010)
	{
		$dd++;
		if($dd == $year2)
			echo "<option name=".$dd." value=".$dd." selected>".$dd." </option>";
		else
			echo "<option name=".$dd." value=".$dd." >".$dd." </option>";
	}
	?>
 </select><br>


<input type="Submit" name="submit" value="Show">
</div>

<?php

echo "<font color=984608><div align=center style=\"font-size: 14px;\">";
echo 'Showing last <b>'.$limit.'</b> of  <b>'.$type.'</b> visitors from '.$date1.' to '.$date2 ;
echo "</div></font>";

echo("<div STYLE=\" height: 310px; font-size: 12px; overflow: auto;\">");

if($type =="all")
{
	$str = "select ip,hname,time,date,fname from VisitorTable where date between '".$date1."' and '".$date2."' order by concat(date,',',time) desc limit ".$limit ;
	//echo($str);
	$str1 = "select count(*) from VisitorTable where date between '".$date1."' and '".$date2."'";

	$result = mysql_query($str,$db);
	$result1 = mysql_query($str1,$db);
	//$coun = mysql_num_rows($result);
	$coun =mysql_result($result1,0);


	echo("<table align=center width=95% border=0 bgcolor=\"#765432\" style=\"font-size: 12px;\">");
	echo("<tr align=center>");
	echo("<td align=center><b>Total Count</b>");
	echo("</td><td align=center><b>Visitor Ip</b>");
	echo("</td><td align=center><b>Host Name</b>");
	echo("</td><td align=center><b>Time</b>");
	echo("</td><td align=center><b>Date</b>");
	echo("</td><td align=center><b>File Name</b>");
	echo("</td></tr>");
	$tag2="true";

	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

	if($tag2=="true")
	{
	echo("<tr bgcolor=\"#239321\">");
	$tag2="false";
	}
	else
	{
	echo("<tr bgcolor=\"#569901\">");
	$tag2="true";
	}

	echo "\t\t<td ><font style=\"font-size: 12px;\">".$coun--."</font></td>\n";

   	foreach ($line as $col_value) {
       	echo "\t\t<td ><font style=\"font-size: 12px;\">$col_value</font></td>\n";
   	}
   	echo "\t</tr>\n";
	}
	echo "</table>\n";
	/* Free resultset */
	mysql_free_result($result);
}

if($type =="unique")
{
	$str = "select ip,hname,date,count(*) from VisitorTable where date between '".$date1."' and '".$date2."'  group by concat(ip,',',date) order by date desc limit ".$limit;
	//echo($str);
	$str1 = "select count(distinct(concat(ip,',',date) )) from VisitorTable where date between '".$date1."' and '".$date2."'";

	$result = mysql_query($str,$db);

	$result1 = mysql_query($str1,$db);
	//$coun = mysql_num_rows($result1);
	$coun =mysql_result($result1,0);


	echo("<table align=center width=95% border=0 bgcolor=\"#765432\" style=\"font-size: 12px;\">");
	echo("<tr align=center width=100%>");
	echo("<td align=center><b>Count</b>");
	echo("<td align=center><b>Unique Visitor</b>");
	echo("<td align=center><b>HostName</b>");
	echo("<td align=center><b>Date</b>");
	echo("<td align=center><b>Visitis on the day </b>");
	echo("</td></tr>");
	$tag2="true";

	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

	if($tag2=="true")
	{
	echo("<tr width=100% bgcolor=\"#239321\">");
	$tag2="false";
	}
	else
	{
	echo("<tr width=100% bgcolor=\"#569901\">");
	$tag2="true";
	}
	echo "\t\t<td align=center><font style=\"font-size: 12px;\">".$coun--."</font></td>\n";

	foreach ($line as $col_value)
	{
		echo "\t\t<td align=center><font style=\"font-size: 12px;\">$col_value</font></td>\n";
	}
   	echo "\t</tr>\n";
	}
	echo "</table>\n";
	/* Free resultset */
	mysql_free_result($result);
}

echo "</div>\n";
?>
</td>
<td width=40% align=center valign=top>
<br><br>
<div align=center style="font-size: 14px;"><font color=984608>The Following table shows the <b>File usage</b></font></div>
<?php

if($type ="all")
{

	$str = "select fname,count(*) from VisitorTable group by fname desc limit ".$limit;
	//echo($str);

	$result = mysql_query($str,$db);
	echo("<table align=center valign=top width=90% border=0 bgcolor=\"#765432\" style=\"font-size: 12px;\">");
	echo("<tr align=center>");
	echo("<td align=center><b>File Name</b>");
	echo("</td><td align=center><b>Number of Visits</b>");
	echo("</td></tr>");
	$tag2="true";


	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {

	if($tag2=="true")
	{
	echo("<tr bgcolor=\"#239321\">");
	$tag2="false";
	}
	else
	{
	echo("<tr bgcolor=\"#569901\">");
	$tag2="true";
	}

   	foreach ($line as $col_value) {
       	echo "\t\t<td align=center><font style=\"font-size: 12px;\">$col_value</font></td>\n";
   	}
   	echo "\t</tr>\n";
	}
	echo "</table>\n";
	/* Free resultset */
	mysql_free_result($result);
}
?>

<!--script language="javascript">
var sd = navigator.appName;
alert(sd);

var sd1 = navigator.platform;
alert(sd1);

window.location.href="./write.php?update=app&appname=sd&plat=sd1";

</script-->
</td>
</tr>
</table>

</td>
</tr>
<tr bgcolor="#628600">
<td bgcolor="#628600">

<table align=center valign=bottom bgcolor="#628600" border=0 cellpadding=0 cellspacing=0>
<tr bgcolor="#628600">
<td align=center>
<?php
function file_size_info($filesize) {
 $bytes = array('KB', 'KB', 'MB', 'GB', 'TB'); # values are always displayed
 if ($filesize < 1024) $filesize = 1; # in at least kilobytes.
 for ($i = 0; $filesize > 1024; $i++) $filesize /= 1024;
 $file_size_info['size'] = ceil($filesize);
 $file_size_info['type'] = $bytes[$i];
 return $file_size_info;
}

$sql = "SHOW TABLE STATUS";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
$total = $row['Data_length']+$row['Index_length'];
}

$size = file_size_info($total) ;

echo "<font color=\"#ffffff\" style=\"font-size: 14px;\">";
echo "Total  Size  of DB having the visitors data  is - <b>".$size['size'].$size['type']."</b>";
echo "</font>";
?>
</td>
</tr>
</table>

</td>
</tr>
<tr bgcolor="#628600">
<td bgcolor="#628600">
</td>
</tr>
</table>

</body>
</html>
