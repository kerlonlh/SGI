<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/fornecedores/fornecedores.css">
</head>
<body>
    <?php
        $pesquisa = $_POST['buscar'] ?? '';
        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT * FROM fornecedores WHERE id LIKE :pesquisa OR razao_social LIKE :pesquisa OR cnpj LIKE :pesquisa";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
        <section class="section__top">
            <form class="section__form" action="index.php?pg=fornecedores" method="POST">
                <input type="search" placeholder="Pesquisar fornecedor" name="buscar" autofocus>
                <button class="btn" type="submit">Pesquisar</button>
            </form>
            <a href="index.php?pg=cadastrar-fornecedor"><button class="btn">Cadastrar novo fornecedor</button></a>
            <a href="index.php?pg=home"><button class="btn">Página inicial</button></a>
    </section>
    <div class="table__container">
        <table>
            <thead>
                <tr>
                    <th class="mw1">Código</th>
                    <th class="mw5">Razão Social</th>
                    <th class="mw5">CNPJ</th>
                    <th class="mw1">Editar</th>
                    <th class="mw1">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                        $id = $linha['id'];
                        $razao_social = $linha['razao_social'];
                        $cnpj = $linha['cnpj'];

                        echo "<tr>
                                <th class='mw1'>$id</th>
                                <td class='mw5'>$razao_social</td>
                                <td class='mw5'>$cnpj</td>
                                <td class='mw1'>
                                    <form action='index.php?pg=editar-fornecedor' method='POST'>
                                        <input type='hidden' name='id' value='$id'>
                                        <button class='btn-edit' type='submit'>Editar</button>
                                    </form>
                                </td class='mw1'>
                                <td><a href='#'><button class='btn-exclude' type='submit'>Excluir</button></a></td>
                            </tr>";
                    }
                ?>   
            </tbody>
        </table>
    </div>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>

