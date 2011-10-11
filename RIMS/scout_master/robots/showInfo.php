<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Comment</title>
</head>

<body>
<h3>More Information:</h3>
<p><font color="#336600" face="Arial, Helvetica, sans-serif">
<?php
error_reporting(0);
include("../../database/conn.php");
include ("../../secure/filter.php");
$id = $_GET['id'];
$sql="SELECT * FROM robot WHERE id = '$id'";
$result = mysql_query($sql) or die("Parse Error");
$row = mysql_fetch_array($result, MYSQL_ASSOC);
print filter($row['other_detail']);
?>
  </font>
</p>
<p>
	<?php
	if($row['minibot'] == 1)
		print "Has Minibot, please check Matches Mini for current Minibot Status";
	else
		print "No Minobot, not eliminating the possibility of using other teams";
	?>
</p>
<form id="form1" name="form1" method="post" action="">
  <input type="submit" name="close" id="close" onclick="javascript:window.close();"value="Close Window" />
</form>
<p>&nbsp;</p>
</body>
</html>