<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/fornecedores/cadastrar_fornecedor.css">
</head>
<body>
    <section>
        <h1>Cadastrar fornecedores</h1>
        <form action="index.php?pg=resultado-cadastro-fornecedor" method="POST">
            <div>
                <label for="nome">Razão social</label>
                <input type="text" name="razao_social" required>
            </div>
            <div class="cnpj">
                <label for="nome">CNPJ</label>
                <input type="text" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="00.000.000/0000-00" name="cnpj" required>
            </div>
            <div>
                <button class="btn" type="submit">Cadastrar</button>
            </div>
        </form>
    </section>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

