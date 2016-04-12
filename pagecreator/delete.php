<?php
session_start();
if ($_SESSION['loggedin'] == true) {
	$pageid = $_REQUEST['id'];

	include "../sqllogin.php";

	$conn->exec("DELETE FROM pages WHERE id=" . $pageid);
	echo 'Page deleted<br /><a href="index.php">Click Here</a> to go back.';
}else {
	echo 'Access denied';
}
?>