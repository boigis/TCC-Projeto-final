<?php
include("conexao.php");
session_start();

if(isset($_POST['emailrecover'])){
    $email = mysqli_real_escape_string($conn, $_POST['emailrecover']);}

$sql = "SELECT * FROM usuariocad WHERE email = '{$email}'";
$sqlquery = mysqli_query($conn, $sql);
$row = mysqli_num_rows($sqlquery);

if($row == 0)
{
    $_SESSION['invalido'] = true;
    header('Location: recoverpword.php');
    exit;
}

if ($row != 0){
    date_default_timezone_set("America/Sao_Paulo");
    $codigo = base64_encode($email);
    $data_expirar = date('Y-m-d H:i:s', strtotime('+1 day'));
    $destinatario = $email;
    $assunto = "Recuperação de Senha";
    $corpo = '<p>Recebemos uma tentativa de recuperação de senha através deste email. Caso não tenha sido você, desconsidere. 
    Caso o contrário, clique no link abaixo para recuperar a senha: <br> <a  href="http://localhost/GitHub/Main/recover.php?codigo='.$codigo.'">Link de Recuperação</a></p>';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: sendmailbot123321@gmail.com' . "\n";
    $headers .= 'Return-Path: sendmailbot123321@gmail.com' . "\n";
    $headers .= 'Reply-to ' . $email . "\n";
    $query = "INSERT INTO codigos SET codigo = '{$codigo}', data = '$data_expirar'";
    $insert = mysqli_query($conn, $query);
    if($insert){
        if(mail($destinatario, $assunto, $corpo, $headers))
        {
            $_SESSION['success'] = true;
            header('Location: recoverpword.php');
            exit;
        }
    }
}
?>
</html>