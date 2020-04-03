<?php
     require_once 'DB.php';
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){
        
        require_once 'D:/xampp/htdocs/prefeitura/formulario/classe/'. $class_name . '.php';
    }
   

    if(isset($_POST['resposta_protocolo'])){
        $resposta = $_POST['resposta_formulario'];
        $dados = $_POST['resposta_protocolo'];
        $dadosArray = explode("+",$dados);
        print_r($dadosArray);
        $protocolo = $dadosArray[0];
        $ordem = $dadosArray[1];
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y  H:i:s');
        $db = mysqli_connect('localhost','root','','db_prefeitura') or die('Error connecting to MySQL server.');
        $query = "SELECT nome FROM `formulario` WHERE id = $dadosArray[1]";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $nome = $row['nome'];
        
        $sql = "INSERT INTO historico_resposta VALUES ('',$ordem,'$resposta','$date',$protocolo,'$nome')";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        header('Location:/prefeitura/formulario/incluir-participacao.php');
    }


    if(isset($_POST['ok'])) {
        $status = $_POST['skills'];
        $protocolo = filter_input(INPUT_POST, "protocolo", FILTER_SANITIZE_MAGIC_QUOTES);
        $resposta = filter_input(INPUT_POST, "resposta", FILTER_SANITIZE_MAGIC_QUOTES);
        $id = filter_input(INPUT_POST, "id_ordem", FILTER_SANITIZE_MAGIC_QUOTES);
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y  H:i:s');
        $nome = 'Camara';
        

        if($status[0] == 'EXCLUIDO'){
            $sql = "DELETE FROM formulario WHERE id = $id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            $sql = "DELETE FROM historico_resposta WHERE numero_ordem = $id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
        }else{
            $sql = "UPDATE `formulario` SET status='$status[0]' WHERE id = $id";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            $sql = "INSERT INTO historico_resposta VALUES ('',$id,'$resposta','$date',$protocolo,'$nome')";
            $stmt = DB::prepare($sql);
            $stmt->execute();
        }
       
        header('Location:/prefeitura/formulario/view-fiscaliza.php');        

    }
       
      

    
        
        
      

       
    

?>