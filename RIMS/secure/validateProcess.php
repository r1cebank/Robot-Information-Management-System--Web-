<?php
session_start();
if($_SESSION['captcha'] == $_REQUEST['captcha'])
{
	if($_REQUEST['answer'] != $_SESSION['secondary'])
	{
		$_SESSION['attempt'] ++;
		header("Location: validate.php?err=200");
	}
	else
	{
		$_SESSION['logged'] = true;
		header("Location: ../admin/index.php");
	}
}
else
{
	$_SESSION['attempt'] ++;
	header("Location: validate.php?err=100");
}
?>