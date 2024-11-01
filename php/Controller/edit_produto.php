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
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "SELECT * FROM produtos WHERE id = :id";
        $dados = $pdo->prepare($sql);

        $dados->execute([':id' => $id]);

        $linha = $dados->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
            ?>
                <section>
                    <h1>Atualizar cadastro de produtos</h1>
                    <form action="index.php?pg=resultado-edicao-produtos" method="POST">
                        <div>
                            <label for="nome">Nome do produto</label>
                            <input type="text" name="produto" required value="<?php echo htmlspecialchars($linha['produto']); ?>">
                        </div>
                        <div>
                            <label for="marca">Marca do produto</label>
                            <input type="text" name="marca" required value="<?php echo htmlspecialchars($linha['marca']); ?>">
                        </div>
                        <div>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <button class="btn" type="submit">Salvar alterações</button>
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
    <a href="index.php?pg=produtos"><button class="btn">Voltar</button></a>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>