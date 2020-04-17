
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
    <link rel="stylesheet" type="text/css" href="css/signin.css">
</head>

<body class="text-center">

    <form class="form-signin" method="post" action="/prefeitura/login/classe/Envio.php" enctype="multipart/form-data">
        <img class="mb-4" src="img/logo-camara.png" alt="" width="130" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login</h1>
        <div class="sub-title " data-a11y-title-piece="" id="headingSubtext" jsname="VdSJob"><span jsslot="">Use sua Conta Camara</span></div>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <?php
            if (isset($_GET['erro']) && $_GET['erro'] == '1') {
            echo "
            <div class='validacao'>
                <span class='validacao-sub'>
                    <svg aria-hidden='true' class='stUf5b qpSchb' fill='currentColor' focusable='false' width='16px' height='16px' viewBox='0 0 24 24' xmlns='https://www.w3.org/2000/svg'>
                    <path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z'></path>
                    </svg>
                    </span>Não foi possível encontrar sua Conta Camara</div>
            ";
            }
        ?>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me" > Remember me
            </label>
        </div>
    
        <button class="btn btn-lg btn-primary btn-block font" type="submit" name="login">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy;2017-2020 <br> <img src="img/traco-leal.png" alt="Tra�o Leal" width="116" height="40" hspace="10" vspace="10"> </p>
    </form>
</body>

</html>