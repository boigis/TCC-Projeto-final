<?php 
session_start();
include("conexao.php");

$email = base64_decode($_SESSION['usuario_inserido']);

$sql = "SELECT * FROM usuariocad WHERE email = '{$email}'";
$sqlexec = mysqli_query($conn, $sql);
$dados = mysqli_fetch_assoc($sqlexec);

$nome = $dados['fullname'];
$email = $dados['email'];

if(!isset($_GET['user']))
	{ ?>
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

		<title>Seu perfil</title>
    </head>
		<h1 class="notification"> Acesso negado. Logue no sistema.</h1>
    <body>
        
    </body>
</html>
<?php }

else{
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="../Styles/stylesheet.css">
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Mono&family=Roboto+Mono:ital,wght@0,300;0,400;1,200&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">

		<title>Seu perfil</title>
    </head>
    <body>
        <h1 class="Hi">
			Seus dados
		</h1>
		<div>
			<table border="1px solid">
			<tr><th>Nome</th><th>email</th></tr>
			<tr><td><?php echo $nome ?></td><td><?php echo $email?></td>
			</tr>
			</table>
		</div>
	<script>
    // PREVIEW FOTO
    	function PreviewImage() {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

			oFReader.onload = function (oFREvent) {
				document.getElementById("uploadPreview").src = oFREvent.target.result;
			};
    	};
	</script>
		<div class="image-upload">
		<form action="profile.php? <?php echo "user=" . $_SESSION['usuario_inserido'] ?>" enctype="multipart/form-data" method="POST">
        <label for="uploadImage"> 
			<?php 
				$sqlbusca = "SELECT * FROM arquivos WHERE email = '{$email}'";
				$sqlbuscaexec = mysqli_query($conn, $sqlbusca);
				$rowsbusca = mysqli_num_rows($sqlbuscaexec);
				$dados = mysqli_fetch_assoc($sqlbuscaexec);
				if($rowsbusca == 0){
				?>
            	<img src="https://i.pinimg.com/originals/54/38/19/543819d33dfcfe997f6c92171179e4cd.png" id="uploadPreview" style="width: 110px; height: 110px;">
				<?php } 
				else
				{
				?>
				<img src="upload/<?php echo $dados['arquivo']?>" id="uploadPreview" style="width: 110px; height: 110px;">
				<?php } ?>
		</label>  
        <input id="uploadImage" type="file" name="foto" onchange="PreviewImage();">
		<input type="submit" value="enviar"></form>
    </div>
			<style type="text/css">
			#uploadPreview{
				cursor: pointer;
				background-color: #eee;
    			border: 5px solid #ccc;
    			border-radius: 50%;
			}
			#uploadImage{
				display: none;
			}
			</style>
			<?php 
			if(isset($_FILES['foto']))
			{
				$arquivo = $_FILES['foto'];
				$extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
				$arquivo_nome = md5(uniqid($arquivo['name'])).".".$extensao;
				$diretorio = "upload/";

				move_uploaded_file($arquivo['tmp_name'], $diretorio . $arquivo_nome);

				$sqlbusca = "SELECT * FROM arquivos WHERE email = '{$email}'";
				$sqlbuscaexec = mysqli_query($conn, $sqlbusca);
				$rowsbusca = mysqli_num_rows($sqlbuscaexec);
				if($rowsbusca == 0)
				{
					$sql1 = "INSERT INTO arquivos (codigo, arquivo, data, email) VALUES (null, '{$arquivo_nome}', NOW(), '{$email}')";
					$sqlexec1 = mysqli_query($conn, $sql1);

					if($sqlexec1)
						$_SESSION['success'] = true;
					else
						$_SESSION['error'] = true;
				}
				else{
					$sql1 = "UPDATE arquivos SET arquivo = '$arquivo_nome', data = NOW(), email = '$email'";
					$sqlexec1 = mysqli_query($conn, $sql1);
				}
				
			}
			?>

		</div>
    </body>
</html>
<?php } ?>