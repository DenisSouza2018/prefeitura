<?php

require_once 'Crud.php';

class Banco extends Crud{

    protected $table = 'usuario';
    protected $id; 
    protected $login;
    protected $senha;
    protected $email;


    public function setCpf($id){
        $this->id = $id;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function setEmail($email){
        $this->email = $email;
    }


    
} 