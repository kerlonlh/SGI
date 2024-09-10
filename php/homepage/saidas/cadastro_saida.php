<?php
require '../../verifica.php';
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos.css">
</head>
<body>
    <section>
        <p>Cadastrar saída de produtos</p>
        <form action="index.php?pg=resultado-saida-produtos" method="POST">
            <div>
                <label for="nome">Código do produto</label>
                <input type="number" name="id_produto" required>
            </div>
            <div>
                <label for="nome">Quantidade</label>
                <input type="number" min="0" name="quantidade" required>
            </div>
            <div>
                <label for="nome">Data da saída</label>
                <input type="date" name="data_saida" required>
            </div>
            <div>
                <label for="nome">Cliente</label>
                <input type="texte" name="cliente" required>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>

    </section>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>