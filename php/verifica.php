<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/conexao.php"; 
require_once $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/Usuario.class.php"; 

$u = new Usuario($pdo);


if (isset($_SESSION['idUser'])) {
    $usuario = $u->logged($_SESSION['idUser']);
} else { 
}
