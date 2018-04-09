<?php
	session_start();
	if (isset($_GET['submit'])) :
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	endif;
?>
<html><body>
<form action="" method="GET">
	Username: <input type="text" name="login" value="<?php echo $_SESSION['login']; ?>" />
	<br />
	Password: <input type="password" name="passwd" value="<?php echo $_SESSION['passwd']; ?>" />
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
