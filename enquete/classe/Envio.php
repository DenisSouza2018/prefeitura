<?php
    require_once 'Crud.php';
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    // function __autoload($class_name){
        
    //     require_once 'D:/xampp/htdocs/prefeitura/enquete/classe/'. $class_name . '.php';

        
    // }

    //Para o linux
    function __autoload($class_name){ require_once '/opt/lampp/htdocs/prefeitura/enquete/classe/'. $class_name . '.php'; }


    
    $envio = new Enquete();
        
 echo "<pre>";

//    print_r($_COOKIE);
   //print_r($_POST);
   
   echo "</pre>";
    if(isset($_POST['ok'])) {
        $titule = filter_input(INPUT_POST, "form_nameEnquente", FILTER_SANITIZE_MAGIC_QUOTES);
        $qtd_escolha = filter_input(INPUT_POST, "inlineRadioOptions", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta1 = filter_input(INPUT_POST, "form_reposta1", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta2 = filter_input(INPUT_POST, "form_reposta2", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta3 = filter_input(INPUT_POST, "form_reposta3", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta4 = filter_input(INPUT_POST, "form_reposta4", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta5 = filter_input(INPUT_POST, "form_reposta5", FILTER_SANITIZE_MAGIC_QUOTES);
        

       // echo $titule,``,$qtd_escolha,``,$resposta1
       

        $envio->setTitulo($titule);
        $envio->setOp1($resposta1);
        $envio->setOp2($resposta2);
        $envio->setOp3($resposta3);
        $envio->setOp4($resposta4);
        $envio->setOp5($resposta5);
        $envio->setOp1Qtd(0);
        $envio->setOp2Qtd(0);
        $envio->setOp3Qtd(0);
        $envio->setOp4Qtd(0);
        $envio->setOp5Qtd(0);
        $envio->setStatus('INATIVO');
        

        
        $envio->insert();
       

       header('Location:/prefeitura/enquete/index.php');
       
      

    }

    if(isset($_POST['votar'])){
        
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
        
        
      

       
    

?>