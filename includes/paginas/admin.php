<?php
session_start();
include_once '../classes/Funcao.php';
if ($_SESSION['nivelAcesso'] == 1) {
    header('Location: ../../index.php');
}else{
    if($_SESSION['nivelAcesso'] == 2){
        
    }else{
        header('Location: ../../index.php');
    }
}
if (isset($_GET['excluir'])) {
    $excluir = new Funcao();
    $item = $excluir->excluir($_GET['excluir']);
    header('Location: admin.php?usuarios');
}
if (isset($_GET['bloquear'])) {
    $bloquear = new Funcao();
    $item = $bloquear->bloquear($_GET['bloquear']);
    header('Location: admin.php?usuarios');
}
if (isset($_GET['desbloquear'])) {
    $desbloquear = new Funcao();
    $item = $desbloquear->desbloquear($_GET['desbloquear']);
    header('Location: admin.php?usuarios');
}
if (isset($_POST['pesquisaAlgo'])) {
    $teste = $_POST['pesquisaAlgo'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>TCC</title>
        <link rel="stylesheet" type="text/css" href="../node_modules/bootstrap/compiler/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="./../css/admin.css"/>
        <script type="text/javascript" src="../jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../sweet/sweetalert.min.js"></script>
        <script type="text/javascript" src="../js/cardapio.js"></script>
        <script type="text/javascript">
            function invalidar(id) {
                var confirmacao = confirm('Deseja mesmo invalidar essa requisição?');
                var des = prompt("Qual motivo?");
                if ((confirmacao == true) && (des != null)) {
                    window.location.href = '?invalidar=' + id + '&des=' + des;

                }
            }
            function validar(id) {
                var confirmacao = confirm('Deseja mesmo validar essa requisição?');
                if (confirmacao == true) {
                    window.location.href = '?validar=' + id;

                }
            }
            function excluirAgenda(id) {
                var confirmacao = confirm('Deseja mesmo excluir essa requisição?');
                if (confirmacao == true) {
                    window.location.href = '?excluirAg=' + id;

                }
            }
            function previewImage(){
                var imagem = document.querySelector('input[name=Filedata]').files[0];
                var preview = document.querySelector('#foto1');
                var reader = new FileReader();
                reader.onloadend = function(){
                    preview.src = reader.result;
                }
                if(imagem){
                    reader.readAsDataURL(imagem);
                }else{
                    preview.src = "";
                }
            }
            function previewImage2(){
                var imagem = document.querySelector('input[name=fotoPratos]').files[0];
                var preview = document.querySelector('#foto3');
                var reader = new FileReader();
                reader.onloadend = function(){
                    preview.src = reader.result;
                }
                if(imagem){
                    reader.readAsDataURL(imagem);
                }else{
                    preview.src = "";
                }
            }
        </script>
    </head>

    <body>
        <section class="container-fluid ml-0 p-0" id="containerSegura">
            <header class="row  p-0 bor" id="containerSeguracabecalho">
                <div id="menuBod" class="container-fluid col-6 col-xs-3 ">
                    <nav class="col-xs-12 navbar navbar-expand-lg navbar-dark col-12  ml-0 p-4">
                        <button class="navbar-toggler fixed-rigth "  type="button" data-toggle="collapse" data-target="#navbarsite">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarsite" >
                            <ul class="navbar-nav ">
                                <li class="nav-item"><a class="nav-link" href="../../">Voltar</a></li>
                                <li class="nav-item"><a class="nav-link" href="?usuarios">Usuarios</a></li>
                                <li class="nav-item"><a class="nav-link" href="?cidade">Cidades</a></li>
                                <li class="nav-item"><a class="nav-link" href="?ingrediente">Ingredientes</a></li>
                                <li class="nav-item"><a class="nav-link" href="?pratos">Pratos</a></li>
                                <li class="nav-item"><a class="nav-link" href="?cardapios">Cardápios</a></li>
                                <li class="nav-item"><a class="nav-link" href="?Agendas">Agendas</a></li>
                                <li class="nav-item"><a class="nav-link" href="?Eventos">Eventos</a></li>

                            </ul>
                        </div>

                    </nav>
                </div>
                <form class="col-6 p-2 mr-2 row" id="pesquisa"  action="" method="POST" name="pesquisar">

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquisar..." name="PesquisaAlgo">
                        <div class="input-group-btn">
                            <button class="btn btn-default border" type="submit" name="pesquisa">
                                <div class="glyphicon glyphicon-search" style="color:white;" >pesquisar</div>
                            </button>
                        </div>
                    </div>

                </form>



            </header>
            <section class="row " id="conteudo"> 

                <?php
                if (isset($_GET['usuarios'])) {
                    $usuarios = new funcao();
                    $item = $usuarios->exibeTabela();
                }
                if (isset($_GET['cidade'])) {
                    $cidade = new funcao();
                    $item = $cidade->ExibirCid();
                }
                if (isset($_GET['ingrediente'])) {
                    $ingrediente = new funcao();
                    $item = $ingrediente->exibirIngrediente();
                }
                if (isset($_GET['Agendas'])) {
                    $Agendas = new funcao();
                    $item = $Agendas->Agendas();
                }
                if (isset($_GET['Eventos'])) {
                    $Agendas = new funcao();
                    $item = $Agendas->evento();
                }
                if (isset($_POST['enviarEven'])) {
                    $Agendas = new funcao();
                    $item = $Agendas->cadastrarEvento($_POST['dataEvento'],$_POST['dataEventoFinal'], $_POST['evento'], $_SESSION['codigo']);
                }
                if (isset($_GET['excluirCid'])) {
                    $excluirCid = new funcao();
                    $item = $excluirCid->excluirCidade($_GET['excluirCid']);
                    //header('Location: admin.php?cidade');
                }
                if ((isset($_GET['invalidar'])) && (isset($_GET['des']))) {
                    $invalidar = new funcao();
                    if ($_GET['des'] == null) {
                        echo "<script> swal('prencha o motivo!').then((value) => {location.assign('?Agendas')});</script>";
                    } else {
                        $item = $invalidar->invalidar($_GET['invalidar'], $_GET['des']);
                    }

                    //header('Location: admin.php?cidade');
                }
                if (isset($_GET['excluirAg'])) {
                    $excluir = new funcao();
                    $item = $excluir->excluirAgenda($_GET['excluirAg']);
                }

                if (isset($_GET['validar'])) {
                    $validar = new funcao();
                    $item = $validar->validar($_GET['validar']);
                }
                if (isset($_GET['excluiring'])) {
                    $excluiring = new funcao();
                    $item = $excluiring->excluiring($_GET['excluiring']);
                    //header('Location: admin.php?cidade');
                }
                if (isset($_GET['excluirCardapioPronto'])) {
                    $excluirprato = new funcao();
                    $item = $excluirprato->excluirPratos($_GET['excluirCardapioPronto']);
                    //header('Location: admin.php?cidade');
                }
                if (isset($_POST['cadastrarCidade'])) {
                    $cadastroCidade = new funcao();
                    $item = $cadastroCidade->cadastrarCidade($_POST['cidNome'], $_POST['cidEstado']);
                }if (isset($_POST['cadastraringrediente'])) {
                    $cadastroIngrediente = new funcao();
                    $item = $cadastroIngrediente->cadastrarIngrediente($_POST['ingrediente']);
                }
                if (isset($_GET['pratos'])) {
                    $cardapiosPronto = new funcao();
                    $item = $cardapiosPronto->exibeCardapiopronto();
                }
                if (isset($_POST['cadastrarPrato'])) {
                    $cadastrarPrato = new funcao;
                    $item = $cadastrarPrato->cadastrarPrato($_POST['nomedoprato']);
                }
                if (isset($_POST['cadastrarCardapio'])) {
                    $cadastrarCardapio = new funcao();
                    $item = $cadastrarCardapio->cadastrarCardapio($_POST['nome']);
                }
                if (isset($_GET['apagarCardapio'])) {
                    $apagar = new funcao;
                    $item = $apagar->apagarCardapio($_GET['apagarCardapio']);
                }
                if (isset($_POST['AtualizarCar'])) {
                    $atualizar = new funcao();
                    $item = $atualizar->AtualizarCardapio($_POST['nomeAtalizar'], $_POST['gambiarra']);
                }
                if (isset($_POST['atualizartrarPrato'])) {
                    $atualizar = new funcao();
                    $item = $atualizar->atualizarprato($_POST['nomedoprato'], $_POST['gambiarra2'], $_FILES['fotoPratos']['name']);
                }


                if (isset($_GET['cardapios'])) {
                    ?>

                    <div class="container-fluid">       
                        <div class="row">
                            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                <div class="MultiCarousel-inner">
                                    <div class="item" data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycadcardapio" title="cadastrar cardapio" id="">
                                        <div class="pad15">
                                            <p class="lead" >Cadastrar</p>
                                            <label id="botaoCharme">+</label>
                                        </div>
                                    </div>

                                    <?php
                                    $exibirCardapio = new funcao();
                                    $item = $exibirCardapio->exibirCarpadio();
                                    ?>
                                </div>
                                <button class="btn btn-primary leftLst"><</button>
                                <button class="btn btn-primary rightLst">></button>
                            </div>
                        </div>
                    </div>



                    <?php
                }
                ?>

            </section>
            <div class="modal fade" id="mycadCid" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title text-danger">Cadastrar cidade</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <form action="" method="POST">
                            <div class="modal-body">
                                <div class="row mb-0" id="div_cidade">
                                    <input type="text" class="col-7" placeholder="Nome" id="nome-cidade" name="cidNome" required="">
                                    <input type="text" class="col-3 ml-1" placeholder="UF" maxlength="2" id="nome-cidade" name="cidEstado"required="">
                                    <input type="submit" class="col-1 ml-2 bg-danger" value="+" name="cadastrarCidade" id="input-submit">
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="mycadcardapio" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Montar cardapio</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body container-fluid">


                        <?php
                        $puxarPrato = new funcao;
                        $item = $puxarPrato->puxarPratos();

                        if ($item != null) {
                            echo '<form method="POST" action=""> ';
                            echo '<div class = "row" id = "nomeDocardapio">
                            <div class = "col-11">
                            <input type = "text" placeholder = "Nome do carpadio" name = "nome" class = "float-left" id = "nomeCardapio" required>
                            </div>
                            </div>
                            <div id = "cardapioControle">';
                        }
                        ?>
                        <?php
                        if ($item == null) {
                            echo '<span><a href="admin.php?pratos" styele="margin:auto;">Nenhum prato cadastrado por favor cadatre algum prato</a></span>';
                        } else {
                            $n = 1;
                            foreach ($item as $row) {


                                echo '<div class="row m-0 "><label for="checkbox' . $n . '[]" id="ola" class="row col-11 border"><div class="col-4"><img src="../fotos/pratos/' . $row['cp_foto'] . '" id="ajustarFOTODOPRATO"></div><div class="col-7 text-dark row"><div class="col-12 ">' . $row['cp_pratos'] . '</div> 
                                        <div class="col-12 border text-muted" id="ingCadCar">';
                                $item2 = $puxarPrato->puxarPratosIngrediente($row['cp_codigo']);





                                echo ' </div>
                                        </div>
                                        </label>';
                                echo '<input class="col-1" type="checkbox" id="checkbox' . $n . '[]" name="checkbox2[]" value="' . $row['cp_codigo'] . '"></div>';

                                $n++;
                            }
                        }
                        ?>
                    </div>
                    <div class="row" id="subMitFoto">
                        <?php
                        if ($item != null) {
                            echo'<input type="submit" class=" col-12 border bg-danger" value="+" name="cadastrarCardapio" id="input-submitFoto" >';
                            echo '</form>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mycading" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Cadastrar ingrediente</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="row mb-0" id="div_cidade">
                            <input type="text" class="col-6" placeholder="Nome" id="nome-cidade" name="ingrediente" required="">
                            <input type="submit" class="col-5 ml-2 bg-danger" value="+" name="cadastraringrediente" id="input-submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="mycardapioPronto" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Cadastrar Prato</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-0" id="div_foto">
                        <div class="col-3 ">
                            <input  type="file" name="Filedata" id="fotopra" accept="image/*" onchange="previewImage()"/>
                            <label id="fotoPrato" for="fotopra">
                                <img src="../fotos/padrao/ingFoto.png" title="Escolha uma foto"id="foto1" />
                            </label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="col-12 ml-3" placeholder="Nome do prato" id="nome-prato" name="nomedoprato" required="">
                        </div>
                    </div>
                    <div class="modal-body border" id="ingredientes">
                        Qual ingrediente você utilizou?
                        <div class="row mt-2 ">

                            <?php
                            $exibeIngrediente = new funcao();
                            $item = $exibeIngrediente->puxarIngrediente();
                            if ($item == null) {
                                echo '<span><a href="admin.php?ingrediente">nehum ingrediente cadastrado</a></span>';
                            } else {
                                foreach ($item as $row) {

                                    echo '  <div class="custom-control custom-checkbox col-12 ">
                                                        <input type="checkbox" class="custom-control-input" id="' . $row['ing_codigo'] . '" name="checkbox[]" value="' . $row['ing_codigo'] . '" onclick="verificaIng(' . $row['ing_codigo'] . ')">
                                                        <label class="custom-control-label" for="' . $row['ing_codigo'] . '">' . $row['ing_desc'] . '</label>
                                                    </div>';
                                }
                            }
                            ?>

                        </div>

                    </div>

                    <div class="row" id="subMitFoto">
                        <input type="button" class=" col-12 border bg-danger" value="+" name="cadastrarPrato" id="botcadP">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editarCar" tabindex="-1" role="dialog" id="editCar">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Editar Cardapio</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="row mb-0" id="div_cidade">
                            <input type="text" class="col-10" placeholder="Nome" id="inputAtualizar" name="nomeAtalizar" required="">

                        </div>
                        <div class="modal-body container-fluid" id="limiteDivCad">


                            <?php
                            echo '<div id="conteudoCardapio"></div>';
                            ?>
                        </div>
                    </div>
                    <div class="row" id="subMitFoto">
                        <input type="submit" class=" col-12 border bg-danger" value="Atualizar" name="AtualizarCar" id="botcadP2">

                    </div>     
                </form>



            </div>


        </div>
    </div>

    <div class="modal fade" id="editarprato" tabindex="-1" role="dialog" id="EDITPRA">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-danger">Cadastrar Prato</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row mb-0" id="div_foto">

                        <div class="col-3 ">
                           <input  type="file"  id="fotopra2" name="fotoPratos" onchange="previewImage2()"/>
                            <label id="fotoPrato" for="fotopra2">
                                <img src='' title="Escolha uma foto" id="foto3"/>
                            </label>
                        </div>
                        <div class="col-9">
                            <input type="text" class="col-12 ml-3" placeholder="Nome do prato" id="nome-prato" name="nomedoprato" required="">
                        </div>
                    </div>
                    <div class="modal-body border" id="ingredientes">
                        Qual ingrediente você utilizou?
                        <div class="row mt-2 " id="conteudoPrato">

                        </div>

                    </div>

                    <div class="row" id="subMitFoto">
                        <input type="submit" class=" col-12 border bg-danger" value="Atualizar" name="atualizartrarPrato" id="botcadP2">

                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
<?php if (isset($_POST['pesquisa'])) { ?>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#mypes').modal('show');
        })
    </script>
    <div class="modal fade container-fluid bg-white" id="mypes" tabindex="-1" role="dialog">

        <div class="modal-dialog">
            <div class="modal-content border-0">
                <!-- Modal Header -->
                <div class="modal-header">
                    <label class="row">
                        <h2 class="modal-title text-danger">Foi encontrado</h2>
                        <button type="button" class="close " data-dismiss="modal">&times;</button>
                    </label>
                </div>

                <!-- Modal body -->
                <form action="" method="POST" id="OrganizaALl" > 

                    <?php
                    if (isset($_GET['usuarios'])) {
                        echo'<div id="organizaTab">';
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaUsuario($_POST['PesquisaAlgo']);
                        echo '</div>';
                    }

                    if (isset($_GET['cidade'])) {
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaCidade($_POST['PesquisaAlgo']);
                    }
                    if (isset($_GET['ingrediente'])) {
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaIng($_POST['PesquisaAlgo']);
                    }
                    if (isset($_GET['pratos'])) {
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaPratos($_POST['PesquisaAlgo']);
                    }
                    if (isset($_GET['Agendas'])) {
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaAgenda($_POST['PesquisaAlgo']);
                    }
                    if (isset($_GET['cardapios'])) {
                        echo'<div id="organizaTab2">';
                        $pesquisar = new funcao();
                        $item = $pesquisar->pesquisaCardapio($_POST['PesquisaAlgo']);
                        echo'</div>';
                    }
                    ?>




                </form>
            </div>
        </div>


    </div>


<?php } ?>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="../js/confirmacao.js"></script>
<script type="text/javascript" src="../sweet/sweetalert.min.js"></script>
<script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
<script src="../node_modules/jquery/dist/jquery.js"></script>
<script src="../node_modules/popper.js/dist/umd/popper.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script type="text/javascript">
        $("#editarCar").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var codigo = button.data('codigo');
            var nome = button.data('nome');
            var modal = $(this);
            modal.find('#inputAtualizar').val(nome);
            $.ajax({
                url: "../classes/Funcao.php?id=" + codigo
            }).done(function(msg) {
                document.getElementById('conteudoCardapio').innerHTML = msg;
            });
        });
        $("#editarprato").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var codigo = button.data('codigo2');
            var nome = button.data('nome2');
            var foto = button.data('foto');
            var modal = $(this);
            modal.find('#nome-prato').val(nome);
            if (foto == "ingFoto.png") {
                document.getElementById('foto3').src = "../fotos/padrao/" + foto;
            } else {
                document.getElementById('foto3').src = "../fotos/Pratos/" + foto;
            }


            $.ajax({
                url: "../classes/Funcao.php?id2=" + codigo
            }).done(function(msg2) {
                document.getElementById('conteudoPrato').innerHTML = msg2;
            });
        });





</script>



</body>
</html>
