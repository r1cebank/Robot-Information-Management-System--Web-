<?php
session_start();
include ("../../database/conn.php");
$team = $_REQUEST['team_id'];
$alliance = $_REQUEST['alliance'];
$match = $_REQUEST['match_id'];
$score = $_REQUEST['score'];
$win = $_REQUEST['win'];
$perf = $_REQUEST['performance'];
$auto = $_REQUEST['auto'];
$auto_score = $_REQUEST['auto_score'];
$tele = $_REQUEST['tele'];
$tele_score = $_REQUEST['tele_score'];
$penalty = $_REQUEST['penalty'];
$comment = $_REQUEST['comment'];
$user = $_SESSION['user'];
mysql_query("INSERT INTO match_info (team_id, alliance, match_id, score, win, performance, auto, auto_score, tele, tele_score, penalty, comment, user) VALUES('$team', '$alliance', '$match', '$score', '$win', '$perf', '$auto', '$auto_score', '$tele', '$tele_score', '$penalty', '$comment', '$user') ") or die('Error Inserting Match<br>'.mysql_error());
header("Location: index.php");
?>