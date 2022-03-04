<?php 
include("conexao.php");
session_start();

if(isset($_POST['user'])){
    $name = mysqli_real_escape_string($conn, $_POST['user']);}

if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);}

if(isset($_POST['password'])){
    $password = mysqli_real_escape_string($conn, $_POST['password']);}

if(isset($_POST['confirm_password'])){
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);}



$sql = "SELECT * FROM usuariocad WHERE email = '{$email}'";
$sqlexec = mysqli_query($conn, $sql);
$row = mysqli_num_rows($sqlexec);

if($row != 0)
{
    $_SESSION['invalido'] = true;
    header('Location: SignUp.php');
    exit;
}



$sql1 = "INSERT INTO usuariocad (fullname, email, password) VALUES ('$name', '$email', '$password')";
$sql2 = "INSERT INTO usuarioacesso (email, password) VALUES ('$email', '$password')";

$sql1exec = mysqli_query($conn, $sql1);
$sql2exec = mysqli_query($conn, $sql2);

if($sql1exec == true and $sql1exec == true and $confirm_password == $password)
{
    $_SESSION['inserido'] = true;
    header('Location: SignUp.php');
    exit;
}

if ($password != $confirm_password)
{
    $_SESSION['error'] = true;
    header('Location: SignUp.php');
    exit;
}

?>