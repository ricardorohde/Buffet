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
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <title>ACN-Fest</title>
        <link rel="stylesheet" type="text/css" href="includes/node_modules/bootstrap/compiler/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="includes/css/style.css"/>
        <script type="text/javascript" src="includes/sweet/sweetalert.min.js"></script>
        <script type="text/javascript">
            function apagarNot(id) {
                var confirmacao = confirm('deseja apagar essa notificação');
                if (confirmacao == true) {
                    window.location.href = '?apagarNot=' + id;

                }
            }
            function previewImage(){
                var imagem = document.querySelector('input[name=Filedata]').files[0];
                var preview = document.querySelector('#AjustarFotoUsuario');
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
        <?php
        if (isset($_GET['apagarNot'])) {
            $apagarNot = new funcao;
            $item = $apagarNot->apagarNot($_GET['apagarNot']);
        }
        ?>
        <section  class="container-fluid border-0" id="fundogeralInicial">

            <header class="row" id="cabecalho-menu">
                <nav class=" col-8 col-xs-6 navbar navbar-expand-lg navbar-dark">
                    <?php
                    if (!isset($_SESSION['codigo'])) {

                        echo '<a class="navbar-brand h1 mb-0" href="#" data-toggle="modal" data-target="#mylogin" id="informa" onclick="informa()">Perfil</a>';
                    } else {
                        $not = new funcao();
                        $noticacao = $not->buscaNot($_SESSION['codigo']);
                        echo' <a class="navbar-brand h1 mb-0" href="#" data-toggle="modal" data-target="#myperfil">Perfil</a><div id="informanot">' . $noticacao . '</div>';
                    }
                    ?>

                    <button class="navbar-toggler fixed-rigth "  type="button" data-toggle="collapse" data-target="#navbarsite">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarsite">
                        <ul class="navbar-nav ">
                            <li class="nav-item"><a class="nav-link d-block d-sm-none"  href="includes/paginas/galeria/index.html" >Galeria</a></li>
                            <?php
                            
                            if (isset($_SESSION['codigo'])) {
                                echo '<li class="nav-item"><a class="nav-link"  href="includes/paginas/Agenda/index.php" >Cardápios</a></li>
                            <li class="nav-item">
                            <a class="nav-link" href="includes/paginas/Agenda/index.php">Agenda</a></li>';
                                if ($_SESSION['nivelAcesso'] == 2) {

                                    echo '<li class="nav-item"><a class="nav-link" href="includes/paginas/admin.php">administrar</a></li>';
                                }
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" data-toggle="modal" data-target="#mylogin" >Cardápios</a></li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="modal" data-target="#mylogin" >Agenda</a></li>';
                            }
                            ?>
                            <li class="nav-item  "><a class="nav-link" href="#footer">Contatos</a></li>
                        </ul>

                    </div>
                </nav>
                <aside class="col-4  col-xs-6"  id="seguraDivbtn">

                    <?php
                    $exibe->informaBotao();
                    ?>

                </aside>
            </header>
            <article class="row " id="cabecalho-textoelogo">
                <div class="col-md-6 col-12-sm h1 "  id="cabecalho-texto">
                    Venha conhecer nossos serviços agende já uma 
                    data conosco
                </div>
                <div class="col-md-6 col-12-sm  " id="cabecalho-logo">
                    <img src="includes/img/logo.png"class="img-fluid" id="img">
                </div>
            </article>
        </section>
        <article class="container-fluid " id="chmaratencao">
            <div class="row " id="segura">
                <div class="col-4 d-none d-lg-block " id="coluna-1">
                    <div class="row container-fluid " id="img_1">
                        <a href="includes/paginas/galeria/">
                            <div class="contairner-fluid anime" id="seguraIMG">
                                <label class="h5 text-danger col-12">Variedade em pratos</label>
                                <img src="includes/img/garfofaca.png" id="img-img1"/>
                            </div>
                        </a>
                    </div>
                    <hr class="hr">
                    <?php
                    if (isset($_SESSION['codigo'])) {
                        echo '<a href="includes/paginas/Agenda/index.php">
                    <div class="row container" id="img_2">
                        <div class="contairner-fluid anime" id="seguraIMG">
                            <label class="h5 text-danger col-12">Agende seu horário</label>
                            <img src="includes/img/agenda.png" id="img-img2" />
                        </div>
                    </div></a>';
                    } else {
                        echo '<a data-toggle="modal" data-target="#mylogin">
                    <div class="row container" id="img_2">
                        <div class="contairner-fluid anime" id="seguraIMG">
                            <label class="h5 text-danger col-12">Agende seu horário</label>
                            <img src="includes/img/agenda.png" id="img-img2" />
                        </div>
                    </div></a>';
                    }
                    ?>


                </div>
                <div class="col-lg-4  col-sm-12 col-xs-12"id="coluna-2">
                    <div class="container" id="divConteudo">
                        <label class="container-fluid"id="texto-coluna-2">
                            O melhor
                        </label>
                        <label class="container-fluid"id="texto2-coluna-2">
                            serviços
                        </label>
                        <label class="container text "id="texto3-coluna-2">
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
                        <a href="#footer">
                            <div class="contariner anime " id="seguraIMG">
                                <label class="h5 text-danger">Entre em contato</label>
                                <img src="includes/img/contato.png" id="img-img4"/>
                            </div></a>
                    </div>
                </div>
            </div>

        </article>
        <section class="container-fluid p-1 " id="fundocarousel">
            <article class="container-fluid carousel slide" id="caixacarousel" data-ride="carousel">
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
                        <img src="includes/img/img-carousel/img<?php echo $sort1; ?>.jpg" id="a" class="img-fluid d-block"/>
                    </div>

                    <div class="carousel-item">
                        <img src="includes/img/img-carousel/img<?php echo $sort2; ?>.jpg" id="a" class="img-fluid d-block"/>
                    </div>

                    <div class="carousel-item">
                        <img src="includes/img/img-carousel/img<?php echo $sort3; ?>.jpg" id="a" class="img-fluid d-block"/>
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
        <!-- Button to Open the Modal -->


        <!-- abrir login-->
        <div class="modal" id="mylogin">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Entrar</h4>
                        <button type="button" class="close" data-dismiss="modal">&times; </button>
                    </div>

                    <!-- Modal body -->
                    <form action="ponte.php" method="POST">
                        <div class="modal-body">

                            <div class="container-fluid ">
                                <div class="row">
                                    <span class="col-2 mt-2 text-danger">Email</span>
                                    <div class="col-9"><input  type="email" name="email" id="inputs" /></div>
                                </div>

                                <div class="row   mt-2">
                                    <span class="col-2 mt-1 text-danger">Senha</span>
                                    <div class="col-8"><input  type="password" name="senha"id="inputs"/></div>
                                </div>
                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="entrar" >Entrar</button>
                            <div class="mt-2"><a  class="close" data-dismiss="modal" data-toggle="modal" data-target="#mycadastro"><button class="btn btn-link" name="NPCD">não possui cadastro?</button></a></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- ------------------------------------------------------------------------------------------------------->

        <!-- abrir cadastro-->
        <div class="modal" id="mycadastro">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Cadastro</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="ponte.php"  method="POST" >
                        <div class="modal-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <span class="col-2 mt-2 text-danger">Nome</span>
                                    <div class="col-8 ml-2"><input  type="text" name="nome"id="inputs" required="" placeholder="Digite seu nome"/></div>
                                </div>
                                <div class="row">
                                    <span class="col-2 mt-2 text-danger">Email</span>
                                    <div class="col-8 ml-2"><input  type="email" name="email"id="inputs" required="" placeholder="Digite seu email  "/></div>
                                </div>

                                <div class="row   mt-2">
                                    <span class="col-2 mt-1 text-danger">Senha</span>
                                    <div class="col-6 ml-2"><input  type="password" name="senha" id="senha"  required="" placeholder="Use caracteres especias ex:@#$"onkeyup="senhaForca()"/></div><div class="col-2" id="erroSenhaForca"></div>

                                </div>
                                <div class="row mt-2">
                                    <span class="col-2 mt-1 text-danger" >Celular</span>

                                    <div class="col-8 ml-2"><input  type="text" name="celular" id="inputs" required="" maxlength="13" placeholder="(DDD) 99999 9999"onKeyPress="formatar('## #####-####', this);" /></div>

                                </div>

                                <div class="row  mt-2">
                                    <span class="col-2 mt-1 text-danger">Telefone</span>
                                    <div class="col-8 ml-2"><input  type="text" name="telefone" id="inputs" required="" maxlength="12" placeholder="(DDD) 9999 9999" onKeyPress="formatar('## ####-####', this);" /></div>
                                </div>
                                <div class="row  mt-2">
                                    <span class="col-2 mt-1 text-danger ">Endereço</span>
                                    <div class="col-6 ml-2"><input  type="text" name="rua" placeholder="Rua"id="inputs" required=""/></div>
                                    <div class="col-3"><input  type="number" name="numero" id="inputs" placeholder="N°" maxlength="4" required=""/></div>
                                </div>


                                <div class="row  mt-2">
                                    <span class="col-2 mt-1 text-danger bg-none">Sexo</span>
                                    <div class="col-8 ml-2">
                                        <select name="sexo"id="inputs" required="">
                                            <option value="m">Masculino</option>
                                            <option value="f">Feminino</option>
                                            <option value="o">Outros</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row  mt-2">
                                    <span class="col-2 mt-1 text-danger bg-none">Cidade</span>
                                    <div class="col-8 ml-2">
                                        <select name="cidade" id="inputs">
                                            <?php
                                            $cidade = new funcao();
                                            $item = $cidade->exibeCidade();
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="cadastrar">Cadastrar-se</button>
                            <div class="mt-2"><a class="close" data-dismiss="modal" data-toggle="modal" data-target="#mylogin"><button class="btn btn-link" name="JPCD">Já possui cadastro?</button></a></div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--myperfil-->
        <!-- abrir login-->
        <div class="modal" id="myperfil">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Perfil</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="ponte.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row ">
                                <?php
                                if ($_SESSION['nomeDafoto'] != "userFoto.jpg") {
                                    echo '<div class="col-12 " id="foto">
                                            <label id="fotoUsuario" for="fotoUsu" class="border" >
                                              <img  src="includes/fotos/' . $_SESSION['nomeDafoto'] . '" id="AjustarFotoUsuario">
                                                    <input  type="file" name="Filedata" id="fotoUsu"  disabled/>
                                            </label>
                                            
                                          </div>';
                                } else {
                                    echo '<div class="col-12 " id="foto">
                                            <label id="fotoUsuario" for="fotoUsu" class="border" ">
                                                <img src="includes/fotos/padrao/' . $_SESSION['nomeDafoto'] . '" id="AjustarFotoUsuario">
                                                    <input  type="file" name="Filedata" id="fotoUsu" onchange="previewImage()" disabled/>
                                            </label>
                                          </div>';
                                }
                                ?>

                                <div class="collapse col-12  p-2 " id="sino">
                                    <?php
                                    $notificar = new funcao();
                                    $item = $notificar->notificar($_SESSION['codigo']);
                                    ?>
                                </div>
                                <a href="#" class="col-12" data-target="#sino" data-toggle="collapse" ><img src="includes/img/sino.png" id="notificacao"/></a>
                            </div>
                            <div class="row">
                                <span class="col-2 pt-2" id="nomes">Nome</span>
                                <div class="col-10 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['nome'];
                                    echo "<input type='text' class='form-control ml-1' name='nome' id='troca1' value='$nome' required disabled/>";
                                    ?>
                                </div>

                                <span class="col-2  pt-2" id="nomes">Email</span>
                                <div class="col-10 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['email'];
                                    echo "<input type='text' class='form-control ml-1 ' name='email' id='troca2' value='$nome' required disabled/>";
                                    ?>
                                </div>
                                <span class="col-2 pt-2" id="nomes">Telefone</span>
                                <div class="col-10 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['telefone'];
                                    echo "<input type='text' class='form-control ml-1'name='telefone' id='troca3' value='$nome' required disabled/>";
                                    ?>
                                </div>
                                <span class="col-2 pt-2" id="nomes">Celular</span>
                                <div class="col-10 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['celular'];
                                    echo "<input type='text' class='form-control ml-1' name='celular' id='troca4' value='$nome'required disabled/>";
                                    ?>
                                </div>
                                <span class="col-2 pt-2" id="nomes">Endereço</span>
                                <div class="col-6 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['rua'];
                                    echo "<input type='text' class='form-control ml-1' name='rua' id='troca5' value='$nome' required disabled/>";
                                    ?>
                                </div>
                                <span class="col-1 pt-3" id="nomes">N°</span>
                                <div class="col-3 pt-1" id="nome">
                                    <?php
                                    $nome = $_SESSION['numero'];
                                    echo "<input type='text' class='form-control ml-1' name='numero' id='troca6' value='$nome' required disabled/>";
                                    ?>
                                </div>

                                <span class="col-2  pt-1"id="nomes">Senha</span>
                                <div class="col-5  pt-1 pl-4" id="senha-texto">
                                    <?php
                                    echo '<a data-toggle="modal" data-dismiss="modal" href="#" data-target="#myalterarSenha">alterar senha?</a>';
                                    ?>
                                </div>

                            </div>



                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"  id="BotSub" onclick="myFunction()" name="update">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="myalterarSenha">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title text-danger">Alterar Senha</h4>

                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="ponte.php" method="POST">
                        <div class="row modal-body">
                            <label class="col-3 mt-2">Senha atual</label><input type="password" name="senhaAtual" class="col-9 mt-2 padraoIn" placeholder="digite sua senha atual" required=""/>
                            <label class="col-3 mt-2">Nova senha</label><input type="password" name="senhaNova" class="col-9 mt-2 padraoIn"  placeholder="digite sua senha nova" required=""/>
                            <label class="col-3 mt-2">novamente</label><input type="password" name="senhaConfirmada" class="col-9 mt-2 padraoIn"  placeholder="digite novamente" required=""/>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger" name="updateSenha">Salvar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <?php
            $exibe->informaUsuario();
            ?>
        </div>

       	<footer id="footer" class="row m-0 ">

            <div class="col-4 "><a href="https://api.whatsapp.com/send?1=pt_BR&phone=551899665-2579" target="_blank"><center><img src="includes/img/whatsapp.png" class="orgIcon" title="Wharsapp"/></center></a></div>
            <div class="col-4"><a href="https://www.facebook.com/ACNfest-1345351735555388/" target="_blank"><center><img src="includes/img/facebook.png" class="orgIcon" title="Facebook"/></center></a></div>
            <div class="col-4"><a href="https://www.instagram.com/acn_fest/?hl=pt-br" target="_blank"><center><img src="includes/img/instagram.png" class="orgIcon" title="Instagram"/></center></a></div>



        </footer>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script type="text/javascript" src="includes/js/UpdateScript.js"></script>
        <script src="//code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="//assets.locaweb.com.br/locastyle/2.0.6/javascripts/locastyle.js"></script>
        <script src="includes/node_modules/jquery/dist/jquery.js"></script>
        <script src="includes/node_modules/popper.js/dist/umd/popper.js"></script>
        <script src="includes/node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="includes/js/animacao.js"></script>

        <!-- meu -  JavaScript -->
        <script src="includes/js/verficaSenha.js"></script>
        <script>
                                function formatar(mascara, documento) {
                                    var i = documento.value.length;
                                    var saida = mascara.substring(0, 1);
                                    var texto = mascara.substring(i);
                                    if (texto.substring(0, 1) != saida) {
                                        documento.value += texto.substring(0, 1);
                                    }
                                }

                                $("#cadastrar").click(function(event) {
                                    $(event.target).attr('disabled', 'disabled');
                                });
        </script>
    </body>
</html>
