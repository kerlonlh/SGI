<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
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
        <p>Cadastrar entrada de produtos</p>
        <form action="index.php?pg=resultado-entrada-produtos" method="POST">
            <div>
                <label for="nome">Código do produto</label>
                <input type="number" name="id_produto" required>
            </div>
            <div>
                <label for="nome">Preço de custo</label>
                <input type="number" step="0.01" min="0" name="preco_custo" required>
            </div>
            <div>
                <label for="nome">Preço de venda</label>
                <input type="number" step="0.01" min="0" name="preco_venda" required>
            </div>
            <div>
                <label for="nome">Data de fabricação</label>
                <input type="date" name="data_fabricacao" required>
            </div>
            <div>
                <label for="nome">Data de validade</label>
                <input type="date" name="data_validade" required>
            </div>
            <div>
                <label for="nome">Data de entrada no estoque</label>
                <input type="date" name="data_entrada" required>
            </div>
            <div>
                <label for="nome">Quantidade</label>
                <input type="number" min="0" name="quantidade" required>
            </div>
            <div>
                <label for="nome">Código do fornecedor</label>
                <input type="number" name="id_fornecedor" required>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>
        <a href="index.php?pg=entradas"><button>Voltar</button></a>
    </section>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
