<?php session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" type="text/css" href="../Styles/Login.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Mono&family=Roboto+Mono:ital,wght@0,300;0,400;1,200&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
		<title>Login</title>
	</head>
	<body>
		<div class="main">
			<div class="login-form">
  				<form method="POST" action="verifica.php">
    			<h1>Login</h1>
				<?php
				if(isset($_SESSION['invalido']))
				{
				?>
				<div class="notification">
					<p>Email ou senha errados. Tente novamente</p>
				</div>
				<?php 
				} 
				unset($_SESSION['invalido']); ?>
    				<div class="content">
      					<div class="input-field">
        					<input type="email" placeholder="Email" name ="email" autocomplete="nope">
      					</div>
      					<div class="input-field">
        					<input type="password" placeholder="Password" name="password" autocomplete="new-password">
        				</div>
      				</div>
      				<div class="action">
      					<button>Go</button>
      				</div>
					  <a href="recoverpword.php" class="link">Forgot Your Password?</a>
	</body>
</html>