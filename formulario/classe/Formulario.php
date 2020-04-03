<?php

require_once 'Crud.php';

class Formulario extends Crud{

    protected $table = 'formulario';
    protected $table2 = 'historico_resposta';
    protected $id; 
    protected $data_envio;
    protected $nome;
    protected $email;
    protected $cpfcnpj;
    protected $tema_comentario;
    protected $tipo_comentario;
    protected $anexo;
    protected $protocolo;
    protected $status;
    protected $numero_ordem;
    protected $texto;


    public function setOrdem($numero_ordem){
        $this->numero_ordem = $numero_ordem;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
   
   
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

    public function insert_historio_resposta(){   
        
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


    
} 