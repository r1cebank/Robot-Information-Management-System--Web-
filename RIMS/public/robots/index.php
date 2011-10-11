<?php
include("../../secure/session.php");
session_start();
sessionInit();
error_reporting(0);
include("../../database/conn.php");
$sql="SELECT * FROM system";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Army Ants RIMS Public Page</title>
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
		"status = 1, height = 230, width = 300, resizable = 1" )
		}
	</script>
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!-- Login -->
	<div id="login">
		<div class="loginContent">
			<form action="../../secure/chklogin.php" method="post">
				<label for="user"><b>Username: </b></label>
				<input class="field" type="text" name="user" id="user" value="" size="23" />
				<label for="pwd"><b>Password:</b></label>
				<input class="field" type="password" name="password" id="password" size="23" />
				<input type="submit" name="submit" value="" class="button_login" />
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
      <div id="header">
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants Robot Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="#"  class="active">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="../credits/index.php">Credits</a></li>
          </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Quick Links</h3>
                <ul class="nav">
                    <li><a href="../index.php">Homepage</a></li>
					<li><a href="../teams/index.php">Teams</a></li>
                	<li><a href="../matches/index.php">Matches</a></li>
                    <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                    <li><a href="../credits/index.php">Credits</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">Robot Management System<a href="#"></a></div>
                </div>
				<p></p>
                    <p>&nbsp;</p>
                    <p><strong>Display Options:&nbsp;&nbsp;</strong> <a href="index.php">Show all</a></p>
                <div class="select-bar">
                <form name="form2" method="get" action="index.php">
                    <label>Search for team:</label>
                    <label for="search"></label>
                    <input type="text" name="search" id="search">
                    <label> </label>
                    <label>
                        <input type="submit" name="Submit" value="Search" />
                    </label>
                  </form>
                </div>
            <div class="table">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th width="77">Team id</th>
                            <th width="120">Weight</th>
                            <th width="112">Wheel</th>
                            <th width="80">More Information</th>
                        </tr>
                        <?php
						$sql="SELECT * FROM robot";
						$result = mysql_query($sql) or die("Parse Error");
						if(isset($_GET['search']))
						{
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($row['team_id'] == $_GET['search'])
								{
									print"<tr>\n";
									print"<td class=\"style1\">".$row['team_id']."</td>\n";
									print"<td>".$row['weight']."</td>\n";
									print"<td>".$row['wheel']."</td>\n";
									print "<td><form name=\"form1\" method=\post\" onclick=\"myPopup('showInfo.php?id=".$row['id']."')\">\n";
									print "<input type=\"submit\" name=\"show\" id=\"show\" value=\"Show Info\">\n";
									print "</form></td>\n";
									print"</tr>\n";
								}
							}
						}
						else
						{
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								print"<tr>\n";
									print"<td class=\"style1\">".$row['team_id']."</td>\n";
									print"<td>".$row['weight']."</td>\n";
									print"<td>".$row['wheel']."</td>\n";
									print "<td><form name=\"form1\" method=\post\" onclick=\"myPopup('showInfo.php?id=".$row['id']."')\">\n";
									print "<input type=\"submit\" name=\"show\" id=\"show\" value=\"Show Info\">\n";
									print "</form></td>\n";
									print"</tr>\n";
							}
						}
						?>
                    </table>
              </div>
          </div>
                   <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome to the robot page, here you can browse information specifically about the robots.</div>
            </div>
          </div>
            
<div id="footer">
          <p>Designed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 PHP By Siyuan Gao 2011, Edited by Siyuan Gao 2011</p></div>
</body>
</html>