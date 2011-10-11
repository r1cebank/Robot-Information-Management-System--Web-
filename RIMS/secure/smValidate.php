<?php
session_start();
include("sendSMS.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Account need activation.</title>
<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.11.custom.min.js"></script>
<style type="text/css">
.main
{
	margin:0 auto;
	width:600px;
	text-align:center;
}
</style>
</head>

<body>
<div class="main">
<?php
	if(isset($_GET['err']))
	{
		print "<div class=\"ui-widget\">\n";
		print "<div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;\">\n";
		print "<p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span>\n"; 
		print "<strong>Alert:</strong>\n";
		//Logic
		  $error = $_GET['err'];
		  if($error == 100)
			print "Captcha incorrect.";
		  else if($error == 200)
			print "Activation code incorrect, a new code has been sent to your phone.";
		//End logic  	
		print "</p>\n";
		print "</div>\n";
		print "</div>\n";
	}
?>
<font color="#FF3333">Due to too many incorrect login, your account has been locked for you protection.</font>
<p>Your user name: <?php print $_SESSION['user'];?></p>
<p>
<?php
$code = sendAct($_SESSION['user']);
$_SESSION['sm_secondary'] = $code;
?>
</p>
<form id="form1" name="form1" method="post" action="SMcheckAct.php">
  <p>
    <label for="act">Activation Code:</label>
    <input type="text" name="act" id="act" />
  </p>
  <p><img src="captcha.php" id="captcha" /></p>
  <a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>
    <input type="text" name="captcha" id="captcha" />
  <p>
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" />
  </p>
</form>
</div>
</body>
</html>