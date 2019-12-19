<?php

class updateFoto extends Conexao {

    private $nome;
    private $email;
    private $telefone;
    private $celular;
    private $rua;
    private $numero;
    private $foto;

    function __construct($foto, $nome, $email, $telefone, $celular, $rua, $numero) {
        parent::__construct();
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;
        $this->rua = $rua;
        $this->numero = $numero;
        $this->foto = $foto;
        $this->update();
    }

    function update() {
        $id = $_SESSION['codigo'];
        $query = "UPDATE usuario SET usu_foto ='{$this->foto}',usu_nome = '{$this->nome}',usu_email = '{$this->email}',usu_telefone = '{$this->telefone}',usu_celular = '{$this->celular}',usu_rua ='{$this->rua}',usu_numero = '{$this->numero}' WHERE usu_codigo = $id";
        $resultado = $this->execute($query);
    }
    
   

}
