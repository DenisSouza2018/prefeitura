<?php

require_once 'Crud.php';

class Formulario extends Crud{

    protected $table = 'formulario';
    protected $id; 
    protected $data_envio;
    protected $nome;
    protected $email;
    protected $cpfcnpj;
    protected $tema_comentario;
    protected $tipo_comentario;
    protected $texto_comentario;
    protected $anexo;
    protected $protocolo;
    protected $status; 
    
    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus($status){
        return $this->status;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId($id){
        return $this->id;
    }

    public function setDataEnvio($data_envio){
        $this->data_envio = $data_envio;
    }

    public function getDataEnvio($data_envio){
        return $this->data_envio;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome($nome){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail($email){
        return $this->email;
    }

    public function setCpfcnpj($cpfcnpj){
        $this->cpfcnpj = $cpfcnpj;
    }

    public function getCpfcnpj($cpfcnpj){
        return $this->cpfcnpj;
    }

    public function setTemaComentario($tema_comentario){
        $this->tema_comentario = $tema_comentario;
    }

    public function getTemaComentario($tema_comentario){
        return $this->tema_comentario;
    }

    public function setTipoComentario($tipo_comentario){
        $this->tipo_comentario = $tipo_comentario;
    }

    public function getTipoComentario($tipo_comentario){
        return $this->tipo_comentario;
    }

    public function getTextoComentario($texto_comentario){
        return $this->texto_comentario;
    }

    public function setTextoComentario($texto_comentario){
        $this->texto_comentario = $texto_comentario;
    }

    public function getAnexo($anexo){
        return $this->anexo;
    }

    public function setAnexo($anexo){
        $this->anexo = $anexo;
    }

    public function setProtocolo($protocolo){
        $this->protocolo = $protocolo;
    }

    public function getProtocolo($protocolo){
        return $this->protocolo;
    }

    public function insert(){   
        
        
        $sql = "INSERT INTO $this->table (id,data_envio,nome,email,cpf_cnpj,tema_comentario,tipo_comentario,texto_comentario,anexo,protocolo,status)
        VALUES (:id,:data_envio,:nome,:email,:cpfcnpj,:tema_comentario,:tipo_comentario,:texto_comentario,:anexo,:protocolo,:status)";

        
        $stmt = DB::prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':data_envio', $this->data_envio);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cpfcnpj', $this->cpfcnpj);
        $stmt->bindParam(':tema_comentario', $this->tema_comentario);
        $stmt->bindParam(':tipo_comentario', $this->tipo_comentario);
        $stmt->bindParam(':texto_comentario', $this->texto_comentario);
        $stmt->bindParam(':anexo', $this->anexo);
        $stmt->bindParam(':protocolo', $this->protocolo);
        $stmt->bindParam(':status', $this->status);

        

        return $stmt->execute();

        
    }


    
} 