<?php
include("../../database/conn.php");
$tb_name = "photo";
$path = "../../match_photo/";
$okfile[0] = "jpg";
$okfile[1] = "bmp";
$okfile[2] = "png";
$okfile[3] = "gif";
$ext = pathinfo(basename($_FILES['upload']['name']),PATHINFO_EXTENSION);
$caption = $_REQUEST['title'];
$pass = false;
for($i=0; $i<4;$i++)
{
	if($ext == $okfile[$i])
	{
		$pass = true;
	}
}
if($pass)
{
	mysql_query("INSERT INTO $tb_name VALUES ('','$path','$caption')") or die ("parse error");
	$query = mysql_fetch_assoc(mysql_query("SELECT id FROM $tb_name ORDER BY id DESC LIMIT 1")) or die("parse error");
	$lastid = $query['id'];
	$target = $path . $lastid. "-".basename($_FILES['upload']['name']);
	if(move_uploaded_file($_FILES['upload']['tmp_name'],$target))
	{
		mysql_query("UPDATE $tb_name SET path = '$target' WHERE id = '$lastid'");
		header('Location: index.php');
	}
	else
	print "fileload unsuccessful";
}
else
{
	print "are yout trying to hack?";
}
?>
</body>
</html>
