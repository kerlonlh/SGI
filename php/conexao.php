<?php 

session_start();

$localhost = "localhost";
$user = "root";
$passw = "";
$banco = "sgi";

global $pdo;
try{
    //estrutural orientada a objetos
    $pdo = new PDO("mysql:dbname=".$banco."; host=".$localhost, $user, $passw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    echo "ERRO: " .$e->getMessage();
    exit;
}

?>
