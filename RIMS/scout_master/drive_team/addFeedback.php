<?php
session_start();
include ("../../database/conn.php");
$team_id = $_REQUEST['team_id'];
$match = $_REQUEST['match_id'];
$feedback= $_REQUEST['feedback'];
$comment = $_REQUEST['comment'];
$user = $_SESSION['user'];
mysql_query("INSERT INTO drive_team (team_id, match_id, feedback, comment, user) VALUES('$team_id', '$match', '$feedback', '$comment', '$user' ) ") 
or die('Error Inserting Feedback');
header('Location: index.php');
?>