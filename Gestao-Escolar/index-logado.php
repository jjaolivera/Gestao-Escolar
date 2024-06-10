<?php
// index-logado.php

// Iniciar a sessão
session_start();

// Verificar se o usuário está logado
$usuario_logado = isset($_SESSION['usuario']);

// Determinar a classe para os botões com base no estado de login do usuário
$botao_classe = $usuario_logado ? '' : 'disabled';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestão Acadêmica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilo do cabeçalho */
        .navbar {
            background-color: #7c2fc7;
        }
        .navbar .nav-link {
            color: #ad8dce;
        }
        .navbar .nav-link:hover {
            background-color: #7c2fc7;
            color: white;
        }
        .navbar .navbar-nav {
            margin: 0 auto;
        }
        .navbar .ml-auto .nav-link {
            color: white;
        }

        /* Centralizar textos e imagem */
        .container {
            text-align: center;
        }

        /* Estilo da imagem */
        .img-fluid {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        /* Estilo do rodapé */
        footer {
            text-align: center;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#" style="color: white;">Gestão Escolar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index-logado.php">Home</a>
                </li>
                <li class="nav-item <?php echo $botao_classe; ?>">
                    <a class="nav-link" href="listar-aluno.php">Listar Alunos</a>
                </li>
                <li class="nav-item <?php echo $botao_classe; ?>">
                    <a class="nav-link" href="novo-aluno.php">Adicionar Novo Aluno</a>
                </li>
                <li class="nav-item <?php echo $botao_classe; ?>">
                    <a class="nav-link" href="listar-professores.php">Listar Professores</a>
                </li>
                <li class="nav-item <?php echo $botao_classe; ?>">
                    <a class="nav-link" href="adicionar-professor.php">Adicionar Novo Professor</a>
                </li>
            </ul>
            <?php if($usuario_logado): ?>
            <!-- Botão de logout -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
            <?php else: ?>
            <!-- Botões de redirecionamento para cadastro e login -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <h1 class="mt-5">Bem-vindo ao Sistema de Gestão Escolar</h1>
        <p class="lead">Utilize o menu acima para navegar pelo sistema.</p>
        
        <div class="mt-5">
            <img src="oficial.jpg.jpg" alt="Gestão Acadêmica" class="img-fluid">
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2024 Sistema de Gestão Escolar do Joao Vitor
        </div>
    </footer>
</body>
</html>
