<?php
require $_SERVER['DOCUMENT_ROOT'] . "/sgi/php/verifica.php";
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
                    <h1>SGI</h1>
                </div>
            </div>
            <h1>Sistema Gerenciador de Inventário</h1>
            <div class="navbar__exit">
                <!--
                <div class="user__information">
                    <div class="info">
                        <label for="">Usuário: <?php echo $nomeUser; ?></label>
                        <label for="">E-mail: <?php echo $emailUser; ?></label>
                    </div>
                    <img src="/sgi/assets/icon-user.png" alt="">
                </div> -->
                <a href="../logout.php"><img src="/sgi/assets/icon-exit.png" alt=""></a>
            </div>
        </div>
    </nav>
    <main class="main">  
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
            case 'editar-produtos': require './produtos/edit_produto.php'; break;
            case 'resultado-edicao-produtos': require './produtos/resultado_edit.php'; break;
            case 'produtos-inativos': require './produtos/produtosInativos.php'; break;
            case 'inativar-produtos': require './produtos/inativarProdutos.php'; break;
            case 'resultado-inativacao-produtos': require './produtos/resultadoInativacaoProdutos.php'; break;
            //Entradas
            case 'entradas': require './entradas/entradas.php'; break;
            case 'cadastrar-entrada-produtos': require './entradas/cadastro_entrada.php'; break;
            case 'resultado-entrada-produtos': require './entradas/resultado_entrada.php'; break;
            case 'editar-entrada-produtos': require './entradas/edit_entrada.php'; break;
            case 'resultado-edicao-entradas': require './entradas/resultado_edit_entrada.php'; break;
            //saidas
            case 'saidas': require './saidas/saidas.php'; break;
            case 'cadastrar-saida-produtos': require './saidas/cadastro_saida.php'; break;
            case 'resultado-saida-produtos': require './saidas/resultado_saida.php'; break;
            //vendas
            case 'vendas': require './vendas/vendas.php'; break;
            //fornecedores
            case 'fornecedores': require './fornecedores/fornecedores.php'; break;
            case 'cadastrar-fornecedor': require './fornecedores/cadastro_fornecedor.php'; break;
            case 'resultado-cadastro-fornecedor': require './fornecedores/resultado_fornecedor.php'; break;
            case 'editar-fornecedor': require './fornecedores/editar_fornecedor.php'; break;
            case 'resultado-edicao-fornecedores': require './fornecedores/resultado_edit.php'; break;
            //home
            default: require './home.php';
            }        
            ?> 
        </div>
    </main>
    <footer class="footer">
        <div class="footer__content">
            <!--
            <ul class="footer__contact">
                <li><a href="https://www.linkedin.com/in/kerlon-leonardi-hinterholz-958872285/"><img class="linkedin" src="/sgi/assets/linkedin.svg" alt="Linkedin"></a></li>
                <li><a href="https://github.com/kerlonlh"><img class="github" src="/sgi/assets/github.svg" alt="GitHub"></a></li>
                <li><a href="https://instagram.com/hinterholz_kerlon?igshid=OGQ5ZDc2ODk2ZA=="><img class="instagram" src="/sgi/assets/instagram.svg" alt="Instagram"></a></li>
                <li><a href="https://wa.me/55996560626"><img class="whatsapp" src="/sgi/assets/whatsapp.svg" alt="whatsapp"></a></li>
            </ul>
            -->
            <p>Projeto Integrador PI</p>
            <p>Módulo C</p>
            <p class="footer__copyright">© 2024 Kerlon Hinterholz. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="/sgi/scripts/index.js"></script>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>