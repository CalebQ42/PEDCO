<?php
session_start();
if ($_SESSION['loggedin'] == true) {
	$pageid = $_REQUEST['id'];
	$title = $_REQUEST['title'];
	$html = $_REQUEST['html'];
	if ($_REQUEST['category'] == "0") {
		$category = null;
	}else {
		$category = $_REQUEST['category'];
	}
	$onmenu = $_REQUEST['onmenu'];
	include "../sqllogin.php";

	$match = false;
	foreach ($conn->query("SELECT * FROM pages") as $r) {
		if ($pageid == $r['id']) {
			$match = true;
			break;
		}
	}

	if ($match == true) {
		$sql = "UPDATE pages SET html='$html', title='$title', onmenu='$onmenu', category='$category' WHERE id='$pageid'";
	}else {
		$sql = "INSERT INTO pages (`title`, `html`, `onmenu`, `category`) VALUES ('$title', '$html', '$onmenu', '$category')";
	}
	$conn->exec($sql);
	echo 'Updated<!--<br /><a href="index.php">Click here</a> to go back.-->';
}else {
echo 'Access denied.';
}
?>