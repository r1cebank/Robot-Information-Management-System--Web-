<?php
include ("../../database/conn.php");
$tb_name = "system";
$name = $_REQUEST['game_name'];
$logo = $_REQUEST['game_logo'];
$year = $_REQUEST['game_year'];
$type = $_REQUEST['game_type'];
$location = $_REQUEST['game_location'];
$comment = $_REQUEST['game_comment'];
$filter = $_REQUEST['filter'];
$safe = $_REQUEST['safe_mode'];
$upload = $_REQUEST['upload_mode'];
$reason = $_REQUEST['reason'];
$notice = $_REQUEST['notice'];
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
mysql_query("UPDATE $tb_name SET game_name = '$name', game_logo = '$logo', game_year = '$year', game_type = '$type', game_location = '$location', game_comment = '$comment', filter = '$filter', safe_mode = '$safe', upload_mode = '$upload', safe_mode_comment='$reason', notice = '$notice' WHERE id = '1'");
header("Location: index.php");
?>