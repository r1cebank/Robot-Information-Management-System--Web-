<?php
session_start();
include ("../database/conn.php");
$type = $_SESSION['type'];
$ban = $_SESSION['ban'];
$edit = $_SESSION['edit'];
$usr = $_SESSION['user'];
$disable = $_SESSION['usr_disabled'];
$sql="SELECT * FROM user WHERE username='$usr'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($row['disable'] == 1)
{
	header("Location: smValidate.php");
}
else
{
	if($_SESSION['pass'] != $row['password'])
	{
		$_SESSION['sm_attempt'] ++;
		//print $_SESSION['sm_attempt'];
		if($_SESSION['sm_attempt'] >= 5)
		{
			$_SESSION['sm_attempt'] = 0;
			mysql_query("UPDATE user SET disable = '1' WHERE username = '$usr'");
			header("Location: smValidate.php");
		}
		else
		header("Location: ../index.php?err=300");
	}
	else
	{
		header("Location: userprocess.php");
	}
}
?>