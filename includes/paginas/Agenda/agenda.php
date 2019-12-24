<?php
/*
if(!isset($_SESSION['codigo'])){
    header('Location: ../../../index.php');
}
*/

$buscarEvento = new funcao();
$item = $buscarEvento->buscaAgendaFull();
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
        <script  type="text/javascript"src="includes/paginas/Agenda/js/sweet/sweetalert.min.js"></script>
        <script>
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
    <section id="Geral" class="m-0">
        <section class="container-fluid" >
            <form class="" method="POST">
                <div class="row pb-2" id="formulario">
                    <div class="col-12 w-" >
                        <div id='calendar'></div>
                    </div>
                </div>
            </form>
        </section>
    </sextion>
    <script src='includes/paginas/Agenda/js/moment.min.js'></script>
    <script src='includes/paginas/Agenda/js/fullcalendar.min.js'></script>
    <script src='includes/paginas/Agenda/locale/pt-br.js'></script>
</body>