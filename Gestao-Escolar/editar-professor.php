<?php
// editar-professor.php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM professores WHERE id=$id";
    $result = $conn->query($sql);
    $professor = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "UPDATE professores SET nome='$nome', email='$email', data_nascimento='$data_nascimento' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Dados do professor atualizados com sucesso";
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
    <title>Editar Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Professor</h2>
        <form method="post" action="editar-professor.php">
            <input type="hidden" name="id" value="<?php echo $professor['id']; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $professor['nome']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $professor['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento:</label>
                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?php echo $professor['data_nascimento']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="listar-professores.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
