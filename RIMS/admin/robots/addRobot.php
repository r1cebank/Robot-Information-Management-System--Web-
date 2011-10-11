<?php
include("../../database/conn.php");
$team_id = $_REQUEST['team_id'];
$weight = $_REQUEST['weight'];
$wheel = $_REQUEST['wheel'];
$minibot = $_REQUEST['minibot'];
$other = $_REQUEST['other_detail'];
mysql_query("INSERT INTO robot (team_id, weight, wheel, other_detail, minibot) VALUES('$team_id', '$weight', '$wheel', '$other', '$minibot' ) ") or die('Error Inserting Robot');
header("Location: index.php");
?>