<?php
require '../../verifica.php';
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

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
        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";
            $razao_social = $_POST['razao_social'];
            $cnpj = $_POST['cnpj'];

            $sql = "INSERT INTO `fornecedores`(`razao_social`, `cnpj`) VALUES ('$razao_social','$cnpj')";
        
            $sql = $pdo->prepare($sql);

            if($sql->execute()){
                echo "$razao_social cadastrado com sucesso!";
            }else{
                echo "$razao_social não foi cadastrado!";
            }
        ?>
    </section>
    <a href="index.php?pg=cadastrar-fornecedor"><button>CADASTRAR NOVO FORNECEDOR</button></a>
    <a href="index.php?pg=fornecedores"><button>VISUALIZAR FORNECEDORES</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
