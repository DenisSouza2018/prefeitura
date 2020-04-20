<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>CMI</title>



    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css"  href="css/logado.css" >
</head>

<body>
    <!-- Verifica se estar logado, caso não esteja redirencionada para pagina de login -->
    <?php
        if($_SESSION['login'] == 1){
            echo '
                <div class="logout-button-div">
                    <a href="/prefeitura/login/logout.php">
                        <button type="button" class="logout-button btn ">Sair  </button>
                    </a>
                </div>
            ';
        }else{
            header('Location:/prefeitura/login/login.php');
        }
    ?>
    
</body>

</html>