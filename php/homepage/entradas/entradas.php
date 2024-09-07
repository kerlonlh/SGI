
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

        <a href="index.php?pg=cadastrar-entrada-produtos"><button>CADASTRAR ENTRADA DE PRODUTO</button></a>
        <a href="index.php?pg=home"><button>PÁGINA INICIAL</button></a>
    </section>

    <?php
        function inverte_data($data){
            $d = explode ('-', $data);
            $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
            return $escreve;
        }

        $pesquisa = $_POST['buscar'] ?? '';

        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT * FROM entrada_produtos WHERE id LIKE :pesquisa OR id_produto LIKE :pesquisa OR preco_custo LIKE :pesquisa OR preco_venda LIKE :pesquisa OR data_fabricacao LIKE :pesquisa OR data_validade LIKE :pesquisa OR data_entrada LIKE :pesquisa OR quantidade LIKE :pesquisa OR id_fornecedor LIKE :pesquisa" ;

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <form action="index.php?pg=entradas" method="POST">
        <input type="search" placeholder="Pesquisar entrada de produto" name="buscar" autofocus>
        <button type="submit">Pesquisar entrada de produto</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Código do Produto</th>
                <th>Preço de custo</th>
                <th>Preço de venda</th>
                <th>Data de fabricação</th>
                <th>Data de validade</th>
                <th>Data de entrada</th>
                <th>Quantidade</th>
                <th>Código do fornecedor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                    $id = $linha['id'];
                    $id_produto = $linha['id_produto'];
                    $preco_custo = $linha['preco_custo'];
                    $preco_venda = $linha['preco_venda'];
                    $data_fabricacao = $linha['data_fabricacao'];
                    $data_validade = $linha['data_validade'];
                    $data_entrada = $linha['data_entrada'];
                    $quantidade = $linha['quantidade'];
                    $id_fornecedor = $linha['id_fornecedor'];


                    $data_fabricacao = inverte_data($data_fabricacao);
                    $data_validade = inverte_data($data_validade);
                    $data_entrada = inverte_data($data_entrada);

                    echo "<tr>
                            <th>$id</th>
                            <td>$id_produto</td>
                            <td>$preco_custo</td>
                            <td>$preco_venda</td>
                            <td>$data_fabricacao</td>
                            <td>$data_validade</td>
                            <td>$data_entrada</td>
                            <td>$quantidade</td>
                            <td>$id_fornecedor</td>
                        </tr>";
                }
            ?>
            
        </tbody>
    </table>
</body>
</html>

