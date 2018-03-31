<?php include_once "head.php"; ?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-2">
				<a href="/<?php echo __PRJ_URL__; ?>">
					<img src="/<?php echo __PRJ_URL__; ?>/img/logo.png" alt="logo" title="logo" class="logo">
				</a>
			</div>
			<div class="col-7">
				<ul class="menu">
					<li>
						<a href="/<?php echo __PRJ_URL__; ?>">Home</a>
					</li>
					<li>
						<a href="/<?php echo __PRJ_URL__; ?>/products.php">Products</a>
					</li>
				</ul>
			</div>
			<div class="col-3">
				<ul class="auth">
					<?php if (!ft_is_loggined()) : ?>
						<li>
							<a href="/<?php echo __PRJ_URL__; ?>/auth.php">Sign in</a>
						</li>
						<li>
							<a href="/<?php echo __PRJ_URL__; ?>/reg.php">Sign up</a>
						</li>
					<?php else : ?>
						<li>
							<a href="/<?php echo __PRJ_URL__; ?>/profile.php">Profile</a>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</header>