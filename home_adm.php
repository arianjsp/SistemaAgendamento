<?php 
session_start();
/**
include 'php/conexao.php';
$sql="SELECT * FROM contato";
$query = mysqli_query($conexao,$sql);
$contato = mysqli_fetch_assoc($query); **/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Observatório Astronômico Antares</title>

    <!-- Custom fonts for this template-->
    <link href="vendor_adm/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/adm.css" rel="stylesheet">
    <link rel="sortcut icon" href="img/antares.png" type=".png" />

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img id="img_adm_ecmat" src="img/antares2.png">
                </div>
                <div class="sidebar-brand-text mx-3">Antares</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php 
                if ($_SESSION['permissao']==1) {       
            ?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Editar Site
            </div>

            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#contatoModal" href="#">
                    <span>Informações de Contato</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <?php }?>
            <!-- Heading -->
            <div class="sidebar-heading">
                Gerenciamento
            </div>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#minhaconta">
                    <span>Minha Conta</span>
                </a>
            </li>
            <?php 
                if ($_SESSION['permissao']==1) {       
            ?>
            <li class="nav-item">
                <a class="nav-link" href="funcionarios_adm.php">
                    <span>Funcionarios</span>
                </a>
            </li>
            <?php }if ($_SESSION['permissao']==2) { ?>
            <li class="nav-item">
                <a class="nav-link" href="estagiarios_adm.php">
                    <span>Estagiários</span>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="escola_adm.php">
                    <span>Escolas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="agenda_adm.php">
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="exposicoes_adm.php">
                    <span>Exposições</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Cadastrar Horarios</span>
                </a>
            </li>
            <?php 
                if ($_SESSION['permissao']==1) {       
            ?>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span>Relatorio</span>
                </a>
            </li>
            <?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/logado.jpeg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="home_adm.php">
                                    <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i> Area do adm
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sair
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
               
                <div class="container-fluid">
                   
                    <div class="row">
                        <div class="col">
                           <h2 class="h3  text-gray-800 text-center mb-4 ">Atalhos</h2>
                        </div>     
                    </div>
                    
                </div>
                <div class="row" >
                    <div class="col"></div>
                    
                    <div class="col-xl-3 col-md-6 mb-4 wow">
                        <div class="card border-left-primary shadow h-100 py-2 bounce">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a class="atalho" href="minhaconta_adm.php">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">MINHA CONTA</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <?php if ($_SESSION['permissao'] == 1) { ?>
                                        <a href="#" data-toggle="modal" data-target="#addAdmModal" class="atalho">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">CADASTRAR FUNCIONARIOS</div>
                                        </a>
                                        <?php }elseif ($_SESSION['permissao'] == 2) { ?>
                                        <a href="#" data-toggle="modal" data-target="#addAdmModal" class="atalho">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">CADASTRAR ESTAGIÁRIOS</div>
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ESCOLAS</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <div class="row">
                    <div class="col"></div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PROGRAMAÇÃO</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">EXPOSIÇÕES</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-book fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-secondary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho" data-target="#contatoModal" data-toggle="modal">
                                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Informações de CONTATO</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row">
                    <div class="col"></div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho">
                                        <?php if ($_SESSION['permissao'] == 1) { ?>
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">RELATORIO</div>
                                        <?php }elseif ($_SESSION['permissao'] == 2) { ?>
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">cadastrar horarios</div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-certificate fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a href="#" class="atalho">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">ATIVIDADES</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <a data-toggle="modal" data-target="#logoutModal" href="#" class="atalho">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">sair</div>
                                        </a>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-sign-out-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white  ">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto ">
                        <span>Copyright &copy; Observatório Antares 2019</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tem certeza que deseja sair?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="php/logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="minhaconta" tabindex="-1" role="dialog" aria-labelledby="minhaconta" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0px;">Minha Conta:</h3>
                    <button class="btn btn-primary ml-auto " type=" button" data-toggle="modal" data-target="#att_senha">Trocar senha</button>
                </div>
                <form method="post" action="./php/troca-senha.php" id="form_troca_senha">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                               <label>Nome:</label>
                                <input type="password" name="nova_senha_repete" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>E-mail</label>
                                <input type="email" name="email" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="#" onclick="att_minhaconta()">Confirmar</a>
                    </div>
                </form>   
            </div>
        </div>
    </div>    
    
    <div class="modal fade" id="att_senha" tabindex="-1" role="dialog" aria-labelledby="att_senha" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0px;">Trocar senha:</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="./php/troca-senha.php" id="form_troca_senha">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <label>E-mail</label>
                                <input type="email" name="e-mail" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label>Senha atual:</label>
                                <input type="password" name="senha_atual" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Nova senha:</label>
                                <input type="password" name="nova_senha" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label>Repita a nova senha:</label>
                                <input type="password" name="nova_senha_repete" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <a class="btn btn-primary" href="#" onclick="att_senha()">Confirmar</a>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="contatoModal" tabindex="-1" role="dialog" aria-labelledby="contatoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0px;">Informações de contato</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="php/att_contato.php" id="form_informacoes_contato">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col">
                                <label>Rua:</label>
                                <input type="text" id="rua" name="rua" class="form-control" value="<?php echo $contato['rua']; ?>" required="">
                            </div>
                            <div class="col">
                                <label>Complemento:</label>
                                <input type="text" name="complemento" id="complemento" class="form-control" value="<?php echo $contato['complemento']; ?>" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Numero:</label>
                                <input type="text" name="numero" id="numero" class="form-control" value="<?php echo $contato['numero']; ?>" required="">
                            </div>
                            <div class="col">
                                <label>Cidade:</label>
                                <input type="text" name="cidade" id="cidade" class="form-control" value="<?php echo $contato['cidade']; ?>" required="">
                            </div>
                            <div class="col">
                                <label>Estado:</label>
                                <input type="text" name="estado" id="estado" class="form-control" value="<?php echo $contato['estado']; ?>" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>E-mail 1:</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $contato['email1']; ?>" required="">
                            </div>
                            <div class="col">
                                <label>E-mail 2:</label>
                                <input type="email" name="email2" id="email2" class="form-control" value="<?php echo $contato['email2']; ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Telefone 1:</label>
                                <input type="text" name="telefone" id="telefone" class="form-control" value="<?php echo $contato['telefone1']; ?>" required="">
                            </div>
                            <div class="col">
                                <label>Telefone 2:</label>
                                <input type="text" name="telefone2" id="telefone2" class="form-control" value="<?php echo $contato['telefone2']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="button" onclick="att_contato()">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addAdmModal" tabindex="-1" role="dialog" aria-labelledby="addAdmModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 style="margin-bottom: 0px;">Adicionar administrador</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" action="php/add_adm.php" id="form_add_adm">
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-4">
                                <label>Título:</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label>Nome Completo:</label>
                                <input type="text" name="nome" id="nome" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>E-mail:</label>
                                <input type="email" name="email" id="email" class="form-control" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label>Senha:</label>
                                <input type="password" name="senha" id="senha" class="form-control" required="">
                            </div>
                            <div class="col">
                                <label>Cargo:</label>
                                <select class="custom-select mr-sm-2" id="cargo" name="cargo" required="">
                                    <option value="coordenador">Coordenador</option>
                                    <option value="membro">Membro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary" type="button" onclick="addAdm()">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor_adm/jquery/jquery.min.js"></script>
    <script src="vendor_adm/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor_adm/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js_adm/sb-admin-2.min.js"></script>
    
    <script type="text/javascript">
      function addAdm(){
        var dados =  $("#form_add_adm").serialize();           
        $.ajax({
            type: "post",
            url: "./php/add_adm.php",
            data: dados,
            success : function(data){
                if (data == "sucesso" ){
                    alert("Administrador adicionado com sucesso!");
                }else if(data =="erro"){
                    alert("Não foi possivel adicionar o administrador. Tente novamente mais tarde!");
                }else if(data == "email"){
                    alert("O e-mail inserido já está em uso!");
                } 
            }
        }); 
      };
      function att_contato(){
        var dados = $("#form_informacoes_contato").serialize();         
        $.ajax({
            type: "post",
            url: "./php/att_contato.php",
            data: dados,
            success : function(retorno){
              if (retorno == "<sucesso" ){
                  alert("Informações de contato atualizadas com sucesso!");
              }else if(retorno =="<erro"){
                  alert("Não foi possivel atualizar as Informações. Tente novamente !");
              }
            }
        }); 
      };
    </script>
     

</body>

</html>