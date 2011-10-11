<?php
session_start();
$user = $_SESSION['user'];
include ("../database/conn.php");

if($_SESSION['captcha'] == $_REQUEST['captcha'])
{
	if($_REQUEST['act'] != $_SESSION['sm_secondary'])
	{
		$_SESSION['attempt'] ++;
		header("Location: smValidate.php?err=200");
	}
	else
	{
		$_SESSION['logged'] = true;
		mysql_query("UPDATE user SET disable = '0' WHERE username = '$user'");
		header("Location: ../index.php?err=1000");
	}
}
else
{
	header("Location: smValidate.php?err=100");
}
?>