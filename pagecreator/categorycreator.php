<?php
session_start();
?>
<html>
<head>
</head>
<body>
<?php
if ($_SESSION['loggedin'] == true) {
echo '<table>';
echo '';
echo '</table>';
}else {
echo 'Access denied. <a href="../login.php">Click here</a> to log in.';
}
?>
</body>
</html>