<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
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
            max-width: 500px;
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
            background-color: #7c2fc7;
            box-shadow: 0 4px 8px rgb(173, 141, 206);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form id="form-cadastro" action="processar_cadastro.php" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
    </div>

    <script>
        function validaCPF(cpf) {
            cpf = cpf.replace(/\D+/g, '');
            if (cpf.length !== 11) return false;

            let soma = 0;
            let resto;
            if (/^(\d)\1{10}$/.test(cpf)) return false; // Verifica sequências iguais

            for (let i = 1; i <= 9; i++) soma += parseInt(cpf.substring(i-1, i)) * (11 - i);
            resto = (soma * 10) % 11;
            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(9, 10))) return false;

            soma = 0;
            for (let i = 1; i <= 10; i++) soma += parseInt(cpf.substring(i-1, i)) * (12 - i);
            resto = (soma * 10) % 11;
            if ((resto === 10) || (resto === 11)) resto = 0;
            if (resto !== parseInt(cpf.substring(10, 11))) return false;

            return true;
        }

        document.getElementById("form-cadastro").addEventListener('submit', function(e) {
            var cpf = document.getElementById('cpf').value;
            if (!validaCPF(cpf)) {
                e.preventDefault(); // Impede o envio do formulário
                alert('CPF inválido. Verifique o número digitado.');
                document.getElementById('cpf').focus(); // Foca no campo de CPF após o erro
            }
        });

        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00', {reverse: true});
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</body>
</html>
