<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Leave Message</title>
</head>

<body>
<h3>Please Leave Your Message Here:</h3>
<?php
error_reporting(0);
if(isset($_GET['err']))
{
	if($_GET['err'] == 100)
		print "<font color=\"#CC0033\">Please check your captcha.</font>";
}
?>
<form id="form1" name="form1" method="post" action="sendAdminMsg.php">
  <p>
    <label for="username">Username: </label>
    <input name="username" type="text" id="username" value="<?php session_start(); print $_SESSION['user'];?>" />
  </p>
  <p>
    <label for="msg">Message: </label>
    <textarea name="msg" id="msg" cols="45" rows="5"></textarea>
  </p>
  <p><img src="captcha.php" id="captcha" /></p>
  <a href="#" onclick="
    document.getElementById('captcha').src='captcha.php?'+Math.random();
    document.getElementById('captcha-form').focus();"
    id="change-image">Not readable? Change text.</a><br/><br/>
    <input type="text" name="captcha" id="captcha" />
  <p>
    <input type="submit" name="submit" id="submit" value="Submit" />
  </p>
</form>
</body>
</html>