<?php
session_start();

require 'conexao.php';
require 'Usuario.class.php';

$u = new Usuario($pdo);

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if ($u->login($email, $senha) == true) {
  
        $situacao = $u->verificaSituacao($email);

        if ($situacao == 0) {
            header("Location: ./index.php");
        } else {
            echo '<form id="errorForm" action="../index.php" method="POST" style="display: none;"> <input type="hidden" name="error" value="3"> </form>';
            echo '<script>document.getElementById("errorForm").submit();</script>';
        }
    } else {
        echo '<form id="errorForm" action="../index.php" method="POST" style="display: none;"> <input type="hidden" name="error" value="1"> </form>';
        echo '<script>document.getElementById("errorForm").submit();</script>';
    }

} else {
    echo '<form id="errorForm" action="../index.php" method="POST" style="display: none;"><input type="hidden" name="error" value="2"></form>';
    echo '<script>document.getElementById("errorForm").submit();</script>';
}
?>
