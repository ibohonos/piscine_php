<?php
include_once "db.php";

if (!isset($_POST) || empty($_POST) ) :
	die("You are cheater!");
endif;
if (isset($_POST['email'])) :
	$email = $_POST['email'];
endif;
if (isset($_POST['pass'])) :
	$pass = md5($_POST['pass']);
endif;

$sql = "SELECT * FROM users WHERE email='" . $email . "'";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) :
	$row = mysqli_fetch_assoc($result);
else :
	die("ERROR: Wrong E-mail.");
endif;
if ($row['pass'] != $pass) :
	die("ERROR: Wrong password.");
endif;
$_SESSION['auth_user'] = $row;
mysqli_close($connect);
?>
<script>
	window.location.href = 'index.php';
</script>