<html>
<head>
<link rel="stylesheet" type="text/css" href="main.css" />
<title>Main</title>
</head>
<body>
<div id="main">
<?php
$pageTitle = strtolower($_REQUEST['title']);
include "sqllogin.php";
if ($pageTitle == "") {
	foreach($conn->query('SELECT * FROM pages WHERE id=1') as $r) {
		echo $r['html'];
	}
}else {
	foreach($conn->query('SELECT * FROM pages') as $r) {
		if (strtolower($r['title']) == $pageTitle) {
			echo $r['html'];
			break;
		}
	}
}
?>
</div>
</body>
</html>