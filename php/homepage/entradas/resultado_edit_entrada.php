<?php
require '../../verifica.php';
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
        
            if (isset($_POST['id_entrada_produtos'], $_POST['id_produto'], $_POST['preco_custo'], $_POST['preco_venda'], $_POST['data_fabricacao'], $_POST['data_validade'], $_POST['data_entrada'], $_POST['quantidade'], $_POST['id_fornecedor'])) {
                $id_entrada = $_POST['id_entrada_produtos'];
                $id_produto = $_POST['id_produto'];
                $preco_custo = $_POST['preco_custo'];
                $preco_venda = $_POST['preco_venda'];
                $data_fabricacao = $_POST['data_fabricacao'];
                $data_validade = $_POST['data_validade'];
                $data_entrada = $_POST['data_entrada'];
                $quantidade = $_POST['quantidade'];
                $id_fornecedor = $_POST['id_fornecedor'];

                $sql = "UPDATE entrada_produtos SET id_produto = :id_produto, preco_custo = :preco_custo, preco_venda = :preco_venda, data_fabricacao = :data_fabricacao, data_validade = :data_validade, data_entrada = :data_entrada, quantidade = :quantidade, id_fornecedor = :id_fornecedor WHERE id_entrada_produtos = :id_entrada_produtos";
                $stmt = $pdo->prepare($sql);

                if($stmt->execute([
                    ':id_produto' => $id_produto, 
                    ':preco_custo' => $preco_custo,
                    ':preco_venda' => $preco_venda, 
                    ':data_fabricacao' => $data_fabricacao, 
                    ':data_validade' => $data_validade, 
                    ':data_entrada' => $data_entrada, 
                    ':quantidade' => $quantidade, 
                    ':id_fornecedor' => $id_fornecedor, 
                    ':id_entrada_produtos' => $id_entrada])){
                    echo "$id_produto atualizado com sucesso!";
                } else {
                    echo "$id_produto não foi atualizado!";
                }
            } else {
                echo "Dados insuficientes para atualizar o produto.";
            }
        ?>
    </section>
    <a href="index.php?pg=entradas"><button>VISUALIZAR ENTRADAS</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
