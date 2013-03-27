<?php

session_start();

//If user is already logged in, it won't be able to go to these pages
$exceptions = array('register', 'login');

$page = substr(end(explode('/', $_SERVER['SCRIPT_NAME'])), 0, -4);

if (in_array($page, $exceptions) === false)
{
	if (isset($_SESSION['username']) === false)
	{
		header('Location: index.html');
		die();
	}
}

mysql_connect(serverIP, username, password);
mysql_select_db(username);

$path = dirname(__FILE__);

include("../../../COSC 300/website/{$path}\user.inc.php");
?>