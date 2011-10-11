<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Test MySQL Connection</title>
</head>

<body>
<?php
error_reporting(0);
$dbhost = $_GET['host'];
$dbuser = $_GET['username'];
$dbpass = $_GET['password'];
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(($dbhost == "") || ($dbhost == ""))
{
	print "<font color=\"#00CC33\" face=\"Times New Roman, Times, serif\">Please input something.</font>";
}
else
{
	if($conn)
	print "<font color=\"#00CC33\" face=\"Times New Roman, Times, serif\">MySQL Connection successfully</font>";
	else
	print "<font color=\"#CC0033\" face=\"Times New Roman, Times, serif\">RIMS couldn't find the connection, please try again.</font>";
}
?>
</body>
</html>