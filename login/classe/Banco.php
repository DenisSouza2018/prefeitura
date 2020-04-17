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

    public function  valida(){
       
        $db = mysqli_connect('localhost','root','','db_prefeitura')
        or die('Error connecting to MySQL server.');
        $query = "select true from usuario where email = '$this->email';";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $valida = $row['TRUE'];
        if($valida != null){
            $query = "SELECT true FROM `usuario` where email = '$this->email' && senha = $this->senha";
            mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            $valida = $row['TRUE'];
            echo 'validado';

            header('Location:/prefeitura/login/logado.php');

        }
      


    }
    
    public function insert(){   
        
        $sql = "INSERT INTO $this->table (id,data_envio,nome,email,cpf_cnpj,tema_comentario,tipo_comentario,anexo,protocolo,status)
        VALUES (:id,:data_envio,:nome,:email,:cpfcnpj,:tema_comentario,:tipo_comentario,:anexo,:protocolo,:status); ";
      
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':data_envio', $this->data_envio);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
        $stmt->bindParam(':tema_comentario', $this->tema_comentario);
        $stmt->bindParam(':tipo_comentario', $this->tipo_comentario);
        $stmt->bindParam(':anexo', $this->anexo);
        $stmt->bindParam(':protocolo', $this->protocolo);
        $stmt->bindParam(':status', $this->status);

        return $stmt->execute();
    }

    public function insert_historico_resposta(){   
        
        $db = mysqli_connect('localhost','root','','db_prefeitura')
        or die('Error connecting to MySQL server.');
        $query = "select id FROM formulario ORDER BY id DESC LIMIT 1; ";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        $this->numero_ordem =$row['id'];
        $sql = "INSERT INTO $this->table2 (id,numero_ordem,texto,data_envio,protocolo_historico,nome)
        VALUES (:id,:numero_ordem,:texto,:data_envio,:protocolo,:nome);";
               
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':numero_ordem', $this->numero_ordem);
        $stmt->bindParam(':texto', $this->texto);
        $stmt->bindParam(':data_envio', $this->data_envio);
        $stmt->bindParam(':protocolo', $this->protocolo);
        $stmt->bindParam(':nome', $this->nome);
       
        return $stmt->execute();
    }

    public function insert_ideias(){   
        
        $sql = "INSERT INTO $this->table3(id,data_envio,nome,email,cpf,tel,protocolo,status)
        VALUES (:id,:data_envio,:nome,:email,:cpf,:tel,:protocolo,:status); ";
      
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':data_envio', $this->data_envio);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':protocolo', $this->protocolo);
        $stmt->bindParam(':status', $this->status);

        return $stmt->execute();
    }

    public function insert_historico_ideias(){   
        
        $db = mysqli_connect('localhost','root','','db_prefeitura')
        or die('Error connecting to MySQL server.');
        $query = "select id FROM ideias ORDER BY id DESC LIMIT 1; ";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);

        $this->numero_ordem =$row['id'];
        $sql = "INSERT INTO $this->table4 (id,numero_ordem,texto,data_envio,protocolo_historico,nome)
        VALUES (:id,:numero_ordem,:texto,:data_envio,:protocolo,:nome);";
               
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':numero_ordem', $this->numero_ordem);
        $stmt->bindParam(':texto', $this->texto);
        $stmt->bindParam(':data_envio', $this->data_envio);
        $stmt->bindParam(':protocolo', $this->protocolo);
        $stmt->bindParam(':nome', $this->nome);
       
        return $stmt->execute();
    }

    
} 