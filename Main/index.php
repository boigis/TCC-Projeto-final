<?php
session_start();
include("conexao.php");	

if(isset($_GET['sair']))
{
	unset($_SESSION["usuario_inserido"]);
	header("Location: index.php");
}
if(!isset($_GET['user'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Skye's Art Workshop </title>
		<link rel="stylesheet" type="text/css" href="../Styles/stylesheet.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Mono&family=Roboto+Mono:ital,wght@0,300;0,400;1,200&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
	</head>
		<body>
		<section class="logo">
			<img src="../Assets/logo.png">
		</section>
		<header>
			<nav>
				<ul>
					<li><a class="login" href="#g1">gallery</a></li>
					<li>request</li>
					<li><a class="login" href="#g2">nft</a></li>
					<li><a class="signuplink" href="SignUp.php">sign up</a></li>
					<li><a class="login" href="Login.php">login</a></li>
				</ul>
			</nav>
		</header>
		<p class="Hi">Hi, This is</p>
		<div class="maintitle">
			<p>Skye's Art Workshop</p>
		</div>
		<div class="subtitle">
			<p>a place to buy modern art</p>
		</div>

		<div class="gallery" id="g1">
			<h2>Gallery</h2>
            <hr style="height:1px;width: 300px; background-color:gray;border:none;margin-left: 500px;margin-top: -20px; position: relative;right: 60px;" noshade />
			<h4>You can buy these, and it will be yours forever (non copyright included)</h4>
			<div class="Arts">
				<section class="TravellerElf">
					<img src="../Assets/Gallery/Elf panting.png">
					<div class="description">
						<p>Traveller Elf</p>
						<p>Price : R$50,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="ElfFightingStance">
					<img src="../Assets/Gallery/Elf_Fighting_stance.png">
				<div class="description">
						<p>Elf Fighting Stance</p>
						<p>Price : R$50,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="SasukeDrawing">
					<img src="../Assets/Gallery/sasuke black background.png">
					<div class="description">
						<p>Sasuke Fan Art</p>
						<p>Price : R$55,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="HollowKnight">
					<img src="../Assets/Gallery/Hollow Knight.jpg">
					<div class="description">
						<p>Hollow Knight</p>
						<p>Price : R$30,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="FlowerDressInked">
					<img src="../Assets/Gallery/Flower Dress Inked.png">
					<div class="description">
						<p>Grass Flower Inked</p>
						<p>Price : R$40,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="VoidGivenForm">
					<img src="../Assets/Gallery/VoidGivenForm.png">
					<div class="description">
						<p>Void Given Form</p>
						<p>Price : R$40,00</p>
						<button>Buy</button>
					</div>
				</section>
			</div>
		</div>
 		<div class="NFT" id="g2">
 			<h2>Non-Fungible Tokens</h2>
 			<hr style="height:1px;width: 300px; background-color:gray;border:none;margin-left: 750px;margin-top: -20px; position: relative;right: 60px;" noshade />
 			<h3 class="subtitle">Yes, i sell NFT's too </h3>
 			<div class="NFTimage">
 				<img src="../Assets/NFT.gif">
 			</div>
 			<div class="description">
 				<p>The idea behind NFTs is actually quite similar to bitcoin or other forms of cryptocurrency, except with one big difference. NFT stands for non-fungible token. Non-fungible means that it’s a unique item and cannot be exchanged for anything.</p>
 			</div>
 			<div class="BriefTitle">
 				<h2>Check out my stuff</h2>
 			</div>
 			<section class="buttons">
 				<button>Mintable</button>
 				<button>OpenSea</button>
 			</section>
 		</div>
	</body>
</html>
<?php
}
else{
	if(!isset($_GET['sair'])){
		$email = base64_decode($_SESSION['usuario_inserido']);
		$sqlbusca = "SELECT * FROM arquivos WHERE email = '{$email}'";
		$sqlbuscaexec = mysqli_query($conn, $sqlbusca);
		$rowsbusca = mysqli_num_rows($sqlbuscaexec);
		$dados = mysqli_fetch_assoc($sqlbuscaexec);
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Skye's Art Workshop </title>
		<link rel="stylesheet" type="text/css" href="../Styles/stylesheet.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=PT+Mono&family=Roboto+Mono:ital,wght@0,300;0,400;1,200&family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
	</head>
		<body>
		<section class="logo">
			<img src="../Assets/logo.png">
		</section>
		<header>
			<nav>
				<ul>
					<li><a class="login" href ="profile.php? 
					<?php echo "user=" . $_SESSION['usuario_inserido'] ?>" > my profile <?php 
					if($rowsbusca == 0){
				?>
				<img src="https://i.pinimg.com/originals/54/38/19/543819d33dfcfe997f6c92171179e4cd.png" id="uploadPreview" style="width: 40px; height: 40px;">
				<?php } 
				 else
				{
				?>
				<img src="upload/<?php echo $dados['arquivo']?>" id="uploadPreview" style="width: 40px; height: 40px; border-radius: 50px;">
				<?php } ?></a></li>
					<li><a class="login" href="#g1">gallery</a></li>
					<li>request</li>
					<li><a class="login" href="#g2">nft</a></li>
					<li><a class="signuplink" href="index.php?sair=true">log off</a></li>
				</ul>
			</nav>
		</header>
		<p class="Hi">Hi, This is</p>
		<div class="maintitle">
			<p>Skye's Art Workshop</p>
		</div>
		<div class="subtitle">
			<p>a place to buy modern art</p>
		</div>
		<div class="gallery" id="g1">
			<h2>Gallery</h2>
            <hr style="height:1px;width: 300px; background-color:gray;border:none;margin-left: 500px;margin-top: -20px; position: relative;right: 60px;" noshade />
			<h4>You can buy these, and it will be yours forever (non copyright included)</h4>
			<div class="Arts">
				<section class="TravellerElf">
					<img src="../Assets/Gallery/Elf panting.png">
					<div class="description">
						<p>Traveller Elf</p>
						<p>Price : R$50,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="ElfFightingStance">
					<img src="../Assets/Gallery/Elf_Fighting_stance.png">
				<div class="description">
						<p>Elf Fighting Stance</p>
						<p>Price : R$50,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="SasukeDrawing">
					<img src="../Assets/Gallery/sasuke black background.png">
					<div class="description">
						<p>Sasuke Fan Art</p>
						<p>Price : R$55,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="HollowKnight">
					<img src="../Assets/Gallery/Hollow Knight.jpg">
					<div class="description">
						<p>Hollow Knight</p>
						<p>Price : R$30,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="FlowerDressInked">
					<img src="../Assets/Gallery/Flower Dress Inked.png">
					<div class="description">
						<p>Grass Flower Inked</p>
						<p>Price : R$40,00</p>
						<button>Buy</button>
					</div>
				</section>
				<section class="VoidGivenForm">
					<img src="../Assets/Gallery/VoidGivenForm.png">
					<div class="description">
						<p>Void Given Form</p>
						<p>Price : R$40,00</p>
						<button>Buy</button>
					</div>
				</section>
			</div>
		</div>
 		<div class="NFT" id="g2">
 			<h2>Non-Fungible Tokens</h2>
 			<hr style="height:1px;width: 300px; background-color:gray;border:none;margin-left: 750px;margin-top: -20px; position: relative;right: 60px;" noshade />
 			<h3 class="subtitle">Yes, i sell NFT's too </h3>
 			<div class="NFTimage">
 				<img src="../Assets/NFT.gif">
 			</div>
 			<div class="description">
 				<p>The idea behind NFTs is actually quite similar to bitcoin or other forms of cryptocurrency, except with one big difference. NFT stands for non-fungible token. Non-fungible means that it’s a unique item and cannot be exchanged for anything.</p>
 			</div>
 			<div class="BriefTitle">
 				<h2>Check out my stuff</h2>
 			</div>
 			<section class="buttons">
 				<button>Mintable</button>
 				<button>OpenSea</button>
 			</section>
 		</div>
	</body>
</html>
<?php } ?>
