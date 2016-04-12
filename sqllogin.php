<?php
$ini = parse_ini_file("sqlinfo.ini");
$hostname = $ini['host'];
$dbUser = $ini['db_user'];
$dbPass = $ini['db_pass'];

$conn = new PDO("mysql:host=$hostname;dbname=$dbUser", $dbUser, $dbPass);
?>