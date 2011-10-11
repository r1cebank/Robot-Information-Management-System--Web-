<?php
error_reporting(0);
session_start();
if($_SESSION['type'] != 0)
{
	header("Location: ../../index.php?err=500");
}
include("../../database/conn.php");
include("../utilities/functions.php");
$sql="SELECT * FROM system";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Army Ants RIMS Admin Page</title>
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
    
    <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../../../Scripts/swfobject_modified.js" type="text/javascript"></script>
    <script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 130, width = 300, resizable = 1" )
		}
	</script>
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Credits</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="../system/index.php">System</a></li>
                <li><a href="../dataop/index.php">Export/Import</a></li>
				<li><a href="../users/index.php">Users</a></li>
                <li><a href="../photo/index.php">Photo Upload</a></li>
                <li><a href="#" class="active">Credits</a></li>
            </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Quick Links</h3>
                <ul class="nav">
                    <li><a href="../index.php">Homepage</a></li>
                    <li><a href="../teams/index.php">Teams</a></li>
                	<li><a href="../robots/index.php">Robots</a></li>
                	<li><a href="../matches/index.php">Matches</a></li>
                    <li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                    <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                    <li><a href="../system/index.php" >System</a></li>
                    <li><a href="../dataop/index.php">Export/Import</a></li>
                    <li><a href="../users/index.php">Users</a></li>
                    <li><a href="../photo/index.php">Photo Upload</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">Credits<a href="#"></a></div>
                    <div class="table">
                    <p>Robot Information Management System (RIMS) is developed and maintained byArmy Ants. This page is to credit students the worked so hard for this system and 3-rd party libraries that made this system possiable.</p>
                    <p>&nbsp;</p>
                    <strong>Developers for RIMS Web Platform</strong><hr>
                    <p><img src="img/n0rx0r.png"> Siyuan Gao - Scripting and database management</p>
                    <p><img src="img/n0rx0r.png"> Rocky W - Graphics</p>
                    <p>&nbsp;</p>
                    <strong>Developers for RIMS Desktop Platform</strong><hr>
                    <p><img src="img/n0rx0r.png"> Rocky W - Console app</p>
                    <p><img src="img/n0rx0r.png"> Joseph L - Console app</p>
                    <p><img src="img/n0rx0r.png"> Siyuan Gao - Data Exporting</p>
                    <p>&nbsp;</p>
                    <strong>Other Organizations</strong>
                    <hr>
                    <p><a href="http://www.fpdf.org/"><img src="img/fpdf.gif" height="64"></a>FPDF is a PHP class which allows to generate PDF files with pure PHP, that is to say without using the PDFlib library. F from FPDF stands for Free: you may use it for any kind of usage and modify it to suit your needs.</p>
                    <p><a href="http://www.php.net/"><img src="img/php.gif" height="64"></a>PHP is a widely-used general-purpose scripting language that is especially suited for Web development and can be embedded into HTML.</p>
                    <p><a href="http://www.mysql.com/"><img src="img/mysql.png" height="64"></a>The world's most popular open source database</p>
                    <p><a href="http://www.adobe.com/products/dreamweaver/"><img src="img/Adobe_dreamweaver_logo.png" height="64"></a> Adobe&reg; Dreamweaver&reg; CS5 software empowers designers and developers to build standards-based websites with confidence. Design visually or directly in code, develop pages with content management systems, and accurately test browser compatibility thanks to integration with Adobe BrowserLab, a new Adobe CS Live online service.* CS Live services are complimentary for a limited time.</p>
                    <p><img src="img/mamp_home.gif" height="64"> The abbreviation "MAMP" stands for: Macintosh, Apache, Mysql and PHP. With just a few mouse-clicks, you can install Apache, PHP and MySQL for Mac OS X!</p>
                    <p><a href="http://jquery.com/"><img src="img/jquery.jpg" height="64"></a> jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development. jQuery is designed to change the way that you write JavaScript.</p>
                    <p>Special thanks to Jermemie Tisseau for the nice drop down logo design! Found at <a href="http://web-kreation.com/">http://web-kreation.com</a></p>	
                    <p>Special thanks to Artfans Design for login box design. Site designed by <a href="http://twitter.com/#!/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by Giles Wells 2010</p>
                    <p>System page iphone-like switch is by <a href="http://awardwinningfjords.com/2009/06/16/iphone-style-checkboxes.html">Award winning Fjords</a></p>
                    </div>
                </div>
      </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome to the credit page.</div>
            </div>
</div>
<div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
</body>
</html>