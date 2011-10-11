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
	<!-- END Fx.Slide -->
    
    
    <script src="prototype/prototype.js" type="text/javascript" charset="utf-8"></script>
  	<script src="prototype/scriptaculous.js" type="text/javascript" charset="utf-8"></script>
  	<script src="prototype/iphone-style-checkboxes.js" type="text/javascript" charset="utf-8"></script>
  	<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8" />
    <style type="text/css">
    body {
    }
    label.left {
      float: left;
      padding: 4px;
      padding-right: 15px;
    }
    .css_sized_container .iPhoneCheckContainer {
      width: 250px;
    }
	.all
	{
		margin:0 auto;
	}
    ol {
	list-style-type: none;
	margin: 0;
	padding: 0;
    }
    ol li {
      padding: 10px;
      margin: 0;
    }
    .onchange input {
      opacity: 1 !important;
      left: 100px;
    }
    .onchange .iPhoneCheckContainer {
      overflow: visible;
    }
    </style>
  <script type="text/javascript" charset="utf-8">
    document.observe("dom:loaded", function() {
      new iPhoneStyle('.on_off input[type=checkbox]');
      new iPhoneStyle('.css_sized_container input[type=checkbox]', { resizeContainer: false, resizeHandle: false });
      new iPhoneStyle('.long_tiny input[type=checkbox]', { checkedLabel: 'Webcam', uncheckedLabel: 'Upload' });
      
      var onchange_checkbox = $$('.onchange input[type=checkbox]').first();
      new iPhoneStyle(onchange_checkbox);
      setInterval(function toggleCheckbox() {
        onchange_checkbox.writeAttribute('checked', !onchange_checkbox.checked);
        onchange_checkbox.change();
        $('status').update(onchange_checkbox.checked);
      }, 2500);
    });
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
            <a href="#" class="logo"><img src="<?php print "../".$row['game_logo'];?>" width="120" alt="" /> Army Ants System Management</a>
          <ul id="top-navigation">
				<li><a href="../index.php">Homepage</a></li>
                <li><a href="../teams/index.php">Teams</a></li>
                <li><a href="../robots/index.php">Robots</a></li>
                <li><a href="../matches/index.php">Matches</a></li>
				<li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                <li><a href="../matches_simp/index.php">Matches Mini</a></li>
                <li><a href="#" class="active">System</a></li>
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
                    <li><a href="../teams/index.php">Teams</a></li>
                	<li><a href="../robots/index.php">Robots</a></li>
                	<li><a href="../matches/index.php">Matches</a></li>
                    <li><a href="../drive_team/index.php">Drive Team Eval</a></li>
                    <li><a href="../matches_simp/index.php">Matches Mini</a></li>
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
                    <div class="breadcrumbs">System Management System<a href="#"></a></div>
                </div>
              <div class="table">
              <form name="form1" method="post" action="systemEdit.php">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Entry</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td class="style1">Game name</td>
                            <td>
                              <label for="game_name"></label>
                              <input type="text" name="game_name" id="game_name" value="<?php print $row['game_name'];?>">
                            </td>
                        </tr>
                        <tr>
                            <td class="style1">Game Logo</td>
                            <td><label for="game_logo"></label>
                            <input name="game_logo" type="text" id="game_logo" value="<?php print $row['game_logo'];?>"></td>
                        </tr>
                        <tr>
                            <td class="style1">Game Year</td>
                            <td><label for="game_year"></label>
                            <input name="game_year" type="text" id="game_year" value="<?php print $row['game_year'];?>"></td>
                        </tr>
                        <tr>
                            <td class="style1">Game Type</td>
                            <td><label for="game_type"></label>
                            <input name="game_type" type="text" id="game_type" value="<?php print $row['game_type'];?>"></td>
                        </tr>
                        <tr>
                            <td class="style1">Game Location</td>
                            <td><label for="game_location"></label>
                            <input name="game_location" type="text" id="game_location" value="<?php print $row['game_location'];?>"></td>
                        </tr>
                        <tr>
                            <td class="style1">Game Comment</td>
                            <td><label for="game_comment"></label>
                            <input name="game_comment" type="text" id="game_comment" value="<?php print $row['game_comment'];?>"></td>
                        </tr>
                        <tr>       
                            <td class="style1">Language Filter</td>
                            <td>
                            <ol class="on_off">
                        		<li><input type="checkbox" name="filter" <?php if($row['filter'] == 1) print "checked=\"checked\""?> id="filter">
                            	</li>
                            </ol>
                            </td>
                        </tr>
                        <tr>       
                            <td class="style1">Safe Mode</td>
                            <td>
                            <ol class="on_off">
                        		<li><input type="checkbox" name="safe_mode" <?php if($row['safe_mode'] == 1) print "checked=\"checked\""?> id="safe_mode">
								</li>
                            </ol>
                            </td>
                        </tr>
						<tr>
							<td class="style1">Safe Mode Reason</td>
							<td>
							<input type="text" name="reason" id="reason" value="<?php print $row['safe_mode_comment'];?>">
							</td>
						</tr>
                        <tr>       
                            <td class="style1">Image Upload Mode</td>
                            <td>
                            <ol class="long_tiny">
                                <li>
                                <input type="checkbox" id="upload_mode" <?php if($row['upload_mode'] == 1) print "checked=\"checked\""?>  name="upload_mode"/>
                                </li>
                            </ol>
                            </td>
                        </tr>
						<tr>
							<td class="style1">Server daily news</td>
							<td>
								<textarea name="notice" id="notice" cols="45" rows="5"><?php print $row['notice'];?></textarea>
							</td>
						</tr>
                    </table>
                    <div class="select">
                        <strong>Click when finished: </strong>
						<input type="submit" name="submit" id="submit" value="Finish">
                </div>
                    </form>
                </div>
            </div>
            <div id="right-column">
                <strong class="h">Quick Info</strong>
                <div class="box">Welcome to the system page! Here you can edit game informations.</div>
            </div>
        </div>
        <div id="footer">
          <p>Developed by <a href="http://twitter.com/umutm">Umut Muhaddisoglu</a> 2008. Updated for HTML5/CSS3 by <a href="http://mediagearhead.com">Giles Wells</a> 2010 Edited by Siyuan Gao 2011</p></div>
    </div>
</body>
</html>