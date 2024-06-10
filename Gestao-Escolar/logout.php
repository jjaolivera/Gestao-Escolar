<?php
// Iniciar a sessão
session_start();

// Finalizar a sessão (deslogar o usuário)
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Logout</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script>
        // Redirecionar para index.php após 3 segundos
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 3000);
    </script>
</head>
<body>
    <div class="container">
        <div class="alert alert-success mt-5" role="alert">
            Logout finalizado com sucesso!
        </div>
    </div>
</body>
</html>
