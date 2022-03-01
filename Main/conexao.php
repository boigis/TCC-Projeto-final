<?php 
$servername = "localhost";
$database = "bdcadskye";
$username = "root";
$password = "";
// Cria conexão
$conn = mysqli_connect($servername, $username, $password, $database);
// Checa conexão
if (!$conn) {
 die("Conexão com falha: " . mysqli_connect_error());
}
?>