<?php
    include("conexao.php");
    session_start();

    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);}

    if(isset($_POST['password'])){
        $password = mysqli_real_escape_string($conn, $_POST['password']);}

    $sql = "SELECT * FROM usuarioacesso WHERE email = '{$email}' AND password = '{$password}'";
    $sqlexec = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($sqlexec);

    if($row != 0)
    {
        $_SESSION['usuario_inserido'] = base64_encode($email);
        header('Location: index.php?user=' . $_SESSION['usuario_inserido'] . '');
        exit;
    }
    if ($row == 0) {
        $_SESSION['invalido'] = true;
        header('Location: Login.php');
        exit;
    }
?>