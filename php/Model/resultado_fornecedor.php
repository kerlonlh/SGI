<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/fornecedores/cadastrar_fornecedor.css">
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
                echo '<div class="message__success">' . "$razao_social" . ' cadastrado com sucesso! </div>';
            }else{
                echo '<div class="message__success">' . "$razao_social" . ' NÂO foi cadastrado! </div>';
            }
        ?>
    </section>
    <div class="div__btn">
        <a href="index.php?pg=cadastrar-fornecedor"><button class="btn">Cadastrar novo fornecedor</button></a>
        <a href="index.php?pg=fornecedores"><button class="btn">Visualizar fornecedores</button></a>
    </div>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
