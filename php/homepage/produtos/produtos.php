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
        <a href="index.php?pg=cadastrar-produtos"><button>CADASTRAR PRODUTO</button></a>
        <a href="index.php?pg=home"><button>PÁGINA INICIAL</button></a>
    </section>

    <?php
        $pesquisa = $_POST['buscar'] ?? '';

        include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

        $sql = "SELECT * FROM produtos WHERE id LIKE :pesquisa OR produto LIKE :pesquisa OR marca LIKE :pesquisa";

        $dado = $pdo->prepare($sql);
        $dado->execute([':pesquisa' => "%$pesquisa%"]);
    ?>
    <form action="index.php?pg=produtos" method="POST">
        <input type="search" placeholder="Pesquisar produto" name="buscar" autofocus>
        <button type="submit">Pesquisar</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Produto</th>
                <th>Marca</th>
                <th>Funções</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($linha = $dado->fetch(PDO::FETCH_ASSOC)){
                    $id = $linha['id'];
                    $produto = $linha['produto'];
                    $marca = $linha['marca'];

                    echo "<tr>
                            <th>$id</th>
                            <td>$produto</td>
                            <td>$marca</td>
                            <td>
                                <form action='index.php?pg=editar-produtos' method='POST'>
                                    <input type='hidden' name='id' value='$id'>
                                    <button type='submit'>Editar</button>
                                </form>
                            </td>
                            <td><a href='#'><button type='submit'>Excluir</button></a></td>
                        </tr>";
                }
            ?>
            
        </tbody>
    </table>
</body>
</html>

<?php else: header("Location: /sgi/index.php"); endif; ?>

