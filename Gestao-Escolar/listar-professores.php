<?php
// listar-professores.php
include 'config.php';

$sql = "SELECT id, nome, email, data_nascimento FROM professores";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar Professores</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Lista de Professores</h2>
        <a href="index-logado.php" class="btn btn-primary mb-3">Home</a>
        <a href="adicionar-professor.php" class="btn btn-success mb-3">Adicionar Novo Professor</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Nascimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["id"] . "</td>
                                <td>" . $row["nome"] . "</td>
                                <td>" . $row["email"] . "</td>
                                <td>" . $row["data_nascimento"] . "</td>
                                <td>
                                    <a href='editar-professor.php?id=" . $row["id"] . "' class='btn btn-warning'>Editar</a>
                                    <a href='deletar-professor.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja deletar este professor?\")'>Deletar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum professor encontrado</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
