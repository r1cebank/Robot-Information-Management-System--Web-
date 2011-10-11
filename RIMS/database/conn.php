<?php
$dbhost = 'localhost';
$dbuser = 'armyants';
$dbpass ='ghjkg576GFH';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$dbname = 'rims';
mysql_select_db($dbname);
?>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
$sql="SELECT * FROM ip_ban";
$resultBan = mysql_query($sql);
$ban = false;
while($rowBan = mysql_fetch_array($resultBan, MYSQL_ASSOC))
{
	if($ip == $rowBan['ip'])
	{
		$ban = true;
	}
}
if($ban)
{
	header("Location: http://armyants.us/RIMS/login.php?err=1200");
}
?>
