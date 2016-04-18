<?php
session_start();
?>
<html>
<head>
<title>Pages</title>
</head>
<body>
<?php
if ($_SESSION['loggedin'] == true) {
	echo '<a href="pagecreator.php">Create New</a>';
	echo '<table border="1">';
	echo '<tr bgcolor="gray">';
	echo '<td>Page Title</td><td>Delete</td>';
	echo '</tr>';
    include "../sqllogin.php";
    foreach ($conn->query("SELECT * FROM pages") as $r) {
	    echo '<tr>';
	    echo '<td><a href="pagecreator.php?id=' . $r['id'] . '">' . $r['title'] . '</a></td><td><a href="delete.php?id=' . $r['id'] . '">Delete</a></td>';
	    echo '</tr>';
    }
}else {
    echo 'Access denied.<br /><a href="../login.php">Click Here</a> to login.';
}

?>
</table>
</body>
</html>