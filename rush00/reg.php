<?php
	include_once "config.php";
	include_once "incl/header.php"
?>
	<main>
		<div class="container">
			<?php if (!ft_is_loggined()) : ?>
				<form action="/<?php echo __PRJ_URL__; ?>/register.php" method="POST">
					<div class="row">
						<label for="first_name">First Name</label>
						<input type="text" name="first_name" id="first_name">
					</div>
					<div class="row">
						<label for="last_name">Last Name</label>
						<input type="text" name="last_name" id="last_name">
					</div>
					<div class="row">
						<label for="email">E-mail</label>
						<input type="email" name="email" id="email">
					</div>
					<div class="row">
						<label for="pass">Password</label>
						<input type="password" name="pass" id="pass">
					</div>
					<div class="row">
						<label for="conf_pass">Confirm password</label>
						<input type="password" name="conf_pass" id="conf_pass">
					</div>
					<button type="submit">Registration</button>
				</form>
			<?php else : ?>
				<h1>Hello <?php echo ft_logged_user_data('first_name'); ?> <?php echo ft_logged_user_data('last_name'); ?> - <?php echo  ft_logged_user_data('email'); ?> <a href="logout.php">Log out</a></h1>
			<?php endif; ?>
		</div>
	</main>
<?php
	include_once "incl/footer.php";
?>