<?php
	include_once "incl/header.php";
	include_once "db.php";

	$products = ft_get_table_data($connect, 'products');
?>
	<main>
		<div class="container">
			<?php if (empty($_GET)) : ?>
				<h1>Products</h1>
				<div class="row">
					<div class="col-3">
						<p>Hello cats</p>
						<?php if (ft_is_admin()) : ?>
							<a href="/<?php echo __PRJ_URL__; ?>/product_cat.php?add">Add category</a>
						<?php endif; ?>
					</div>
					<div class="col-9">
						<?php if (ft_is_admin()) : ?>
							<a href="/<?php echo __PRJ_URL__; ?>/products.php?add">Create product</a>
						<?php endif; ?>
						<?php if (!empty($products)) : ?>
							<ul>
								<?php foreach ($products as $product) : ?>
									<li>
										<a href="/<?php echo __PRJ_URL__; ?>/product.php?id=<?php echo $product['id'];?>">
											<?php echo $product['name']; ?>
										</a>
										<?php if ($product['price'] > 0) : ?>
											<p>$<?php echo $product['price']; ?></p>
										<?php endif; ?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php else : ?>
							<p>No products.</p>
						<?php endif; ?>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php elseif (isset($_GET['add'])) : ?>
				<?php include_once __PRJ_DIR__ . "/add_product.php"; ?>
			<?php endif; ?>
		</div>
	</main>
<?php include_once "incl/footer.php"; ?>
