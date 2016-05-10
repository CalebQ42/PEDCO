<?php
session_start();
if ($_SESSION['loggedin'] == true) {
	$pageid = $_REQUEST['id'];

	include "../sqllogin.php";

	$conn->exec("DELETE FROM pages WHERE id=" . $pageid);
	//echo 'Page deleted<br /><a href="index.php">Click Here</a> to go back.';
	echo '<tr bgcolor="gray">';
	echo '<td>Page Title</td><td>Delete</td>';
	echo '</tr>';
	foreach ($conn->query("SELECT * FROM pages") as $r) {
		echo '<tr>';
	    echo '<td><a href="pagecreator.php?id=' . $r['id'] . '">' . $r['title'] . '</a></td><td><a href="#" onclick="deletePage(' . $r['id'] .  ')" >Delete</a></td>';
	    echo '</tr>';
	}
}else {
	echo 'Access denied';
}
?>