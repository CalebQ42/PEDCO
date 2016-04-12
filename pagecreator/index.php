<?php
session_start();
?>
<html>
<head>
<title>Pages</title>
</head>
<body>
<a href="pagecreator.php">Create New</a>
<table border="1">
<tr bgcolor="gray">
<td>Page Title</td><td>Delete</td>
</tr>
<?php
if ($_SESSION['loggedin'] == true) {
    include "../sqllogin.php";
    foreach ($conn->query("SELECT * FROM pages") as $r) {
	    echo '<tr>';
	    echo '<td><a href="pagecreator.php?id=' . $r['id'] . '">' . $r['title'] . '</a></td><td><a href="delete.php?id=' . $r['id'] . '">Delete</a></td>';
	    echo '</tr>';
    }
}else {
    echo 'Access denied.';
}

?>
</table>
</body>
</html>