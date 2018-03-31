<?php

include_once "config.php";

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$connect) {
	die("Connection failed: " . $connect->connect_error);
}
