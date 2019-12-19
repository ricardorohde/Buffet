<?php


class login extends Conexao{
    private $email;
    private $senha;
    
    function __construct($email,$senha){
        parent::__construct();
        $senhaCriptografada =  md5($senha);
        $this->email = $email;
        $this->senha = $senhaCriptografada;
        $this->valida();
    }
    function valida(){
       $query = "SELECT *FROM usuario WHERE usu_email = '{$this->email}' AND usu_senha = '{$this->senha}'";
       $resultado = $this->getOne($query);
       
       if($resultado > 0 ){
           if($resultado['usu_status'] == 0){
                $this->sessao($resultado);
                $_SESSION['success'] = 1;
           }else{
               $_SESSION['blok'] = 1;
               header('Location: ../../index.php');
           }
               
       }else{
           $_SESSION['error'] = 1;
       }
    }
    function sessao($cliente){
        $codigo      = $cliente['usu_codigo'];
        $nome        = $cliente['usu_nome'];
        $nivelAcesso = $cliente['usu_nivelacesso'];
        $sexo        = $cliente['usu_sexo'];
        $email       = $cliente['usu_email'];
        $telefone    = $cliente['usu_telefone'];
        $celular     = $cliente['usu_celular'];
        $rua         = $cliente['usu_rua'];
        $numero      = $cliente['usu_numero'];
        $foto        = $cliente['usu_foto'];

        
        
        $_SESSION['codigo']      = $codigo;
        $_SESSION['nome']        = $nome;
        $_SESSION['nivelAcesso'] = $nivelAcesso;
        $_SESSION['sexo']        = $sexo;
        $_SESSION['verifica']    = 1;
        $_SESSION['email']      = $email;
        $_SESSION['telefone']      = $telefone;
        $_SESSION['celular']      = $celular;
        $_SESSION['rua']          = $rua;
        $_SESSION['numero']      =$numero;
        $_SESSION['nomeDafoto']      = $foto;
        header('Location: index.php');
    }
}
?>
