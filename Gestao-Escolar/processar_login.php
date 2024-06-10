<?php
session_start();
include 'config.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];
        header("Location: index-logado.php");
        exit();
    } else {
        echo "Senha incorreta";
    }
} else {
    echo "Usuário não encontrado";
}

$conn->close();
?>
