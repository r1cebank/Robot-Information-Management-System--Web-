<?php
error_reporting(0);
include("secure/session.php");
include("database/conn.php");
if(!$conn)
{
	header("Location: login.php");
}
else
{
	session_start();
	sessionInit();
	if(isset($_GET['err']))
	{
		$location = "public/index.php?err=" . $_GET['err'];
		header("Location: " . $location);
	}
	else
	{
		$location = "public/index.php";
		header("Location: " . $location);
	}
}
?>