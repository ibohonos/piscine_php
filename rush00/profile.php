<?php include_once "incl/header.php"; ?>
	<main>
		<div class="container">
			<h1>Hello <?php echo ft_logged_user_data('first_name'); ?> <?php echo ft_logged_user_data('last_name'); ?> <a href="logout.php">Log out</a></h1>
		</div>
	</main>
<?php include_once "incl/footer.php"; ?>
