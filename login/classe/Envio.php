<?php
    require_once 'Crud.php';
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    //Para o Windows casa
    //function __autoload($class_name){ require_once 'C:/xampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    //Para o Windows Serviço
    function __autoload($class_name){ require_once 'D:/xampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    //Para o linux
    //function __autoload($class_name){ require_once '/opt/lampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    $envio = new Banco();
    
    if(isset($_POST['login'])){
        
        $senha = filter_input(INPUT_POST, "password", FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);

        $db = mysqli_connect('localhost','root','','db_prefeitura')
        or die('Error connecting to MySQL server.');
        $query = "select true from usuario where email = '$email' AND senha = '$senha'";
        mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result);
        $valida = $row['TRUE'];
        
        if($valida != null){
            $query = "SELECT true FROM `usuario` where (email = '$email' OR login = '$email') AND senha = '$senha'";
            mysqli_query($db, $query) or die('Error querying database.');
            $result = mysqli_query($db, $query);
            $row = mysqli_fetch_array($result);
            if($row['TRUE']){
                $id_session = mt_rand();
                    while(strlen($id_session) != 10)
                    {
                    $id_session = mt_rand();
                    } 
                $_SESSION['login'] = true;
                $_SESSION['id_session'] = $id_session;
                $_SESSION['date'] = date('d/m/Y \à\s H:i:s');
                
                header('Location:/prefeitura/login/logado.php');
            }else{
                header('Location:/prefeitura/login/login.php?erro=1');
            }        
        }else{
            header('Location:/prefeitura/login/login.php?erro=1');
        }

    }
?>

   