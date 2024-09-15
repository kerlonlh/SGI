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
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
        
            if (isset($_POST['id'], $_POST['produto'], $_POST['marca'])) {
                $id = $_POST['id'];
                $produto = $_POST['produto'];
                $marca = $_POST['marca'];

                $sql = "UPDATE produtos SET produto = :produto, marca = :marca WHERE id = :id";
                $stmt = $pdo->prepare($sql);

                if($stmt->execute([':produto' => $produto, ':marca' => $marca, ':id' => $id])){
                    echo '<div class="message__success">' . "$produto ". ' atualizado com sucesso! </div>';
                } else {
                    echo '<div class="message__error">' . "$produto ". ' não foi atualizado! </div>';
                }
            } else {
                echo '<div class="message__error"> Dados insuficientes para atualizar o produto. </div>';
            }
        ?>
    </section>
    <a href="index.php?pg=produtos"><button class="btn">Voltar</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
