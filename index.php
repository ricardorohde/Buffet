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
        <script src="includes/node_modules/jquery/dist/jquery.min.js">
        </script><link rel="icon" href="includes/img/icon.svg" sizes="any" type="image/svg+xml">
        <link rel="stylesheet" type="text/css" href="includes/node_modules/bootstrap/compiler/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="includes/css/style.css" />
        <link rel="stylesheet" type="text/css" href="includes/icon/css/all.css" />
        <script type="text/javascript" src="includes/sweet/sweetalert.min.js"></script>
        <script src="includes/js/funcoes.js"></script>
        <script>
            $(document).ready(function(){
                $('.date').mask('00/00/0000');
                $('.time').mask('00:00:00');
                $('.date_time').mask('00/00/0000 00:00:00');
                $('.cep').mask('00000-000');
                $('.phone').mask('(00) 0000-0000', {placeholder: "(00) 0000-0000"});
                $('.phone_cell').mask("(00) 00000-0000", {placeholder: "(00) 00000-0000"});
                $('.phone_us').mask('(000) 000-0000');
                $('.mixed').mask('AAA 000-S0S');
                $('.cpf').mask('000.000.000-00', {reverse: true});
                $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
                $('.money').mask('000.000.000.000.000,00', {reverse: true});
                $('.money2').mask("#.##0,00", {reverse: true});
                $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
                    translation: {
                    'Z': {
                        pattern: /[0-9]/, optional: true
                    }
                    }
                });
                $('.ip_address').mask('099.099.099.099');
                $('.percent').mask('##0,00%', {reverse: true});
                $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
                $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
                $('.fallback').mask("00r00r0000", {
                    translation: {
                        'r': {
                        pattern: /[\/]/,
                        fallback: '/'
                        },
                        placeholder: "__/__/____"
                    }
                    });
                $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
            });
        </script>
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
            <script src="./includes/js/jquery.mask.min.js"></script>
            <script src="includes/icon/js/all.js"></script>
            <script type="text/javascript" src="includes/js/UpdateScript.js"></script>
            <script src="includes/node_modules/popper.js/dist/umd/popper.min.js"></script>
            <script src="includes/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
            <script src="includes/js/animacao.js"></script>

    </body>

    </html>