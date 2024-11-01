<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGI</title>
    <link rel="stylesheet" href="/sgi/css/components/produtos/produtos.css">
</head>
<body>
    <?php
        $pesquisa = $_POST['buscar'] ?? '';

        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT * FROM produtos WHERE (id LIKE :pesquisa OR produto LIKE :pesquisa OR marca LIKE :pesquisa) AND (situacao = 0)";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <section class="section__top">
        <form class="section__form" action="index.php?pg=produtos" method="POST">
            <input type="search" placeholder="Pesquisar produto" name="buscar" autofocus>
            <button class="btn" type="submit">Pesquisar</button>
        </form>
        <a href="index.php?pg=produtos-inativos"><button class="btn">Produtos inativos</button></a>
        <a href="index.php?pg=cadastrar-produtos"><button class="btn">Cadastrar novo produto</button></a>
        <a href="index.php?pg=home"><button class="btn">Página inicial</button></a>
    </section>
    <div class="table__container">
        <table>
            <thead>
                <tr>
                    <th class="mw1">Código</th>
                    <th class="mw5">Produto</th>
                    <th class="mw5">Marca</th>
                    <th class="mw1">Editar</th>
                    <th class="mw1">Inativar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                        $id = $linha['id'];
                        $produto = $linha['produto'];
                        $marca = $linha['marca'];

                        echo "<tr>
                                <th class='mw1'>$id</th>
                                <td class='mw5'>$produto</td>
                                <td class='mw5'>$marca</td>
                                <td class='mw1'>
                                    <form action='index.php?pg=editar-produtos' method='POST'>
                                        <input type='hidden' name='id' value='$id'>
                                        <button class='btn-edit' type='submit'>Editar</button>
                                    </form>
                                </td class='mw1'>
                                <td class='mw1'>
                                    <form action='index.php?pg=inativar-produtos' method='POST'>
                                        <input type='hidden' name='id' value='$id'>
                                        <button class='btn-exclude' type='submit'>Inativar</button>
                                    </form>
                                </td class='mw1'>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>

