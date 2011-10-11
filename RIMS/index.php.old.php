<?php
session_start();
error_reporting(0);
include("secure/session.php");
sessionInit();
include("database/conn.php");
if($conn)
{
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = date(DATE_RFC822);
	mysql_query("INSERT INTO ip_log (ip, time) VALUES('$ip', '$date' ) ") 
	or die('Error Inserting ip Data');
	$sql="SELECT * FROM system";
	$result = mysql_query($sql) or die("Parse Error");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
}
?>
<?php
  if ($_SESSION['timeout'] + (5 * 60) >= time()) {
  } else {
     $_SESSION['attempt'] = 0;
	 $_SESSION['disabled'] = false;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="login-box.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 400, width = 390, resizable = 1" )
		}
	</script>
<title>Welcome to Army Ants Robot Information Management System (RIMS)!</title>
</head>

<body>
<div id="login-box">
	<h4>Welcome to Army Ants Robot Information Management System (RIMS)</h4>
    <form name="login" action="secure/chklogin.php" method="post">
      <?php
	  if(!$conn)
	  {
		  print "<font color=\"#FFFFFF\">RIMS not setup yet, <strong><a href=\"secure/setup.html\" style=\"color:#FFF\">Click here to setup</a></strong></font>";
	  }
	  $error = $_GET['err'];
	  if($error == 100)
	  	print "<font color=\"#FFFFFF\">Please login.</font>";
	  else if($error == 200)
	  	print "<font color=\"#FFFFFF\">Team number or user not found!</font>";
	  else if($error == 300)
	  	print "<font color=\"#FFFFFF\">Login Incorrect</font>";
	  else if($error == 400)
	  	print "<font color=\"#FFFFFF\">Unknown Error</font>";
	  else if($error == 500)
	  	print "<font color=\"#FFFFFF\">You do not have access to that page</font>";
	else if($error == 600)
	  	print "<font color=\"#FFFFFF\">Sorry, you are banned from the system</font>";
	else if($error == 700)
	  	print "<font color=\"#FFFFFF\">Parameter Error</font>";
	else if($error == 800)
	  	print "<font color=\"#FFFFFF\">Server is on safe mode, <strong><a href=\"#\" onclick=\"myPopup('secure/adminMsg.php')\" style=\"color:#FFF\">Leave a Message</a></strong></font></font>";
	else if($error == 900)
	  	print "<font color=\"#FFFFFF\">Disabled is disabled, please don't try that again. Your ip address has been logged.</font>";
	  	
	  ?>
      <?php
	  if($row['safe_mode'] == 1)
	  {
		  print "<p><font color=\"#FFFF00\">Server is on Safe Mode, all access except admin has been disabled.</p></font>";
	  }
	  if($_SESSION['disabled'] == true)
	  {
		  print "<font color=\"#FFFF00\">Server login disabled, please try again after 5 minutes</font>";
	  }
	  ?>
      <p><font color="#FFFFFF">Important Notice: Teams that have not changed their password, please login using your team number and password:</font><font color="#FFFF00"> logomotion.</font>
      </p>
      <p>
        <div id="login-box-name"><label for="user">Username: </label></div>
        <div id="login-box-field"><input name="user" type="text" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?> id="user" maxlength="12" /></div>
        <p><div id="login-box-name"><label for="password">Password:</label></div>
		<div id="login-box-field"><input type="password" name="password" id="password" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>/></p></div>
        <input type="submit" name="login2" id="login" value="Login" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>/>
      </p>
    </form>
</div>
</body>
</html>