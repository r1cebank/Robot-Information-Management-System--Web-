<?php
//if query string contains expired var & it = true, set loggedin cookie to false
//else if loggedin cookie exists and is set to true, send to index page
if (isset($_GET['expired']) && $_GET['expired'] == 'true')
    {
        setcookie("loggedin", "false", time()+30);
    }
elseif (isset($_COOKIE['loggedin']) && $_COOKIE['loggedin'] == 'true')
    {
        header("Location: index.php");
        exit;
    }
//log in logic    
if (isset($_POST['username']) && isset($_POST['pw']) && $_POST['username'] == "session" && $_POST['pw'] == "test")
    {
        setcookie("loggedin", "true", time()+30);
        header("Location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP Log in - Session Warning Test</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

<div class="container">
<?php
//warning message for user so they know why they are here
if (isset($_GET['expired']) && $_GET['expired'] == 'true')
	{
  print  "<p><span  style=\"color: red; font-weight: bold\">You have been logged out or your session expired.</span> Log in to restart session.</p>";

    }
?>
<form id="testsession" name="testsession" action="login.php" method="post">
<fieldset>
<legend>PHP Session Log In</legend>
<p><label for="username">Username:</label><br />
<input id="username" type="text" name="username" value="session" /></p>
<p><label for="pw">Password:</label><br />
<input id="pw" type="password" name="pw" value="test" /></p>
<p><input type="submit" value="Submit"  /></p>
</fieldset>
</form>

<p>Cookies:<br />
<?php
// all cookies
print_r($_COOKIE);
?>
</p>
<p><a href="http://www.jensbits.com/2009/09/07/session-timeout-warning-php-example-with-jqueryjs">return to jensbits.com</a></p>
</div>
<script src="http://www.jensbits.com/js/gatag.js" type="text/javascript"></script>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-4945154-2");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
