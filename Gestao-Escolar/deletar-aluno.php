<?php
// deletar-aluno.php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro deletado com sucesso";
    } else {
        echo "Erro ao deletar registro: " . $conn->error;
    }

    $conn->close();
    // Redireciona de volta para listar-aluno.php após deletar
    header("Location: listar-aluno.php");
    exit();
} else {
    echo "ID não fornecido";
}
?>
