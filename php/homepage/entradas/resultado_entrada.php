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
            $preco_custo = $_POST['preco_custo'];
            $preco_venda = $_POST['preco_venda'];
            $data_fabricacao = $_POST['data_fabricacao'];
            $data_validade = $_POST['data_validade'];
            $data_entrada = $_POST['data_entrada'];
            $quantidade = $_POST['quantidade'];
            $id_fornecedor = $_POST['id_fornecedor'];

            $sql = "INSERT INTO `entrada_produtos`(`id_produto`, `preco_custo`, `preco_venda`, `data_fabricacao`, `data_validade`, `data_entrada`, `quantidade`, `id_fornecedor`) VALUES ('$id_produto','$preco_custo','$preco_venda','$data_fabricacao','$data_validade','$data_entrada','$quantidade','$id_fornecedor')";
        
            $sql = $pdo->prepare($sql);
            
            if($sql->execute()){
                echo "$id_produto foi cadastrado!";
            }else{
                echo "$id_produto não foi cadastrado!";
            }


        ?>
    </section>
    <a href="index.php?pg=cadastrar-entrada-produtos"><button>CADASTRAR NOVA ENTRADA PRODUTO</button></a>
    <a href="index.php?pg=entradas"><button>VISUALIZAR ENTRADA DE PRODUTOS</button></a>
</body>
</html>

<?php else: header("Location: /sgi/login.php"); endif; ?>
