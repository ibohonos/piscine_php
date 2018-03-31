<h1>Add category</h1>
<form action="/<?php echo __PRJ_URL__; ?>/create_cat.php" method="POST">
	<div>
		<label for="name">Name</label>
		<input type="text" name="name" id="name">
	</div>
	<input type="submit" name="submit" value="Create">
</form>