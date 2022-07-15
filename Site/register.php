<html>
<head>
	<title>Register an account</title>
	<link rel="stylesheet" href="<?=BASE?>/CSS/LoginCss/register.css">
</head>
<body>
	<div id="container">
	<h2>Register your account!</h2>
		<?php
			if(isset($_GET['error'])){
				echo $_GET['error'];
			}
		?>
		<form method="post" action="">
			<label>Username: <input type="text" name="username" id="username"/></label><br />
			<label>Password: <input type="password" name="password" id="password"/></label><br />
			<label>Password confirmation: <input type="password" name="password_confirm" id="passConfirm"/></label><br />
			
			<input type="submit" name="action" value="Register" id="register"/>

		</form>
		<a href="/login">Already have an account? Login.</a>
	</div>
</body>
</html>