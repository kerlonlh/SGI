<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SGI</title>
        <link rel="stylesheet" href="/sgi/css/components/saidas/cadastro_saida.css">
    </head>
    <body>
        <?php

        function inverte_data($data){
            $d = explode ('-', $data);
            $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
            return $escreve;
        }
        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_entrada_produtos'])) {
            $id_entrada = $_POST['id_entrada_produtos'];

            $sql = "SELECT * FROM entrada_produtos WHERE id_entrada_produtos = :id_entrada_produtos";
            $dados = $pdo->prepare($sql);

            $dados->execute([':id_entrada_produtos' => $id_entrada]);

            $linha = $dados->fetch(PDO::FETCH_ASSOC);

            $id_produto = $linha['id_produto'];
            $preco_custo = $linha['preco_custo'];
            $preco_venda = $linha['preco_venda'];
            $data_fabricacao = $linha['data_fabricacao'];
            $data_validade = $linha['data_validade'];
            $data_entrada = $linha['data_entrada'];

            $data_fabricacao = inverte_data($data_fabricacao);
            $data_validade = inverte_data($data_validade);
            $data_entrada = inverte_data($data_entrada);

            if ($linha) {
        ?>
                <section>
                    <h1>Registrar saida de produtos</h1>
                    <form action="index.php?pg=resultado-saida-produtos" method="POST">
                        <div class="form__saida">
                            <p>Código do produto:  <?php echo htmlspecialchars($id_produto);?></p>
                            <p>Preço de custo:  <?php echo htmlspecialchars($preco_custo);?></p>
                            <p>Preço de venda: <?php echo htmlspecialchars($preco_venda);?></p>
                            <p>Data de fabricação:  <?php echo htmlspecialchars($data_fabricacao);?></p>
                            <p>Data de validade:  <?php echo htmlspecialchars($data_validade);?></p>
                            <p>Data de entrada no estoque: <?php echo htmlspecialchars($data_entrada);?></p>
                            <p>Código do fornecedor: <?php echo htmlspecialchars($linha['id_fornecedor']);?></p>
                            <p>
                                <label for="nome">Quantidade: </label>
                                <input type="number" min="1" max="<?php echo $linha['estoque']; ?>" name="estoque" required>
                            </p>
                            <p>
                                <label for="nome">Data de saída: </label>
                                <input type="date" id="data_saida" name="data_saida" required>
                            </p>
                        </div>
                        <div class="form__button">
                            <input type="hidden" name="id_entrada_produtos" value="<?php echo htmlspecialchars($id_entrada); ?>">
                            <input type="hidden" name="id_produto" value="<?php echo htmlspecialchars($id_produto); ?>">
                            <button class="btn">Salvar</button>
                        </div>
                    </form>
                </section>
                <div class="form__button">
                    <a href="index.php?pg=saidas"><button class="btn">Voltar</button></a>
                </div>   
        <?php
            } else {
                echo "<p>Produto não encontrado.</p>";
            }
        } else {
            echo "<p>ID do produto não fornecido.</p>";
        }
        ?>
        <script src="/sgi/scripts/index.js"></script>
    </body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>