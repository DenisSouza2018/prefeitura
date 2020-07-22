<?php
    //require_once 'Crud.php';
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    //Para o Windows casa
    //function __autoload($class_name){ require_once 'C:/xampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    //Para o Windows Serviço
    //function __autoload($class_name){ require_once 'D:/xampp/htdocs/prefeitura/login/classe/'. $class_name . '.php'; }

    //Para o linux
    function __autoload($class_name){ require_once '/opt/lampp/htdocs/prefeitura/Hemeroteca_template/php/'. $class_name . '.php'; }

    $envio = new Banco();
    print_r($_POST);


    if(isset($_POST['hemeroteca_villaLobos'])){
        $perido_inicial = filter_input(INPUT_POST, "periodo_inicial", FILTER_SANITIZE_MAGIC_QUOTES);
        $perido_final = filter_input(INPUT_POST, "periodo_final", FILTER_SANITIZE_MAGIC_QUOTES);
        $palavra_chave = filter_input(INPUT_POST, "palavra-chave", FILTER_SANITIZE_MAGIC_QUOTES);
        $qtd_exibicao = filter_input(INPUT_POST, "exibir", FILTER_SANITIZE_MAGIC_QUOTES);
        $idioma = filter_input(INPUT_POST, "idioma", FILTER_SANITIZE_MAGIC_QUOTES);
        
        echo "<pre>
        $perido_final,
        $perido_inicial,
        $palavra_chave,
        $qtd_exibicao,
        $idioma,
        </pre>";
       

        $db = mysqli_connect('localhost','root','','museu')
        or die('Error connecting to MySQL server.');
        $query =  "SELECT h.id,h.nome,h.periodo_inicial,h.periodo_final,h.texto_imagem FROM hemeroteca h WHERE h.periodo_inicial = $perido_inicial OR 
        h.periodo_final = $perido_final LIMIT $qtd_exibicao";
        $qr = mysqli_query($db, $query) or die('Error querying database.');
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo '<pre>';
        while($row = mysqli_fetch_assoc($qr)){
			echo '<pre>';
			print_r($row);
            echo '</pre>';
        }
        echo '</pre>';
    }
    

       
        
        // if($valida != null){
        //     $query = "SELECT true FROM `usuario` where (email = '$email' OR login = '$email') AND senha = '$senha'";
        //     mysqli_query($db, $query) or die('Error querying database.');
        //     $result = mysqli_query($db, $query);
        //     $row = mysqli_fetch_array($result);
        //     if($row['TRUE']){
        //         $id_session = mt_rand();
        //             while(strlen($id_session) != 10)
        //             {
        //             $id_session = mt_rand();
        //             } 
        //         $_SESSION['login'] = true;
        //         $_SESSION['id_session'] = $id_session;
        //         $_SESSION['date'] = date('d/m/Y \à\s H:i:s');
                
        //         header('Location:/prefeitura/login/logado.php');
        //     }else{
        //         header('Location:/prefeitura/login/login.php?erro=1');
        //     }        
        // }else{
        //     header('Location:/prefeitura/login/login.php?erro=1');
        // }

    
?>

   