
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos.css">
</head>
<body>

    <section>
    
        <p>Cadastrar produtos</p>
        <form action="index.php?pg=newprodutos" method="POST">
            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="produto" required>
            </div>
            <div>
                <label for="nome">Preço</label>
                <input type="number" min="0" step="0.01" placeholder="0.00" name="preco" required>
            </div>
            <div>
                <label for="nome">Quantidade</label>
                <input type="number" min="0" name="quantidade" required>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>

        <?php
            $pg = "";
                if(isset($_GET['pg']) && !empty($_GET['pg'])){
                    $pg = $_GET['pg'];
                }
            switch($pg){
                case 'newprodutos': require './resultado_cadastro.php'; break;
            }   


        
        ?>
    </section>
</body>
</html>

