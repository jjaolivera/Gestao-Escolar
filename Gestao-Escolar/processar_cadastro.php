<?php
include 'config.php';

// Receber dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Validar e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Email inválido');
}

// Validar CPF (use uma função de validação de CPF)
if (!validar_cpf($cpf)) {
    die('CPF inválido');
}

// Inserir usuário no banco de dados
$sql = "INSERT INTO usuarios (nome, email, cpf, telefone, senha) VALUES ('$nome', '$email', '$cpf', '$telefone', '$senha')";

if ($conn->query($sql) === TRUE) {
    // Redirecionar para página de login
    header("Location: login.php");
    exit();
} else {
    echo "Erro ao cadastrar usuário: " . $conn->error;
}

$conn->close();

// Função de validação de CPF
function validar_cpf($cpf) {
    return true; // Retornar true se o CPF for válido, caso contrário, retornar false
}

?>
