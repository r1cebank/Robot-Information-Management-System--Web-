<?php
session_start();
include("../secure/session.php");
include ("../database/conn.php");
$sql="SELECT * FROM system";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($row['safe_mode'] == 1)
{
	if($_SESSION['type'] != 0)
	{
		sessionInit();
		header("Location: ../index.php?err=800");
	}
	else
	{
		header("Location: ../admin/index.php");
	}
}
else
{
	if($_SESSION['ban'] == 0)
	{
		if($_SESSION['type'] == 0)
		{
			header("Location: ../admin/index.php");
		}
		else if($_SESSION['type'] == 1)
		{
			header("Location: ../scout_master/index.php");
		}
		else if($_SESSION['type'] == 2)
		{
			header("Location: ../public/index.php");
		}
		else
		{
			sessionInit();
			header("Location: ../index.php");
		}
	}
	else
	{
		header("Location: ../index.php?err=600");
	}
}
?>