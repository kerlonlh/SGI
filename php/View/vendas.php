<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/vendas/vendas.css">
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

        $sql = "SELECT vendas.id_venda, vendas.id_lote, produtos.produto, vendas.quantidade AS quantidade_venda, data_entrada, vendas.data_saida, ((preco_venda - preco_custo) * vendas.quantidade) AS lucro 
        FROM vendas 
        JOIN entrada_produtos ON vendas.id_lote = entrada_produtos.id_entrada_produtos
        JOIN produtos ON entrada_produtos.id_produto = produtos.id
        WHERE (
        vendas.id_venda LIKE :pesquisa 
        OR vendas.id_lote LIKE :pesquisa 
        OR produtos.produto LIKE :pesquisa 
        OR vendas.quantidade LIKE :pesquisa 
        OR data_entrada LIKE :pesquisa 
        OR vendas.data_saida LIKE :pesquisa)
        ORDER BY vendas.id_venda DESC";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <section class="section__top">
        <form class="section__form" action="index.php?pg=vendas" method="POST">
            <input type="search" placeholder="Pesquisar entrada de produto" name="buscar" autofocus>
            <button class="btn" type="submit">Pesquisar venda</button>
        </form>
        <a href="index.php?pg=entradas"><button class="btn">Visualizar entrada de produtos</button></a>
        <a href="index.php?pg=home"><button class="btn">Página inicial</button></a>
    </section>
    <div class="table__container">
        <table>
            <thead>
                <tr>
                    <th class="mw1">ID venda</th>
                    <th class="mw1">ID lote</th>
                    <th class="mw5">Produto</th>
                    <th class="mw1">Quantidade</th>
                    <th class="mw1">Lucro</th>
                    <th class='mw1'>Data de Entrada</th>
                    <th class='mw1'>Data de Saída</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                        $id_venda = $linha['id_venda'];
                        $id_lote = $linha['id_lote'];
                        $produto = $linha['produto'];
                        $quantidade = $linha['quantidade_venda'];
                        $lucro = $linha['lucro'];
                        $data_entrada = $linha['data_entrada'];
                        $data_saida = $linha['data_saida'];

                        $data_entrada = inverte_data($data_entrada);
                        $data_saida = inverte_data($data_saida);

                        echo "<tr>
                                <td class='mw1'>$id_venda</td>
                                <td class='mw1'>$id_lote</td>
                                <td class='mw5'>$produto</td>
                                <td class='mw1'>$quantidade</td>
                                <td class='mw1'>R$$lucro</td>
                                <td class='mw1'>$data_entrada</td>
                                <td class='mw1'>$data_saida</td>
                            </tr>";
                    }
                ?>
                
            </tbody>
        </table>
    </div>
    
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

