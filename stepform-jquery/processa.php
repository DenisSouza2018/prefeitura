
<?php

    $nome = $_POST['nome'];
    $email = $_POST["email"];
    $endereco =$_POST['end'];
    $fone = $_POST["fone"];
    $cep = $_POST["cep"];
    $bairro = $_POST["bairro"];

   

    if($nome == null || $email == null || $endereco == null || $fone == null || $cep == null || $bairro == null ){
        header('Location:/prefeitura/stepform-jquery/index.php?erro=1');
    }else{
        header('Location:/prefeitura/stepform-jquery/');
    }


   

?>