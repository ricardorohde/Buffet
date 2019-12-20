<header class="row fixed-top p-2 m-0" id="cabecalho-menu">
    <nav class="col-12 navbar navbar-expand-md navbar-dark m-0 p-0">
        <a class="navbar-brand h1 mb-0" href="index.php">
            <small>
                                <i class="fa fa-home"></i>
                            </small> Inicio
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
        <div class="collapse navbar-collapse" id="navbarsite">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item text-center">
                    <a class="nav-link text-light" href="includes/paginas/galeria/index.html">
                        <small>
                                            <i class="fa fa-images"></i> Galeria
                                        </small>
                    </a>
                </li>
                <?php
                                        if (isset($_SESSION['codigo'])) {
                                            echo '
                                                <li class="nav-item text-light text-center">
                                                    <a class="nav-link text-light"  href="includes/paginas/Agenda/index.php" >
                                                        <small>
                                                            <i class="fa fa-utensils"></i> Cardápios
                                                        </small>
                                                    </a>
                                                </li>
                                                <li class="nav-item text-center">
                                                    <a class="nav-link text-light" href="includes/paginas/Agenda/index.php">
                                                        <small>
                                                            <i class="fas fa-calendar-alt"></i> Agenda
                                                        </small>
                                                    </a>
                                                </li>
                                            ';
                                        } else {
                                            echo '
                                                <li class="nav-item text-center">
                                                    <a class="nav-link text-light" data-toggle="modal" data-target="#mylogin" >
                                                        <small>
                                                            <i class="fa fa-utensils"></i> Cardápios
                                                        </small>
                                                       
                                                    </a>
                                                </li>
                                                <li class="nav-item text-center">
                                                    <a class="nav-link text-light" data-toggle="modal" data-target="#mylogin" >
                                                        <small>
                                                            <i class="fas fa-calendar-alt"></i> Agenda
                                                        </small>
                                                       
                                                    </a>
                                                </li>
                                            ';
                                        }
                                    ?>
                    <li class="nav-item text-center">
                        <a class="nav-link text-light" href="#footer">
                            <small>
                                                <i class="fas fa-headset"></i> Contato
                                            </small>
                        </a>
                    </li>
            </ul>
            <div class="text-right">
                <?php 
                                    if(isset($_SESSION['nivelAcesso'])){
                                        $not = new funcao();
                                        $noticacao = $not->buscaNot($_SESSION['codigo']);
                                        $exibe->informaBotao($noticacao); 
                                    }else{
                                        $noticacao = 0;
                                        $exibe->informaBotao($noticacao); 
                                    }
                                ?>
            </div>

        </div>
    </nav>
</header>