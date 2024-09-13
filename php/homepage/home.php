<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href='/sgi/assets/fiveicon.png'>
    <link rel="stylesheet" href="/sgi/css/components/home.css">
    <title>SGI</title>
</head>
<body>
<?php

        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT SUM(estoque) AS total_quantidade FROM entrada_produtos";
        $dado = $pdo->prepare($sql);
        $dado->execute();

        $resultado = $dado->fetch(PDO::FETCH_ASSOC);
        $quantidade = $resultado['total_quantidade'];

        $sql = "SELECT SUM(preco_custo * estoque) AS preco_custo FROM entrada_produtos WHERE estoque > 0";
        $dado = $pdo->prepare($sql);
        $dado->execute();

        $resultado = $dado->fetch(PDO::FETCH_ASSOC);
        $total = $resultado['preco_custo'];

        $sql = "SELECT SUM((preco_venda - preco_custo) * estoque) AS lucro FROM entrada_produtos WHERE estoque > 0";
        $dado = $pdo->prepare($sql);
        $dado->execute();

        $resultado = $dado->fetch(PDO::FETCH_ASSOC);
        $lucro = $resultado['lucro'];
    ?>
    <section>
        <div class="pd__top">
            <p>Tela inicial</p>
        </div>
        <div class="home">
            <div class="home__item hm-left">
                <h2>QUANTIDADE DE PRODUTOS NO <br> ESTOQUE</h2>
                <div class="dados">
                    <?php echo $quantidade; ?>
                </div>
            </div>
            <div class="home__item hm-center">
                <h2>CUSTO TOTAL <br> PRODUTOS</h2>
                <div class="dados">
                    <?php echo "R$" . $total; ?>
                </div>
            </div>
            <div class="home__item hm-right">
                <h2>LUCRO TOTAL <br> PRODUTOS</h2>
                <div class="dados">
                    <?php echo "R$" . $lucro; ?>
                </div>
            </div>
        </div>
        <div class="pd__cent">
            <p>Funções</p>
        </div>
        <div class="home">
            <div class="home__func">
                <div>
                    <img src="/sgi/assets/icon-box.png" alt="">
                </div>
                <a href="index.php?pg=produtos"><button class="btn">Produtos</button></a>
                <p>Cadastro de produtos</p>
            </div>
            <div class="home__func">
                <div>
                    <img src="/sgi/assets/icon-box-with-arrow.png" alt="">
                </div>
                <a href="index.php?pg=entradas"><button class="btn">Entradas</button></a>
                <p>Controle de entrada de produtos no estoque</p>
            </div>
            <div class="home__func">
                <div>
                    <img src="/sgi/assets/icon-box-with-arrow-up.png" alt="">
                </div>
                <a href="index.php?pg=saidas"><button class="btn">Saídas</button></a>
                <p>Controle de saída de produtos do estoque</p>
            </div>
        </div>
    </section>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>