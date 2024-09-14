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
        JOIN fornecedores ON entrada_produtos.id_fornecedor = fornecedores.id
        WHERE (
        id_produto LIKE :pesquisa 
        OR preco_custo LIKE :pesquisa 
        OR preco_venda LIKE :pesquisa 
        OR data_fabricacao LIKE :pesquisa 
        OR data_validade LIKE :pesquisa 
        OR data_entrada LIKE :pesquisa 
        OR quantidade LIKE :pesquisa 
        OR id_fornecedor LIKE :pesquisa
        OR produtos.produto LIKE :pesquisa 
        OR produtos.marca LIKE :pesquisa
        OR fornecedores.razao_social LIKE :pesquisa )
        AND estoque > 0";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <section class="section__top">
        <form class="section__form" action="index.php?pg=saidas" method="POST">
            <input type="search" placeholder="Pesquisar entrada de produto" name="buscar" autofocus>
            <button class="btn" type="submit">Pesquisar</button>
        </form>
        <a href="index.php?pg=entradas"><button class="btn">Visualizar entrada de produtos</button></a>
        <a href="index.php?pg=home"><button class="btn">Página inicial</button></a>
    </section>
    <div class="table__container">
        <table>
            <thead>
                <tr>
                    <th class="mw2">ID produto</th>
                    <th class="mw5">Produto</th>
                    <th class="mw5">Marca</th>
                    <th>Preço de custo</th>
                    <th>Preço de venda</th>
                    <th>Data de fabricação</th>
                    <th>Data de validade</th>
                    <th>Data de entrada</th>
                    <th class="mw2">Estoque</th>
                    <th>Fornecedor</th>
                    <th class="mw3">Registrar saída</th>
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
                        $estoque = $linha['estoque'];
                        $fornecedor = $linha['razao_social'];
                        $produto = $linha['produto'];
                        $marca = $linha['marca'];


                        $data_fabricacao = inverte_data($data_fabricacao);
                        $data_validade = inverte_data($data_validade);
                        $data_entrada = inverte_data($data_entrada);

                        echo "<tr>
                                <td class='mw2'>$id_produto</td>
                                <td class='mw5'>$produto</td>
                                <td class='mw5'>$marca</td>
                                <td>$preco_custo</td>
                                <td>$preco_venda</td>
                                <td>$data_fabricacao</td>
                                <td>$data_validade</td>
                                <td>$data_entrada</td>
                                <td class='mw2'>$estoque</td>
                                <td>$fornecedor</td>
                                <td>
                                    <form action='index.php?pg=cadastrar-saida-produtos' method='POST'>
                                        <input type='hidden' name='id_entrada_produtos' value='$id_entrada'>
                                        <button class='btn-exclude'type='submit'>Saída</button>
                                    </form>
                                </td>
                            </tr>";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

