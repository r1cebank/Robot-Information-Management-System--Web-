<?php
include("../../database/conn.php");
$username = $_REQUEST['username'];
$pass = md5($_REQUEST['password']);
$type = $_REQUEST['type'];
mysql_query("INSERT INTO user (username, password, type, ban, disable_edit) VALUES('$username', '$pass', '$type', '0', '1' ) ") or die('Error Inserting User: $username');
header("Location: index.php");
?>