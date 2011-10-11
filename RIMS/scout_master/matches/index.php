<?php
error_reporting(0);
session_start();
if($_SESSION['type'] != 1)
{
	header("Location: ../../index.php?err=500");
}
include("../../database/conn.php");
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
<script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 230, width = 300, resizable = 1" )
		}
	</script>
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants Match Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="#" class="active">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
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
                    <li><a href="../drive_team/index.php">Drive Team Eval</a></li>
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
                    <div class="breadcrumbs">Match Management System<a href="#"></a></div>
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
                            <th>Team id</th>
                            <th>Match id</th>
                            <th>Alliance</th>
                            <th>Score</th>
                            <th>Win</th>
                            
                            <th>Full Info</th>
                        </tr>
                        <?php
						$sql="SELECT * FROM match_info";
						$result = mysql_query($sql) or die("Parse Error");
						if(!isset($_GET['search']))
						{
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
									print"<tr>\n";
									print"<td class=\"style1\">".$row['team_id']."</td>\n";
									print"<td>".$row['match_id']."</td>\n";
									print"<td><img src=\"";
									if($row['alliance'] == 0)
										print "img/red.png";
									else if($row['alliance'] == 1)
										print "img/blue.png";
									print "\" width=\"32\" alt=\"\" /></td>\n";
									print"<td>".$row['score']."</td>\n";
									print"<td><img src=\"";
									if($row['win'] == 0)
										print "img/lose.png";
									else if($row['win'] == 1)
										print "img/win.png";
									print "\" width=\"32\" alt=\"\" /></td>\n";
									print"<td><form name=\"form1\" method=\"post\" action=\"showInfo.php\">\n";
									print"<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">\n";
									print" <input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
									print"</form></td>\n";
									print"</tr>\n";
							}
						}
						else
						{
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($row['team_id'] == $_GET['search'])
								{
									print"<tr>\n";
									print"<td class=\"style1\">".$row['team_id']."</td>\n";
									print"<td>".$row['match_id']."</td>\n";
									print"<td><img src=\"";
									if($row['alliance'] == 0)
										print "img/red.png";
									else if($row['alliance'] == 1)
										print "img/blue.png";
									print "\" width=\"32\" alt=\"\" /></td>\n";
									print"<td>".$row['score']."</td>\n";
									print"<td><img src=\"";
									if($row['win'] == 0)
										print "img/lose.png";
									else if($row['win'] == 1)
										print "img/win.png";
									print "\" width=\"32\" alt=\"\" /></td>\n";
									print"<td><form name=\"form1\" method=\"post\" action=\"showInfo.php\">\n";
									print"<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">\n";
									print" <input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
									print"</form></td>\n";
									print"</tr>\n";
								}
							}
						}
						?>
                    </table>
                </div>
              <div class="table">
                <form name="form3" method="post" action="addMatch.php">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Add New team Here</th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Team id:</strong></td>
                            <td><span id="sprytextfield1">
                            <label for="team_id"></label>
                            <input type="text" name="team_id" id="team_id">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span>
                      </tr>
                        <tr>
                            <td><strong>Alliance:</strong></td>
            <td><span id="spryselect1">
              <select name="alliance" id="alliance">
                <option value="0" selected>Red</option>
                <option value="1">Blue</option>
              </select>
              <span class="selectRequiredMsg">Please select an item.</span></span>          
            </tr>
                        <tr>
                            <td><strong>Match id:</strong></td>
                            <td><span id="sprytextfield2">
                            <label for="match_id"></label>
                            <input type="text" name="match_id" id="match_id">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Score:</strong></td>
                            <td><span id="sprytextfield3">
                            <label for="score"></label>
                            <input type="text" name="score" id="score">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Match Result:</strong></td>
                            <td><span id="spryselect2">
                              <label for="win"></label>
                              <select name="win" id="win">
                                <option value="1" selected>Win</option>
                                <option value="0">Lose</option>
                              </select>
<span class="selectRequiredMsg">Please select an item.</span></span></td>
                        </tr>
												<tr>
												<td><strong> Minibot:</strong></td>
												<td><span id="spryselect1">
                              <label for="minibot"></label>
                              <select name="minibot" id="minibot">
                                <option value="1">Working</option>
                                <option value="0">Not working</option>
                          </select>
                              <span class="selectRequiredMsg">Please select an item.</span></span>
                            </td>
												</tr>
                        <tr>
                            <td><strong>Autonomous:</strong></td>
                            <td><span id="spryselect3">
                              <label for="auto"></label>
                              <select name="auto" id="auto">
                                <option value="1">Working</option>
                                <option value="0">Not Working</option>
                              </select>
                            <span class="selectRequiredMsg">Please select an item.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Autonomous score:</strong></td>
                            <td><span id="sprytextfield4">
                            <label for="auto_score"></label>
                            <input type="text" name="auto_score" id="auto_score">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Teleop:</strong></td>
                            <td><span id="spryselect4">
                              <label for="tele"></label>
                              <select name="tele" id="tele">
                                <option value="1">Working</option>
                                <option value="0">Not Working</option>
                              </select>
                            <span class="selectRequiredMsg">Please select an item.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Teleop score:</strong></td>
                            <td><span id="sprytextfield5">
                            <label for="tele_score"></label>
                            <input type="text" name="tele_score" id="tele_score">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Penalty:</strong></td>
                            <td><span id="sprytextfield6">
                            <label for="penalty"></label>
                            <input type="text" name="penalty" id="penalty">
                            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Performance:</strong></td>
                            <td><span id="sprytextarea1">
                              <label for="performance"></label>
                              <textarea name="performance" id="performance" cols="45" rows="5"></textarea>
                              <span id="countsprytextarea1">&nbsp;</span><span class="textareaRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Comment:</strong></td>
                            <td><label for="comment"></label>
                            <input type="text" name="comment" id="comment"></td>
                        </tr>
                    </table> 
                    <div class="select">
                    	<strong>Click Here:</strong>
                  	   <input type="submit" name="button" id="button" value="Submit">
                       </form>
                    </div>
          </div>
                   
          </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome to the match page, here you can edit match information.</div>
            </div>
<div id="footer">
          <p>Designed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 PHP By Siyuan Gao 2011, Edited by Siyuan Gao 2011</p></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"], maxChars:5, minValue:0, maxValue:99999});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["change"], minValue:0, maxValue:9999});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["change"], hint:"Alliance score", minValue:0, maxValue:9999});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2", {validateOn:["change"]});
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {hint:"Type number of tube", minValue:0, maxValue:100});
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["change"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "integer", {hint:"Type number of tubes", minValue:0, maxValue:999});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "integer", {hint:"Leave 0 if no penalty", minValue:0, maxValue:100});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {counterId:"countsprytextarea1", counterType:"chars_count", validateOn:["change"], hint:"Type performance details, leave \"Nothing\" if nothing to type."});
</script>
</body>
</html>