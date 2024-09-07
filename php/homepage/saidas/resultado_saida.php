<?php
require '../verifica.php';
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
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
            $id_produto = $_POST['id_produto'];
	    $quantidade = $_POST['quantidade'];
            $data_saida = $_POST['data_saida'];
            $cliente = $_POST['cliente'];

            $sql = "INSERT INTO `saida_produtos`(`id_produto`, `quantidade` ,`data_saida`, `cliente`) VALUES ('$id_produto','$quantidade','$data_saida','$cliente')";
        
            $sql = $pdo->prepare($sql);
            
            if($sql->execute()){
                echo "$id_produto foi retirado!";
            }else{
                echo "$id_produto não foi retirado!";
            }


        ?>
    </section>
    <a href="index.php?pg=cadastrar-saida-produtos"><button>CADASTRAR NOVA SAÍDA DE PRODUTO</button></a>
    <a href="index.php?pg=saidas"><button>VISUALIZAR SAÍDA DE PRODUTOS</button></a>
</body>
</html>

<?php else: header("Location: /sgi/login.php"); endif; ?>
