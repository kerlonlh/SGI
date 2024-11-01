<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos/cadastros_produtos.css">
</head>
<body>
    <section>
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
            $produto = $_POST['produto'];
            $marca = $_POST['marca'];

            $sql_select = "SELECT * FROM produtos WHERE produto = :produto AND marca = :marca";
            $sql_select = $pdo->prepare($sql_select);
            $sql_select->execute([':produto' => $produto, ':marca' => $marca]);

            if($sql_select->rowCount() > 0){
                echo '<div class="message__error">Produto ' . htmlspecialchars($produto) . ', marca ' . htmlspecialchars($marca) . ' já foi cadastrado! </div>';
            }
            else{
                $sql = "INSERT INTO `produtos`(`produto`, `marca`,`situacao`) VALUES ('$produto','$marca','0')";
        
                $sql = $pdo->prepare($sql);
    
                if($sql->execute()){
                    echo '<div class="message__success">' . htmlspecialchars($produto) . ' cadastrado com sucesso! </div>';
                }else{
                    echo '<div class="message__error">' . htmlspecialchars($produto) . ' NÃO foi cadastrado! </div>';
                }
            }


        ?>
    </section>
    <div class="div__btn">
        <a href="index.php?pg=cadastrar-produtos"><button class="btn">CADASTRAR NOVO PRODUTO</button></a>
        <a href="index.php?pg=produtos"><button class="btn">VISUALIZAR PRODUTOS</button></a>
    </div>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
