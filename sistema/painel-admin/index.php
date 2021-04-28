<?php 
    require_once("../../conexao.php");
    
    @session_start();
    //verificação de autenticação do usuario
    if(@$_SESSION['id_usuario'] == null || @$_SESSION ['nivel_usuario'] != 'Admin'){
        echo "<script language='javascript'>window.location='../index.php'</script>";
    }

    //variaveis para o menu
    $pag = @$_GET["pag"];
    $menu1 = "produtos";
    $menu2 = "categorias";
    $menu3 = "sub-categorias";
    $menu4 = "promocoes";
    $menu5 = "combos";
    $menu6 = "clientes";
    $menu7 = "vendas";
    $menu8 = "backup";
    $perfil = "perfil";
    $menu9 = "tipo-envios";

    //consulta de banco de dados para trazer dados do usuario

    $res = $pdo->query("SELECT * FROM usuarios where id = '$_SESSION[id_usuario]'"); 
    $dados  = $res->fetchAll(PDO::FETCH_ASSOC);
    $nomeUserEdit = @$dados[0]['nome'];
    $imagemUserEdit = @$dados[0]['imagem']; 

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="author" content="Matheus Henrique || https://mhborges.com.br">
<meta name="description" content="Loja Univida || Vendas de sacos de lixo 100% reciclados e Produtos de limpeza para toda Curitiba">
<meta name="keywords" content="Univida, unica, Loja, Loja Univida, Saco de lixo, Produtos de limpeza">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Painel Administrativo</title>

<link rel="icon" href="../../img/iconUni.ico" type="image/x-icon">  
<!-- Theme style -->
<link rel="stylesheet" href="../css/adminlte.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">
<link rel="stylesheet" href="../fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<link rel="stylesheet" href="../datatables/dataTables.bootstrap4.min.css" >


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

<script src="../datatables/jquery.dataTables.min.js"></script>
<script src="../datatables/dataTables.bootstrap4.min.js"></script>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../img/sem-foto.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../img/sem-foto.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../img/sem-foto.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
          <a href="../logout.php" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-4 text-danger"></i> Sair
          </a>

          <div class="dropdown-divider"></div>
          <a href="index.php?pag=<?php echo $perfil ?>" class="dropdown-item">
            <i class="fas fa-wrench mr-4"></i> Configurações de conta
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?pag=home.php" class="brand-link">
      <img src="../../img/iconUni.ico" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Painel de Controle</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php if(@$imagemUserEdit != ""){ ?>
              <img id="imgPerfil" src="../../img/ProfilePics/<?php echo $imagemUserEdit ?>">
          <?php }else{ ?>
              <img src="../../img/sem-foto.jpg">
          <?php }?>
        </div>
        <div class="info">
          <a href="index.php?pag=<?php echo $perfil ?>" class="d-block"><?php echo @$nomeUserEdit ?></a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php?pag=home.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Inicio</p>
            </a>
          </li>
          <li class="nav-header text-primary">Cadastro</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Produtos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu1 ?>" class="nav-link">
                <i class="fas fa-box nav-icon ml-2"></i>
                  <p>Todos Produtos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu2 ?>" class="nav-link">
                <i class="fas fa-clipboard nav-icon ml-2"></i>
                  <p>Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu3 ?>" class="nav-link">
                <i class="fas fa-clone nav-icon ml-2"></i>
                  <p>Sub - Categorias</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu9 ?>" class="nav-link">
                  <i class="nav-icon fas fa-truck ml-2"></i>
                  <p>Tipos de envios</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-bullhorn nav-icon"></i>
              <p>
                Promos e Combos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu4 ?>" class="nav-link">
                  <i class="nav-icon fas fa-percentage ml-2"></i>
                  <p>Promoções</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="index.php?pag=<?php echo $menu5 ?>" class="nav-link">
                  <i class="nav-icon fas fa-boxes ml-2"></i>
                  <p>Combos</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-header text-success">Consultas</li>
          <li class="nav-item">
            <a href="index.php?pag=<?php echo $menu6 ?>" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Clientes</p>
            </a>
          </li>
          
          
          <li class="nav-item">
            <a href="index.php?pag=<?php echo $menu7 ?>" class="nav-link">
              <i class="nav-icon fas fa-coins"></i>
              <p>Vendas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?pag=<?php echo $menu8 ?>" class="nav-link">
              <i class="nav-icon fas fa-hdd"></i>
              <p>Backups</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php 
        if ($pag == null){
          include_once("home.php");
        } elseif ($pag==$menu1){
          include_once($menu1. ".php");
        }
        elseif ($pag==$menu2){
          include_once($menu2. ".php");
        }
        elseif ($pag==$menu3){
          include_once($menu3. ".php");
        }
        elseif ($pag==$menu4){
          include_once($menu4. ".php");
        }
        elseif ($pag==$menu5){
          include_once($menu5. ".php");
        }
        elseif ($pag==$menu6){
          include_once($menu6. ".php");
        }
        elseif ($pag==$menu7){
          include_once($menu7. ".php");
        }
        elseif ($pag==$menu8){
          include_once($menu8. ".php");
        }
        elseif ($pag==$menu9){
          include_once($menu9. ".php");
        }
        elseif ($pag==$perfil){
          include_once($perfil. ".php");
        }
         else{
          include_once("home.php");
        }
      ?>
  </div>

</div>


<!-- Plugins -->
<script type="text/javascript" src="../js/adminlte.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="../../js/mascara.js"></script>

</body>
</html>
