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
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = $_POST['id'];

        $sql = "SELECT * FROM fornecedores WHERE id = :id";
        $dados = $pdo->prepare($sql);

        $dados->execute([':id' => $id]);

        $linha = $dados->fetch(PDO::FETCH_ASSOC);

        if ($linha) {
    ?>
            <section>
                <h1>Atualizar cadastro de fornecedores</h1>
                <form action="index.php?pg=resultado-edicao-fornecedores" method="POST">
                    <div>
                        <label for="nome">Razão social</label>
                        <input type="text" name="razao_social" required value="<?php echo htmlspecialchars($linha['razao_social']); ?>">
                    </div>
                    <div>
                        <label for="marca">CNPJ</label>
                        <input type="text" name="cnpj" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="00.000.000/0000-00" required value="<?php echo htmlspecialchars($linha['cnpj']); ?>" >
                    </div>
                    <div>
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <button class="btn" type="submit">Salvar alterações</button>
                    </div>
                </form>
            </section>
    <?php
        } else {
            echo "<p>Fornecedor não encontrado.</p>";
        }
    } else {
        echo "<p>ID do fornecedor não fornecido.</p>";
    }
    ?>
    <a href="index.php?pg=fornecedores"><button class="btn">Voltar</button></a>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>