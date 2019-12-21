<!DOCTYPE html>
<?php
session_start();
include_once './includes/classes/Conexao.php';
include_once './includes/classes/Funcao.php';

$cidade = new funcao();
$exibe = new funcao();
//print_r($_SESSION);
$item = $cidade->puxarCidade();
if (isset($_GET['sair'])) {
    header('Location: ponte.php');
    $_SESSION['Destruir'] = 1;
}
?>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>ACN-Fest</title>
        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="includes/node_modules/jquery/dist/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="includes/node_modules/bootstrap/compiler/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="includes/css/style.css" />
        <link rel="stylesheet" type="text/css" href="includes/icon/css/all.css" />
        <script type="text/javascript" src="includes/sweet/sweetalert.min.js"></script>
        <script src="includes/js/funcoes.js"></script>
    </head>

    <body>
        <?php
        if (isset($_GET['apagarNot'])) {
            $apagarNot = new funcao;
            $item = $apagarNot->apagarNot($_GET['apagarNot']);
        }
        ?>

            <!-- ************************** Menu ************************** -->
            <?php include_once('includes/paginas/sistem/menuPrincipal.php'); ?>
            <!-- ********************************************************** -->

            <section class="container-fluid p-0 m-0">
                <?php
                    if(isset($_GET['pg'])){ 
                        switch($_GET['pg']){ 
                            case "cardapio":

                                /****************** Home Inicial *******************/
                                include_once('includes/paginas/Agenda/index.php');
                                /***************************************************/

                                break;

                            case "agenda":

                                /****************** Home Inicial *******************/
                                include_once('includes/paginas/Agenda/agenda.php');
                                /***************************************************/

                                break;
                            default :
                                
                                /**************** Home Inicial *****************/
                                include_once('includes/paginas/sistem/home.php');
                                /***********************************************/
                            
                            break;
                        } 
                    }else{

                        /**************** Home Inicial *****************/
                        include_once('includes/paginas/sistem/home.php');
                        /***********************************************/

                    }
                ?>
            </section>

            <!-- *********** Import All Modal's Sistem *********** -->
            <?php include_once("includes/paginas/modal/modal.php"); ?>
            <!-- ************************************************* -->

            <!-- ******* Exibe Info ****** -->
            <?php $exibe->informaUsuario(); ?>
            <!-- ************************* -->

            <footer id="footer" class="row m-0 p-0 pt-4 pb-4">
                <div class="container mx-auto rounded p-0 m-0">
                    <div class="row m-0 p-0">
                        <div class="col-12 p-2 text-white">
                            <h1>Contato</h1><hr />
                        </div>
                    </div>
                    <div class="row m-0 p-0">
                        <div class="col-md-6 m-0">
                            <div-row class="m-0 p-0">
                                <div class="col-12 text-justify p-0">


                                        <h5>
                                            Rua: Benicio Mendonca Filho, 1541, Vila Furlan, Teodoro Sampaio,
SP, CEP 19.280-000, Brasil.
                                        </h5>
                                </div>
                            </div-row>
                            <div class="row">
                                <div class="col-12">
                                    <iframe class="rounded w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3685.1481345162756!2d-52.165310349710474!3d-22.53612298512888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94924fc6eb0d5a99%3A0x64fe4e848139220b!2sCongrega%C3%A7%C3%A3o%20Crist%C3%A3%20no%20Brasil%20-%20Vila%20Furlan!5e0!3m2!1spt-BR!2sbr!4v1576892320474!5m2!1spt-BR!2sbr" height="400"  frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6 pt-4 pt-md-0">
                                <div class="row m-0">
                                    <div class="col-md-12">
                                        <label for="texto">Identificação</label>
                                        <input class="form-control" type="text" name="nome" placeholder="Nome completo"/>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-md-12 pt-2">
                                        <label for="texto">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="email@email.com"/>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-md-12 pt-2">
                                        <label for="texto">Celular</label>
                                        <input class="form-control" type="tel" name="cell" placeholder='(00)0000-0000' />
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-md-12 pt-1">
                                        <label for="texto">Motivo do contato?</label>
                                        <textarea name="descContato" id="texto" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row m-0">
                                    <div class="col-1 m-0 p-0 mr-auto"></div>
                                    <div class="col-md-3 pt-0 text-right">
                                        <label for=""></label>
                                        <button type="submit" class=" form-control btn btn-success">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid m-0 p-0">
                    <div class="form-row m-0">
                        <div class="col-4 text-center">
                            <a href="https://api.whatsapp.com/send?1=pt_BR&phone=551899665-2579" target="_blank">
                                <img src="includes/img/whatsapp.png" class="orgIcon" title="Wharsapp" />
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="https://www.facebook.com/ACNfest-1345351735555388/" target="_blank">
                                <img src="includes/img/facebook.png" class="orgIcon" title="Facebook" />
                            </a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="https://www.instagram.com/acn_fest/?hl=pt-br" target="_blank">
                                <img src="includes/img/instagram.png" class="orgIcon" title="Instagram" />
                            </a>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- meu -  JavaScript -->
            <script src="includes/js/verficaSenha.js"></script>
            <script>
                $("#cadastrar").click(function(event) {
                    $(event.target).attr('disabled', 'disabled');
                });
            </script>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="includes/icon/js/all.js"></script>
            <script type="text/javascript" src="includes/js/UpdateScript.js"></script>
            <script src="includes/node_modules/popper.js/dist/umd/popper.min.js"></script>
            <script src="includes/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="includes/js/animacao.js"></script>

    </body>

    </html>