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
            //PRODUTOS
                //View
                case 'produtos': require './View/produtos.php'; break;
                case 'produtos-inativos': require './View/produtosInativos.php'; break;
                //Model
                case 'resultado-produtos': require './Model/resultado_cadastro.php'; break;
                case 'resultado-edicao-produtos': require './Model/resultado_edit_produtos.php'; break;       
                case 'resultado-inativacao-produtos': require './Model/resultadoInativacaoProdutos.php'; break;
                case 'resultado-ativacao-produtos': require './Model/resultadoAtivacaoProdutos.php'; break;
                //Controller
                case 'cadastrar-produtos': require './Controller/cadastro_produto.php'; break;
                case 'editar-produtos': require './Controller/edit_produto.php'; break;
                case 'inativar-produtos': require './Controller/inativarProdutos.php'; break;
                case 'ativar-produtos': require './Controller/ativarProdutos.php'; break;
            //ENTRADAS
                //View
                case 'entradas': require './View/entradas.php'; break;
                //Model
                case 'resultado-entrada-produtos': require './Model/resultado_entrada.php'; break;
                case 'resultado-edicao-entradas': require './Model/resultado_edit_entrada.php'; break;
                //Controller
                case 'cadastrar-entrada-produtos': require './Controller/cadastro_entrada.php'; break;
                case 'editar-entrada-produtos': require './Controller/edit_entrada.php'; break;      
            //SAIDAS
                //View
                case 'saidas': require './View/saidas.php'; break;
                //Model
                case 'resultado-saida-produtos': require './Model/resultado_saida.php'; break;
                //Controller
                case 'cadastrar-saida-produtos': require './Controller/cadastro_saida.php'; break;
            //VENDAS
                //View
                case 'vendas': require './View/vendas.php'; break;
            //FORNECEDORES
                //View
                case 'fornecedores': require './View/fornecedores.php'; break;
                //Model
                case 'resultado-edicao-fornecedores': require './Model/resultado_edit.php'; break;
                case 'resultado-cadastro-fornecedor': require './Model/resultado_fornecedor.php'; break;
                //Controller
                case 'cadastrar-fornecedor': require './Controller/cadastro_fornecedor.php'; break;
                case 'editar-fornecedor': require './Controller/editar_fornecedor.php'; break;
            //HOME
                //View
                default: require './View/home.php';
            }        
            ?> 
        </div>
    </main>
    <footer class="footer">
        <div class="footer__content">
            <ul class="footer__contact">
                <li><a href="https://www.linkedin.com/in/kerlon-leonardi-hinterholz-958872285?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img class="linkedin" src="/sgi/assets/linkedin.svg" alt="Linkedin"></a></li>
                <li><a href="https://github.com/kerlonlh"><img class="github" src="/sgi/assets/github.svg" alt="GitHub"></a></li>
                <li><a href="https://instagram.com/hinterholz_kerlon?igshid=OGQ5ZDc2ODk2ZA=="><img class="instagram" src="/sgi/assets/instagram.svg" alt="Instagram"></a></li>
                <li><a href="https://wa.me/55996560626"><img class="whatsapp" src="/sgi/assets/whatsapp.svg" alt="whatsapp"></a></li>
            </ul>
            <p class="footer__copyright">© 2024 Kerlon Hinterholz. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="/sgi/scripts/index.js"></script>
</body>
</html>
<?php else: header("Location: /sgi/index.php"); endif; ?>