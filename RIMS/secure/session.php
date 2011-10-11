<?php
function sessionInit()
{
	$_SESSION['user'] = "Guest";
	$_SESSION['type'] = 2;
	$_SESSION['ban'] = 0;
	$_SESSION['logged'] = false;
	$_SESSION['edit'] = 1;
}
?>