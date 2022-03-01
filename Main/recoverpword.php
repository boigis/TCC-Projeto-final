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

		<title>Recuperar Senha</title>
	</head>
	<body>
		<div class="main">
			<div class="login-form">
  				<form method = "POST" action = "mandaremail.php">
				<h1>Type Email</h1>
                <?php 
                    if(isset($_SESSION['invalido']))
                    {
                ?>
                    <div class = "notification">
                        <p>Email não cadastrado no banco de dados,</p>
                        <p>Tente novamente.</p>
                    </div>
                    <?php 
                    } 
                    unset($_SESSION['invalido']);
                    ?>
                    <?php 
                        if(isset($_SESSION['success']))
                        {
                    ?>
                    <div class = "notification">
                        <p>Uma mensagem com o link para a atualização da senha foi enviada para sua caixa de entrada.</p>
                    </div>
                    <?php 
                        }
                        unset($_SESSION['success']);
                    ?>
      					<div class="input-field">
        					<input type="email" placeholder="Email" name="emailrecover" autocomplete="nope" required>
      					</div>
      				<div class="action">
					  <button type="submit">Send Data</button>
      				</div>
      		</div>
		</div>
	</body>
</html>