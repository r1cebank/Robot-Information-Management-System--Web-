<?php
session_start();
error_reporting(0);
if($_SESSION['type'] != 0)
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
<script src="../../../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants Team Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="#" class="active">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="../system/index.php">System</a></li>
                <li><a href="../dataop/index.php">Export/Import</a></li>
				<li><a href="../users/index.php">Users</a></li>
                <li><a href="../photo/index.php">Photo Upload</a></li>
                <li><a href="../credits/index.php">Credits</a></li>
          </ul>
        </div>
        <div id="middle">
            <div id="left-column">
                <h3>Quick Links</h3>
                <ul class="nav">
                    <li><a href="../index.php">Homepage</a></li>
                	<li><a href="../robots/index.php">Robots</a></li>
                	<li><a href="../matches/index.php">Matches</a></li>
                    <li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                    <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                    <li><a href="../system/index.php">System</a></li>
                    <li><a href="../dataop/index.php">Export/Import</a></li>
                    <li><a href="../users/index.php">Users</a></li>
                    <li><a href="../photo/index.php">Photo Upload</a></li>
                    <li><a href="../credits/index.php">Credits</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">Team Management System<a href="#"></a></div>
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
                            <th width="120">Name</th>
                            <th width="112">About</th>
                            <th width="142">Url</th>
                            <th width="80">More Information</th>
                        </tr>
                        <?php
						$sql="SELECT * FROM teams";
						$result = mysql_query($sql) or die("Parse Error");
						if(isset($_GET['search']))
						{
							while($row = mysql_fetch_array($result, MYSQL_ASSOC))
							{
								if($row['team_id'] == $_GET['search'])
								{
									print"<tr>\n";
										print"<td class=\"style1\">".$row['team_id']."</td>\n";
										print"<td>".$row['name']."</td>\n";
										print"<td>".$row['about']."</td>\n";
										print"<td>".$row['url']."</td>\n";
										print"<td><form name=\"form1\" method=\"post\" action=\"showInfo.php\">\n";
										print"<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">\n";
										print" <input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
										print"</form></td>\n";
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
									print"<td>".$row['name']."</td>\n";
									print"<td>".$row['about']."</td>\n";
									print"<td>".$row['url']."</td>\n";
									print"<td><form name=\"form1\" method=\"post\" action=\"showInfo.php\">\n";
									  print"<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">\n";
									 print" <input type=\"submit\" name=\"show\" id=\"show\" value=\"Show\">\n";
									print"</form></td>\n";
								print"</tr>\n";
							}
						}
						?>
                    </table>
              </div>
              <form name="form3" method="post" action="addTeam.php">
                <div class="table"> 
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" colspan="2">Add New team Here</th>
                        </tr>
                        <tr>
                            <td width="172"><strong>Team id:</strong></td>
                            <td><span id="sprytextfield2">
                            <label for="team_id"></label>
                            <input type="text" name="team_id" id="team_id">
                      <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></tr>
                        <tr>
                            <td><strong>Name:</strong></td>
            <td><span id="sprytextfield3">
              <label for="name"></label>
              <input type="text" name="name" id="name">
              <span class="textfieldRequiredMsg">A value is required.</span></span>
                              
            </tr>
                        <tr>
                            <td><strong>Url:</strong></td>
                            <td><span id="sprytextfield1">
                            <label for="url"></label>
                            <input type="text" name="url" id="url">
<span class="textfieldInvalidFormatMsg">Invalid format.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>About:</strong></td>
                            <td><span id="sprytextfield4">
                              <label for="about"></label>
                              <input type="text" name="about" id="about">
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Programming Language</strong></td>
                            <td><label for="language"></label>
                              <select name="language" id="language">
                                <option value="C++">WindRiver/C++</option>
                                <option value="Java">Java</option>
                                <option value="LabView" selected>LabView</option>
                                <option value="Other">Other</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td><strong>Control: </strong></td>
                            <td><span id="sprytextfield5">
                              <label for="control"></label>
                              <input type="text" name="control" id="control">
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Parts Broken:</strong></td>
                            <td><span id="sprytextfield6">
                              <label for="parts_broken"></label>
                              <input type="text" name="parts_broken" id="parts_broken">
                            <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                            <td><strong>Comment:</strong></td>
                            <td><span id="sprytextarea1">
                              <label for="comment2"></label>
                              <textarea name="comment" id="comment2" cols="45" rows="5"></textarea>
</span>
                            </td>
                        </tr>
						<tr>
							<td><strong>Division</strong></td>
							<td><select name="division">
								<option value="Archimedes">Archimedes</option>
								<option value="Curie">Curie</option>
								<option value="Galileo">Galileo</option>
								<option value="Newton">Newton</option>
							</select></td>
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
                <div class="box">Welcome to the team page, here you can edit team informations.</div>
            </div>
<div id="footer">
          <p>Designed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 PHP By Siyuan Gao 2011, Edited by Siyuan Gao 2011</p></div>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "url", {hint:"http://example.com", isRequired:false, validateOn:["change"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "integer", {validateOn:["change"], hint:"####"});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["change"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {hint:"UNKNOWN"});
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {hint:"Nothing Broken"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {validateOn:["change"], isRequired:false, hint:"Type anything about the team"});
</script>
</body>
</html>