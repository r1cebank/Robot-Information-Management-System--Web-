<?php
include("../../database/conn.php");
$id = $_REQUEST['id'];
$ban = $_REQUEST['ban'];
$disable = $_REQUEST['disable_edit'];
$username = $_REQUEST['user'];
$pass = $_REQUEST['password'];
$type = $_REQUEST['user_type'];
mysql_query("UPDATE user SET username = '$username', password = '$pass', type = '$type', ban = '$ban', disable_edit = '$disable' WHERE id = '$id'");
header("Location: index.php");
?>