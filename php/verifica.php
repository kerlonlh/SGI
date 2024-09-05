<?php
require 'conexao.php';

if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])){

    require_once 'Usuario.class.php';
    $u = new Usuario();

    $listLogged = $u->logged($_SESSION['idUser']);

    $nomeUser = $listLogged['nome'];
    $emailUser = $listLogged['email'];

}else{
    header('Location: ../login.php');
}



?>