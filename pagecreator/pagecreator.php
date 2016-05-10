<?php
session_start();
?>
<html>
<head>
<title>Page Form</title>
<script type="text/javascript" src="pagecreator.js"></script>
<script type="text/javascript" src="ajax.js"></script>
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
	echo '<form method="post">';
	echo '<table><tr>';
	echo '<td>Title</td><td><input type="text" id="title" name="title" value="' . $title . '"></td>';
	echo '</tr><tr>';
	/*echo '<td>Category</td><td><select name="category">';
	foreach ($conn->query("SELECT * FROM categories") as $r) {
		echo '<option value="' . $r[id] . '">' . $r[name]  . '</select>';
	}
	echo '</tr><tr>';
	*/
	echo '<td>Content</td><td>';
	include 'buttons.php';
	echo '<textarea id="html" name="html" rows="60" cols="20" style="width:600;height:200;">' . $html . '</textarea></td>';
	echo '</tr><tr>';
	echo '<td>Submit</td><td><input type="button" value="Submit" onclick="sendData()" /></td>';
	echo '</tr></table>';
	echo '<input type="hidden" name="id" id="id" value="' . $pageid . '"/>';
	echo '</form>';
	echo '<div id="responseDiv"></div>';
}else {
	echo 'Access denied. Click <a href="../login.php">here</a> to login';
}
?>
</body>
</html>