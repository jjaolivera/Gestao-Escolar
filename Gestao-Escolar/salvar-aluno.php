<?php
// salvar-aluno.php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE alunos SET nome='$nome', email='$email', data_nascimento='$data_nascimento' WHERE id=$id";
    } else {
        $sql = "INSERT INTO alunos (nome, email, data_nascimento) VALUES ('$nome', '$email', '$data_nascimento')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Dados do aluno salvos com sucesso";
        // Redireciona para listar-aluno.php após 3 segundos
        header("refresh:3;url=listar-aluno.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
