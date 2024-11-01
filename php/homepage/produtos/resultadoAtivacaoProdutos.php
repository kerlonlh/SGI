<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if (isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

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
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
        
        if (isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql_select = "SELECT produto, marca FROM produtos WHERE id = :id";
            $sql_select = $pdo->prepare($sql_select);
            $sql_select->execute([':id' => $id]);
            $sql_select = $sql_select->fetch(PDO::FETCH_ASSOC);

            $produto = $sql_select['produto'];
            
            $sql_update = "UPDATE produtos SET situacao = 0 WHERE id = :id";
            $sql_update = $pdo->prepare($sql_update);

            if ($sql_update->execute([':id' => $id])) {
                echo '<div class="message__success">' . htmlspecialchars($produto) . ' ativado com sucesso!</div>';
            } else {
                echo '<div class="message__error">Erro ao ativar o produto ' . htmlspecialchars($produto) . '.</div>';
            }
        } 
        ?>
    </section>
    <a href="index.php?pg=produtos"><button class="btn">Voltar</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
