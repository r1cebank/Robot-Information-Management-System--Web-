<?php
$dbhost = 'localhost';
$dbuser = 'armyants';
$dbpass ='ghjkg576GFH';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$dbname = 'rims';
mysql_select_db($dbname);
?>
<?php
session_start();
error_reporting(0);
include("secure/session.php");
sessionInit();
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Army Ants Robot Information Management System (RIMS)!</title>
<link href="stylelog.css" rel="stylesheet" type="text/css" />
	<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
        <script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 400, width = 390, resizable = 1" )
		}
	</script>
	<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11293381-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>

<body>
<div style="margin: 0 auto; width:600px;">
<?php
	if(($row['safe_mode'] == 1) || ($_SESSION['disabled'] == true))
	{
		print "<div class=\"ui-widget\">\n";
		print "<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">\n";
		print "<p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>\n";
		if($_SESSION['disabled'] == true)
		{
			print "Server login disabled, please try again after 5 minutes</p>\n";
		}
		else if($row['safe_mode'] == 1)
		{
			print "Server is on Safe Mode, all access except admin has been disabled. <strong>Reason:&nbsp;</strong> ".$row['safe_mode_comment']."</p>\n";	
		}
		print "</p>\n";
		print "</div>\n";
		print "</div>\n";
}
?>
<?php
	if($row['notice'] != "")
	{
		print "<div class=\"ui-widget\">\n";
		print "<div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\">\n";
		print "<p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span>\n";
		print "Server news:&nbsp;".$row['notice']."</p>";
		print "</div>\n";
		print "</div>\n";
	}
?> 
<?php
	if(!$conn || isset($_GET['err']))
	{
		print "<div class=\"ui-widget\">\n";
		print "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;\">\n";
		print "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>\n"; 
		print "<strong>Alert:</strong>\n";
		//Logic
		  if(!$conn)
		  {
			  print "RIMS not setup yet, <strong><a href=\"secure/setup.php\" style=\"color:#FFF\">Click here to setup</a></strong>";
		  }
		  $error = $_GET['err'];
		  if($error == 100)
			print "Please login.";
		  else if($error == 200)
			print "Team number or user not found!";
		  else if($error == 300)
			print "Login Incorrect";
		  else if($error == 400)
			print "Unknown Error";
		  else if($error == 500)
			print "You do not have access to that page";
		else if($error == 600)
			print "<font color=\"#FFFFFF\">Sorry, you are banned from the system</font>";
		else if($error == 700)
			print "<font color=\"#FFFFFF\">Parameter Error</font>";
		else if($error == 800)
			print "Server is on safe mode, <strong><a href=\"#\" onclick=\"myPopup('secure/adminMsg.php')\" style=\"color:#FFF\">Leave a Message</a></strong>";
		else if($error == 900)
			print "Disabled is disabled, please don't try that again. Your ip address has been logged.";
		else if($error == 1000)
			print "You account has been successfully activated, please login.";
		else if($error == 1100)
			print "RIMS is already set up, please login";
		else if($error == 1200)
			print "Your ip has been banned from the system.";
		//End logic  	
		print "</p>\n";
		print "</div>\n";
		print "</div>\n";
	}
?>
</div>
<div id="layer01_holder">
  <div id="left"></div>
  <div id="center"></div>
  <div id="right"></div>
</div>

<div id="layer02_holder">
  <div id="left"></div>
  <div id="center"></div>
  <div id="right"></div>
</div>

<div id="layer03_holder">
  <div id="left"></div>
  <div id="center">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>LOGIN<br /><br /></td>
  </tr>
  <tr>
    <td><form name="login" action="secure/chklogin.php" method="post">
      <label>Username
        <input name="user" type="text" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?> id="user" maxlength="12" />
      </label>
      <label>Password
      <input type="password" name="password" id="password" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?> style="margin-top:5px;"/>
      </label>
      <label>
       <input type="submit" name="login2" id="login" value="Login" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>/>
      </label>
    </form>    </td>
  </tr>
</table>
  </div>
  <div id="right"></div>
</div>

<div id="layer04_holder">
  <div id="left"></div>
  <div id="center">
  Robot Information Management System(RIMS) is maintained and developed from scratch by Army Ants.</div>
  <div id="right"></div>
</div>              
</body>
</html>