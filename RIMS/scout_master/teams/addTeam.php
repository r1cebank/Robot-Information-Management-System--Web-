<?php
include("../../database/conn.php");
session_start();
$user = $_SESSION['user'];
$team_id = $_REQUEST['team_id'];
$name = $_REQUEST['name'];
$url = $_REQUEST['url'];
$about = $_REQUEST['about'];
$language = $_REQUEST['language'];
$control = $_REQUEST['control'];
$parts_broken = $_REQUEST['parts_broken'];
$comment = $_REQUEST['comment'];
$division = $_REQUEST['division'];
$picture = "../../team_photo/".$team_id."_team.jpg";
$driver = "../../team_photo/".$team_id."_driver.jpg";
$logo = "../../team_photo/".$team_id."_logo.jpg";
mysql_query("INSERT INTO teams (team_id, name, url, about, language, control, parts_broken, comment, user, picture, driver_picture, logo, division) VALUES('$team_id', '$name', '$url', '$about', '$language', '$control', '$parts_broken', '$comment', '$user', '$picture', '$driver', '$logo' , '$division') ");
mysql_query("INSERT INTO game_specific (team_id,user) VALUES('$team_id','$user') ");
$sql="SELECT * FROM game_specific_fields";
$result = mysql_query($sql) or die("Parse Error");
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	$temp = $_REQUEST[$row['field_id']];
	$sql = "UPDATE game_specific SET ".$row['field_id']." = '$temp' WHERE team_id = '$team_id'";
	mysql_query($sql);

}
header("Location: index.php");
?>