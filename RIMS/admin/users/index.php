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
    <link rel="stylesheet" type="text/css" href="sample.css" />
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
	<script type="text/javascript" src="popup-window.js"></script>
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants RIMS User Management</a>
            <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="../system/index.php">System</a></li>
                <li><a href="../dataop/index.php">Export/Import</a></li>
				<li><a href="#" class="active">Users</a></li>
                <li><a href="../photo/index.php">Photo Upload</a></li>
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
                    <li><a href="../system/index.php">System</a></li>
                    <li><a href="../dataop/index.php">Export/Import</a></li>
                    <li><a href="../photo/index.php">Photo Upload</a></li>
                    <li><a href="../credits/index.php">Credits</a></li>
                </ul>
                <p><a href="#" class="link">Link here</a></p>
                <p><a href="http://armyants.us/index.php"><img src="../../game_lnfo/armyants.png" alt="Army Ants Logo" width="100" align="center"></a></p>
                <p><a href="http://usfirst.org/Default.aspx"><img src="../../game_lnfo/FRCicon_RGB.gif" width="100"></a></p>
            </div>
            <div id="center-column">
                <div class="top-bar">
                <a href="#" class="button" onClick="popup_show('popup', 'popup_drag', 'popup_exit', 'element-bottom', 0, 10, 'pos_bottom');">ADD NEW </a>
                <!-- ***** Popup Window **************************************************** -->
                
                <div class="sample_popup"     id="popup" style="display: none;">
                
                <div class="menu_form_header" id="popup_drag">
                <a href="#" onClick="popup_exit(popup)"><img class="menu_form_exit"   id="popup_exit" src="img/form_exit.png" alt="" /></a>
                &nbsp;&nbsp;&nbsp;Login
                </div>
                
                <div class="menu_form_body">
                <form id="form1" method="post" action="addUser.php">
                <table>
                <tr><th>Username:</th><td><input class="field" type="text"     onfocus="select();" name="username" id="username"/></td></tr>
                <tr><th>Password:</th><td><input class="field" type="password" onfocus="select();" name="password" id="password"/></td></tr>
                <tr><th>Account Type:</th><td><label for="type"></label>
                <select name="type" id="type">
                <option value="0">Admin</option>
                <option value="1">Scout Master</option>
                <option value="2">Public</option>
                </select>
                <tr><th>         </th><td><input class="btn"   type="submit"   value="Submit"/></td></tr>
                </table>
                </form>
                </div>
                </div>
                <h1>Welcome to Army Ants RIMS!</h1>
                    <div class="breadcrumbs">User management System</div>
                    </div>
                    <p></p>
                    <p>&nbsp;</p>
                    <p><strong>Display Options:&nbsp;&nbsp;</strong> <a href="index.php?hideTeams=1">Hide Teams</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="index.php?hideTeams=0">Show Teams</a></p>
                    <div class="select-bar">
                <form name="form2" method="get" action="index.php">
                    <label>Search for user:</label>
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
                            <th width="74">uid</th>
                            <th width="107">username</th>
                            <th width="145">password</th>
                            <th width="77">type</th>
                            <th width="74">ban</th>
                            
                            <th width="69">disable edit</th>
                            <th width="65">edit</th>
                        </tr>
                        <?php
						$sql="SELECT * FROM user";
						$hideTeams = true;
						if (isset($_GET['hideTeams']))
						{
							$hideTeams = $_GET['hideTeams'];
							settype($hideTeams, "boolean");	
						}
						$result = mysql_query($sql) or die("Parse Error");
						while($row = mysql_fetch_array($result, MYSQL_ASSOC))
						{
							if (!isset($_GET['search']))
							{
								if(!($hideTeams && is_numeric($row['username'])))
								{
									if($row['username'] != "public")
									{
										print"<tr>\n";
										print"<form name=\"form2\" method=\"post\" action=\"userEdit.php\">\n";
										print "<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">";
										print"<td class=\"style1\">".$row['id']."</td>\n";
										print"<td>\n";
										print"<label for=\"user\"></label>\n";
										print"<input type=\"text\" name=\"user\" id=\"user\" value=\"".$row['username']."\">\n";
										print"</td>\n";
										print"<td><label for=\"password\"></label>\n";
										print"<input type=\"text\" name=\"password\" id=\"password\" value=\"".$row['password']."\"></td>\n";
										print"<td><label for=\"user_type\"></label>\n";
										print"<select name=\"user_type\" id=\"user_type\">\n";
										print"<option value=\"0\" ";
										if($row['type'] == 0) print "selected";
										print " >Admin</option>\n";
										print"<option value=\"1\" ";
										if($row['type'] == 1) print "selected";
										print " >Scout Master</option>\n";
										print"<option value=\"2\" ";
										if($row['type'] == 2) print "selected";
										print " >Public</option>\n";
										print"</select></td>\n";
										print"<td><label for=\"ban\"></label>\n";
										print"<select name=\"ban\" id=\"ban\">\n";
										print"<option value=\"1\" ";
										if($row['ban'] == 1) print "selected";
										print " >Ban</option>\n";
										print"<option value=\"0\" ";
										if($row['ban'] == 0) print "selected";
										print " >Pardon</option>\n";
										print"</select></td>\n";
										print"<td><label for=\"disable_edit\"></label>\n";
										print"<select name=\"disable_edit\" id=\"disable_edit\">\n";
										print"<option value=\"1\" ";
										if($row['disable_edit'] == 1) print "selected";
										print " >Disable Edit</option>\n";
										print"<option value=\"0\" ";
										if($row['disable_edit'] == 0) print "selected";
										print " >Enable Edit</option>\n";
										print"</select></td>\n";
										print"<td><input type=\"submit\" name=\"edit\" id=\"edit\" value=\"Edit\" "."onclick=\"return confirmDelete();\"></form></td>\n";
										print"</tr>\n";
									}
								}
							}
							else
							{
								if($row['username'] == $_GET['search'])
								{
									print"<tr>\n";
									print"<form name=\"form2\" method=\"post\" action=\"userEdit.php\">\n";
									print "<input name=\"id\" type=\"hidden\" value=\"".$row['id']."\">";
									print"<td class=\"style1\">".$row['id']."</td>\n";
									print"<td>\n";
									print"<label for=\"user\"></label>\n";
									print"<input type=\"text\" name=\"user\" id=\"user\" value=\"".$row['username']."\">\n";
									print"</td>\n";
									print"<td><label for=\"password\"></label>\n";
									print"<input type=\"text\" name=\"password\" id=\"password\" value=\"".$row['password']."\"></td>\n";
									print"<td><label for=\"user_type\"></label>\n";
									print"<select name=\"user_type\" id=\"user_type\">\n";
									print"<option value=\"0\" ";
									if($row['type'] == 0) print "selected";
									print " >Admin</option>\n";
									print"<option value=\"1\" ";
									if($row['type'] == 1) print "selected";
									print " >Scout Master</option>\n";
									print"<option value=\"2\" ";
									if($row['type'] == 2) print "selected";
									print " >Field Scouter</option>\n";
									print"<option value=\"3\" ";
									if($row['type'] == 3) print "selected";
									print " >Pit Scouter</option>\n";
									print"<option value=\"4\" ";
									if($row['type'] == 4) print "selected";
									print " >Public</option>\n";
									print"</select></td>\n";
									print"<td><label for=\"ban\"></label>\n";
									print"<select name=\"ban\" id=\"ban\">\n";
									print"<option value=\"1\" ";
									if($row['ban'] == 1) print "selected";
									print " >Ban</option>\n";
									print"<option value=\"0\" ";
									if($row['ban'] == 0) print "selected";
									print " >Pardon</option>\n";
									print"</select></td>\n";
									print"<td><label for=\"disable_edit\"></label>\n";
									print"<select name=\"disable_edit\" id=\"disable_edit\">\n";
									print"<option value=\"1\" ";
									if($row['disable_edit'] == 1) print "selected";
									print " >Disable Edit</option>\n";
									print"<option value=\"0\" ";
									if($row['disable_edit'] == 0) print "selected";
									print " >Enable Edit</option>\n";
									print"</select></td>\n";
									print"<td><input type=\"submit\" name=\"edit\" id=\"edit\" value=\"Edit\" "."onclick=\"return confirmDelete();\".\"></form></td>\n";
									print"</tr>\n";
								}
							}
						}
						?>
                    </table>
                    <div class="select">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FFFFFF"><a href="banAll.php?ban=0" style="text-align:center;"><strong>Pardon All</strong></a>&nbsp;&nbsp;&nbsp;<a href="javascript:confirmLink('Are you sure you want to ban all users? That is very mean.',
'banAll.php?ban=1')"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Ban All</strong></a></font>
                    </div>
                </div>
              </div>
            </div>
        <div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
    </div>
</body>
</html>