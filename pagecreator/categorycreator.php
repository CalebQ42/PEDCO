<?php
session_start();
?>
<html>
<head>
</head>
<body>
<?php
$catId = $_REQUEST['id'];
if ($catId == "") {
	$name = "";
	$description = "";
}else {
	include '../sqllogin.php';
	foreach ($conn->query("SELECT * FROM categories WHERE id=" . $catId . " LIMIT 1") as $r) {
		$name = $r["name"];
		$description = $r["description"];
	}
}

if ($_SESSION['loggedin'] == true) {
	echo '<script type="text/javascript" src="categoryCreator.js"></script>';
	echo '<form method="post">';
	echo '<div>';
	echo 'Category Name: <input type="textbox" name="categoryName" id="categoryName" value="' . $name . '"/>';
	echo '<br/>';
	echo 'Description: <input type="textbox" name="descript" id="descript" value="' . $description . '"/>';
	echo '<br/>';
	echo '<input type="hidden"  id="id" value="' . $catId . '"/>';
	echo '<input type="button" value="submit" onclick="sendData()"/>';
	echo '</form>';
	echo '<div id="responseDiv">Reponse is</div>';
}else {
	echo 'Access denied. <a href="../login.php">Click here</a> to log in.';
}
?>
</body>
</html>