<?php
include("../../database/conn.php");
$sql="SELECT * FROM user";
if(!isset($_GET['ban']))
{
	header("Location: ../../index.php?err=500");
}
else
{
	if($_SESSION['type'] != 0)
	{
		header("Location: ../../index.php?err=500");
	}
	else
	{
		$result = mysql_query($sql) or die("Parse Error");
		while($row = mysql_fetch_array($result, MYSQL_ASSOC))
		{
			if($row['type'] != 0)
			{
				if($_GET['ban'] == 1)
				{
					$id = $row['id'];
					mysql_query("UPDATE user SET ban='1' WHERE id = '$id'");
					header("Location: index.php");
				}
				else
				{
					$id = $row['id'];
					mysql_query("UPDATE user SET ban='0' WHERE id = '$id'");
					header("Location: index.php");
				}
			}
		}
	}
}
?>