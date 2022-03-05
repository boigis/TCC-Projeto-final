<?php
session_start();
include("conexao.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../Styles/SignUp.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Mono&family=Roboto+Mono:ital,wght@0,300;0,400;1,200&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

		<title>Apresente-se</title>
	</head>
	<body>
		<div class="main">
			<div class="login-form">
  				<form method = "POST" action = "insert.php">
				<h1>Sign Up</h1>
				 <?php 
				 if(isset($_SESSION['inserido']))
				 { 
				?>
					 <div class = "notification">
						<p>Usuário inserido</p>
						<p>Faça login clicando <a href="Login.php" type="blank">aqui</a></p>
					</div>
				<?php }
				 unset($_SESSION['inserido']);?>
				<?php
				if(isset($_SESSION['invalido']))
				{
				?>
				<div class="notification">
					<p>Email já cadastrado. Tente novamente com outro email.</p>
				</div>
				<?php 
				} 
				unset($_SESSION['invalido']); ?>
				<?php
				if(isset($_SESSION['error']))
				{ 
				?>
					 <div class = "notification">
						<p>Senhas não coincidem. Tente novamente.</p>
					</div>
				<?php } unset($_SESSION['error']);?>
    				<div class="content">
    					<div class="input-field">
        					<input type="text" placeholder="Name" name = "user" autocomplete="nope" required>
      					</div>
      					<div class="input-field">
        					<input type="email" placeholder="Email" name="email" autocomplete="nope" required>
      					</div>
      					<div class="input-field">
        					<input type="password" placeholder="Password" name ="password" autocomplete="new-password" required>
						</div>
						<div class="input-field">
        					<input type="password" placeholder="Confirm Password" name ="confirm_password" autocomplete="new-password" required>
        				</div>
					  </div>
      				<div class="action">
					  <button type="submit">Register</button>
      				</div>
      			<a href="recoverpword.php" class="link">Forgot Your Password?</a>
      		</div>
		</div>
	</body>
</html>