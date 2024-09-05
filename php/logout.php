<?php
session_start();
unset($_SESSION['idUser']);

header("Location: ../login.php");
?>