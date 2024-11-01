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
                    <h1>Inativar produtos</h1>
                    <form action="index.php?pg=resultado-inativacao-produtos" method="POST">
                        <?php
                             echo '<div class="message__error">Tem certeza que deseja inativar o produto ' . htmlspecialchars($linha['produto']) . ', marca ' . htmlspecialchars($linha['marca']) . '?</div>';
                        ?>
                        <div>
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <button class="btn" type="submit">Sim</button>
                        </div>
                    </form>
                </section>
            <?php
        } else {
            echo "<p>Produto não encontrado.</p>";
        }
    }
    ?>
    <a href="index.php?pg=produtos"><button class="btn">Não, voltar</button></a>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>