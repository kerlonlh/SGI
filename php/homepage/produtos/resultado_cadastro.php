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
            $produto = $_POST['produto'];
            $marca = $_POST['marca'];

            $sql = "INSERT INTO `produtos`(`produto`, `marca`) VALUES ('$produto','$marca')";
        
            $sql = $pdo->prepare($sql);

            if($sql->execute()){
                echo '<div class="message__success">' . "$produto" . ' cadastrado com sucesso! </div>';
            }else{
                echo '<div class="message__error">' . "$produto" . ' NÃO foi cadastrado! </div>';
            }
        ?>
    </section>
    <div class="div__btn">
        <a href="index.php?pg=cadastrar-produtos"><button class="btn">CADASTRAR NOVO PRODUTO</button></a>
        <a href="index.php?pg=produtos"><button class="btn">VISUALIZAR PRODUTOS</button></a>
    </div>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
