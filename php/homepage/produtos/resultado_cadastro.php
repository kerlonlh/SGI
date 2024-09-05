
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
    <?php
        include "../../conexao.php";
        $produto = $_POST['produto'];
        $preco = $_POST['preco'];
        $quantidade = $_POST['quantidade'];

        $sql = "INSERT INTO `produtos`(`produto`, `preco`, `quantidade`) VALUES ('$produto','$preco','$quantidade')";
    
        $sql = $pdo->prepare($sql);
        

        if($sql->execute()){
            echo "$produto cadastrado com sucesso!";
            header("Location: ../index.php?pg=produtos");
        }else{
            echo "$produto não foi cadastrado!";
        }
    ?>
</section>

</body>
</html>
