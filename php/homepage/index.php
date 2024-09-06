<?php
require '../verifica.php';
if(isset($_SESSION['idUser']) && !empty($_SESSION['idUser'])): ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href='/sgi/assets/fiveicon.png'>
    <link rel="stylesheet" href="/sgi/css/components/index.css">
    <title>SGI</title>
</head>
<body>
    <nav class="navbar">
        <div class="navbar__content">
            <div class="navbar__mobile navbar__burguer">
                <button class="burguer">
                    <span class="linha"></span>
                    <span class="linha"></span>
                    <span class="linha"></span>
                </button>
                <ul class="navbar__links">
                    <li><a href="index.php?pg=home">Tela Inicial</a></li>
                    <li><a href="index.php?pg=produtos">Produtos</a></li>
                    <li><a href="index.php?pg=entradas">Entradas</a></li>
                    <li><a href="index.php?pg=saidas">Saídas</a></li>
                    <li><a href="index.php?pg=vendas">Vendas</a></li>
                    <li><a href="index.php?pg=fornecedores">Fornecedores</a></li>
                </ul>
                <div class="sgi">
                    <h2>SGI</h2>
                </div>
            </div>
            <h1>Sistema Gerenciador de Inventário</h1>
            <div class="navbar__exit">
                <div class="user__information">
                    <div class="info">
                        <label for="">Usuário: <?php echo $nomeUser; ?></label>
                        <label for="">E-mail: <?php echo $emailUser; ?></label>
                    </div>
                    <img src="/sgi/assets/icon-user.png" alt="">
                </div>
                <a href="../logout.php"><img src="/sgi/assets/icon-exit.png" alt=""></a>
            </div>
        </div>
    </nav>
    <main>  
        <div>
        <?php
            $pg = "";
        if(isset($_GET['pg']) && !empty($_GET['pg'])){
            $pg = $_GET['pg'];
        }
        switch($pg){
            //Produtos
            case 'produtos': require './produtos/produtos.php'; break;
            case 'resultado-produtos': require './produtos/resultado_cadastro.php'; break;
            case 'cadastrar-produtos': require './produtos/cadastro_produto.php'; break;
            //Entradas
            case 'entradas': require './entradas/entradas.php'; break;
            case 'cadastrar-entrada-produtos': require './entradas/cadastro_entrada.php'; break;
            case 'resultado-entrada-produtos': require './entradas/resultado_entrada.php'; break;
            //saidas
            case 'saidas': require './saidas.php'; break;
            case 'vendas': require './vendas.php'; break;
            //fornecedores
            case 'fornecedores': require './fornecedores/fornecedores.php'; break;
            case 'cadastrar-fornecedor': require './fornecedores/cadastro_fornecedor.php'; break;
            case 'resultado-cadastro-fornecedor': require './fornecedores/resultado_fornecedor.php'; break;
            default: require './home.php';
            }        
            ?> 
        </div>
    </main>
    <script src="/sgi/scripts/index.js"></script>
</body>
</html>
<?php else: header("Location: /sgi/login.php"); endif; ?>