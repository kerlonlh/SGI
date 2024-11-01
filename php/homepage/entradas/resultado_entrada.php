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
            $id_produto = $_POST['id_produto'];
            $preco_custo = $_POST['preco_custo'];
            $preco_venda = $_POST['preco_venda'];
            $data_fabricacao = $_POST['data_fabricacao'];
            $data_validade = $_POST['data_validade'];
            $data_entrada = $_POST['data_entrada'];
            $quantidade = $_POST['quantidade'];
            $estoque = $_POST['quantidade'];
            $id_fornecedor = $_POST['id_fornecedor'];

            $sql_select = "SELECT situacao, produto, id FROM produtos WHERE id = :id_produto";
            $sql_select = $pdo->prepare($sql_select);
            $sql_select->execute([':id_produto' => $id_produto]);
            $dado = $sql_select->fetch(PDO::FETCH_ASSOC);

            if($dado){
                $situacao = $dado['situacao'];
                $produto = $dado['produto'];
                $id = $dado['id'];
                
                if ($situacao == 0) {
                    $sql = "INSERT INTO `entrada_produtos`(`id_produto`, `preco_custo`, `preco_venda`, `data_fabricacao`, `data_validade`, `data_entrada`, `quantidade`, `estoque`, `id_fornecedor`) VALUES ('$id_produto','$preco_custo','$preco_venda','$data_fabricacao','$data_validade','$data_entrada','$quantidade','$estoque','$id_fornecedor')";
            
                    $sql = $pdo->prepare($sql);
        
                        if($sql->execute()){
                            echo '<div class="message__success">' . "$produto" . ' entrou no estoque com sucesso! </div>';
                        }else{
                            echo '<div class="message__error">' . "$produto" . ' NÃO entrou no estoque! </div>';
                        }
                }else {
                    echo '<div class="message__error">' . htmlspecialchars($produto) . ' está inativo, por esse motivo, não é possível realizar a entrada desse produto no estoque.</div>';
                }
            }else{
                echo '<div class="message__error">Código do produto não foi localizado, verifique se existe seu cadastro';
            }


    

            ?>
    </section>
    <div class="div__btn">
        <a href="index.php?pg=cadastrar-entrada-produtos"><button class="btn">Cadastrar nova entrada de produtos</button></a>
        <a href="index.php?pg=entradas"><button class="btn">Visualizar entrada dos produtos</button></a>
    </div>
    
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
