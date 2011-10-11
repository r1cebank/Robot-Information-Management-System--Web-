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
    <script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 130, width = 300, resizable = 1" )
		}
	</script>
	<script type="text/javascript" src="confirm.js"></script>
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" />Admin homepage slideshow management System</a>
            <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="../system/index.php" >System</a></li>
                <li><a href="../dataop/index.php">Export/Import</a></li>
				<li><a href="../users/index.php">Users</a></li>
                <li><a href="#" class="active">Photo Upload</a></li>
                <li><a href="../credits/index.php">Credits</a></li>
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
                    <li><a href="../credits/index.php">Credits</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">Admin homepage slideshow management System<a href="#"></a></div>
				</div>
				<div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Photo id</th>
                            <th>Path</th>
                            <th>Title</th>
                            <th>Delete</th>
                        </tr>
						<?php
						$sql="SELECT * FROM photo";
						$result = mysql_query($sql) or die("Parse Error");
						while($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
							print "<tr>\n";
								print "<td class=\"style1\">".$row['id']."</td>\n";
								print "<td><label>".$row['path']."</label>&nbsp;</td>\n";
								print "<td><label>".$row['title']."</label>&nbsp;</td>\n";
								print "<td><a href=\"deletePhoto.php?id=".$row['id']."\" onclick=\"return confirmDelete();\"><img src=\"img/hr.gif\" width=\"16\" height=\"16\" alt=\"\" /></td>\n";
								print "</form>\n";
							print "</tr>\n";
						}
						?>
                    </table>
                </div>
				<div class="table"> 
				<form name="form1" enctype="multipart/form-data" method="post" action="upload.php">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Add New Photo Here</th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Select Photo: </strong></td>
                            <td><label for="upload"></label>
                              		<input type="file" name="upload" id="upload" />
                           	 </tr>
                        <tr>
                            <td><strong>Title</strong></td>
                            <td><label for="title"></label>
                            	<input type="text" name="title" id="title"></tr>
                    </table>
                    <div class="select">
                    	<strong>Click Here:</strong>
                  	   <input type="submit" name="button" id="button" value="Submit">
                    </div>
                    </form>
                   
          </div>
      </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome to the admin homepage slideshow management page, here you can add, delete photos from the database.</div>
            </div>
</div>
<div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
</body>
</html>