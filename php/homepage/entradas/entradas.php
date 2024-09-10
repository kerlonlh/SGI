<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/entradas.css">
</head>
<body>
    <?php
        function inverte_data($data){
            $d = explode ('-', $data);
            $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
            return $escreve;
        }
        $pesquisa = $_POST['buscar'] ?? '';

        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT * FROM entrada_produtos
        JOIN produtos ON entrada_produtos.id_produto = produtos.id
        WHERE 
        id_produto LIKE :pesquisa 
        OR preco_custo LIKE :pesquisa 
        OR preco_venda LIKE :pesquisa 
        OR data_fabricacao LIKE :pesquisa 
        OR data_validade LIKE :pesquisa 
        OR data_entrada LIKE :pesquisa 
        OR quantidade LIKE :pesquisa 
        OR id_fornecedor LIKE :pesquisa
        OR produtos.produto LIKE :pesquisa 
        OR produtos.marca LIKE :pesquisa ";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <section class="section__top">
        <form class="section__form" action="index.php?pg=entradas" method="POST">
            <input type="search" placeholder="Pesquisar entrada de produto" name="buscar" autofocus>
            <button class="btn" type="submit">Pesquisar produto</button>
        </form>
        <a href="index.php?pg=cadastrar-entrada-produtos"><button class="btn">Cadastrar entrada de produto</button></a>
        <a href="index.php?pg=home"><button class="btn">Página inicial</button></a>
    </section>
    <table>
        <thead>
            <tr>
                <th>Código <br>do Produto</th>
                <th>Produto</th>
                <th>Marca</th>
                <th>Preço <br>de custo</th>
                <th>Preço <br>de venda</th>
                <th>Data de<br> fabricação</th>
                <th>Data de<br> validade</th>
                <th>Data de<br> entrada</th>
                <th>Quantidade</th>
                <th>Código do<br> fornecedor</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                    $id_entrada = $linha['id_entrada_produtos'];
                    $id_produto = $linha['id_produto'];
                    $preco_custo = $linha['preco_custo'];
                    $preco_venda = $linha['preco_venda'];
                    $data_fabricacao = $linha['data_fabricacao'];
                    $data_validade = $linha['data_validade'];
                    $data_entrada = $linha['data_entrada'];
                    $quantidade = $linha['quantidade'];
                    $id_fornecedor = $linha['id_fornecedor'];
                    $produto = $linha['produto'];
                    $marca = $linha['marca'];


                    $data_fabricacao = inverte_data($data_fabricacao);
                    $data_validade = inverte_data($data_validade);
                    $data_entrada = inverte_data($data_entrada);

                    echo "<tr>
                            <td>$id_produto</td>
                            <td>$produto</td>
                            <td>$marca</td>
                            <td>$preco_custo</td>
                            <td>$preco_venda</td>
                            <td>$data_fabricacao</td>
                            <td>$data_validade</td>
                            <td>$data_entrada</td>
                            <td>$quantidade</td>
                            <td>$id_fornecedor</td>
                            <td>
                                <form action='index.php?pg=editar-entrada-produtos' method='POST'>
                                    <input type='hidden' name='id_entrada_produtos' value='$id_entrada'>
                                    <button type='submit'>Editar</button>
                                </form>
                            </td>
                            <td><a href='#'><button type='submit'>Excluir</button></a></td>
                        </tr>";
                }
            ?>
            
        </tbody>
    </table>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

