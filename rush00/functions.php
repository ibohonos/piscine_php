<?php
define(__PRJ_DIR__, __DIR__);
define(__PRJ_URL__, basename(__DIR__));

include_once __PRJ_DIR__ . "config.php";

function ft_is_loggined() {
	if (isset($_SESSION['auth_user'])) :
		return (1);
	endif;
	return (0);
}

function ft_logged_user_data($value) {
	return $_SESSION['auth_user'][$value];
}

function ft_is_admin() {
	if (ft_logged_user_data('is_admin')) :
		return (1);
	endif;
	return (0);
}

function ft_get_table_data($connect, $table) {
	$arr = [];
	$sql = "SELECT * FROM " . $table;
	$result = mysqli_query($connect, $sql);
	while ($row = mysqli_fetch_assoc($result)) :
		array_push($arr, $row);
	endwhile;
	mysqli_close($connect);
	return $arr;
}

function ft_get_by_id($connect, $table, $id) {
	$sql = "SELECT * FROM " . $table . " WHERE id='" . $id . "'";
	$result = mysqli_query($connect, $sql);
	$product = mysqli_fetch_assoc($result);
	mysqli_close($connect);
	return $product;
}

function ft_upload_image($path, $img) {
	$target_dir = "img/" . $path . "/";
	$target_file = $target_dir . basename($img["name"]);
	var_dump($target_file);
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	if (file_exists($target_file)) :
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	endif;
	if ($img["size"] > 5000000) :
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	endif;
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) :
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	endif;
	move_uploaded_file($img["tmp_name"], $target_file);
	return $target_file;
}

function ft_to_slug($text) {
	$text = strtolower($text);
	$text = preg_replace('/[^A-Za-z0-9 _.]/', '', $text);
	$text = preg_replace('/[ _.]+/', '-', trim($text));
	$text = trim($text, '-');
	return $text;
}
