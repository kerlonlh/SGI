<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos/cadastros_produtos.css">
</head>
<body>
    <section>
        <h1>Cadastrar produtos</h1>
        <form action="index.php?pg=resultado-produtos" method="POST">
            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="produto" required>
            </div>
            <div>
                <label for="nome">Marca do produto</label>
                <input type="text" name="marca" required>
            </div>
            <div>
                <button class="btn" type="submit">Salvar</button>
            </div>
        </form>
        <a href="index.php?pg=produtos"><button class="btn">Voltar</button></a>
    </section>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>

