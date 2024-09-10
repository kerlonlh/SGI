<?php
require '../../verifica.php';
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>



<?php else: header("Location: /sgi/login.php"); endif; ?>