
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos.css">
</head>
<body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

    $sql = "SELECT * FROM produtos WHERE id = 72";
    $dados = $pdo->prepare($sql);
    $linha = $dados->fetch(PDO::FETCH_ASSOC);
    ?>

    <section>
        <p>Atualizar cadastro de produtos</p>
        <form action="index.php?pg=resultado-edicao-produtos" method="POST">
            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="produto" required value="<?php echo $linha['nome']; ?>">
            </div>
            <div>
                <label for="nome">Marca do produto</label>
                <input type="text" name="marca" required value="<?php echo $linha['marca']; ?>">
            </div>
            <div>
                <input type="submit" values="Salvar alterações">
            </div>
        </form>

    </section>


    

</body>
</html>

