<?php
session_start();

if(!isset($_SESSION['codigo'])){
    header('Location: ../../../index.php');
}

include_once("../../classes/Conexao.php");
include_once('../../classes/Funcao.php');

$buscarEvento = new funcao();
$item = $buscarEvento->buscaAgendaFull();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8' />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="css/sytleCssIndex.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="../../node_modules/bootstrap/compiler/bootstrap.css"/>
        <link href='css/fullcalendar.min.css' rel='stylesheet' />
        <link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
        <link href='css/personalizado.css' rel='stylesheet'/>
        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="../../jquery/jquery.min.js"></script>
        <script src='js/jquery.min.js'></script>
        <script type="text/javascript" src="../../js/cardapio.js"></script>
        <script  type="text/javascript"src="js/sweet/sweetalert.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month'
                    },
                    defaultDate: Date(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: false,
                    eventLimit: true, // allow "more" link when too many events
                    events: [
                        <?php foreach ($item as $row) { ?>
                            {
                                id: '<?php echo $row['age_codigo']; ?>',
                                title: '<?php echo$row['age_title']; ?>',
                                start: '<?php echo $row['age_start']; ?>',
                                end: '<?php echo $row['age_end']; ?>',
                                color: '<?php echo $row['age_color']; ?>',
                            },
                        <?php } ?>
                    ]
                });
            });
        </script>


</head>
<body>
    <section id="Geral" class="border m-0">
        <section class="container-fluid" >
            <form method="POST" action="">
                <div class="row" id="formulario">
                    <div class="MultiCarousel col-12 " data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner" title="cardapios" >
                            <?php
                            $exibirCardapio = new funcao();
                            $item = $exibirCardapio->exibecar4();
                            
                            ?>
                        </div>
                        <button type="button"class="btn btn-primary leftLst"><</button>
                        <button type="button" class="btn btn-primary rightLst">></button>
                    </div>

                    <div class="col-sm-5 col-xs-12  p-2 pl-4">
                        <input name="agenda" type="datetime-local" id="inputData" title="esolha uma data"/> 
                        <div  class="mt-2"data-toggle="modal" data-dismiss="modal" data-target="#myagenda" id="modal" title="visualizar dias diponiveis">agenda</div>
                    </div>
                    <div class="col-sm-7 col-xs-12  p-2 " >

                        <input type="submit" value="Requisitar" id="requisitar" name="requisitar" required=""> 
                        <a  href="../../../"><input  class="mr-1"type="button" value="Voltar" id="requisitar" name="" required=""></a>

                    </div>
                </div>
            </form>
        </section>
    </section>

    <div class="modal fade" id="myagenda" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-danger" id="fonte">Agenda</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div id='calendar'></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['requisitar'])) {
        if (isset($_POST['meuCar']) && isset($_POST['agenda'])) {
            $cadatrarAgenda = new funcao;
            $agenda = $cadatrarAgenda->agendar($_SESSION['codigo'], $_POST['meuCar'], $_POST['agenda']);
            print_r($_SESSION['codigo']);
        } else {
            echo "<script> swal('prencha corretamente os campos!').then((value) => {location.assign('index.php')});</script>";
        }
    }
    ?>
    <script src="../../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src='js/moment.min.js'></script>
    <script src='js/fullcalendar.min.js'></script>
    <script src='locale/pt-br.js'></script>



</body>

</html>
