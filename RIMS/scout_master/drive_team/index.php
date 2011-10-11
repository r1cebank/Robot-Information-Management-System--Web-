<?php
session_start();
if($_SESSION['type'] != 1)
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
	
    <script src="../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 130, width = 300, resizable = 1" )
		}
	</script>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants Drive Team Evaluation Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="#" class="active">Drive Team Eval</a></li>
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
                	<li><a href="../robots/index.php">Robots</a></li>
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
                    <div class="breadcrumbs">Drive Team Evaluation System<a href="#"></a></div>
                </div><p></p>
                <p>&nbsp;</p>
                <p><strong>Order by:&nbsp;&nbsp;</strong> <a href="index.php?sort=team">Team Number</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?sort=match">Match Number</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?sort=feedback">Feedback</a></p>
                <div class="select-bar">
                <form name="form2" method="get" action="index.php">
                    <label>Search for team by id:</label>
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
                            <th>Team id</th>
                            <th>Match Number</th>
                            <th>Feedback</th>
                            <th>Comment</th>
                        </tr>
                        <?php
						$sort = $_GET['sort'];
						$sql="SELECT * FROM drive_team ORDER BY team_id";
						if($sort == "team")
						{
							$sql="SELECT * FROM drive_team ORDER BY team_id";
						}
						else if($sort == "match")
						{
							$sql="SELECT * FROM drive_team ORDER BY match_id";
						}
						else if($sort == "feedback")
						{
							$sql="SELECT * FROM drive_team ORDER BY feedback DESC";
						}
						$result = mysql_query($sql) or die("Parse Error");
						while($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
							if(!isset($_GET['search']))
							{
								print "<tr>\n";
									print "<td class=\"style1\">".$row['team_id']."</td>\n";
									print "<td>".$row['match_id']."</td>";
									print  "<td><img src=\"";
									if($row['feedback'] == -1)
										print "img/dislike.png";
									if($row['feedback'] == 1)
										print "img/like.png";
									if($row['feedback'] == 0)
										print "img/neutral.png";
									print "\" width=\"32\" alt=\"feedback\" /></td>\n";
									print "<td><form name=\"form1\" method=\post\" onclick=\"myPopup('showComment.php?id=".$row['id']."')\">\n";
									  print "<input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
									print "</form></td>\n";
								print "</tr>\n";
							}
							else
							{
								if($_GET['search'] == $row['team_id'])
								{
									print "<tr>\n";
									print "<td class=\"style1\">".$row['team_id']."</td>\n";
									print "<td>".$row['match_id']."</td>";
									print  "<td><img src=\"";
									if($row['feedback'] == -1)
										print "img/dislike.png";
									if($row['feedback'] == 1)
									print "img/like.png";
										if($row['feedback'] == 0)
									print "img/neutral.png";
									print "\" width=\"16\" alt=\"feedback\" /></td>\n";
									print "<td><form name=\"form1\" method=\post\" onclick=\"myPopup('showComment.php?id=".$row['id']."')\">\n";
									print "<input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
									print "</form></td>\n";
									print "</tr>\n";
								}
							}
						}
						?>
                  </table>
              </div>
              <form name="form1" method="post" action="addFeedback.php">
                <div class="table"> 
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Add New Feedback Here</th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Team id</strong></td>
                            <td><label for="team_id"></label>
                              <span id="sprytextfield1">
                              <label for="team_id"></label>
                              <input type="text" name="team_id" id="team_id">
                              <span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Match Number</strong></td>
                            <td><label for="match_id"></label>
                              <span id="sprytextfield2">
                              <label for="match_id"></label>
                              <input type="text" name="match_id" id="match_id">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Feedback</strong></td>
                            <td><select name="feedback" id="feedback">
                              <option value="1">Thumbs Up</option>
                              <option value="0" selected>Neutral</option>
                              <option value="-1">Thumbs Down</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><strong>Comment</strong></td>
                            <td><label for="comment"></label>
                            <input type="text" name="comment" id="comment"></td>
                        </tr>
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
                <div class="box">Welcome to the drive team evaluation page, here you can add feedbacks from drive team.</div>
            </div>
</div>
<div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"], maxChars:5, minValue:0, maxValue:9999});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["change"], minValue:0, maxValue:9999});
</script>
</body>
</html>