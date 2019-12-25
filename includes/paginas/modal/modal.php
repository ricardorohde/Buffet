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
                            <div class="col-9"><input type="email" name="email" id="inputs" /></div>
                        </div>

                        <div class="row   mt-2">
                            <span class="col-2 mt-1 text-danger">Senha</span>
                            <div class="col-8"><input type="password" name="senha" id="inputs" /></div>
                        </div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="entrar">Entrar</button>
                    <div class="mt-2">
                        <a class="close" data-dismiss="modal" data-toggle="modal" data-target="#mycadastro">
                            <button class="btn btn-link" name="NPCD">não possui cadastro?</button>
                        </a>
                    </div>
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
            <form action="ponte.php" method="POST">
                <div class="modal-body">

                    <div class="container-fluid">
                        <div class="row">
                            <span class="col-2 mt-2 text-danger">Nome</span>
                            <div class="col-8 ml-2"><input type="text" name="nome" id="inputs" required="" placeholder="Digite seu nome" /></div>
                        </div>
                        <div class="row">
                            <span class="col-2 mt-2 text-danger">Email</span>
                            <div class="col-8 ml-2"><input type="email" name="email" id="inputs" required="" placeholder="Digite seu email  " /></div>
                        </div>

                        <div class="row   mt-2">
                            <span class="col-2 mt-1 text-danger">Senha</span>
                            <div class="col-6 ml-2"><input type="password" name="senha" id="senha" required="" placeholder="Use caracteres especias ex:@#$" onkeyup="senhaForca()" /></div>
                            <div class="col-2" id="erroSenhaForca"></div>

                        </div>
                        <div class="row mt-2">
                            <span class="col-2 mt-1 text-danger">Celular</span>

                            <div class="col-8 ml-2">
                                <input id="inputs" class="phone_cell" type="text" name="celular"/>
                            </div>

                        </div>

                        <div class="row  mt-2">
                            <span class="col-2 mt-1 text-danger">Telefone</span>
                            <div class="col-8 ml-2">
                                <input id="inputs" class="phone" type="text" name="telefone" />
                            </div>
                        </div>
                        <div class="row  mt-2">
                            <span class="col-2 mt-1 text-danger ">Endereço</span>
                            <div class="col-6 ml-2"><input type="text" name="rua" placeholder="Rua" id="inputs" required="" /></div>
                            <div class="col-3"><input type="number" name="numero" id="inputs" placeholder="N°" maxlength="4" required="" /></div>
                        </div>


                        <div class="row  mt-2">
                            <span class="col-2 mt-1 text-danger bg-none">Sexo</span>
                            <div class="col-8 ml-2">
                                <select name="sexo" id="inputs" required="">
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
                            <a href="#" class="col-12" data-target="#sino" data-toggle="collapse"><img src="includes/img/sino.png" id="notificacao" /></a>
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

                        <span class="col-2  pt-1" id="nomes">Senha</span>
                        <div class="col-5  pt-1 pl-4" id="senha-texto">
                            <?php
                                    echo '<a data-toggle="modal" data-dismiss="modal" href="#" data-target="#myalterarSenha">alterar senha?</a>';
                                    ?>
                        </div>

                    </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="BotSub" onclick="myFunction()" name="update">Editar</button>
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
                    <label class="col-3 mt-2">Senha atual</label><input type="password" name="senhaAtual" class="col-9 mt-2 padraoIn" placeholder="digite sua senha atual" required="" />
                    <label class="col-3 mt-2">Nova senha</label><input type="password" name="senhaNova" class="col-9 mt-2 padraoIn" placeholder="digite sua senha nova" required="" />
                    <label class="col-3 mt-2">novamente</label><input type="password" name="senhaConfirmada" class="col-9 mt-2 padraoIn" placeholder="digite novamente" required="" />
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="updateSenha">Salvar</button>

                </div>
            </form>
        </div>
    </div>
</div>