<?php
// deletar-professor.php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM professores WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Professor deletado com sucesso";
    } else {
        echo "Erro ao deletar professor: " . $conn->error;
    }

    $conn->close();
    header("Location: listar-professores.php");
    exit();
} else {
    echo "ID não fornecido";
}
?>
