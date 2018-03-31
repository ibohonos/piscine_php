<?php
include_once "db.php";
include_once "functions.php";

if (!isset($_POST) || empty($_POST) ) :
	die("You are cheater!");
endif;
if (isset($_POST['name'])) :
	$name = $_POST['name'];
endif;
if (isset($_POST['desc'])) :
	$desc = htmlentities($_POST['desc']);
endif;
if (isset($_POST['sku'])) :
	$sku = $_POST['sku'];
endif;
if (isset($_POST['qty'])) :
	$qty = $_POST['qty'];
endif;
if (isset($_POST['price'])) :
	$price = $_POST['price'];
endif;
if (isset($_FILES['img'])) :
	$img = ft_upload_image('products', $_FILES['img']);
endif;

$sql = "INSERT INTO products (name, description, sku, qty, price, image) VALUES ('" . $name . "', '" . $desc . "', '" . $sku . "', '" . $qty . "', '" . $price . "', '" . $img . "')";
if (mysqli_query($connect, $sql)) {
	echo "New record created successfully";
	mysqli_close($connect);
	?>
	<script>
		window.location.href = 'products.php';
	</script>
	<?php
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($connect);
	mysqli_close($connect);
}

?>
