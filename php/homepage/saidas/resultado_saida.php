<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/saidas/saidas.css">
</head>
<body>
    <section>
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
        
            if (isset($_POST['id_entrada_produtos'], $_POST['estoque'])) {
                $id_entrada = $_POST['id_entrada_produtos'];
                $id_produto = $_POST['id_produto'];
                $estoque = $_POST['estoque'];
                $data_saida = $_POST['data_saida'];

                $sql = "UPDATE entrada_produtos 
                SET estoque = estoque - :estoque WHERE id_entrada_produtos = :id_entrada_produtos";
                $sql = $pdo->prepare($sql);

                $sql_insert = "INSERT INTO `vendas`(`id_entrada`,`quantidade`,`data_saida`) VALUES ('$id_entrada','$estoque','$data_saida')";
        
                $sql_insert = $pdo->prepare($sql_insert);

                if(($sql->execute([':estoque' => $estoque, ':id_entrada_produtos' => $id_entrada])) AND ($sql_insert->execute())){
                    echo "$id_produto atualizado com sucesso!";
                } else {
                    echo "$id_produto não foi atualizado!";
                }
            } else {
                echo "Dados insuficientes para atualizar o produto.";
            }
        ?>
    </section>
    <a href="index.php?pg=saidas"><button>VISUALIZAR SAÍDAS</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
