<?php
include_once "db.php";

if (!isset($_POST) || empty($_POST) ) :
	die("You are cheater!");
endif;
if (isset($_POST['name'])) :
	$name = $_POST['name'];
endif;

$slug = ft_to_slug($name);

$sql = "INSERT INTO product_cats (name, slug) VALUES ('" . $name . "', '" . $slug . "')";
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
