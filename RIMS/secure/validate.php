<?php
session_start();
include ("sendSMS.php");
if($_SESSION['attempt'] == 5)
{
	$_SESSION['timeout'] = time();
	$_SESSION['disabled'] = true;
	header("Location: ../index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="../js/jquery-ui-1.8.11.custom.min.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Admin Identity Validate</title>
<style type="text/css">
.header_red {
	color: #F00;
}
.main
{
	margin:0 auto;
	width:600px;
}
</style>
</head>

<body>
<div class="main">
<h2 class="header_red">Admin logged in from a different ip address</h2>
<p>System need to verify your identity, a activation code has been sent to your phone.</p>
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
		  {
			print "Your captcha was incorrect. attempt ".$_SESSION['attempt'];
			if($_SESSION['attempt'] == 4)
			{
				print "&nbsp;&nbsp;&nbsp;Last Attempt";
			}
		  }
		  else if($error == 200)
		  {
			print "Your secondary password was incorrect. attempt ".$_SESSION['attempt'];
			if($_SESSION['attempt'] == 4)
			{
				print "&nbsp;&nbsp;&nbsp;Last Attempt";
			}
		  }
		//End logic  	
		print "</p>\n";
		print "</div>\n";
		print "</div>\n";
	}
?>
<?php
$code = sendAct($_SESSION['user']);
$_SESSION['secondary'] = $code;
?>
<form id="form1" name="form1" method="post" action="validateProcess.php">
  <p>
    <label for="answer">Activation Code: </label>
    <input type="text" name="answer" id="answer" />
  </p>
  <p>
    <label for="captcha">Write the following word:</label>
  </p>
  <p><img src="captcha.php" id="captcha" /></p>
  <a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>
    <input type="text" name="captcha" id="captcha" />
  <p>
    <input type="submit" name="Submit" id="Submit" value="Submit" />
  </p>
</form>
</div>
</body>
</html>