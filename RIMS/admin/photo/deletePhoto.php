<?php
include ("../../database/conn.php");
if(isset($_GET['id']))
{
	if($_SESSION['type'] != 0)
	{
		header('Location: ../../index.php?err=500');
	}
	$id = $_GET['id'];
	$sql="SELECT * FROM photo WHERE id = '$id'";
	$result = mysql_query($sql) or die("Parse Error");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$filename = $row['path'];
	unlink($filename);
	$sql = "DELETE FROM photo WHERE id = '$id'";
	mysql_query($sql) or die("Parse Error");
	header('Location: index.php');
}
else
{
	header('Location: ../../index.php?err=700');
}
?>