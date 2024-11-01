<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/entradas/cadastrar_entradas.css">
</head>
<body>
    <section>
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
        
            if (isset($_POST['id_entrada_produtos'], $_POST['id_produto'], $_POST['preco_custo'], $_POST['preco_venda'], $_POST['data_fabricacao'], $_POST['data_validade'], $_POST['data_entrada'], $_POST['id_fornecedor'])) {
                $id_entrada = $_POST['id_entrada_produtos'];
                $id_produto = $_POST['id_produto'];
                $preco_custo = $_POST['preco_custo'];
                $preco_venda = $_POST['preco_venda'];
                $data_fabricacao = $_POST['data_fabricacao'];
                $data_validade = $_POST['data_validade'];
                $data_entrada = $_POST['data_entrada'];
                $id_fornecedor = $_POST['id_fornecedor'];

                $sql = "UPDATE entrada_produtos SET id_produto = :id_produto, preco_custo = :preco_custo, preco_venda = :preco_venda, data_fabricacao = :data_fabricacao, data_validade = :data_validade, data_entrada = :data_entrada, id_fornecedor = :id_fornecedor WHERE id_entrada_produtos = :id_entrada_produtos";
                $sql = $pdo->prepare($sql);

                $sql_select = "SELECT produto AS produto FROM entrada_produtos
                JOIN produtos ON entrada_produtos.id_produto = produtos.id
                WHERE entrada_produtos.id_produto = :id_produto";
    
                $dado = $pdo->prepare($sql_select);
                $dado->execute([':id_produto' => $id_produto]);
    
                $resultado = $dado->fetch(PDO::FETCH_ASSOC);
                $produto = $resultado['produto'];    

                if($sql->execute([
                    ':id_produto' => $id_produto, 
                    ':preco_custo' => $preco_custo,
                    ':preco_venda' => $preco_venda, 
                    ':data_fabricacao' => $data_fabricacao, 
                    ':data_validade' => $data_validade, 
                    ':data_entrada' => $data_entrada, 
                    ':id_fornecedor' => $id_fornecedor, 
                    ':id_entrada_produtos' => $id_entrada])){
                        echo '<div class="message__success">' . "$produto" . ' foi atualizado na entrada do estoque com sucesso! </div>';
                } else {
                    echo '<div class="message__error">' . "$produto" . ' NÃO foi atualizado no estoque! </div>';
                }
            } else {
                echo "Dados insuficientes para atualizar o produto.";
            }
        ?>
    </section>
    <div class="div__btn">
        <a href="index.php?pg=entradas"><button class="btn">VISUALIZAR ENTRADAS</button></a>
    </div>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
