<?php extract($_GET); ?>

<html>
<head>
<script>
function loadmsg() {
if (document.getElementById) { // DOM3 = IE5, NS6
document.getElementById('hidepage').style.visibility = 'hidden';
} else {
if (document.layers) { // Netscape 4
document.hidepage.visibility = 'hidden';
} else { // IE 4
document.all.hidepage.style.visibility = 'hidden';
}
}
}
</script> 
</head>
<body onLoad="loadmsg();">
<div id="hidepage" style="position: absolute; left:0px; top:0px; background-color:#eae7d1; layer-background-color:#eae7d1; height: 100%; width: 100%;">
<center>
<table>
<tr width="100%">
<td background="../images/logo_bg.jpg">
<a href="../index.php"><img src="../images/psch.gif" align=left border=0 width=200 height=42></a>
</td>
<td background="../images/logo_bg.jpg" nowrap valign="center">
<form method="get" action="index.php">
<font size="4" color="#0000CD">Drug Name = </font>
<input type="text" id="drug" name="drug" />
<input type="submit" value="Search" name="submit"/>
<input type="reset" value="Clear" />
</form>
</td>
</tr>
<tr>
<td background="../images/logo_bg.jpg" align='center' width='50%'>Visit <a href='http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia'>SkolarMD</a> Website</td>
<td background="../images/logo_bg.jpg" align='center' width='50%'>Visit <a href='http://www.thomsonhc.com/'>Micromedex</a> Website</td>
</tr>
<tr>
<td width="50%" valign="top">
<? include("inc/skolar_pane.inc") ?>
</td>
<td width="50%" valign="top">
<h4>Also getting links from Columbia's Infobuttons Server ...</h4>
</td>
</tr>
</table>
</center>
</div>
<?php flush() ?>

<center>
<table>
<tr width="100%">
<td background="../images/logo_bg.jpg">
<a href="../index.php"><img src="../images/psch.gif" align=left border=0 width=200 height=42></a>
</td>
<td background="../images/logo_bg.jpg" nowrap valign="center">
<form method="get" action="index.php">
<font size="4" color="#0000CD">Drug Name = </font>
<input type="text" id="drug" name="drug" />
<input type="submit" value="Search" name="submit"/>
<input type="reset" value="Clear" />
</form>
</td>
</tr>
<tr>
<td background="../images/logo_bg.jpg" align='center' width='50%'>Visit <a href='http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia'>SkolarMD</a> Website</td>
<td background="../images/logo_bg.jpg" align='center' width='50%'>Visit <a href='http://www.thomsonhc.com/'>Micromedex</a> Website</td>
</tr>
<tr>
<td width="50%" valign="top">
<? include("inc/skolar_pane.inc") ?>
</td>
<td width="50%" valign="top">
<?php if(isset($_GET['drug'])) require_once("inc/infobuttons_pane.inc"); ?>
</td>
</tr>
</table>
</center>
</body>
</html>
