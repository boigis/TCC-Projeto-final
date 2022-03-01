<?php 
include("conexao.php");
if(isset($_GET['codigo']))
{
    $codigo = $_GET['codigo'];
    $email_codigo = base64_decode($codigo);
    $queryselec = "SELECT * FROM codigos WHERE codigo = '{$codigo}' AND data > NOW()";
    $queryexec = mysqli_query($conn, $queryselec);
    if(mysqli_num_rows($queryexec) >= 1)
    {
        if(isset($_POST['password']))
        {
            $nova_senha = $_POST['password'];
            $query = "UPDATE usuarioacesso SET password = '$nova_senha' WHERE email = '$email_codigo'";
            $query2 = "UPDATE usuariocad SET password = '$nova_senha' WHERE email = '$email_codigo'";
            $atualizar = mysqli_query($conn, $query);
            $atualizar2 = mysqli_query($conn, $query2);
            if($atualizar and $atualizar2){
                $delete = "DELETE FROM codigos WHERE codigo = '$codigo'";
                $mudar = mysqli_query($conn, $delete);
                $_SESSION['success'] = true;
            }
        }
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

		<title>Recuperação de Senha</title>
	</head>
	<body>
		<div class="main">
			<div class="login-form">
  				<form method = "POST">
                  <h1>New Password</h1>
                  <?php 
                  if(isset($_SESSION['success']))
                  {
                      ?>
                    <div class = "notification">
                    <p>Senha modificada</p>
                    <p>Faça login clicando <a href="Login.php" type="blank">aqui</a></p>
                </div>
                  <?php } unset($_SESSION['success']);
                  ?>
      					<div class="input-field">
        					<input type="password" placeholder="Password" name ="password" autocomplete="new-password" required>
        				</div>
					  </div>
      				<div class="action">
					  <button type="submit">Recover</button>
      				</div>
      		</div>
		</div>
	</body>
</html>

<?php 
}
else{
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
        <title>Link expirado</title>
    </head>
    <body>
    <div class = "login-form">
        <h1>Desculpe mas este link já expirou</h1>
    </div>
    </body>
</html>
<?php
}

}
?>