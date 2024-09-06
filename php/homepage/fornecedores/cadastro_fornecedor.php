
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
        <form action="index.php?pg=resultado-cadastro-fornecedor" method="POST">
            <div>
                <label for="nome">Razão social</label>
                <input type="text" name="razao_social" required>
            </div>
            <div>
                <label for="nome">CNPJ</label>
                <input type="text" pattern="\d{2}\.\d{3}\.\d{3}/\d{4}-\d{2}" placeholder="00.000.000/0000-00" name="cnpj" required>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>

    </section>
</body>
</html>

