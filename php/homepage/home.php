<?php
require '../verifica.php';
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
    <section>
        <div class="pd__top">
            <p>Tela inicial</p>
        </div>
        <div class="home">
            <div class="home__item hm-left">
                <h2>PRODUTOS COM ESTOQUE BAIXO</h2>
            </div>
            <div class="home__item hm-center">
                <h2>QUANTIDADE DE PRODUTOS NO <br> ESTOQUE</h2>
            </div>
            <div class="home__item hm-right">
                <h2>CUSTO TOTAL <br> PRODUTOS</h2>
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
                <a href="index.php?pg=produtos"><button>Produtos</button></a>
                <p>Cadastro de produtos</p>
            </div>
            <div class="home__func">
                <div>
                    <img src="/sgi/assets/icon-box-with-arrow.png" alt="">
                </div>
                <a href="index.php?pg=entradas"><button>Entradas</button></a>
                <p>Controle de entrada de produtos no estoque</p>
            </div>
            <div class="home__func">
                <div>
                    <img src="/sgi/assets/icon-box-with-arrow-up.png" alt="">
                </div>
                <a href="index.php?pg=saidas"><button>Saídas</button></a>
                <p>Controle de saída de produtos do estoque</p>
            </div>
        </div>
    </section>
</body>
</html>
<?php else: header("Location: /sgi/login.php"); endif; ?>