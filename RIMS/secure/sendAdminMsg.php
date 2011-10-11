<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sending....</title>
</head>

<body>
<?php
session_start();
$user = $_REQUEST['username'];
$comment = $_REQUEST['msg'];
include("../database/conn.php");
if($_SESSION['captcha'] == $_REQUEST['captcha'])
{
	mysql_query("INSERT INTO admin_msg (username, message) VALUES('$user', '$comment') ") or die('Error Inserting Feedback');
	print "Your message has been sent, our admin will respnd as soon as possible, thank you for your feedback.\n";
	print "<p>Armt Ant 2011</p>\n";
	print "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"\">\n";
	print "<input type=\"submit\" name=\"close\" id=\"close\" onclick=\"javascript:window.close();\"value=\"Close Window\" />\n";
	print "</form>\n";
	header("Location: adminMsgFinished.html");
}
else
{
	print "Captcha is wrong";
	print "<p>Armt Ant 2011</p>\n";
	print "<form id=\"form1\" name=\"form1\" method=\"post\" action=\"\">\n";
	print "<input type=\"submit\" name=\"close\" id=\"close\" onclick=\"javascript:window.close();\"value=\"Close Window\" />\n";
	print "</form>\n";
	header("Location: adminMsg.php?err=100");
}
?>
</body>
</html>