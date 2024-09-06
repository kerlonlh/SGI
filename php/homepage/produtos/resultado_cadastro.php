<?php
require '../verifica.php';
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos.css">
</head>
<body>
    <section>
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
            $produto = $_POST['produto'];
            $preco = $_POST['preco'];
            $quantidade = $_POST['quantidade'];

            $sql = "INSERT INTO `produtos`(`produto`, `preco`, `quantidade`) VALUES ('$produto','$preco','$quantidade')";
        
            $sql = $pdo->prepare($sql);
            

            if($sql->execute()){
                echo "$produto cadastrado com sucesso!";
            }else{
                echo "$produto não foi cadastrado!";
            }
        ?>
    </section>
</body>
</html>

<?php else: header("Location: /sgi/login.php"); endif; ?>
