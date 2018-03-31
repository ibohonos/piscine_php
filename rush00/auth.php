<?php
	include_once "config.php";
	include_once "incl/header.php";
?>
	<main>
		<div class="container">
			<?php if (!ft_is_loggined()) : ?>
				<form action="/<?php echo __PRJ_URL__; ?>/autorization.php" method="POST">
					<div class="row">
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email">
					</div>
					<div class="row">
						<label for="pass">Password</label>
						<input type="password" name="pass" id="pass">
					</div>
					<button type="submit">Enter</button>
				</form>
			<?php else : ?>
				<h1>Hello <?php echo ft_logged_user_data('first_name'); ?> <?php echo ft_logged_user_data('last_name'); ?> - <?php echo  ft_logged_user_data('email'); ?> <a href="logout.php">Log out</a></h1>
			<?php endif; ?>
		</div>
	</main>
<?php
	include_once "incl/footer.php";
?>