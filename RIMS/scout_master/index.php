<?php
include("../database/conn.php");
session_start();
$_SESSION['attempt'] = 0;
if($_SESSION['type'] != 1)
{
	header("Location: ../index.php?err=500");
}
include("XMLGen.php");
$file = 'default.xml';
$subhandle = fopen($file, "w");
fwrite($subhandle,'');
fclose($subhandle); 
$sql="SELECT * FROM photo";
$result = mysql_query($sql) or die("Parse Error");
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
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Army Ants RIMS Scout Master Page</title>
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
</head>
<body>
<div id="container">
		<div id="top">
		<!-- login -->
			<ul class="login">
		    	<li class="left">&nbsp;</li>
		        <li>Hello <?php print $_SESSION['user'];?>!</li>
		        <li>|</li>
		        <li><a href="logout.php">Logout</a></li>
			</ul> <!-- / login -->
		</div> <!-- / top -->
		</div> <!-- Container -->

    <div id="main">
        <div id="header">
            <a href="#" class="logo"><img src="<?php print $row['game_logo'];?>" width="120" alt="" /> Army Ants RIMS Scout Master</a>
          <ul id="top-navigation">
				<li><a href="index.php" class="active">Homepage</a></li>
                <li><a href="teams/index.php">Teams</a></li>
                <li><a href="robots/index.php">Robots</a></li>
                <li><a href="matches/index.php">Matches</a></li>
				<li><a href="drive_team/index.php">Drive Team Eval</a></li>
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
                    <li><a href="../drive_team/index.php">Drive Team Eval</a></li>
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
                <div class="box">Welcome Scout Master! Here you can edit team robot information and generate team reports.</div>
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