<?php
// login.php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();
        
        if (password_verify($senha, $usuario['senha'])) {
            // Definir variável de sessão
            $_SESSION['usuario'] = $usuario['nome'];  // ou qualquer outra identificação do usuário
            header("Location: index-logado.php");
            exit();
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #7c2fc7;
            margin-bottom: 20px;
        }

        .form-group label {
            color: #343a40;
        }

        .form-control {
            border-radius: 5px;
            box-shadow: inset 0 2px 3px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 8px rgb(124, 47, 199);
        }

        .btn-primary {
            background-color: #7c2fc7;
            border-color: #7c2fc7;
            border-radius: 5px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ad8dce;
            box-shadow: 0 4px 8px rgb(124, 47, 199);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>
</body>
</html>
