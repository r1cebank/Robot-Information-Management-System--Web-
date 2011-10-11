<?php
function filter($str)
{
	$str_back = $str;
	include("../database/conn.php");
	$sql="SELECT * FROM system WHERE id =1";
	$result = mysql_query($sql) or die("Parse Error");
	$row = mysql_fetch_assoc($result);
	if($row['filter'] != 0)
	{
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		$result = mysql_query("SELECT * FROM bad_words");
		$badwords = array();
		while($row = mysql_fetch_assoc($result))
		{
			$badwords[] = $row['word'];
		}
		for($i=0;$i < sizeof($badwords);$i++)
		{
			$str= str_ireplace($badwords[$i]," [censored] ",$str);
		}
	}
 return $str;
}
?>