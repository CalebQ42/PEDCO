<?php
$pageid = $_REQUEST['id'];
$title = $_REQUEST['title'];
$html = $_REQUEST['html'];
include "../sqllogin.php";

$match = false;
foreach ($conn->query("SELECT * FROM pages") as $r) {
	if ($pageid == $r['id']) {
		$match = true;
		break;
	}
}

if ($match == true) {
	$sql = "UPDATE pages SET html='$html' WHERE id='$pageid'";
}else {
	$sql = "INSERT INTO pages (`title`, `html`) VALUES ('$title', '$html')";
}
$conn->exec($sql);
echo 'Updated<br /><a href="index.php">Click here</a> to go back.';
?>