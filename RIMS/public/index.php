<?php
include("../database/conn.php");
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

include("../secure/session.php");
session_start();
//sessionInit();
$_SESSION['attempt'] = 0;
include("XMLGen.php");
$file = 'default.xml';
$subhandle = fopen($file, "w");
fwrite($subhandle,'');
fclose($subhandle); 
$sql="SELECT * FROM photo";
$result = mysql_query($sql);
openXML($file);
openSlideshow($file);
openOption($file);
openInteraction($file);
addValue($file,"<speed>10</speed>");
closeInteraction($file);
closeOption($file);
while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
	addImage($file,"../match_photo/".basename($row['path']),$row['title']);
}
closeSlideshow($file);
$sql="SELECT * FROM system";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<?php
if($row['safe_mode'] == 1)
{
	header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Army Ants RIMS Public Page</title>
    <link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.11.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="../js/jquery-1.5.1.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-1.8.11.custom.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link  href="css/admin.css" rel="stylesheet" type="text/css" />
    <!-- The main style sheet -->
  	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

	<!-- START Fx.Slide -->
	<!-- The CSS -->
  	<link rel="stylesheet" href="fx.slide.css" type="text/css" media="screen" />
    <!-- Mootools - the core -->
	<script type="text/javascript" src="js/mootools-1.2-core-yc.js"></script>
    <!--Toggle effect (show/hide login form) -->
	<script type="text/javascript" src="js/mootools-1.2-more.js"></script>
	<script type="text/javascript" src="js/fx.slide.js"></script>
	<!-- END Fx.Slide -->
<script src="../../Scripts/swfobject_modified.js" type="text/javascript"></script>
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
<!-- Login -->
	<div id="login">
		<div class="loginContent">
			<form action="../secure/chklogin.php" method="post">
				<label for="user"><b>Username: </b></label>
				<input class="field" type="text" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>name="user" id="user" value="" size="23" />
				<label for="pwd"><b>Password:</b></label>
				<input class="field" type="password" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>name="password" id="password" size="23" />
				<input type="submit" name="submit" value="" <?php if($_SESSION['disabled'] == true) print "disabled=\"disabled\"";?>class="button_login" />
				<input type="hidden" name="redirect_to" value=""/>
			</form>
		</div>
		<div class="loginClose"><a href="#" id="closeLogin">Close Panel</a></div>
	</div> <!-- /login -->

    <div id="container">
		<div id="top">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Hello <?php print $_SESSION['user'];?>!</li>
				<li>|</li>
				<li><a id="toggleLogin" href="#">Log In</a></li>
			</ul> <!-- / login -->
		</div> <!-- / top -->
		</div> <!-- Container -->
    <div id="main">
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
		//End logic  	
		print "</p>\n";
		print "</div>\n";
		print "</div>\n";
	}
?>
</div>
        <div id="header">
            <a href="#" class="logo"><img src="<?php print $row['game_logo'];?>" width="120" alt="" /> Army Ants RIMS Public Page</a>
          <ul id="top-navigation">
				<li><a href="index.php" class="active">Homepage</a></li>
                <li><a href="teams/index.php">Teams</a></li>
                <li><a href="robots/index.php">Robots</a></li>
                <li><a href="matches/index.php">Matches</a></li>
                <li><a href="matches_simp/index.php">Matches Mini</a></li>
                <li><a href="credits/index.php">Credits</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Quick Links</h3>
                <ul class="nav">
					<li><a href="teams/index.php">Teams</a></li>
                	<li><a href="robots/index.php">Robots</a></li>
                	<li><a href="matches/index.php">Matches</a></li>
                    <li><a href="matches_simp/index.php">Matches Mini</a></li>
                    <li><a href="credits/index.php">Credits</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">Robot Information Management System<a href="#"></a></div>
                </div>
                <p></p><br>
                <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="560" height="400" id="FlashID" title="Image Slide">
                  <param name="movie" value="Carousel.swf">
                  <param name="quality" value="high">
                  <param name="wmode" value="opaque">
                  <param name="swfversion" value="9.0.45.0">
                  <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
                  <param name="expressinstall" value="../../Scripts/expressInstall.swf">
                  <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                  <!--[if !IE]>-->
                  <object data="Carousel.swf" type="application/x-shockwave-flash" width="560" height="400">
                    <!--<![endif]-->
                    <param name="quality" value="high">
                    <param name="wmode" value="opaque">
                    <param name="swfversion" value="9.0.45.0">
                    <param name="expressinstall" value="../../Scripts/expressInstall.swf">
                    <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                    <div>
                      <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
                      <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                    </div>
                    <!--[if !IE]>-->
                  </object>
                  <!--<![endif]-->
                </object>
          </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome <?php $_SESSION['user']?>! Here you can browse through information about other teams and their robots. You can also generate your own reports on teams.</div>
            </div>
        </div>
        <div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
    </div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
    </script>
</body>
</html>