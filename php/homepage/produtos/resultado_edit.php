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
        
        if (isset($_POST['id'], $_POST['produto'], $_POST['marca'])) {
            $id = $_POST['id'];
            $produto = $_POST['produto'];
            $marca = $_POST['marca'];

            $sql_select = "SELECT produto, marca FROM produtos WHERE id = :id";
            $sql_select = $pdo->prepare($sql_select);
            $sql_select->execute([':id' => $id]);
            $sql_select = $sql_select->fetch(PDO::FETCH_ASSOC);

           
            if ($sql_select['produto'] == $produto && $sql_select['marca'] == $marca) {
                echo '<div class="message__error">Nenhuma alteração foi feita. O produto não foi modificado!</div>';
            } else {
                $sql_verifica = "SELECT * FROM produtos WHERE produto = :produto AND marca = :marca AND id != :id";
                $sql_verifica = $pdo->prepare($sql_verifica);
                $sql_verifica->execute([':produto' => $produto, ':marca' => $marca, ':id' => $id]);

                if ($sql_verifica->rowCount() > 0) {
                    echo '<div class="message__error">Produto ' . htmlspecialchars($produto) . ', marca ' . htmlspecialchars($marca) . ' já foi cadastrado!</div>';
                } else {
                    $sql_update = "UPDATE produtos SET produto = :produto, marca = :marca WHERE id = :id";
                    $sql_update = $pdo->prepare($sql_update);

                    if ($sql_update->execute([':produto' => $produto, ':marca' => $marca, ':id' => $id])) {
                        echo '<div class="message__success">' . htmlspecialchars($produto) . ' atualizado com sucesso!</div>';
                    } else {
                        echo '<div class="message__error">Erro ao atualizar o produto ' . htmlspecialchars($produto) . '.</div>';
                    }
                }
            }
        } else {
            echo '<div class="message__error">Dados insuficientes para atualizar o produto.</div>';
        }
        ?>
    </section>
    <a href="index.php?pg=produtos"><button class="btn">Voltar</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
