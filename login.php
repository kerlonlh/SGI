<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/fiveicon.png">
    <title>Login SGI</title>
</head>
<body>
    <form class="form" action="php/logar.php" method="POST">
        <div class="card">
            <div class="card_top">
                <img src="assets/img-login.png" alt="Logo de login" class="img_login">
                <h2 class="title_login">SGI</h2>
                <p>Sistema Gerenciador de Inventário</p>
            </div>
            <div class="card_group">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="card_group">
                <label for="">Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" required>
            </div>
            <div class="card_group btn">
                <button type="submit">ACESSAR</button>
            </div>
            <?php if(isset($_GET['error']) && $_GET['error'] == 1): ?>
                <div class="error-message">
                    <p> Usuário ou senha incorretos. Tente novamente.</p>
                </div>
            <?php endif; ?>
        </div>
    </form>
</body>
</html>