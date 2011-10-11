<?php
function buildConn($host, $user, $pass)
{
	$connFile = "../database/conn.php";
	unlink($connFile);
	$fh = fopen($connFile, 'a+');
	fwrite($fh, "<?php\n");
	fwrite($fh,"error_reporting(0);\n");
	fwrite($fh,'$dbhost ='." '".$host."';\n");
	fwrite($fh,'$dbuser ='." '".$user."';\n");
	fwrite($fh,'$dbpass ='."'".$pass."';\n");
	fwrite($fh,'$conn ='." mysql_connect(".'$dbhost, $dbuser, $dbpass'.");\n");
	fwrite($fh,'$dbname ='." 'rims';\n");
	fwrite($fh,"mysql_select_db(".'$dbname'.");\n");
	fwrite($fh,"//Created by RIMS Setup Script\n");
	fwrite($fh,"?>");
	fclose($fh);
}
?>