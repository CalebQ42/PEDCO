<?php
session_start();

if ($_SESSION['loggedin'] == true) {
$name = $_REQUEST['name'];
$description= $_REQUEST['description'];
$catId = $_REQUEST['id'];
include "../sqllogin.php";

$match = false;
foreach ($conn->query("SELECT * FROM categories") as $r) {
	if ($catId == $r['id']) {
		$match = true;
		break;
	}
}

if ($match == true) {
	$sql = "UPDATE categories SET name='$name', description='$description' WHERE id='$catId'";
}else {
	$sql = "INSERT INTO categories(`name`, `description`) VALUES ('$name', '$description')";
}

$conn->exec($sql);
echo 'Updated<!--<br /><a href="index.php">Click here</a> to go back.-->';
}
else {
echo 'Access denied';
}
?>