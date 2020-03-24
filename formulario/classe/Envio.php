<?php
    require_once 'Crud.php';
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){
        
        require_once 'C:/xampp/htdocs/prefeitura/formulario/classe/'. $class_name . '.php';
    }

    
    $envio = new Formulario();
    
    if(isset($_POST['ok'])) {
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
        $cpfcnpj = filter_input(INPUT_POST, "cpfcnpj", FILTER_SANITIZE_MAGIC_QUOTES);
        $tema_comentario = filter_input(INPUT_POST, "tema-comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        $tipo_comentario = filter_input(INPUT_POST, "tipo_comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        $texto_comentario = filter_input(INPUT_POST, "texto_comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        $anexo = filter_input(INPUT_POST, "anexo", FILTER_SANITIZE_MAGIC_QUOTES);
        $protocolo = mt_rand();
        while(strlen($protocolo) != 10){
            $protocolo = mt_rand();
        }    
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y  H:i:s');
        

        $envio->setId('');
        $envio->setDataEnvio($date);
        $envio->setNome($nome);
        $envio->setEmail($email);
        $envio->setCpfcnpj($cpfcnpj);
        $envio->setTemaComentario($tema_comentario);
        $envio->setTipoComentario($tipo_comentario);
        $envio->setTextoComentario($texto_comentario);
        $envio->setAnexo($anexo);
        $envio->setProtocolo($protocolo);

        

        
        echo $envio->insert();   
       

        header('Location:/prefeitura/formulario/incluir-participacao.html'); 
        
      

    }

    /* if(isset($_POST['votar'])){
        
        $op = filter_input(INPUT_POST, "op", FILTER_SANITIZE_MAGIC_QUOTES);
       
       $Dados[]= explode("+",$op);
       
        $coluna = $Dados[0][2];
        $id = $Dados[0][1];

        $sql = "UPDATE enquete set ${coluna} = ( SELECT ${coluna} FROM `enquete` WHERE id = ${id}) + 1 where id=${id}";

        echo $sql;
    
        $stmt = DB::prepare($sql);
        header('Location:/prefeitura/enquete/view-enquete.php');

        return $stmt->execute();  
        
      
    }
         */
        
      

       
    

?>