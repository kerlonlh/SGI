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
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_entrada_produtos'])) {
        $id_entrada = $_POST['id_entrada_produtos'];

        $sql = "SELECT * FROM entrada_produtos WHERE id_entrada_produtos = :id_entrada_produtos";
        $dados = $pdo->prepare($sql);

        $dados->execute([':id_entrada_produtos' => $id_entrada]);

        $linha = $dados->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
    ?>
            <section>
                <p>Atualizar cadastro de produtos</p>
                <form action="index.php?pg=resultado-saida-produtos" method="POST">
                <div>
                    <label for="nome">Código do produto</label>
                    <input type="number" name="id_produto" required value="<?php echo htmlspecialchars($linha['id_produto']);?>">
                </div>
                <div>
                    <label for="nome">Preço de custo</label>
                    <input type="number" step="0.01" min="0" name="preco_custo" required value="<?php echo htmlspecialchars($linha['preco_custo']); ?>">
                </div>
                <div>
                    <label for="nome">Preço de venda</label>
                    <input type="number" step="0.01" min="0" name="preco_venda" required value="<?php echo htmlspecialchars($linha['preco_venda']); ?>">
                </div>
                <div>
                    <label for="nome">Data de fabricação</label>
                    <input type="date" name="data_fabricacao" required value="<?php echo htmlspecialchars($linha['data_fabricacao']); ?>">
                </div>
                <div>
                    <label for="nome">Data de validade</label>
                    <input type="date" name="data_validade" required value="<?php echo htmlspecialchars($linha['data_validade']); ?>">
                </div>
                <div>
                    <label for="nome">Data de entrada no estoque</label>
                    <input type="date" name="data_entrada" required value="<?php echo htmlspecialchars($linha['data_entrada']); ?>">
                </div>
                <div>
                    <label for="nome">Quantidade</label>
                    <input type="number" min="0" max="<?php echo $linha['estoque']; ?>" name="quantidade" required>
                </div>
                <div>
                    <label for="nome">Código do fornecedor</label>
                    <input type="number" name="id_fornecedor" required value="<?php echo htmlspecialchars($linha['id_fornecedor']); ?>">
                </div>
                <div>
                    <input type="hidden" name="id_entrada_produtos" value="<?php echo htmlspecialchars($id_entrada); ?>">
                    <input type="submit" value="Salvar alterações">
                </div>
                </form>
            </section>
    <?php
        } else {
            echo "<p>Produto não encontrado.</p>";
        }
    } else {
        echo "<p>ID do produto não fornecido.</p>";
    }
    ?>

    <a href="index.php?pg=saidas"><button>VOLTAR</button></a>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>