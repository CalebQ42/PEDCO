<?php
session_start();
?>
<html>
<head>
<title>Page Form</title>
<script type="text/javascript">
	function showPic(){
		if (document.getElementById("pic").value != null && document.getElementById("pic").value != "" && document.getElementById("iminty").value!="up"){
			document.getElementById("previmg").style.display = "block";
			document.getElementById("previmg").src = document.getElementById("pic").value;
		}else if (document.getElementById("iminty").value=="up"){
			document.getElementById("previmg").style.display = "none";
		}
	}
	function prev(img){
		document.getElementById("previmg").src = img;
	}
	function imgUpChange(){
		document.getElementById("previmg").src = "";
		elem = document.getElementById("picType");
		type = document.getElementById("iminty").value;
		str = "<td colspan='2'>";
		if (type=="url"){
			str += "<input type='text' id='pic' style='width:100%;' onchange='showPic()'/></td>";
			elem.innerHTML = str;
		}else if (type=="prev"){
			str += "<select id='pic' style='width:100%;' onchange='showPic()'><?php include "picLookup.php" ?></select></td>";
			elem.innerHTML = str;
		}else if (type=="up"){
			str += "<input type='file' id='pic' name='pic' style='width:100%;' onchange='showPic()'/></td>";
			elem.innerHTML = str;
		}
	}
</script>
<script type="text/javascript" src="pagecreator.js"></script>
<script type="text/javascript" src="ajax.js"></script>
</head>
<body>
<style type="text/css">
#html {
width: 300px;
height: 100px;
}
#input{
	  background-color:white;
	  position:fixed;
	  text-align: center;
	  width: 350px;
	  z-index:2;
	  border: 1px solid black;
	  border-radius: 2px;
	  display: none;
}
#blackout{
	  position:absolute;
	  top:0;
	  left:0;
	  height: 100%;
	  width: 100%;
	  z-index:1;
	  background: black;
	  opacity: .50;
	  display:none;
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
	echo '<a href="index.php">Go back</a>';
	echo '<form method="post">';
	echo '<table><tr>';
	echo '<td>Title</td><td><input type="text" id="title" name="title" value="' . $title . '"></td>';
	echo '</tr><tr>';
	echo '<td>Category</td><td><select name="category" id="category">';
	echo '<option>-----</option>';
	foreach ($conn->query("SELECT * FROM categories") as $r) {
		echo '<option value="' . $r[id] . '">' . $r[name]  . '</option>';
	}
	echo '</select>';
	echo '<tr></tr>';
	echo '<td>Link on drop-down menu</td><td><input type="checkbox" name="onmenu" id="onmenu" onclick="disableCat()" checked="checked" /></td>';
	echo '</tr><tr>';
	echo '<td>Content</td><td>';
	include 'buttons.php';
	echo '<textarea id="html" name="html" rows="60" cols="20" style="width:600;height:200;">' . $html . '</textarea></td>';
	echo '</tr><tr>';
	echo '<td>Submit</td><td><input type="button" value="Submit" onclick="sendData()" /></td>';
	echo '</tr></table>';
	echo '<input type="hidden" name="id" id="id" value="' . $pageid . '"/>';
	echo '</form>';
	echo '<div id="responseDiv"></div>';
	echo '<div id="input"></div><div id="blackout" onclick="blackClick()"></div>';
}else {
	echo 'Access denied. Click <a href="../login.php">here</a> to login';
}
?>
</body>
</html>
