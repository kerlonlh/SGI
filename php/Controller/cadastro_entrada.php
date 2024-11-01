<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/entradas/cadastrar_entradas.css">
</head>
<body>
    <section>
        <h1>Cadastrar entrada de produtos</h1>
        <form action="index.php?pg=resultado-entrada-produtos" method="POST">
            <div class="form">
                <div>
                    <label for="nome">Código do produto: </label>
                    <input type="number" min="1" name="id_produto" required>
                </div>
                <div>
                    <label for="nome">Preço de custo: </label>
                    <input type="number" step="0.01" min="0.1" name="preco_custo" required>
                </div>
                <div>
                    <label for="nome">Preço de venda: </label>
                    <input type="number" step="0.01" min="0.1" name="preco_venda" required>
                </div>
                <div>
                    <label for="nome">Data de fabricação: </label>
                    <input type="date" name="data_fabricacao" required>
                </div>
                <div>
                    <label for="nome">Data de validade: </label>
                    <input type="date" name="data_validade" required>
                </div>
                <div>
                    <label for="nome">Data de entrada no estoque</label>
                    <input type="date" name="data_entrada" required>
                </div>
                <div>
                    <label for="nome">Quantidade</label>
                    <input type="number" min="1" name="quantidade" required>
                </div>
                <div>
                    <label for="nome">Código do fornecedor</label>
                    <input type="number" min="1" name="id_fornecedor" required>
                </div>
            </div>
            
            <button class="btn">Salvar</button>
            
        </form>
        <a href="index.php?pg=entradas"><button class="btn">Voltar</button></a>
    </section>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
