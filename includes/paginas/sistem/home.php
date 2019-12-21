<section class="container-fluid p-0 m-0" id="fundogeralInicial">
    <article class="row m-0" id="cabecalho-textoelogo">
        <div class="col-md-6 col-sm-12 h1" id="cabecalho-texto">
            Venha conhecer nossos serviços agende já uma data conosco
        </div>
        <div class="col-md-6 col-sm-12" id="cabecalho-logo">
            <img src="includes/img/logo.png" class="img-fluid" id="img">
        </div>
    </article>
</section>
<article class="container-fluid pt-2 p-0 m-0" id="chmaratencao">
    <div class="row m-0 p-0" id="segura">
        <div class="col-4 d-none d-lg-block" id="coluna-1">
            <div class="row container-fluid pt-2" id="img_1">
                <a href="includes/paginas/galeria/">
                    <div class="contairner-fluid anime" id="seguraIMG">
                        <label class="h5 text-danger col-12">Variedade em pratos</label>
                        <img src="includes/img/garfofaca.png" id="img-img1" />
                    </div>
                </a>
            </div>
            <hr class="hr">
            <?php
                            if (isset($_SESSION['codigo'])) {
                                echo '
                                    <a href="includes/paginas/Agenda/index.php">
                                        <div class="row container" id="img_2">
                                            <div class="contairner-fluid anime" id="seguraIMG">
                                                <label class="h5 text-danger col-12">Agende seu horário</label>
                                                <img src="includes/img/agenda.png" id="img-img2" />
                                            </div>
                                        </div>
                                    </a>
                                ';
                            } else {
                                echo '
                                    <a data-toggle="modal" data-target="#mylogin">
                                        <div class="row container" id="img_2">
                                            <div class="contairner-fluid anime" id="seguraIMG">
                                                <label class="h5 text-danger col-12">Agende seu horário</label>
                                                <img src="includes/img/agenda.png" id="img-img2" />
                                            </div>
                                        </div>
                                    </a>
                                ';
                            }
                        ?>
        </div>
        <div class="col-lg-4 col-sm-12 col-xs-12" id="coluna-2">
            <div class="container" id="divConteudo">
                <label class="container-fluid" id="texto-coluna-2">
                                O melhor
                            </label>
                <label class="container-fluid" id="texto2-coluna-2">
                                serviços
                            </label>
                <label class="container text " id="texto3-coluna-2">
                                A empresa ACN-Fest está no ramo alimentício a três anos, atuando na alimentação de diversificados tipos de festas. Atualmente trabalhando com cerca de 20 pratos distintos. A empresa não possui espaço físico, mas atende na casa do proprietário, localizada no endereço rua: Benicio Mendonça Filho, n°1541.Oferece também serviços de garçons, auxiliares de limpeza e churrasqueiros. 
                            </label>
            </div>
        </div>
        <div class="col-4 d-none d-lg-block  " id="coluna-3">
            <?php
                    if (isset($_SESSION['codigo'])) {
                        echo '<a href="includes/paginas/Agenda/index.php"><div class="row container " id="img_4">
                        <div class="contariner anime" id="seguraIMG">
                            <label class="h5 text-danger col-12">Escolha seu Cardapio</label>
                            <img src="includes/img/cardapio.png" id="img-img3"/>
                        </div>
                        </div></a>';
                    } else {
                        echo '<a data-toggle="modal" data-target="#mylogin"><div class="row container " id="img_4">
                        <div class="contariner anime" id="seguraIMG">
                            <label class="h5 text-danger col-12">Escolha seu Cardapio</label>
                            <img src="includes/img/cardapio.png" id="img-img3"/>
                        </div>
                        </div></a>';
                    }
                    ?>

                <hr class="hr">
                <div class="row container" id="img_5">
                    <a href="tel:+55-18-3282-2304">
                        <div class="contariner anime " id="seguraIMG">
                            <label class="h5 text-danger">Entre em contato</label>
                            <img src="includes/img/contato.png" id="img-img4" />
                        </div>
                    </a>
                </div>
        </div>
    </div>

</article>
<section class="container-fluid  p-0 pt-2 m-0" id="fundocarousel">
    <article class="container-fluid m-0 p-0 carousel slide" id="caixacarousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="caixacarousel" data-slide-to="0" class="active"></li>
            <li data-target="caixacarousel" data-slide-to="1" class="active"></li>
            <li data-target="caixacarousel" data-slide-to="2" class="active"></li>
        </ol>

        <div class="carousel-inner " id="seguraimgCarousel">
            <?php
                    $i = 1;
                    $min = 1;
                    $max = 11;
                    while ($i > 0) {
                        $sort1 = rand($min, $max);
                        $sort2 = rand($min, $max);
                        $sort3 = rand($min, $max);
                        if (($sort1 <> $sort2) && ($sort2 <> $sort3) && ($sort1 <> $sort3)) {
                            break;
                        } else {
                            $sort1 = 1;
                            $sort2 = 2;
                            $sort3 = 3;
                        }
                    }
                    ?>
                <div class="carousel-item active">
                    <img src="includes/img/img-carousel/img<?php echo $sort1; ?>.jpg" id="a" class="img-fluid d-block" />
                </div>

                <div class="carousel-item">
                    <img src="includes/img/img-carousel/img<?php echo $sort2; ?>.jpg" id="a" class="img-fluid d-block" />
                </div>

                <div class="carousel-item">
                    <img src="includes/img/img-carousel/img<?php echo $sort3; ?>.jpg" id="a" class="img-fluid d-block" />
                </div>

        </div>
        <a class="carousel-control-prev" href="#caixacarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#caixacarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Avançar</span>
        </a>

    </article>
</section>