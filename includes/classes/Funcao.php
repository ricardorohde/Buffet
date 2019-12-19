<?php

class funcao extends Conexao {

    private $foto;

    function puxarCidade() {
        $query = "SELECT * FROM cidade";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function exibeCidade() {
        $item = $this->puxarCidade();
        try {
            foreach ($item as $row) {
                ?>
    <option value="<?php echo $row['cid_codigo']; ?>">
        <?php echo $row['cid_nome'] . " - " . $row['cid_estado']; ?>
    </option>
    <?php
            }
        } catch (PDOexception $e) {
            echo "Error is: " . $e->etmessage();
        }
    }

    function puxarUsuarios() {
        $query = "SELECT * FROM usuario WHERE usu_nivelacesso = 1";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function exibirCarpadio() {
        $vet = array();
        $query = "SELECT *FROM cardapio";
        $resultado = $this->getAll($query);
        $item = $resultado;
        $i = 0;
        foreach ($item as $row) {

            $query = "SELECT cf_nome FROM  cardapiofinalizado WHERE cf_Codigo = {$row['cf_codigo']}";
            $resultado = $this->getOne($query);

            if ($i == 0) {

                echo '<div class="item" id="cardapiocontrole" data-value="' . $resultado['cf_nome'] . '">
                        
                        <div class="pad15">
                            <p class="lead">' . $resultado['cf_nome'] . '</p>';

                $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                $resultado2 = $this->getAll($query2);

                foreach ($resultado2 as $row2) {
                    $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                    $resultado3 = $this->getOne($query3);
                    foreach ($resultado3 as $row3) {
                        echo '<p>' . $row3 . '</p>';
                    }
                }


                echo '<div class="dropdown" id="boxcardapio">
                            <button class="btn btn-secondary  text-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            °°°
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item"  href="?apagarCardapio=' . $row['cf_codigo'] . '">apagar</a>
                              <button class="dropdown-item" href="admin.php?cardapios&editarCardapio=' . $row['cf_codigo'] . '" data-toggle="modal" data-target="#editarCar" data-codigo="' . $row['cf_codigo'] . '" data-nome="' . $resultado['cf_nome'] . '">editar</button>
                            </div>
                          </div></div>   
                     </div>';
            } else {
                $contaCardapio = 0;
                for ($c = 0; $c < count($vet); $c++) {
                    if ($vet[$c] == $row['cf_codigo']) {
                        $contaCardapio++;
                    }
                }
                if ($contaCardapio == 0) {
                    echo '<div class="item" id="cardapiocontrole" data-value="' . $resultado['cf_nome'] . '">
                        <div class="pad15">
                            <p class="lead" data="' . $resultado['cf_nome'] . ' id="ola">' . $resultado['cf_nome'] . '</p>';

                    $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                    $resultado2 = $this->getAll($query2);

                    foreach ($resultado2 as $row2) {
                        $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                        $resultado3 = $this->getOne($query3);
                        foreach ($resultado3 as $row3) {
                            echo '<p>' . $row3 . '</p>';
                        }
                    }


                    echo '<div class="dropdown" id="boxcardapio">
                            <button class=" btn btn-secondary  text-danger  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            °°°
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="?apagarCardapio=' . $row['cf_codigo'] . '">apagar</a>
                              <button class="dropdown-item" href="admin.php?cardapios&editarCardapio=' . $row['cf_codigo'] . '" data-toggle="modal" data-target="#editarCar" data-codigo="' . $row['cf_codigo'] . '" data-nome="' . $resultado['cf_nome'] . '">editar</button>
                            </div>
                          </div> </div>
                        
                     </div>';
                }
            }
            $vet[$i] = $row['cf_codigo'];
            $i++;
        }
    }

    function ExibirCid() {
        $item = $this->puxarCidade();
        if ($item == null) {
            echo '<span><a href="admin.php">Nenhuma cidade cadastrada ,cadastre Pelomenos uma cidade</a></span>';
        } else {
            echo'<table class="table table-hover" >
                     <thead>
                        <tr>
                           <th>Nome</th>
                           <th>Estado</th>
                           <th>Deletar</th>
                           <th><a data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycadCid" title="cadastrar cidade" class="">+</a></th>
                           <th><a href="admin.php" id="EditarA" title="Fechar" class="">X</a></th>
                       
                           
                        </tr>
                      </thead>
                      <tbody>';
            foreach ($item as $row) {
                echo '<tr>
                   <td>' . $row['cid_nome'] . '</td>
                   <td>' . $row['cid_estado'] . '</td>
                       <td><div id="DefinirWH"><a href="" onclick="excluirCidade(' . $row['cid_codigo'] . ') "><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                   </tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function puxarIngrediente() {
        $query = "SELECT * FROM ingredientes";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function exibirIngrediente() {
        $item = $this->puxarIngrediente();
        if ($item == null) {
            echo '<table class="table table-hover" >
                     <thead>
                        <tr>
                           <th>foto</th>
                           <th>nome</th>
                           <th>Deletar</th>
                           <th><a data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycading" title="cadastrar ingrediente">+</a></th>
                           <th><a href="admin.php" id="EditarA" title="Fechar">X</a></th>
                            
                           
                        </tr>
                      </thead>
                      <tbody>';
        } else {
            echo'<table class="table table-hover" >
                     <thead>
                        <tr>
                           <th>foto</th>
                           <th>nome</th>
                           <th>Deletar</th>
                           <th><a data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycading" title="cadastrar ingrediente">+</a></th>
                           <th><a href="admin.php" id="EditarA" title="Fechar">X</a></th>
                          
                           
                        </tr>
                      </thead>
                      <tbody>';
            foreach ($item as $row) {
                echo '<tr>
                   <td><div id="foto2" ><img src="../fotos/padrao/' . $row['ing_foto'] . '" id="ajustarImg"/></div></td>
                   <td>' . $row['ing_desc'] . '</td>
                       <td><div id="DefinirWH"><a href="" onclick="excluirIngrediente(' . $row['ing_codigo'] . ')"><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                   </tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function excluirCidade($id) {
        $query = "DELETE FROM cidade WHERE cid_codigo = $id";
        $resultado = $this->execute($query);
        if ($resultado == false) {
            echo "<script> swal('Não é possivel apagar cidades onde exite usuarios cadastrados!').then((value) => {location.assign('?cidade')});</script>";
        } else {

            echo "<script> swal('excluido com sucesso!').then((value) => {location.assign('?cidade')});</script>";
        }
    }

    function excluiring($id) {
        $query = "DELETE FROM cardapiopronto_ingredientes WHERE ing_codigo = $id";
        $this->execute($query);
        $query = "DELETE FROM ingredientes WHERE ing_codigo = $id";
        $resultado = $this->execute($query);

        $query = "SELECT cp_codigo FROM cardapiopronto";
        $resultado = $this->getAll($query);
        foreach ($resultado as $row) {
            $query = "SELECT  *FROM cardapiopronto_ingredientes WHERE cp_codigo ={$row['cp_codigo']}";
            $verifica = $this->getAll($query);
            if ($verifica == null) {
                $query = "DELETE FROM cardapiopronto WHERE cp_codigo = {$row['cp_codigo']}";
                $this->execute($query);
            }
        }
        echo "<script> swal('excluido com sucesso!').then((value) => {location.assign('?ingrediente')});</script>";
    }

    function exibeTabela() {
        $item = $this->puxarUsuarios();
        if ($item == null) {
            echo '<span><a href="admin.php">Nenhum Usuario cadastrado</a></span>';
        } else {

            echo'<table class="table table-hover border"  >
                                    <thead>
                                      <tr>
                                        <th>foto</th>
                                        <th>nome</th>
                                        <th>cidade</th>
                                        <th>Usuario</th>
                                        <th>telefone</th>
                                        <th>celular</th>
                                        <th>Endereço</th>
                                        <th>Status</th>
                                        <th>Deletar</th>
                                        <th><a href="admin.php" id="EditarA" title="fechar">X</a></th>
                                      </tr>
                                    </thead> <tbody>';

            foreach ($item as $row) {
                $query = "SELECT *FROM cidade WHERE cid_codigo = {$row['cid_codigo']}";
                $resultado = $this->getOne($query);
                if ($row['usu_nivelacesso'] == 1) {
                    $acesso = 'Cliente';
                } else {
                    $acesso = 'Error';
                }
                echo '
                            
                              <tr>
                                <td id="table">';
                if ($row['usu_foto'] == "userFoto.jpg") {
                    echo '<div id="foto"><a href="../fotos/padrao/' . $row['usu_foto'] . '"><img src="../fotos/padrao/' . $row['usu_foto'] . '" id="ajustarImg"></a></div></td>';
                } else {
                    echo '<div id="foto"><a href="../fotos/' . $row['usu_foto'] . '"><img src="../fotos/' . $row['usu_foto'] . '" id="ajustarImg"></a></div></td>';
                }
                echo ' 
                                <td>' . $row['usu_nome'] . '</td>
                                <td>' . $resultado['cid_nome'] . '</td>
                                <td>' . $acesso . '</td>
                                <td>' . $row['usu_telefone'] . '</td>
                                <td>' . $row['usu_celular'] . '</td>
                                <td>' . $row['usu_rua'] . '-N° ' . $row['usu_numero'] . '</td>';
                if ($row['usu_status'] == 0) {
                    echo'<td><div id="DefinirWH2"><a href="#" onclick="bloquearUsu(' . $row['usu_codigo'] . ')"><img src="../img/cadeadoAberto.png" id="bloquearDesbloquear" title="desbloqueado"/></a></div></td></td>';
                } else {
                    echo'<td><div id="DefinirWH2"><a href="#" onclick="desbloquearUsu(' . $row['usu_codigo'] . ')"><img src="../img/cadeadoFechado.png" id="excluir" title="bloqueado"/></a></div></td></td>';
                }
                echo '<td><div id="DefinirWH"><a href="#" onclick="apagarUsu(' . $row['usu_codigo'] . ') "><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                              </tr>';
            }
            echo '</tbody>
                    </table>';
        }
    }

    function puxarCardapiosprontos() {
        $query = "SELECT *FROM  cardapiopronto_ingredientes";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function exibeCardapiopronto() {
        $item = $this->puxarCardapiosprontos();
        if ($item == null) {
            echo '<table class="table table-hover" >
                     <thead>
                        <tr>
                           <th>foto</th>
                           <th>Nome do prato</th>
                           <th>ingredientes</th>
                           <th><a data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycardapioPronto" title="cadastrar Prato">+</a></th>
                           <th><a href="admin.php" id="EditarA" title="Fechar">X</a></th>
                           
                           
                        </tr>
                      </thead>
                      <tbody>';
        } else {
            echo'<table class="table table-hover" >
                     <thead>
                        <tr>
                           <th>Foto</th>
                           <th>Nome do prato</th>
                           <th>Ingredientes</th>
                           <th>Editar</th>
                           <th>Deletar</th>
                           <th><a data-toggle="modal" data-dismiss="modal" href="#" data-target="#mycardapioPronto" title="cadastrar Prato">+</a></th>
                           <th><a href="admin.php" id="EditarA" title="Fechar">X</a></th>
                           
                           
                        </tr>
                      </thead>
                      <tbody>';
            $id = 0;
            foreach ($item as $row) {


                $query = "SELECT *FROM cardapiopronto WHERE cp_codigo = {$row['cp_codigo']}";
                $resultado2 = $this->getOne($query);
                echo'<tr>';

                if ($row['cp_codigo'] != $id) {
                    if ($resultado2['cp_foto'] == 'ingFoto.png') {
                        echo'
                       <td><div id="foto2" ><img src="../fotos/Padrao/' . $resultado2['cp_foto'] . '" id="ajustarImg" /></a></div></td>
                       <td>' . $resultado2['cp_pratos'] . '</td>
                        <td>';
                    } else {
                        echo'
                       <td><div id="foto2" ><a href="../fotos/Pratos/' . $resultado2['cp_foto'] . '"><img src="../fotos/Pratos/' . $resultado2['cp_foto'] . '" id="ajustarImg" /></div></td>
                       <td>' . $resultado2['cp_pratos'] . '</td>
                    <td>';
                    }

                    $query = "SELECT  `ing_codigo` FROM `cardapiopronto_ingredientes` WHERE cp_codigo = {$row['cp_codigo']}";
                    $item2 = $this->getAll($query);
                    // print_r($item2);

                    echo '
                    <div class="btn-group">
                      <button type="button" class="btn bg-dark text-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ver
                      </button>
                  <div class="dropdown-menu">';
                    foreach ($item2 as $row2) {
                        $query = "SELECT *FROM ingredientes WHERE ing_codigo = {$row2['ing_codigo']}";
                        $resultado = $this->getOne($query);
                        echo '<a class="dropdown-item" href="#">' . $resultado['ing_desc'] . '</a>';
                    }
                    echo '</div>
                   
                        </td>
                        <td> <a data-toggle="modal" data-target="#editarprato" data-codigo2="' . $row['cp_codigo'] . '" data-nome2="' . $resultado2['cp_pratos'] . '" data-foto="' . $resultado2['cp_foto'] . '"><img src="../img/editar.png" id="editar"></a> </td>
                       <td><div id="DefinirWH"><a href="" onclick="excluirprato(' . $row['cp_codigo'] . ')"><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>';
                    echo '';
                }
                $id = $row['cp_codigo'];
                echo '</tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function puxarPratos() {
        $query = "SELECT *FROM cardapiopronto";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function puxarPratosIngrediente($id) {

        $query = "SELECT ing_codigo FROM cardapiopronto_ingredientes WHERE cp_codigo = $id";
        $resultado1 = $this->getAll($query);
        //print_r($resultado1);
        foreach ($resultado1 as $row1) {
            $query = "SELECT *FROM ingredientes WHERE ing_codigo = {$row1['ing_codigo']}";
            $resultado = $this->getOne($query);
            //print_r($resultado);

            echo $resultado['ing_desc'] . ',';
        }
    }

    function puxarIngCar($id) {
        $query = "SELECT cp_codigo FROM cardapiopronto WHERE cp_codigo = $id";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function excluirPratos($id) {
        $this->apagarFotoPratoTab($id);
        $query = "DELETE FROM cardapiopronto_ingredientes WHERE cp_codigo = $id";
        $resultado = $this->execute($query);

        $query = "DELETE FROM cardapio WHERE cp_codigo= $id";
        $resultado = $this->execute($query);

        $query = "DELETE FROM cardapiopronto WHERE cp_codigo = $id";
        $resultado = $this->execute($query);

        $query = "SELECT *FROM  cardapiofinalizado";
        $resultado = $this->getAll($query);

        foreach ($resultado as $row) {
            $query = "SELECT *FROM cardapio WHERE cf_codigo =  {$row['cf_codigo']}";
            $resultado1 = $this->getAll($query);

            if ($resultado1 == null) {
                $query = "DELETE FROM cardapiofinalizado WHERE cf_codigo = {$row['cf_codigo']}";
                $resultado = $this->execute($query);
            }
        }

        echo "<script> swal('excluido com sucesso!').then((value) => {location.assign('?pratos')});</script>";
    }

    function sair() {
        session_destroy();
        unset($_SESSION['codigo']);
        unset($_SESSION['nome']);
        unset($_SESSION['nivelAcesso']);
        unset($_SESSION['sexo']);
        unset($_SESSION['Destruir']);
        unset($_SESSION['nomeDaFoto']);
        unset($_SESSION['verificacaoDefoto']);
    }

    function excluir($id) {
        $codigo = $id;
        $this->apagarUsuarioFoto($codigo);
        $query = "DELETE FROM usuario WHERE usu_codigo = $codigo";
        $resultado = $this->execute($query);
        $query = "DELETE FROM agenda WHERE usu_codigo = $codigo";
        $resultado = $this->execute($query);
    }

    function bloquear($id) {
        $query = "UPDATE usuario SET usu_status = 1 WHERE usu_codigo = $id";
        $resultado = $this->execute($query);
    }

    function desbloquear($id) {
        $query = "UPDATE usuario SET usu_status = 0 WHERE usu_codigo = $id";
        $resultado = $this->execute($query);
    }

    function informaUsuario() {
        if (isset($_SESSION['success']) == 1) {
            echo "<script> swal('Logado com sucesso','','success');</script>";
            unset($_SESSION['success']);
        } else {
            if (isset($_SESSION['error']) == 1) {
                echo "<script> swal('Error','Email ou senha incorreta','error');</script>";
                unset($_SESSION['error']);
            }
        }
        if (isset($_SESSION['blok']) == 1) {
            echo "<script> swal('Você está bloqueado','Entre em contato','warning');</script>";
            unset($_SESSION['blok']);
        }
        //cadastro
        if (isset($_SESSION['cadastrado']) == 1) {
            echo "<script> swal('Cadastrado!');</script>";
            unset($_SESSION['cadastrado']);
        } elseif (isset($_SESSION['errorCad'])) {
            echo "<script> swal('Error','Email-invalido','warning');</script>";
            unset($_SESSION['errorCad']);
        }
        if (isset($_SESSION['errorUpload'])) {
            $error = $_SESSION['errorUpload'];
            echo "<script> swal('$error');</script>";
            unset($_SESSION['errorUpload']);
        }
    }

    function informaBotao($noticacao) {
        if($noticacao > 0){
            $badge = '';
            $badge .= '<div class="badge badge-light" id="informanot">';
            $badge .= "$noticacao";
            $badge .= '</div>';
        }else{
        $badge = '';
        }
        if (isset($_SESSION['codigo'])) {
            if ($_SESSION['nivelAcesso'] == 1) {

                if ($_SESSION['sexo'] == "m") {
                    echo '<div class="col-9 d-none d-lg-block "><span  class = "d-none d-lg-block" id="textoSaudacao">Seja bem-vindo, ' . $_SESSION['nome'] . '</span></div>';
                    echo '<div class="col-3 float-right  "><div id= "sair"> <a href="?sair" id="styletextoSair">Sair</a></div></div>';
                } else {
                    if ($_SESSION['sexo'] == "f") {
                        echo '<div class="col-9 d-none d-lg-block "><span  class = "d-none d-lg-block" id="textoSaudacao">Seja bem-vinda, ' . $_SESSION['nome'] . '</span></div>';
                        echo '<div class="col-3  "><div id= "sair"> <a href="?sair" id="styletextoSair">Sair</a></div></div>';
                    } else {
                        echo '<div class="col-9 d-none d-lg-block "><span  class = "d-none d-lg-block" id="textoSaudacao">Seja bem-vindo(a) ' . $_SESSION['nome'] . '</span></div>';
                        echo '<div class="col-3 float-right  "><div id= "sair"> <a href="?sair" id="styletextoSair">Sair</a></div></div>';
                    }
                }
            } else {
                if ($_SESSION['nivelAcesso'] == 2) {
                    echo'
                        <div style="min-width:250px;" class="row p-0 m-0">
                            <div class="col-md-2 p-0 m-0">
                                <a class="p-0 m-0">
                                    <button class="form-control btn btn-dark m-0"  data-toggle="modal" data-target="#myperfil">
                                        <i class="fa fa-user-circle"></i>
                                    </button>
                                </a>
                                '.$badge.'
                            </div>
                            <div class="col-md-6 p-0 mt-1 mt-md-0 m-0 pl-md-1">
                                <button type="button" class=" small form-control btn btn-outline-dark text-white" id="adm">
                                    <a class="text-white" href="includes/paginas/admin.php" class="small" id="styletextoAdim">
                                        <small>
                                            <i class="fas fa-briefcase"></i> Adiministrar
                                        </small>
                                    </a>
                                </button>
                            </div>
                            <div class="col-md-4 p-0 m-0 mt-1 mt-md-0 pl-md-1">
                                <a class="text-white" href="?sair">
                                    <button type="button" class=" small form-control btn btn-outline-dark text-white" id="sair">
                                        <small>
                                            <i class="fa fa-sign-out-alt"></i> Sair
                                        </small>
                                    </button>
                                </a>
                            </div>
                        </div>
                    ';
                }
            }
        } else {

            echo '
                <div style="min-width:190px;" class="row p-0 m-0">
                    <div class="col-md-5 p-0 mt-1 mt-md-0 m-0">
                        <button type="button" class=" small form-control btn btn-outline-dark text-white" data-toggle="modal" data-target="#mylogin" id="botaoEntrarCad">
                            <small>
                                <i class="fas fa-users"></i> Entrar
                            </small>
                        </button>
                    </div>
                    <div class="col-md-7 p-0 m-0 mt-1 mt-md-0 pl-md-1">
                        <button type="button" class=" small form-control btn btn-outline-dark text-white" data-toggle="modal" data-target="#mycadastro"  id="botaoEntrarCad">
                            <small>
                                Cadastre-se
                            </small>
                        </button>
                    </div>
                </div>
                
                
                ';
        }
    }

    function pesquisaFoto() {
        $query = "SELECT  `usu_foto`FROM `usuario`";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function apagarUsuarioFoto($id) {
        $codigo = $id;
        $query = "SELECT usu_foto FROM usuario WHERE usu_codigo = $codigo";
        $resultado = $this->getOne($query);
        $nomeDaFoto = $resultado['usu_foto'];
        $pasta = "../fotos/";
        chmod($pasta, 0777);
        $img = opendir($pasta);

        while ($nome_itens = readdir($img)) {
            $item = $nome_itens;
            echo $item;
            if (($item == $nomeDaFoto) && ($item != '.') && ($item != '..')) {
                unlink($pasta . '/' . $nomeDaFoto);
            }
        }
        closedir($img);
    }

    function pesquisaFotoUsu() {
        $query = "SELECT usu_foto FROM usuario WHERE usu_codigo = " . $_SESSION['codigo'] . "";
        $resultado = $this->getOne($query);
        $this->foto = $resultado['usu_foto'];
    }

    function VerificaFoto($nomeFoto) {
        //echo "<br/>echo este nome que esta chegando=".$nomeFoto;
        $_SESSION['verificacaoDefoto'];
        $item = $this->pesquisaFoto();
        foreach ($item as $row) {
            if ($row['usu_foto'] == $nomeFoto) {
                $_SESSION['verificacaoDefoto'] = true;
            }
        }
    }

    function ApagaFotoAntiga() {
        $this->pesquisaFotoUsu();
        $pasta = "./includes/fotos/";
        //echo "<br/> nome da pasta = " . $pasta . "<br/>";
        chmod($pasta, 0777);
        $img = opendir($pasta);

        while ($nome_itens = readdir($img)) {
            $item = $nome_itens;
            if (($item == $this->foto) && ($item != '.') && ($item != '..')) {
                unlink($pasta . '/' . $this->foto);
            }
        }
        closedir($img);
    }

    function apagarCardapio($id) {
        $query = "DELETE FROM cardapio WHERE cf_codigo = $id";
        $resultado1 = $this->execute($query);
        $query = "DELETE FROM cardapiofinalizado WHERE cf_codigo = $id";
        $resultado2 = $this->execute($query);

        if ($resultado1 && $resultado2) {
            echo "<script> swal('Cardapio Apagado com sucesso').then((value) => {location.assign('?cardapios')});</script>";
        }
    }

    function apagarFotoPrato($id) {
        $codigo = $id;
        $query = "SELECT cp_foto FROM cardapiopronto WHERE cp_codigo = $codigo";
        $resultado = $this->getOne($query);
        $nomeDaFoto = $resultado['cp_foto'];
        $pasta = "../fotos/Pratos/";
        chmod($pasta, 0777);
        $img = opendir($pasta);

        while ($nome_itens = readdir($img)) {
            $item = $nome_itens;
            echo $item;
            if (($item == $nomeDaFoto) && ($item != '.') && ($item != '..')) {
                unlink($pasta . '/' . $nomeDaFoto);
            }
        }
        closedir($img);
    }

    function apagarFotoPratoTab($id) {
        $codigo = $id;
        $query = "SELECT cp_foto FROM cardapiopronto WHERE cp_codigo = $codigo";
        $resultado = $this->getOne($query);
        $nomeDaFoto = $resultado['cp_foto'];
        $pasta = "../fotos/Pratos/";
        chmod($pasta, 0777);
        $img = opendir($pasta);

        while ($nome_itens = readdir($img)) {
            $item = $nome_itens;
            echo $item;
            if (($item == $nomeDaFoto) && ($item != '.') && ($item != '..')) {
                unlink($pasta . '/' . $nomeDaFoto);
            }
        }
        closedir($img);
    }

    //cadastrar cidade
    function cadastrarCidade($nome, $estado) {
        if (($nome != null) || ($estado != null)) {
            $query = "SELECT *FROM cidade WHERE cid_nome = '$nome'";
            $resultado = $this->getone($query);
            if ($resultado > 0) {
                echo "<script> swal('Error cidade já Existente!').then((value) => {location.assign('?cidade')});</script>";
            } else {
                $query = "INSERT INTO cidade(cid_nome,cid_estado)VALUES('$nome','$estado')";
                $resultado = $this->execute($query);
                echo "<script> swal('Cadastrado com sucesso').then((value) => {location.assign('?cidade')});</script>";
                // header('location:?cidade');
            }
        } else {
            echo "<script> swal('Prencha todos os campos!');</script>";
            header('location:?cidade');
        }
    }

    function cadastrarIngrediente($nome) {
        $query = "SELECT *FROM ingredientes WHERE ing_desc = '$nome'";
        $resultado = $this->getOne($query);
        if ($resultado > 0) {
            echo "<script> swal('Error ingrediente já Existente!').then((value) => {location.assign('?ingrediente')});</script>";
        } else {
            $query = "INSERT INTO ingredientes(ing_desc,ing_foto)VALUES('$nome','ingFoto.png')";
            $resultado = $this->execute($query);

            echo "<script> swal('Cadastrado com sucesso').then((value) => {location.assign('?ingrediente')});</script>";
        }
    }

//error nessa funcao
    function cadastrarPrato($nome) {
        $name = $_FILES['Filedata']['name'];
        $_UP['pasta'] = '../fotos/Pratos/';
        $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
        $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

        if ($name != "") {
            if ($_FILES['Filedata']['error'] != 0) {
                echo "<script> swal('Não foi possível fazer o upload'" . $_UP['erros'][$_FILES['Filedata']['error']] . ");</script>";
            }
            $extensao = @strtolower(end(explode('.', $_FILES['arquivo']['name'])));
            $arquivo = $_FILES['Filedata']['name'];
            $extensao = substr($arquivo, -3);
            //print_r($extensao);
            if (array_search($extensao, $_UP['extensoes']) === false) {

                echo "<script> swal('isto não é uma foto').then((value) => {location.assign('?pratos')});</script>";
            } else if ($_UP['tamanho'] < $_FILES['Filedata']['size']) {
                echo "<script> swal('a foto enviado é muito grande, envie arquivos de até 2Mb').then((value) => {location.assign('?pratos')});</script>";
            } else {
                $nome_final = time() . ".$extensao";
                if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $_UP['pasta'] . $nome_final)) {

                    if (isset($_POST['checkbox']) == null) {
                        echo "<script> swal('cadastre no minimo 1 ingrediente').then((value) => {location.assign('?pratos')});</script>";
                    } else {

                        $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                        $resultado = $this->getOne($query);
                        if ($resultado != null) {
                            echo "<script> swal('Prato j� existente').then((value) => {location.assign('?pratos')});</script>";
                        } else {
                            $query = "INSERT INTO  cardapiopronto(cp_pratos,cp_foto)VALUES('$nome','$nome_final')";
                            $resultado = $this->execute($query);

                            $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                            $resultado = $this->getOne($query);
                            $idcardapio = $resultado['cp_codigo'];
                            echo "<script> swal('Cadastrado com sucesso!').then((value) => {location.assign('?pratos')});</script>";

                            //header('location:?pratos');
                            foreach ($_POST['checkbox'] as $checkbox) {
                                $query = "INSERT INTO cardapiopronto_ingredientes(cp_codigo,ing_codigo) VALUES($idcardapio,$checkbox)";
                                $resultado = $this->execute($query);
                            }
                        }
                    }
                } else {
                    echo "<script> swal('a foto enviado é muito grande, envie arquivos de até 2Mb').then((value) => {location.assign('?pratos')});</script>";
                }
            }
        } else {
            if (isset($_POST['checkbox']) == null) {
                echo "<script> swal('cadastre no minimo 1 ingrediente').then((value) => {location.assign('?pratos')});</script>";
            } else {
                $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                $resultado = $this->getOne($query);
                if ($resultado > 0) {
                    echo "<script> swal('prato já Existente').then((value) => {location.assign('?pratos')});</script>";
                } else {
                    $query = "INSERT INTO  cardapiopronto(cp_pratos,cp_foto)VALUES('$nome','ingFoto.png')";
                    $resultado = $this->execute($query);

                    $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                    $resultado = $this->getOne($query);
                    $idcardapio = $resultado['cp_codigo'];
                    echo "<script> swal('cadastrado com sucesso!').then((value) => {location.assign('?pratos')});</script>";
                    //header('location:?pratos');

                    foreach ($_POST['checkbox'] as $checkbox) {
                        $query = "INSERT INTO cardapiopronto_ingredientes(cp_codigo,ing_codigo) VALUES($idcardapio,$checkbox)";
                        $resultado = $this->execute($query);
                    }
                }
            }
        }
    }

    function cadastrarCardapio($nome) {
        $i = 0;
        if (isset($_POST['checkbox2'])) {

            foreach ($_POST['checkbox2'] as $checkbox) {
                $i++;
            }
            if ($i >= 6) {
                $query = "SELECT *FROM 	cardapiofinalizado WHERE cf_nome = '$nome'";
                $resultado1 = $this->getOne($query);
                if ($resultado1 > 0) {
                    echo "<script> swal('Cardapio já existente');</script>";
                } else {
                    $query = "INSERT INTO cardapiofinalizado(cf_nome)VALUES('$nome')";
                    $resultado2 = $this->execute($query);

                    $query = "SELECT *FROM cardapiofinalizado WHERE cf_nome = '$nome'";
                    $resultado3 = $this->getOne($query);

                    $id = $resultado3['cf_codigo'];
                    echo "<script> swal('Cadastrado com sucesso');</script>";


                    foreach ($_POST['checkbox2'] as $checkbox) {
                        $query = "INSERT INTO cardapio(cp_codigo,cf_codigo) VALUES($checkbox,$id)";
                        $resultado4 = $this->execute($query);
                    }
                    echo "<script> swal('Cadastrado com sucesso').then((value) => {location.assign('?cardapios')});</script>";
                }
            } else {
                echo "<script> swal('cadastre no minimo 6 pratos e no maximo 12')</script>";
            }
        } else {
            echo "<script> swal('cadastre no minimo 6 pratos e no maximo 12')</script>";
        }
    }

    function editarCardapio($id) {
        $query = "SELECT * FROM cardapiopronto";
        $resultado2 = $this->getAll($query);
        $n = 1;
        echo '<input value="' . $id . '" name="gambiarra" type="hidden">';
        foreach ($resultado2 as $row) {

            echo '<div class="row m-0 "><label for="checkbox' . $n . '[]" id="ola" class="row col-11 border"><div class="col-4"><img src="../fotos/pratos/' . $row['cp_foto'] . '" id="ajustarFOTODOPRATO"></div><div class="col-7 text-dark row"><div class="col-12 ">' . $row['cp_pratos'] . '</div> 
                                        <div class="col-12 border text-muted" id="ingCadCar">';
            $this->puxarPratosIngrediente($row['cp_codigo']);
            echo ' </div>
                                        </div>
                                        </label>';
            $query = "SELECT * FROM cardapio WHERE cp_codigo = " . $row['cp_codigo'] . " AND cf_codigo = $id";
            echo '<input class="col-1" type="checkbox" id="checkbox' . $n . '[]"';

            if ($resultado = $this->getOne($query)) {
                echo 'checked=""';
            }
            echo 'name="checkbox3[]" value="' . $row['cp_codigo'] . '"></div>';
            $n++;
        }
    }

    function AtualizarCardapio($nome, $id) {

        $i = 0;


        if (isset($_POST['checkbox3'])) {

            foreach ($_POST['checkbox3'] as $checkbox) {
                $i++;
            }
            if ($i >= 6) {
                $query = "DELETE FROM cardapio WHERE cf_codigo = $id";
                $resultado = $this->execute($query);

                $query = "DELETE FROM cardapiofinalizado WHERE cf_codigo = $id";
                $resultado = $this->execute($query);
                $query = "SELECT *FROM 	cardapiofinalizado WHERE cf_nome = '$nome'";
                $resultado1 = $this->getOne($query);
                if ($resultado1 > 0) {
                    echo "<script> swal('Cardapio já existente');</script>";
                } else {
                    $query = "INSERT INTO cardapiofinalizado(cf_nome)VALUES('$nome')";
                    $resultado2 = $this->execute($query);

                    $query = "SELECT *FROM cardapiofinalizado WHERE cf_nome = '$nome'";
                    $resultado3 = $this->getOne($query);

                    $id2 = $resultado3['cf_codigo'];



                    foreach ($_POST['checkbox3'] as $checkbox) {
                        $query = "INSERT INTO cardapio(cp_codigo,cf_codigo) VALUES($checkbox,$id2)";
                        $resultado4 = $this->execute($query);
                    }
                    echo "<script> swal('Atualizado com sucesso').then((value) => {location.assign('?cardapios')});</script>";
                }
            } else {
                echo "<script> swal('cadastre no minimo 6 pratos e no maximo 12')</script>";
            }
        } else {
            echo "<script> swal('cadastre no minimo 6 pratos e no maximo 12')</script>";
        }
    }

    function editPrato($id) {

        $query = "SELECT *FROM ingredientes";
        $resultado = $this->getAll($query);
        echo '<input value="' . $id . '" name="gambiarra2" type="hidden">';

        foreach ($resultado as $row) {

            echo '  <div class="custom-control custom-checkbox col-12 ">';
            $query2 = "SELECT *FROM cardapiopronto_ingredientes WHERE ing_codigo = {$row['ing_codigo']} AND cp_codigo = $id";
            echo '<input type="checkbox" class="custom-control-input" id="a' . $row['ing_codigo'] . '"';
            if ($resultado = $this->getOne($query2)) {
                echo 'checked=""';
            }


            $query = "SELECT ing_desc FROM ingredientes WHERE ing_codigo ={$row['ing_codigo']}";
            $resultado3 = $this->getOne($query);


            echo 'name="checkbox[]" value="' . $row['ing_codigo'] . '"  onclick="verificaIng2(' . $row['ing_codigo'] . ')">
           <label class="custom-control-label" for="a' . $row['ing_codigo'] . '">' . $resultado3['ing_desc'] . '</label>
                        </div>';
        }
    }

    function atualizarprato($nome, $id, $name) {
        if (isset($_POST['checkbox']) == null) {
            echo "<script> swal('Selecione no minimo um ingrediente').then((value) => {location.assign('?pratos')});</script>";
        } else {
            $query = "DELETE FROM cardapiopronto_ingredientes WHERE cp_codigo = $id";
            $resultado = $this->execute($query);

            if ($name != null) {



                $_UP['pasta'] = '../fotos/Pratos/';
                $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
                $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
                $_UP['erros'][0] = 'Não houve erro';
                $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
                $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                $_UP['erros'][4] = 'Não foi feito o upload do arquivo';



                if ($_FILES['fotoPratos']['error'] != 0) {
                    echo "<script> swal('Não foi possível fazer o upload'" . $_UP['erros'][$_FILES['fotoPratos']['error']] . ");</script>";
                }
                $extensao = @strtolower(end(explode('.', $_FILES['fotoPratos']['name'])));
                $arquivo = $_FILES['fotoPratos']['name'];
                $extensao = substr($arquivo, -3);
                if (array_search($extensao, $_UP['extensoes']) === false) {
                    echo "<script> swal('isto não é uma foto').then((value) => {location.assign('?pratos')});</script>";
                } else if ($_UP['tamanho'] < $_FILES['fotoPratos']['size']) {
                    echo "<script> swal('a foto enviado é muito grande, envie arquivos de até 2Mb').then((value) => {location.assign('?pratos')});</script>";
                } else {
                    if (isset($_POST['checkbox']) == null) {
                        echo "<script> swal('atualize no minimo 1 ingrediente').then((value) => {location.assign('?pratos')});</script>";
                    } else {
                        $nome_final = time() . ".$extensao";
                        $this->apagarFotoPrato($id);
                        if (move_uploaded_file($_FILES['fotoPratos']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                            $query = "SELECT * FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                            $resultado = $this->getOne($query);

                            $query = "UPDATE cardapiopronto SET cp_pratos = '$nome', cp_foto = '$nome_final' WHERE cp_codigo = $id";
                            $resultado = $this->execute($query);

                            $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                            $resultado = $this->getOne($query);
                            $idcardapio = $resultado['cp_codigo'];


                            foreach ($_POST['checkbox'] as $checkbox) {
                                $query = "INSERT INTO cardapiopronto_ingredientes(cp_codigo,ing_codigo) VALUES($idcardapio,$checkbox)";
                                $resultado = $this->execute($query);
                            }
                            echo "<script> swal('Alterado com sucesso!').then((value) => {location.assign('?pratos')});</script>";
                        } else {
                            echo "<script> swal('a foto enviado é muito grande, envie arquivos de até 2Mb').then((value) => {location.assign('?pratos')});</script>";
                        }
                    }
                }
            } else {
                if (isset($_POST['checkbox']) == null) {
                    echo "<script> swal('cadastre no minimo 1 ingrediente').then((value) => {location.assign('?pratos')});</script>";
                } else {
                    $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                    $resultado = $this->getOne($query);

                    $queryFoto = "SELECT cp_foto FROM cardapiopronto WHERE cp_codigo = $id";
                    $resultadoFoto = $this->getOne($queryFoto);
                    $foto = $resultadoFoto['cp_foto'];

                    $query = "UPDATE cardapiopronto SET cp_pratos = '$nome', cp_foto ='$foto'  WHERE cp_codigo = $id";
                    $resultado = $this->execute($query);


                    $query = "SELECT *FROM  cardapiopronto WHERE cp_pratos = '$nome'";
                    $resultado = $this->getOne($query);
                    $idcardapio = $resultado['cp_codigo'];

                    foreach ($_POST['checkbox'] as $checkbox) {
                        $query = "INSERT INTO cardapiopronto_ingredientes(cp_codigo,ing_codigo) VALUES($idcardapio,$checkbox)";
                        $resultado = $this->execute($query);
                    }

                    echo "<script> swal('Atualizado com sucesso!').then((value) => {location.assign('?pratos')});</script>";
                }
            }
        }
    }

    //partes das funções pesquisa 
    function pesquisaUsuario($pes) {

        $query = "SELECT * FROM usuario WHERE  usu_nome LIKE '%$pes%' OR usu_celular LIKE '%$pes%' OR usu_telefone LIKE '%$pes%'  OR usu_rua LIKE '%$pes%' OR usu_numero LIKE '%$pes%' ";
        $item = $this->getAll($query);

        if ($item == null) {
            echo "<script> swal('Nada foi encontrado!').then((value) => {location.assign('?usuarios')});</script>";
        } else {

            echo'<table class="table table-hover" id="tabelaPesquisa">';

            echo '<tbody>';

            foreach ($item as $row) {
                $query = "SELECT *FROM cidade WHERE cid_codigo = {$row['cid_codigo']}";
                $resultado = $this->getOne($query);

                if ($row['usu_nivelacesso'] == 1) {
                    $acesso = 'Cliente';
                    echo ' <tr>
                                <td id="table" class="bg-success">';
                    if ($row['usu_foto'] == "userFoto.jpg") {
                        echo '<div id="foto"><a href="../fotos/padrao/' . $row['usu_foto'] . '"><img src="../fotos/padrao/' . $row['usu_foto'] . '" id="ajustarImg"></a></div></td>';
                    } else {
                        echo '<div id="foto"><a href="../fotos/' . $row['usu_foto'] . '"><img src="../fotos/' . $row['usu_foto'] . '" id="ajustarImg"></a></div></td>';
                    }
                    echo ' 
                                <td class="bg-success">' . $row['usu_nome'] . '</td>
                                <td class="bg-success">' . $resultado['cid_nome'] . '</td>
                                <td class="bg-success">' . $acesso . '</td>
                                <td class="bg-success">' . $row['usu_telefone'] . '</td>
                                <td class="bg-success">' . $row['usu_celular'] . '</td>
                                <td class="bg-success">' . $row['usu_rua'] . '-N° ' . $row['usu_numero'] . '</td>';
                    if ($row['usu_status'] == 0) {
                        echo'<td class="bg-success"><div id="DefinirWH2"><a href="#" onclick="bloquearUsu(' . $row['usu_codigo'] . ')"><img src="../img/cadeadoAberto.png" id="bloquearDesbloquear" title="desbloqueado"/></a></div></td></td>';
                    } else {
                        echo'<td class="bg-success"><div id="DefinirWH2"><a href="#" onclick="desbloquearUsu(' . $row['usu_codigo'] . ')"><img src="../img/cadeadoFechado.png" id="excluir" title="bloqueado"/></a></div></td></td>';
                    }
                    echo '<td class="bg-success"><div id="DefinirWH"><a href="#" onclick="apagarUsu(' . $row['usu_codigo'] . ') "><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                              </tr>';
                } else {
                    $acesso = 'Error';
                }
            }
            echo '</tbody>
                    </table>';
        }
    }

    function pesquisaCidade($pes) {
        $query = "SELECT *FROM cidade  WHERE cid_nome LIKE '%$pes%' OR cid_estado LIKE '%$pes%'";
        $item = $this->getAll($query);
        if ($item == null) {
            echo "<script> swal('Nada foi encontrado!').then((value) => {location.assign('?cidade')});</script>";
        } else {
            echo'<table class="table table-hover">
                     
                      <tbody>';
            foreach ($item as $row) {
                echo '<tr>
                   <td class="bg-success">' . $row['cid_nome'] . '</td>
                   <td class="bg-success">' . $row['cid_estado'] . '</td>
                       <td class="bg-success"><div id="DefinirWH"><a href="" onclick="excluirCidade(' . $row['cid_codigo'] . ') "><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                   </tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function pesquisaIng($pes) {
        $query = "SELECT *FROM  ingredientes WHERE ing_desc LIKE '%$pes%'";
        $item = $this->getAll($query);
        if ($item == null) {
            echo "<script> swal('Nada foi encontrado!').then((value) => {location.assign('?ingrediente')});</script>";
        } else {
            echo'<table class="table text-white" >
                     
                      <tbody>';
            foreach ($item as $row) {
                echo '<tr>
                   <td class="bg-success"><div id="foto2" ><img src="../fotos/padrao/' . $row['ing_foto'] . '" id="ajustarImg"/></div></td>
                   <td class="bg-success">' . $row['ing_desc'] . '</td>
                       <td  class="bg-success"><div id="DefinirWH"><a href="" onclick="excluirIngrediente(' . $row['ing_codigo'] . ')"><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>
                   </tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function pesquisaAgenda($pes) {
        $query = "SELECT *FROM  agenda WHERE age_title LIKE '%$pes%' OR age_start LIKE '%$pes%'";
        $resultado = $this->getAll($query);
        if ($resultado == null) {
            echo "<script> swal('Nada foi encontrado!').then((value) => {location.assign('?Agenda')});</script>";
        } else {
            foreach ($resultado as $row) {
                $query = "SELECT usu_nome FROM usuario WHERE usu_codigo = {$row['usu_codigo']}";
                $nome = $this->getOne($query);
                echo '<div class="row border mt-2" id="agenda">';
                foreach ($nome as $row2) {
                    echo '<div class="col-3  nome">' . $row2 . '</div>';
                }
                $age = $row['age_start'];
                $data = date("d/m/Y H:i:s", strtotime($age));
                echo '<div class="col-3  nome">' . $row['age_title'] . '</div><div class="col-3 data">' . $data . '</div><div class="col-3 row "><div class="col-6  nome"><img src="../img/valido.png" id="valido"/></div><div class="col-6 nome"><img src="../img/invalido.png" id="valido"/></div></div></div>';
            }
        }
    }

    function pesquisaPratos($pes) {
        $query = "SELECT *FROM cardapiopronto WHERE cp_pratos LIKE '%$pes%'";
        $item = $this->getAll($query);
        if ($item == null) {
            echo "<script> swal('Nada foi encontrado!').then((value) => {location.assign('?pratos')});</script>";
        } else {
            echo'<table class="table  text-white" >
                   
                      <tbody>';
            $id = 0;
            foreach ($item as $row) {


                $query = "SELECT *FROM cardapiopronto WHERE cp_codigo = {$row['cp_codigo']}";
                $resultado2 = $this->getOne($query);
                echo'<tr>';

                if ($row['cp_codigo'] != $id) {
                    if ($resultado2['cp_foto'] == 'ingFoto.png') {
                        echo'
                       <td class="bg-success"><div id="foto2" ><img src="../fotos/Padrao/' . $resultado2['cp_foto'] . '" id="ajustarImg" /></a></div></td>
                       <td class="bg-success">' . $resultado2['cp_pratos'] . '</td>
                        <td class="bg-success">';
                    } else {
                        echo'
                       <td class="bg-success"><div id="foto2" ><a href="../fotos/Pratos/' . $resultado2['cp_foto'] . '"><img src="../fotos/Pratos/' . $resultado2['cp_foto'] . '" id="ajustarImg" /></div></td>
                       <td class="bg-success">' . $resultado2['cp_pratos'] . '</td>
                    <td class="bg-success">';
                    }

                    $query = "SELECT  `ing_codigo` FROM `cardapiopronto_ingredientes` WHERE cp_codigo = {$row['cp_codigo']}";
                    $item2 = $this->getAll($query);
                    // print_r($item2);

                    echo '
                    <div class="btn-group">
                      <button type="button" class="btn bg-white text-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ver
                      </button>
                  <div class="dropdown-menu">';
                    foreach ($item2 as $row2) {
                        $query = "SELECT *FROM ingredientes WHERE ing_codigo = {$row2['ing_codigo']}";
                        $resultado = $this->getOne($query);
                        echo '<a class="dropdown-item" href="#">' . $resultado['ing_desc'] . '</a>';
                    }
                    echo '</div>
                   
                        </td>
                        <td class="bg-success"> <a data-toggle="modal" data-dismiss="modal" data-target="#editarprato" data-codigo2="' . $row['cp_codigo'] . '" data-nome2="' . $resultado2['cp_pratos'] . '" data-foto="' . $resultado2['cp_foto'] . '"><img src="../img/editar.png" id="editar"></a> </td>
                       <td class="bg-success"> <div id="DefinirWH"><a href="" onclick="excluirprato(' . $row['cp_codigo'] . ')"><img src="../img/excluir.png" id="excluir" title="apagar"/></a></div></td>';
                    echo '';
                }
                $id = $row['cp_codigo'];
                echo '</tr>';
            }
            echo '</tbody>
                   </table>';
        }
    }

    function pesquisaCardapio($pes) {

        echo '<div class="container-fluid">       
                        <div class="row">
                            <div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
                                <div class="MultiCarousel-inner">';


        $query = "SELECT *FROM cardapiofinalizado WHERE cf_nome LIKE '%$pes%' ";
        $resultado = $this->getAll($query);
        $i = 0;
        $vet = array();
        foreach ($resultado as $row1) {
            $query = "SELECT *FROM cardapio WHERE cf_codigo = {$row1['cf_codigo']} ";
            $resultado2 = $this->getAll($query);
            foreach ($resultado2 as $row) {
                $query = "SELECT cf_nome FROM  cardapiofinalizado WHERE cf_Codigo = {$row['cf_codigo']}";
                $resultado = $this->getOne($query);
                if ($i == 0) {
                    echo '<div class="item" id="cardapiocontrole" data-value="' . $resultado['cf_nome'] . '">
                        
                        <div class="pad15">
                            <p class="lead">' . $resultado['cf_nome'] . '</p>';

                    $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                    $resultado2 = $this->getAll($query2);

                    foreach ($resultado2 as $row2) {
                        $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                        $resultado3 = $this->getOne($query3);
                        foreach ($resultado3 as $row3) {
                            echo '<p>' . $row3 . '</p>';
                        }
                    }


                    echo '<div class="dropdown" id="boxcardapio">
                            <button class="btn btn-secondary  text-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            °°°
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item"  href="?apagarCardapio=' . $row['cf_codigo'] . '">apagar</a>
                              <button class="dropdown-item" href="admin.php?cardapios&editarCardapio=' . $row['cf_codigo'] . '" data-toggle="modal" data-target="#editarCar" data-codigo="' . $row['cf_codigo'] . '" data-nome="' . $resultado['cf_nome'] . '" data-dismiss="modal">editar</button>
                            </div>
                          </div></div>   
                     </div>';
                } else {
                    $contaCardapio = 0;
                    for ($c = 0; $c < count($vet); $c++) {
                        if ($vet[$c] == $row['cf_codigo']) {
                            $contaCardapio++;
                        }
                    }
                    if ($contaCardapio == 0) {
                        echo '<div class="item" id="cardapiocontrole" data-value="' . $resultado['cf_nome'] . '">
                        <div class="pad15">
                            <p class="lead" data="' . $resultado['cf_nome'] . ' id="ola">' . $resultado['cf_nome'] . '</p>';

                        $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                        $resultado2 = $this->getAll($query2);

                        foreach ($resultado2 as $row2) {
                            $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                            $resultado3 = $this->getOne($query3);
                            foreach ($resultado3 as $row3) {
                                echo '<p>' . $row3 . '</p>';
                            }
                        }


                        echo '<div class="dropdown" id="boxcardapio">
                            <button class=" btn btn-secondary  text-danger  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            °°°
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="?apagarCardapio=' . $row['cf_codigo'] . '">apagar</a>
                              <button class="dropdown-item"   href="admin.php?cardapios&editarCardapio=' . $row['cf_codigo'] . '" data-toggle="modal" data-target="#editarCar" data-codigo="' . $row['cf_codigo'] . '" data-nome="' . $resultado['cf_nome'] . '" data-dismiss="modal">editar</button>
                            </div>
                          </div> </div>
                        
                     </div>';
                    }
                }
                $vet[$i] = $row['cf_codigo'];
                $i++;
            }
        }





        echo '</div>
              
                  </div>
              </div>
          </div>';
        //67 993387244
    }

    function buscaAgenda() {
        $query = "SELECT *FROM agenda";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function buscaAgendaFull() {
        $query = "SELECT *FROM agenda WHERE age_status != 1";
        $resultado = $this->getAll($query);
        return $resultado;
    }

    function cardapioAgenda() {
        $query = "SELECT *FROM cardapiofinalizado";
        $resultado = $this->getAll($query);
        foreach ($resultado as $row) {

            echo ' <option value="' . $row['cf_codigo'] . '">' . $row['cf_nome'] . '</option>';
        }
    }

    function exibirCarpadio2() {
        $vet = array();
        $query = "SELECT *FROM cardapio";
        $resultado = $this->getAll($query);
        $item = $resultado;
        $i = 0;
        foreach ($item as $row) {

            $query = "SELECT cf_nome FROM  cardapiofinalizado WHERE cf_Codigo = {$row['cf_codigo']}";
            $resultado = $this->getOne($query);

            if ($i == 0) {

                echo '<div id="cardapios" class="col-2">
                        
                        <div>
                            <p class="lead" id="titleCar">' . $resultado['cf_nome'] . '</p>';

                $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                $resultado2 = $this->getAll($query2);

                foreach ($resultado2 as $row2) {
                    $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                    $resultado3 = $this->getOne($query3);
                    foreach ($resultado3 as $row3) {
                        echo '<p>' . $row3 . '</p>';
                    }
                }


                echo '
                          </div>   
                     </div>';
            } else {
                $contaCardapio = 0;
                for ($c = 0; $c < count($vet); $c++) {
                    if ($vet[$c] == $row['cf_codigo']) {
                        $contaCardapio++;
                    }
                }
                if ($contaCardapio == 0) {
                    echo '<div id="cardapios" class="col-2">
                        
                        <div>
                            <p class="lead" id="titleCar">' . $resultado['cf_nome'] . '</p>';

                    $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                    $resultado2 = $this->getAll($query2);

                    foreach ($resultado2 as $row2) {
                        $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                        $resultado3 = $this->getOne($query3);
                        foreach ($resultado3 as $row3) {
                            echo '<p>' . $row3 . '</p>';
                        }
                    }


                    echo '
                          </div>   
                     </div>';
                }
            }
            $vet[$i] = $row['cf_codigo'];
            $i++;
        }
    }

    function exibecar4() {
        $vet = array();
        $query = "SELECT *FROM cardapio";
        $resultado = $this->getAll($query);
        $item = $resultado;
        $i = 0;
        foreach ($item as $row) {

            $query = "SELECT cf_nome FROM  cardapiofinalizado WHERE cf_Codigo = {$row['cf_codigo']}";
            $resultado = $this->getOne($query);

            if ($i == 0) {

                echo '<div class="item" id="cardapioControle">
                        
                        <div class="pad15" id="ola">
                        <input type="radio" name="meuCar" value="' . $row['cf_codigo'] . '">
                            <p class="lead">' . $resultado['cf_nome'] . '</p>';

                $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                $resultado2 = $this->getAll($query2);

                foreach ($resultado2 as $row2) {
                    $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                    $resultado3 = $this->getOne($query3);
                    foreach ($resultado3 as $row3) {
                        echo '<p>' . $row3 . '</p>';
                    }
                }


                echo '</div>   
                     </div>';
            } else {
                $contaCardapio = 0;
                for ($c = 0; $c < count($vet); $c++) {
                    if ($vet[$c] == $row['cf_codigo']) {
                        $contaCardapio++;
                    }
                }
                if ($contaCardapio == 0) {
                    echo '<div class="item" id="cardapioControle">
                        <div class="pad15" id="ola">
                        <input type="radio" name="meuCar" value="' . $row['cf_codigo'] . '">
                            <p class="lead">' . $resultado['cf_nome'] . '</p>';

                    $query2 = "SELECT *FROM cardapio WHERE cf_codigo ={$row['cf_codigo']} ";
                    $resultado2 = $this->getAll($query2);

                    foreach ($resultado2 as $row2) {
                        $query3 = "SELECT cp_pratos FROM cardapiopronto WHERE cp_codigo = {$row2['cp_codigo']}";
                        $resultado3 = $this->getOne($query3);
                        foreach ($resultado3 as $row3) {
                            echo '<p>' . $row3 . '</p>';
                        }
                    }


                    echo '</div>
                        
                     </div>';
                }
            }
            $vet[$i] = $row['cf_codigo'];
            $i++;
        }
    }

    function agendar($id, $car, $age) {
        $dataAtual = date("Y-m-d H:i:s");
        $dataUsuario = date("Y-m-d H:i:s", strtotime($age));
        if ($dataUsuario >= $dataAtual) {
            $query = "SELECT age_start,age_end FROM agenda";
            $resultado = $this->getAll($query);
            $a = 0;
            foreach ($resultado as $row) {

                if (($dataUsuario >= $row['age_start']) && ($dataUsuario <= $row['age_end'])) {
                    $a++;
                }
            }


            if ($a == 0) {
                $query = "INSERT INTO agenda(age_title, age_color, age_start, age_end, age_status,age_confirma,usu_codigo,cf_codigo) VALUES ('Requisitado','#dc3545','$dataUsuario','$dataUsuario',0,0,$id,$car)";
                $resultado2 = $this->execute($query);
                echo "<script> swal('Requisitado com sucesso, aguarde a confirmação!').then((value) => {location.assign('index.php')});</script>";
            } else {
                echo "<script> swal('Ja existe uma requisição com essa data :(').then((value) => {location.assign('index.php')});</script>";
            }
        } else {
            echo "<script> swal('Data invalida!').then((value) => {location.assign('index.php')});</script>";
        }
    }

    function Agendas() {
        $query = "SELECT *FROM agenda";
        $resultado = $this->getAll($query);
        echo '<div class="row border mt-2" id="agenda">
            <div class="col-2  arruma ml-0">Nome</div>
            <div class="col-2 arruma pl-4">Cardápio ou evento</div>
           <div class="col-2  arruma pl-4">Situação</div>
           <div class="col-2  arruma pl-5">data</div>
            <div class="col-1 arruma pl-5">Validar</div>
           <div class="col-1 arruma pl-5">Invalidar</div>
            <div class="col-2 arruma pl-5">Excluir</div>
            
        </div>';
        if ($resultado == null) {
            echo '<div class="row border mt-2 p-0" id="agenda">Nenhuma agenda cadastrada</div>';
        } else {


            foreach ($resultado as $row) {


                $query = "SELECT usu_nome FROM usuario WHERE usu_codigo = {$row['usu_codigo']}";
                $nome = $this->getOne($query);

                echo '<div class="row border mt-2" id="agenda">';

                foreach ($nome as $row2) {
                    echo '<div class="col-2  nome" title="nome">' . $row2 . '</div>';
                }
                $query = "SELECT cf_nome FROM cardapiofinalizado WHERE cf_codigo = {$row['cf_codigo']}";
                $cardapio = $this->getOne($query);
                if ($cardapio == null) {
                    echo '<div class="col-2  nome" title="cardapio">EVENTO</div>';
                } else {
                    foreach ($cardapio as $row3) {
                        echo '<div class="col-2  nome" title="cardapio">' . $row3 . '</div>';
                    }
                }

                $age = $row['age_start'];
                $age2 = $row['age_end'];
                $data = date("d/m/Y H:i:s", strtotime($age));
                if ($row['cf_codigo'] == null) {
                    $age = $row['age_start'];
                    $age2 = $row['age_end'];
                    $data = date("d/m/Y", strtotime($age));
                    $data2 = date("d/m/Y", strtotime($age2));
                    echo '<div class="col-2  nome" title="situação">' . $row['age_title'] . '</div>';
                    echo'<div class="col-3 data" title="Data">' . $data . ' a ' . $data2 . '</div>';
                    echo '<div class="col-3 row ">';
                    echo'<div class="col-4  nome" title="validar">';
                } else {
                    echo '<div class="col-2  nome" title="situação">' . $row['age_title'] . '</div>';
                    echo'<div class="col-3 data" title="Data">' . $data . '</div>';
                    echo '<div class="col-3 row ">';
                    echo'<div class="col-4  nome" title="validar">';
                }

                if (($row['age_title'] != 'Requisitado') && ($row['age_title'] != 'Agendado') && ($row['age_title'] != 'rejeitado')) {
                    
                } else {
                    if ($row['age_status'] != 2) {
                        echo'<img src="../img/valido.png" id="valido" onclick="validar(' . $row['age_codigo'] . ')"/>';
                    }
                    echo '</div>';
                    echo'<div class="col-4 nome" title="rejeitar">';
                    if ($row['age_status'] != 1) {
                        echo'<img src="../img/invalido.png" id="valido" onclick="invalidar(' . $row['age_codigo'] . ')"/>';
                    } else {
                        
                    }
                }

                echo'</div><div class="col-4 nome"><img src="../img/excluir.png" id="valido" onclick="excluirAgenda(' . $row['age_codigo'] . ')"/></div></div></div>';
            }
        }
    }

    function evento() {

        echo '<form method="POST"><div class="row mt-2" id="agenda2">
                <div class="col-12 border"><h3 class="text-success">Criar evento</h3></div>
                <div class="col-6">
                <label>Titulo</lebel>
                    <input type="text" name="evento" id="inputEvento">
                </div>
                <div class="col-6 ">
                    <label>Data início</lebel> <input type="datetime-local" name="dataEvento" id="inputEvento">
                </div>
                <div class="col-6 ">
                   
                </div>
                <div class="col-6 ">
                    <label>Data final</lebel> <input type="datetime-local" name="dataEventoFinal" id="inputEvento">
                </div>
                <div class="col-12 border">
                    <input type="submit" name="enviarEven" id="inputEven" class="mt-1">
                </div>
                
        </div></form>';
    }

    function cadastrarEvento($age, $age2, $title, $id) {
        $dataAtual = date("Y-m-d H:i:s");
        $dataUsuario = date("Y-m-d H:i:s", strtotime($age));
        $dataUsuario2 = date("Y-m-d H:i:s", strtotime($age2));
        if (($dataUsuario >= $dataAtual) && ($dataUsuario2 >= $dataUsuario)) {
            $query = "INSERT INTO agenda(age_title, age_color, age_start, age_end, age_status,age_confirma,usu_codigo) VALUES ('$title','#FFEFDB','$dataUsuario','$dataUsuario2',0,0,$id)";
            $resultado2 = $this->execute($query);

            echo "<script> swal('Evento cadastrado!').then((value) => {location.assign('?Eventos')});</script>";
        } else {
            echo "<script> swal('Data invalida!').then((value) => {location.assign('?Eventos')});</script>";
        }
    }

    function invalidar($id, $des) {
        $query = "SELECT age_status,usu_codigo FROM agenda WHERE age_codigo = $id";
        $resultado = $this->getOne($query);
        if ($resultado['age_status'] == 1) {
            echo "<script> swal('Ja foi rejeitado!').then((value) => {location.assign('?Agendas')});</script>";
        } else {
            $query = "UPDATE agenda SET age_status = 1 WHERE age_codigo = $id";
            $this->execute($query);
            $query = "UPDATE agenda SET age_desc = '$des' WHERE age_codigo = $id";
            $this->execute($query);
            $query = "UPDATE agenda SET age_title = 'rejeitado' WHERE age_codigo = $id";
            $this->execute($query);
            $query1 = "UPDATE agenda SET age_confirma  = 0 WHERE age_codigo = $id";
            $this->execute($query1);
            echo "<script> swal('Pronto!').then((value) => {location.assign('?Agendas')});</script>";
        }
        /* $email = "SELECT usu_email FROM usuario WHERE {$resultado['usu_codigo']} ";
          $to = "caio.nerd.0@gmail.com";
          $subject = "Sua requisição de agendamento foi confirmada";
          $message = "<strong>validado</strong>";
          $header = "MIME-Version:1.0\n";
          $header = "Content-type: text/html; charset=iso-8859-1\n";
          $header = "From: $email\n";
          mail($to, $subject, $message,$header); */
    }

    function validar($id) {
        $query = "SELECT age_status FROM agenda WHERE age_codigo = $id";
        $resultado = $this->getOne($query);
        if ($resultado['age_status'] == 2) {
            echo "<script> swal('Já estava validado!').then((value) => {location.assign('?Agendas')});</script>";
        } else {
            $query = "UPDATE agenda SET age_status = 2 WHERE age_codigo = $id";
            $this->execute($query);

            $query = "UPDATE agenda SET age_title = 'Agendado' WHERE age_codigo = $id";
            $this->execute($query);
            $query = "UPDATE agenda SET age_color  = '#99CC32' WHERE age_codigo = $id";
            $this->execute($query);

            $query1 = "UPDATE agenda SET age_confirma  = 0 WHERE age_codigo = $id";
            $this->execute($query1);
            
            
           echo "<script> swal('Pronto!').then((value) => {location.assign('?Agendas')});</script>";
        }
    }

    function excluirAgenda($id) {

        $query = "DELETE  FROM agenda WHERE age_codigo =$id";
        $this->execute($query);

        echo "<script> swal('Pronto!').then((value) => {location.assign('?Agendas')});</script>";
    }

    function notificar($id) {
        $query = "SELECT *FROM agenda WHERE usu_codigo = $id";
        $resultado = $this->getAll($query);

        if ($resultado == null) {
            echo 'nenhuma notificação';
        } else {
            foreach ($resultado as $row) {
                $age = $row['age_start'];
                $date = date("Y/m/d H:i:s", strtotime($age));
                if ($row['age_confirma'] == 0) {
                    if (($row['age_status'] == 1) && ($row['age_title'] == 'rejeitado')) {
                        echo '<div class="col-12 border mt-2 border-danger">sua requisição de data(' . $date . ')foi rejeitada pois, ' . $row['age_desc'] . ' <img src="includes/img/invalido.png" id="excluirNot" onclick="apagarNot(' . $row['age_codigo'] . ')"/></div>';
                    }
                    if (($row['age_status'] == 2) && ($row['age_title'] == 'Agendado')) {
                        echo '<div class="col-12 border mt-2 border-success">sua requisição de data(' . $date . ')foi aceita entre em contato  <img src="includes/img/invalido.png" id="excluirNot" onclick="apagarNot(' . $row['age_codigo'] . ')"/></div>';
                    }
                    if (($row['age_status'] == 0) && ($row['age_title'] == 'Requisitado')) {
                        echo '<div class="col-12 border mt-2 border-info">sua requisição de data(' . $date . '),ainda não foi analisada <img src="includes/img/invalido.png" id="excluirNot" onclick="apagarNot(' . $row['age_codigo'] . ')"/></div>';
                    }
                    if (($row['age_title'] != 'Requisitado') && ($row['age_title'] != 'Agendado') && ($row['age_title'] != 'rejeitado')) {
                        echo '<div class="col-12 border mt-2 border-info">você tem um evento no dia (' . $date . ') <img src="includes/img/invalido.png" id="excluirNot" onclick="apagarNot(' . $row['age_codigo'] . ')"/></div>';
                    }
                }else{
                    echo 'error';
                }
            }
        }
    }

    function updateSenha($senhaAtual, $senhaNova, $senhaConfirmada, $id) {
        if ($senhaNova == $senhaConfirmada) {
            $query = "SELECT usu_senha FROM usuario WHERE usu_codigo = $id";
            $resultado = $this->getOne($query);
            //echo $query;
            $senhaAtual = md5($senhaAtual);
            if ($resultado['usu_senha'] == $senhaAtual) {
                $senhaNova = md5($senhaConfirmada);
                if ($senhaNova == $resultado['usu_senha']) {
                    $_SESSION['errorUpload'] = 'Nada foi alterado!';
                } else {
                    $query = "UPDATE usuario SET usu_senha = '$senhaNova' WHERE usu_codigo = $id";
                    $resultado = $this->execute($query);
                    //echo $query;
                    $_SESSION['errorUpload'] = 'Salvo!';
                }
            } else {
                $_SESSION['errorUpload'] = 'Senha atual incorreta!';
            }
        } else {
            $_SESSION['errorUpload'] = 'Senha incompativeis';
        }
    }

    function buscaNot($id) {
        $query = "SELECT *FROM agenda WHERE usu_codigo = $id AND age_confirma = 0";
        $resultado = $this->getAll($query);
        $a = 0;
        foreach ($resultado as $row) {
            $a++;
        }
        return $a;
    }

    function apagarNot($id) {
        $query = "UPDATE agenda SET age_confirma = 1 WHERE age_codigo = $id";
        $resultado = $this->execute($query);
       echo "<script> swal('Excluido!').then((value) => {location.assign('index.php')});</script>";
    }

//1 invalido
//0 pendente
//2 valido    
}

if (isset($_GET['id'])) {
    $funcao = new Funcao();
    $funcao->editarCardapio($_GET['id']);
}
if (isset($_GET['id2'])) {
    $funcao = new Funcao();
    $funcao->editPrato($_GET['id2']);
}
?>