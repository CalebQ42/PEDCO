<?php
session_start();
?>
<html>
<head>
<title>Pages</title>
<script type="text/javascript" src="delete.js"></script>
</head>
<body>
<?php
if ($_SESSION['loggedin'] == true) {
	echo '<h1>Pages</h1>';
	echo '<a href="pagecreator.php">Create New</a>';
	echo '<table border="1" id="pageList">';
	echo '<tr bgcolor="gray">';
	echo '<td>Page Title</td><td>Delete</td>';
	echo '</tr>';
    include "../sqllogin.php";
    foreach ($conn->query("SELECT * FROM pages") as $r) {
	    echo '<tr>';
	    echo '<td><a href="pagecreator.php?id=' . $r['id'] . '">' . $r['title'] . '</a></td><td><a href="#" onclick="deletePage(' . $r['id'] .  ')" >Delete</a></td>';
	    echo '</tr>';
	}
	echo '</table>';
	echo '<hr />';
	echo '<h1>Categories</h1>';
	echo '<a href="categorycreator.php">Create New</a>';
	echo '<table border="1" id="categoryList">';
	echo '<tr bgcolor="gray">';
	echo '<td>Category Name</td><td>Delete</td>';
	echo '</tr>';
	foreach ($conn->query("SELECT * FROM categories") as $r) {
		echo '<tr>';
		echo '<td><a href="categorycreator.php?id=' . $r['id'] . '">' . $r['name'] . '</a></td><td><a href="#" onclick="deleteCategory(' . $r['id'] . ')">Delete</a></td>';
		echo '</tr>';
	}
	echo '</table>';
}else {
    echo 'Access denied.<br /><a href="../login.php">Click Here</a> to login.';
}

?>
</table>
</body>
</html>