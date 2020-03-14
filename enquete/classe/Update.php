<?php
    
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){
        
        require_once 'D:/xampp/htdocs/prefeitura/enquete/classe/'. $class_name . '.php';
    }

    
    $envio = new Enquete();

    if(isset($_POST['ok'])) 
        $status = filter_input(INPUT_POST, "form_statusEnquente", FILTER_SANITIZE_MAGIC_QUOTES);
        $id = filter_input(INPUT_POST, "form_IDEnquente", FILTER_SANITIZE_MAGIC_QUOTES);
       /*  $resposta1 = filter_input(INPUT_POST, "form_reposta1", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta2 = filter_input(INPUT_POST, "form_reposta2", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta3 = filter_input(INPUT_POST, "form_reposta3", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta4 = filter_input(INPUT_POST, "form_reposta4", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta5 = filter_input(INPUT_POST, "form_reposta5", FILTER_SANITIZE_MAGIC_QUOTES);
         */

        echo $status." SQL -> ";
       
        //$envio->setStatus($status);
        

        $sql = "UPDATE `enquete` SET status='$status' WHERE id = $id";

        echo $sql;
    
        $stmt = DB::prepare($sql);
        header('Location:/prefeitura/enquete/index.php');

        return $stmt->execute();
        


       
      

    
        
        
      

       
    

?>