
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
        <p>Cadastrar produtos</p>
        <form action="index.php?pg=resultado-produtos" method="POST">
            <div>
                <label for="nome">Nome do produto</label>
                <input type="text" name="produto" required>
            </div>
            <div>
                <label for="nome">Marca do produto</label>
                <input type="text" name="marca" required>
            </div>
            <div>
                <input type="submit">
            </div>
        </form>

    </section>
</body>
</html>

