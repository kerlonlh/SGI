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
        
            if (isset($_POST['id'], $_POST['razao_social'], $_POST['cnpj'])) {
                $id = $_POST['id'];
                $razao_social = $_POST['razao_social'];
                $cnpj = $_POST['cnpj'];

                $sql = "UPDATE fornecedores SET razao_social = :razao_social, cnpj = :cnpj WHERE id = :id";
                $sql = $pdo->prepare($sql);

                if($sql->execute([':razao_social' => $razao_social, ':cnpj' => $cnpj, ':id' => $id])){
                    echo '<div class="message__success">' . "$razao_social ". ' atualizado com sucesso! </div>';
                } else {
                    echo '<div class="message__error">' . "$razao_social ". ' não foi atualizado! </div>';
                }
            } else {
                echo '<div class="message__error"> Dados insuficientes para atualizar o produto. </div>';
            }
        ?>
    </section>
    <a href="index.php?pg=fornecedores"><button class="btn">Voltar</button></a>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>
