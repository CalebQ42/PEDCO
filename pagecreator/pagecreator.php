<?php
session_start();
?>
<html>
<head>
<title>Page Form</title>
</head>
<body>
<style type="text/css">
#html {
width: 300px;
height: 100px;
}
</style>
<?php
$pageid = $_REQUEST["id"];
if ($pageid == "") {
	$title = "";
	$html = "";
}else {
	include "../sqllogin.php";
	foreach ($conn->query("SELECT * FROM pages WHERE id=" . $pageid . " LIMIT 1") as $r) {
		$title = $r['title'];
		$html = $r['html'];
	}
}

if ($_SESSION['loggedin'] == true) {
	echo '<form action="submit.php" method="post">';
	echo '<table><tr>';
	echo '<td>Title</td><td><input type="text" id="title" name="title" value="' . $title . '"></td>';
	echo '</tr><tr>';
	echo '<td>HTML</td><td><textarea id="html" name="html" rows="30" cols="10">' . $html . '</textarea></td>';
	echo '</tr><tr>';
	echo '<td>Submit</td><td><input type="submit" value="submit" /></td>';
	echo '</tr></table>';
	echo '<input type="hidden" name="id" value="' . $pageid . '"/>';
	echo '</form>';
}else {
	echo 'Access denied. Click <a href="../login.php">here</a> to login';
}
?>
</body>
</html>