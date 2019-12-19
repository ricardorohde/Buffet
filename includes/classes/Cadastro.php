<?php

class cadastro extends Conexao{
    private $sexo;
    private $nome;
    private $email;
    private $senha;
    private $celular;
    private $telefone;
    private $rua;
    private $numero;
    private $cidade;
            
    function __construct($sexo,$nome ,$email,$senha,$celular,$telefone,$rua,$numero,$cidade){
        parent::__construct();
        $senhaCriptografada =  md5($senha);
        
        $this->sexo = $sexo;
        $this->nome = $nome;
         $this->email = $email;
        $this->senha = $senhaCriptografada ;
        $this->celular = $celular;
        $this->telefone = $telefone;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->cadastrar();
    }
    function cadastrar (){
        if($this->nome != null){
        $query = "SELECT * FROM usuario WHERE usu_email = '{$this->email}' ";
        
        $resultado = $this->getOne($query);
        
        if($resultado > 0){
            echo "error";
            $_SESSION['errorCad'] = 1;
        }else{
            $query = "INSERT INTO usuario(usu_nome, usu_foto, usu_celular, usu_email, usu_senha, usu_sexo, usu_telefone, usu_nivelacesso, usu_status, usu_rua, usu_numero, cid_codigo)
                     VALUES ('{$this->nome}','userFoto.jpg','{$this->celular}','{$this->email}','{$this->senha}','{$this->sexo}','{$this->telefone}',1,0,'{$this->rua}','{$this->numero}',{$this->cidade})";
            $cadastrar = $this->execute($query);
            $_SESSION['cadastrado'] =1;
            
             
         }
        
        
        
        }
    }
}
?>
