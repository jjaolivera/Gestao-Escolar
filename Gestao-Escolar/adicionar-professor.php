<?php
// adicionar-professor.php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "INSERT INTO professores (nome, email, data_nascimento) VALUES ('$nome', '$email', '$data_nascimento')";

    if ($conn->query($sql) === TRUE) {
        echo "Professor adicionado com sucesso";
        header("Location: listar-professores.php");
        exit();
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Adicionar Novo Professor</h2>
        <form method="post" action="adicionar-professor.php">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
            <a href="index-logado.php" class="btn btn-secondary">Home</a>
        </form>
    </div>
</body>
</html>
