<?php
session_start();
if(isset($_POST) & !empty($_POST)){
    if (isset($_POST['csrf_token'])) {
       if ($_POST['csrf_token'] == $_SESSION['csrf_token']) {
       }
       else{
        $errors[] = "Problema ao verificar CSRF Token";
       }
    }
    $max_time = 5;
    if (isset($_SESSION['csrf_token_time'])) {
        $token_time = $_SESSION['csrf_token_time'];
        if (($token_time + $max_time) >= time()) {
        }else{
            unset($_SESSION['csrf_token']);
            unset($_SESSION['csrf_token_time']);
            $errors[] = "CSRF Token expirado";
        }
    }
    if (empty($errors)) {
        $messages[] = "Proceed with Next steps";
    }
}
$token = md5(uniqid(rand(), true));
$_SESSION['csrf_token'] = $token;
$_SESSION['csrf_token_time'] = time();

?>
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
    <form class="form" action="./php/logar.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
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
            <?php
                if (isset($_POST['error']) && $_POST['error'] == 1) {
                   echo '<div class="error-message">Usuário ou senha inválidos.</div>';
                }else if (isset($_POST['error']) && $_POST['error'] == 2) {
                    echo '<div class="error-message">Ocorreu um erro de login.</div>';
                }else if (isset($_POST['error']) == 3) {
                    echo '<div class="error-message">Sua conta está desativada.</div>';
                }
            ?>
        </div>
    </form>
</body>
</html>