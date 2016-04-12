<?php
session_start();

function getInput($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = getInput($_REQUEST["username"]);
	$password = getInput($_REQUEST["password"]);
	$hash = md5($password);
        include "sqllogin.php";
	foreach($conn->query("SELECT * FROM users") as $r) {
		if ($username == $r['username'] && $hash == $r['password']) {
			$_SESSION['loggedin'] = true;
			echo 'Login Successful.<br /><a href="pagecreator/index.php">Click here</a> to continue.';
			break;
		}else {
			echo "Login Failed";
		}
	}
}else {
        echo '<form action="login.php" method="post">';
        echo '<table><tr>';
        echo '<td>Username:</td><td><input type="text" id="username" name="username" /></td></tr>';
        echo '<tr>';
        echo '<td>Password:</td><td><input type="password" id="password" name="password" /></td></tr>';
        echo '<tr><td>Submit</td><td><input type="submit" value="Submit" /></td></tr>';
        echo '</table>';
        echo '</form>';
}
?>