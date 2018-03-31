<h1>Add product</h1>
<form action="/<?php echo __PRJ_URL__; ?>/create_product.php" method="POST" enctype="multipart/form-data">
	<div>
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
	</div>
	<div>
		<label for="desc">Description</label>
		<textarea id="desc" name="desc"></textarea>
	</div>
	<div>
		<label for="price">Price</label>
		<input type="text" name="price" id="price">
	</div>
	<div>
		<label for="sku">SKU</label>
		<input type="text" name="sku" id="sku">
	</div>
	<div>
		<label for="qty">Qty</label>
		<input type="text" name="qty" id="qty">
	</div>
	<div>
		<label for="img">Select image to upload</label>
		<input type="file" name="img" id="img">
	</div>
	<input type="submit" name="submit" value="Create">
</form>