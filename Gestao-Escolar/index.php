<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Gestão Escolar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        /* Estilo do cabeçalho */
        .navbar {
            background-color: #7c2fc7;
        }
        .navbar .nav-link {
            color: #baa9cc;
        }
        .navbar .nav-link:hover {
            background-color: #7c2fc7;
            color: #baa9cc;
        }
        .navbar .navbar-nav {
            margin: 0 auto;
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
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <!-- Botões de redirecionamento para cadastro e login -->
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
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