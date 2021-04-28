<?php 
    require_once("config.php")
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Matheus Henrique || https://mhborges.com.br">
<meta name="description" content="Loja Univida || Vendas de sacos de lixo 100% reciclados e Produtos de limpeza para toda Curitiba">
<meta name="keywords" content="Univida, unica, Loja, Loja Univida, Saco de lixo, Produtos de limpeza">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title><?php echo $nome_loja ?></title>
    <link rel="icon" href="img/iconUni.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder
    <div id="preloder">
        
        <div class="loader"></div>
    </div> -->

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="Valor">item: <span>R$50.00</span></div>
            <div class="Login ml-2" id="loginMB">
                <a href="sistema"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Inicio</a></li>
                <li><a href="About.php">Sobre Nós</a></li>
                <li><a href="#">Produtos</a>
                    <ul class="header__menu__dropdown">
                    <li><a href="product_list.php">todos Produtos</a></li>
                        <li><a href="product_promotion.php#promocoes">Promoções</a></li>
                        <li><a href="product_promotion.php#maisvendidos">Mais Vendidos</a></li>
                        <li><a href="product_promotion.php#combos">Combos</a></li>
                    </ul>
                </li>
                <li><a href="./blog.php">Blog</a></li>
                <li><a href="./contact.php">Contatos</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>

        <div class="footer__widget">
            <div class="footer__widget__social">
                <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" title="Instagram"><i class="fa fa-instagram" ></i></a>
                <a href="#" title="<?php echo $whatsapp ?>"><i class="fa fa-whatsapp" ></i></a>
            </div>
        </div>
        
        
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="MenuPrima">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Inicio</a></li>
                            <li><a href="About.php">Sobre Nós</a></li>
                            <li><a href="#">Produtos</a>
                                <ul class="header__menu__dropdown">
                                <li><a href="product_list.php">todos Produtos</a></li>
                                    <li><a href="product_promotion.php#promocoes">Promoções</a></li>
                                    <li><a href="product_promotion.php#maisvendidos">Mais Vendidos</a></li>
                                    <li><a href="product_promotion.php#combos">Combos</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.php">Blog</a></li>
                            <li><a href="./contact.php">Contatos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
<section class="menu menuP">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="Login" >
                        <a href="sistema"><i class="fa fa-user"></i> Login</a>
                    </div>
                    <div class="CarrinhoBox">
                        <ul>
                            <li><a href="carrinho.php"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="Valor">Valor:<span>R$50.00</span></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="BarraPesquisa">
                        <div class="BarraPesquisaform">
                            <form action="#">
                                <input type="text" placeholder="O que está Procurando?">
                                <button type="submit" class="site-btn">Buscar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="Categorias">
                        <div class="TodasCategorias">
                            <i class="fa fa-bars"></i>
                            <span>Categorias</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->