<!DOCTYPE HTML>
<?php



?>

<html>
<head>
	<title>Log into an account</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/LoginCss/login.css">
</head>
<body>
	<div id="container">
		<?php
			if(isset($_GET['error']))
				echo $_GET['error'];
		?>
		<h2>Login to your account!</h2>
		<form method="post" action="" id="loginForm">
			<label id="username">Username: <input type="text" name="username" /></label><br />
			<label id="password">Password: <input type="password" name="password" /></label><br />
			
			<input type="submit" name="action" value="Login" id="loginButton"/>

		</form>
		<a href="<?=BASE?>/Default/register">No account? Register.</a>
	</div>
</body>
</html>