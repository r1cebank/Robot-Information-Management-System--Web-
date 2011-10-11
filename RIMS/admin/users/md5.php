<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MD5 Pass Utility</title>
</head>

<body>
<h5>
<font color="#336600">
<?php
if($_REQUEST['string'] != '')
{
	$string = md5($_REQUEST['string']);
	print $string;
}
?>
</font>
</h5>
<form action="md5.php" method="post">
  <p>
    <label for="string">String to encrypt: </label>
    <input type="text" name="string" id="string" />
  </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit" />
  </p>
</form>
</body>
</html>