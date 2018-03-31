<?php
include_once "db.php";

if (!isset($_POST) || empty($_POST) ) :
	die("You are cheater!");
endif;
if (isset($_POST['first_name'])) :
	$first_name = $_POST['first_name'];
endif;
if (isset($_POST['last_name'])) :
	$last_name = $_POST['last_name'];
endif;
if (isset($_POST['email'])) :
	$email = $_POST['email'];
endif;
if (isset($_POST['pass'])) :
	$pass = md5($_POST['pass']);
endif;
if (isset($_POST['conf_pass'])) :
	$conf_pass = md5($_POST['conf_pass']);
endif;
if ($pass != $conf_pass) :
	die("Passwords not match!");
endif;

$sql = "INSERT INTO users (first_name, last_name, email, pass) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $pass . "')";
if (mysqli_query($connect, $sql)) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
?>
<script>
	window.location.href = 'index.php';
</script>