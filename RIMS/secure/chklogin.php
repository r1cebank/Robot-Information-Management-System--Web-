<?php
session_start();
include("../secure/session.php");
include ("../database/conn.php");
sessionInit();
$user = mysql_real_escape_string($_REQUEST['user']);
$pass = md5($_REQUEST['password']);
$sql="SELECT * FROM user WHERE username='$user'";
$result = mysql_query($sql) or die("Parse Error");
$count=mysql_num_rows($result);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
if($_SESSION['disabled'] == true)
{
	header("Location: ../index.php?err=900");
}
else
{
	if($count <1)
	{
		header("Location: ../index.php?err=200");
	}
	else if($row['type'] == 1)
	{
		$_SESSION['type'] = $row['type'];
		$_SESSION['ban'] = $row['ban'];
		$_SESSION['edit'] = $row['disable_edit'];
		$_SESSION['logged'] = false;
		$_SESSION['user'] = $row['username'];
		$_SESSION['usr_disabled'] = $row['disable'];
		$_SESSION['pass'] = $pass;
		header("Location: smCheck.php");//New Validation here
	}
	else
	{
		$sql="SELECT * FROM user WHERE username='$user' and password='$pass'";
		$result = mysql_query($sql) or die("Parse again Error");
		$count=mysql_num_rows($result);
		if($count<1)
		{
			header("Location: ../index.php?err=300");
		}
		else
		{
			if($row['type'] != 0)
			{
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				$_SESSION['user'] = $row['username'];
				$_SESSION['type'] = $row['type'];
				$_SESSION['ban'] = $row['ban'];
				$_SESSION['edit'] = $row['disable_edit'];
				$_SESSION['logged'] = true;
				header("Location: userprocess.php");
			}
			else
			{
				$sql="SELECT ip FROM admin_log ORDER BY id DESC LIMIT 1";
				$secure = mysql_query($sql) or die("Parse Login Error");
				$securerow = mysql_fetch_array($secure, MYSQL_ASSOC);
				$ip = $_SERVER['REMOTE_ADDR'];
				if($ip != $securerow['ip'])
				{
					$_SESSION['type'] = $row['type'];
					$_SESSION['ban'] = $row['ban'];
					$_SESSION['edit'] = $row['disable_edit'];
					$_SESSION['logged'] = false;
					$_SESSION['user'] = $row['username'];
					header("Location: validate.php");
				}
				else
				{
					$row = mysql_fetch_array($result, MYSQL_ASSOC);
					$_SESSION['user'] = $row['username'];
					$_SESSION['type'] = $row['type'];
					$_SESSION['ban'] = $row['ban'];
					$_SESSION['edit'] = $row['disable_edit'];
					$_SESSION['logged'] = true;
					header("Location: userprocess.php");
				}
			}
		}
	}
}
?>