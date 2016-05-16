<?php
session_start();

if ($_SESSION['loggedin'] == true) {
	$catId = $_REQUEST['id'];
	include '../sqllogin.php';
	$conn->exec("DELETE FROM categories WHERE id=" . $catId);
	
	echo '<tr bgcolor="gray">';
	echo '<td>Category Name</td><td>Delete</td>';
	echo '</tr>';
	foreach ($conn->query("SELECT * FROM categories") as $r) {
		echo '<tr>';
		echo '<td><a href="categorycreator.php?id=' . $r['id'] . '">' . $r['name'] . '</a></td><td><a href="#" onclick="deleteCategory(' . $r['id'] . ')">Delete</a></td>';
		echo '</tr>';
	}
}else {
	echo 'Access denied.';
}
?>