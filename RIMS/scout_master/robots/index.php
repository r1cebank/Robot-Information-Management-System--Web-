<?php
session_start();
error_reporting(0);
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
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="../../../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<link href="../../../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
		function myPopup(location) {
		window.open(location, "myWindow", 
		"status = 1, height = 230, width = 300, resizable = 1" )
		}
	</script>
<link href="../../../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants Robot Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="#"  class="active">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
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
                	<li><a href="../matches/index.php">Matches</a></li>
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
                <div class="table">
                <form name="form3" method="post" action="addRobot.php">
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
                            <td><strong>Weight:</strong></td>
            <td><span id="sprytextfield2">
            <label for="weight"></label>
            <input type="text" name="weight" id="weight">
            <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span><span class="textfieldMinValueMsg">The entered value is less than the minimum required.</span><span class="textfieldMaxValueMsg">The entered value is greater than the maximum allowed.</span></span>                
            </tr>
                        <tr>
                            <td><strong>Wheel:</strong></td>
                            <td><span id="spryselect1">
                              <label for="wheel"></label>
                              <select name="wheel" id="wheel">
                                <option value="Mecanum" selected>Mecanum</option>
                                <option value="4-Wheel (no mecanum)">4-Wheel (no mecanum)</option>
                                <option value="6-Wheel (no mecanum)">6-Wheel (no mecanum)</option>
                                <option value="Unknown">Unknown</option>
                          </select>
                              <span class="selectRequiredMsg">Please select an item.</span></span>
                            </td>
                        </tr>
												<tr>
												<td><strong> Minibot:</strong></td>
												<td><span id="spryselect1">
                              <label for="minibot"></label>
                              <select name="minibot" id="minibot">
                                <option value="1">Has Minibot</option>
                                <option value="0">No Minibot</option>
                          </select>
                              <span class="selectRequiredMsg">Please select an item.</span></span>
                            </td>
												</tr>
                        <tr>
                            <td><strong>Other Detail:</strong></td>
                            <td><span id="sprytextarea1">
                            <label for="other_detail"></label>
                            <textarea name="other_detail" id="other_detail" cols="45" rows="5"></textarea>
                            <span id="countsprytextarea1">&nbsp;</span><span class="textareaRequiredMsg">A value is required.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span>
                            </td>
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
                <div class="box">Welcome to the robot page, here you can edit robot information.</div>
            </div>
<div id="footer">
          <p>Designed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 PHP By Siyuan Gao 2011, Edited by Siyuan Gao 2011</p></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {validateOn:["change"], maxChars:5, minValue:0, maxValue:99999});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "real", {validateOn:["change"], minValue:0, maxValue:120});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {validateOn:["change"]});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], counterId:"countsprytextarea1", counterType:"chars_count", maxChars:2048});
</script>
</body>
</html>