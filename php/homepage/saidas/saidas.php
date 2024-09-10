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
    <section>

        <a href="index.php?pg=cadastrar-saida-produto"><button>CADASTRAR SAÍDA DE PRODUTO</button></a>
        <a href="index.php?pg=home"><button>PÁGINA INICIAL</button></a>


    </section>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

