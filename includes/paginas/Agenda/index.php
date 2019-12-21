<?php

if(!isset($_SESSION['codigo'])){
    header('Location: ../../../index.php');
}

$buscarEvento = new funcao();
$item = $buscarEvento->buscaAgendaFull();


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
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset='utf-8' />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="includes/paginas/Agenda/css/sytleCssIndex.css" rel="stylesheet"/>
        <link href='includes/paginas/Agenda/css/fullcalendar.min.css' rel='stylesheet' />
        <link href='includes/paginas/Agenda/css/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
        <link href='includes/paginas/Agenda/css/personalizado.css' rel='stylesheet'/>
        <script type="text/javascript" src="includes/js/cardapio.js"></script>
        <script  type="text/javascript"src="includes/paginas/Agenda/js/sweet/sweetalert.min.js"></script>
</head>
<body>
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
    <section id="Geral" class=" m-0">
        <section class="container-fluid" >
            <form class="" method="POST">
                <div class="row pb-2" id="formulario">
                    <div class="col-md-8">
                        <input class="form-control" name="agenda" type="datetime-local" id="inputData" title="esolha uma data"/> 
                    </div>
                    <div class="col-md-4">
                        <button class="form-control btn btn-outline-dark" type="button" data-toggle="modal" data-dismiss="modal" data-target="#myagenda" id="modal" title="visualizar dias diponiveis">
                            <small> <i class="fa fa-calendar-check"></i> Consultar Agenda</small>
                        </button>
                    </div>
                </div>
                <div class="row border pl-2 pr-2">
                    <div class="MultiCarousel col-12" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                        <div class="MultiCarousel-inner" title="cardapios" >
                            <?php
                                $exibirCardapio = new funcao();
                                $item = $exibirCardapio->exibecar4();
                            ?>
                        </div>
                        <button type="button" class="badge badge-danger leftLst"><</button>
                        <button type="button" class="badge badge-danger rightLst">></button>
                    </div>
                </div>
                <div class="row border pt-2 pb-2">
                    <div class="mr-auto"></div>
                    <div class="col-12 col-md-2 p-1 pt-2 pt-md-0 text-center">
                        <button class="form-control btn btn-success" type="submit" value="Requisitar" name="requisitar">
                            Requisitar
                        </button>
                    </div>
                    <div class="col-12 col-md-2 p-1 pt-2 pt-md-0 text-center" >
                        <a  href="index.php">
                            <button class="form-control btn btn-dark mr-1"type="button" id="requisitar" required="">Voltar</button>
                        </a>
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

    <script src='includes/paginas/Agenda/js/moment.min.js'></script>
    <script src='includes/paginas/Agenda/js/fullcalendar.min.js'></script>
    <script src='includes/paginas/Agenda/locale/pt-br.js'></script>
</body>

</html>
