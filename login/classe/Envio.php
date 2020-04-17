<?php
    require_once 'Crud.php';

    
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){ require_once 'C:/xampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    $envio = new Banco();
    
    if(isset($_POST['login'])){
        
        $senha = filter_input(INPUT_POST, "password", FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);

        //$envio->setEmail($email);
        //$envio->setSenha($senha);
        
        //$envio->valida();

        $db = mysqli_connect('localhost','root','','db_prefeitura')
        or die('Error connecting to MySQL server.');
        $query = "select true from usuario where email = '$email';";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $valida = $row['TRUE'];
        echo $valida;
        if($valida != null){
            $query = "SELECT true FROM `usuario` where email = '$email' && senha = $senha";
            mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            $valida = $row['TRUE'];
            

            header('Location:/prefeitura/login/logado.php');
        }else{

            header('Location:/prefeitura/login/login.php?erro=1');
        }
        

    }
?>

   