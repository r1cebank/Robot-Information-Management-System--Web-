<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Setting up...</title>
</head>

<body>
<p>Setting up RIMS, please wait a couple second.....</p>
<p><img src="loader.gif" width="56" height="21" alt="loading" /></p>
<?php
error_reporting(0);
$host = $_REQUEST['host'];
$user = $_REQUEST['user'];
$pass = $_REQUEST['password'];
include ("buildConn.php");
buildConn($host,$user,$pass);
$wipe = $_REQUEST['wipe'];
$filename = 'localhost.sql';
if($wipe == 1)
{
	// Connect to MySQL server
	mysql_connect($host, $user, $pass) or die ('Error connecting to mysql');
	 
	// Temporary variable, used to store current query
	$templine = '';
	// Read in entire file
	$lines = file($filename);
	// Loop through each line
	foreach ($lines as $line)
	{
		// Skip it if it's a comment
		if (substr($line, 0, 2) == '--' || $line == '')
			continue;
	 
		// Add this line to the current segment
		$templine .= $line;
		// If it has a semicolon at the end, it's the end of the query
		if (substr(trim($line), -1, 1) == ';')
		{
			// Perform the query
			mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
			// Reset temp variable to empty
			$templine = '';
		}
	}
}
//Requests
$name = $_REQUEST['game_name'];
$logo = $_REQUEST['game_logo'];
$year = $_REQUEST['game_year'];
$type = $_REQUEST['game_type'];
$location = $_REQUEST['game_location'];
$comment = $_REQUEST['game_comment'];
$filter = $_REQUEST['filter'];
$safe = $_REQUEST['safe'];
$upload = $_REQUEST['upload'];
if($filter == 'on')
{
	$filter = 1;
}
else
{
	$filter = 0;
}
if($safe == 'on')
{
	$safe = 1;
}
else
{
	$safe = 0;
}
if($upload == 'on')
{
	$upload = 1;
}
else
{
	$upload = 0;
}
mysql_query("UPDATE $tb_name SET game_name = '$name', game_logo = '$logo', game_year = '$year', game_type = '$type', game_location = '$location', game_comment = '$comment', filter = '$filter', safe_mode = '$safe', upload_mode = '$upload' WHERE id = '1'");
$admin_usr = $_REQUEST['admin_usr'];
$admin_pass = md5($_REQUEST['admin_pass']);
mysql_query("INSERT INTO user (username, password, type, ban, disable_edit) VALUES('$admin_usr', '$admin_pass', '0', '0', '0' ) ") or die('Error Inserting User: $username');
header("Location: finish.html");
?>
</body>
</html>