<nav class="navbar fixed-top navbar-expand-lg navbar-dark nav_grande nav_transparente">    
    <div class="container">        
        <a class="navbar-brand h1 mb-0 mr-5 " id="observatorio_nav" href="index.php" style="font-family: 'Jomolhari' "> Observatório Antares </a>

         <!-- ESSE BOTÃO AQUI EMBAIXO FAZ O QUE? -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item mr-2 ">
                    <a class="nav-link scroll branco home" href="#home"> Início </a>
                </li>                        
                <li class="nav-item  mr-2 ">
                    <a class="nav-link scroll branco agendamento" href="#agendamento"> Agendar </a>
                </li>
                <li class="nav-item  mr-2 ">
                    <a class="nav-link scroll branco sobre" href="#sobre"> Sobre </a>
                </li>                        
                <li class="nav-item  mr-2 ">
                    <a class="nav-link scroll branco contato2" href="#contato"> Contato </a>
                </li>
                
                <?php
                
                if (!isset($_SESSION['permissao'])) // SE USUÁRIO NÃO ESTIVER DEFINIDO ENTÃO MOSTRA ESTAS OPÇÕES
                {

                ?>

                    <li class="nav-item  mr-2 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-cadastro-escola" > Criar Conta </button>                        
                    </li>                                                
                    <li class="nav-item  mr-2 ">
                    	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-acesso" > Iniciar Sessão </button>
    			  	</li>
                
                <?php
                }
                else
                {
                    if ($_SESSION['permissao'] == 1) //ESTAGIÁRIO
                    {                        
                        echo "<li class='nav-item  mr-2 '> <a class='btn btn-outline-light' href='estagiario/t-c-estagiario-step0.php' role='button'>Gerenciar Horários</a> </li>";
                    }
                    else if ($_SESSION['permissao'] == 2) // FUNCIONÁRIO
                    {                        
                        echo "<li class='nav-item  mr-2 '> <a class='btn btn-outline-light' href='funcionario/t-c-funcionario.php' role='button'>Gerenciar Eventos</a> </li>";
                    }                    
                    else if($_SESSION['permissao'] == 3) // ESCOLA
                    {                        
                        echo "<li class='nav-item  mr-2 '> <a class='btn btn-outline-light' href='escola/form-cad-turma.php' role='button'>Cadastar Turmas</a> </li>";
                        echo "<li class='nav-item  mr-2 '> <a class='btn btn-outline-light' href='escola/t-c-escola.php' role='button'>Gerenciar Visitas</a> </li>";
                    }                    
                    else // ADMINISTRADOR (INCOMPLETO)
                    {
                        echo "<a href='MNGR/cad_usuario.php'>Cadastrar Usuário</a><br>";
                        echo "<a href='MNGR/listar_usuario.php'>Listar Usuários</a><br>";
                        echo "<a href='MNGR/pesquisar.php'>Pesquisar Usuários</a><br>";             
                        //echo "<a href='staff/T_FC_staff.php'>Gerenciar Eventos</a><br>";
                    }
                ?>
                    <li class="nav-item  mr-2 ">
                        <a class="btn btn-warning" href="home_adm.php" role="button">Minha Conta</a>
                    </li>
                    <li class="nav-item  mr-2 ">
                        <a class="btn btn-danger" href="access/dar-o-fora.php" role="button">Sair</a>
                    </li>
                <?php
                }               
                ?>                
            </ul>                        
        </div>
    </div>
</nav>