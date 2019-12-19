<!DOCTYPE html>
<?php
session_start();
include_once './includes/classes/Conexao.php';
include_once './includes/classes/Login.php';
include_once './includes/classes/Cadastro.php';
include_once './includes/classes/Funcao.php';
include_once './includes/classes/updateFoto.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="includes/sweet/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
        if (isset($_SESSION['Destruir']) == 1) {
            $encerrarSecao = new funcao();
            $sair = $encerrarSecao->sair();
            header('Location:index.php');
        }
        if (isset($_POST['entrar'])) {
            $login = new Login($_POST['email'], $_POST['senha']);
            header('Location: index.php');
        }

        if (isset($_POST['cadastrar'])) {
            $cadastro = new cadastro($_POST['sexo'], $_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['celular']
                    , $_POST['telefone'], $_POST['rua'], $_POST['numero'], $_POST['cidade']);
            header('Location:index.php');
        }

        if (isset($_POST['update'])) {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $celular = $_POST['celular'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $arquivo = $_FILES['Filedata'];
            $name = $_FILES['Filedata']['name'];

            $nomeSessao = $_SESSION['nome'];
            $emailSessao = $_SESSION['email'];
            $telefoneSessao = $_SESSION['telefone'];
            $celularSessao = $_SESSION['celular'];
            $ruaSessao = $_SESSION['rua'];
            $numeroSessao = $_SESSION['numero'];
            $_SESSION['verificacaoDefoto'] = false;

            $obejtoFuncao = new funcao();
            $verificacao = $obejtoFuncao->VerificaFoto($name);


            if (($nome == "$nomeSessao") && ($email == "$emailSessao") && ($telefone == "$telefoneSessao") && ($celular == "$celularSessao") && ($rua == "$ruaSessao") && ($numero == "$numeroSessao") && ($name == "")) {
                $_SESSION['errorUpload'] = 'Nada Foi Alterado';
            } else {

                if ($name != "") {
                    $_UP['pasta'] = 'includes/fotos/';
                    $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
                    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

                    $_UP['erros'][0] = 'Não houve erro';
                    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
                    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
                    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

                    if ($_FILES['Filedata']['error'] != 0) {
                        $_SESSION['errorUpload'] = "Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['Filedata']['error']];
                    }
                    $extensao = @strtolower(end(explode('.', $_FILES['arquivo']['name'])));
                    $arquivo = $_FILES['Filedata']['name'];
                    $extensao = substr($arquivo, -3);

                    if (array_search($extensao, $_UP['extensoes']) === false) {
                        $_SESSION['errorUpload'] = "Isto não é uma foto :(";
                    } else if ($_UP['tamanho'] < $_FILES['Filedata']['size']) {
                        $_SESSION['errorUpload'] = "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
                    } else {
                        if ($_SESSION['verificacaoDefoto'] == true) {
                            $nome_final = time() . ".$extensao";
                        } else {
                            // Mantém o nome original do arquivo
                            $nome_final = $_FILES['Filedata']['name'];
                        }
                        $apagarFotoantiga = $obejtoFuncao->ApagaFotoAntiga();
                        if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                            $_SESSION['errorUpload'] = "Salvo Com sucesso";
                            $_SESSION['nome'] = $nome;
                            $_SESSION['email'] = $email;
                            $_SESSION['telefone'] = $telefone;
                            $_SESSION['celular'] = $celular;
                            $_SESSION['rua'] = $rua;
                            $_SESSION['numero'] = $numero;
                            $_SESSION['nomeDafoto'] = $nome_final;
                            $update = new updateFoto($nome_final, $nome, $email, $telefone, $celular, $rua, $numero);
                        } else {
                            $_SESSION['errorUpload'] = 'Não foi possível enviar este arquivo, tente novamente';
                        }
                    }
                } else {
                    $fotoUser = $_SESSION['nomeDafoto'];
                    $update = new updateFoto($fotoUser, $nome, $email, $telefone, $celular, $rua, $numero);
                    $_SESSION['errorUpload'] = "Salvo Com sucesso";
                    $_SESSION['nome'] = $nome;
                    $_SESSION['email'] = $email;
                    $_SESSION['telefone'] = $telefone;
                    $_SESSION['celular'] = $celular;
                    $_SESSION['rua'] = $rua;
                    $_SESSION['numero'] = $numero;
                }
            }

            header('Location:index.php');
        }
        if (isset($_POST['updateSenha'])) {
            $senhaAtual = $_POST['senhaAtual'];
            $senhaNova = $_POST['senhaNova'];
            $senhaConfirmada = $_POST['senhaConfirmada'];


            $id = $_SESSION['codigo'];
            $obejto = new funcao;
            $atualizarSenha = $obejto->updateSenha($senhaAtual, $senhaNova, $senhaConfirmada, $id);

            header('Location:index.php');
        }
        ?>
    </body>
</html>
