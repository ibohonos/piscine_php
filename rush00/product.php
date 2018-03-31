<?php
include_once "incl/header.php";
include_once "db.php";

$product = ft_get_by_id($connect, 'products', $_GET['id']);
?>
	<main>
		<div class="container">
			<h1>
				<?php if (!empty($product)) : ?>
					<span><?php echo $product['name']; ?></span>
				<?php else : ?>
					<span>Product not found!</span>
				<?php endif; ?>
			</h1>
			<?php if (!empty($product)) : ?>
				<div class="row">
					<?php if (!empty($product['image'])) : ?>
						<div class="col-3">
							<img src="<?php echo $product['image']; ?>">
						</div>
						<div class="col-9">
					<?php else : ?>
						<div class="col-12">
					<?php endif; ?>
						<p><?php echo nl2br($product['description']); ?></p>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</main>
<?php
include_once "footer.php";