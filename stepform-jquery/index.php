<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stepsform</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="css/formstep.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Formulário com passos (Step form)</h2>
                <h3>Passo <span id="passo"></span></h3>
                
                <form  class="form-signin" method="post" enctype="multipart/form-data" action="processa.php">
                    <div id="step_1" class="step">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" name="nome" id="nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div id="step_2" class="step">
                        <div class="form-group">
                            <label for="end">Endereço:</label>
                            <input type="text" name="end" id="end" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="fone">Telefone:</label>
                            <input type="tel" name="fone" id="fone" class="form-control">
                        </div>
                    </div>
                    <div id="step_3" class="step">
                        <div class="form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" name="cep" id="cep" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" name="bairro" id="bairro" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-sm btn-enviar" name="enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
                    if (isset($_GET['erro']) && $_GET['erro'] == '1') {
                    echo "
                    <div class='validacao'>
                        <span class='validacao-sub'>
                    <svg aria-hidden='true' class='stUf5b qpSchb' fill='currentColor' focusable='false' width='16px' height='16px' viewBox='0 0 24 24' xmlns='https://www.w3.org/2000/svg'>
                    <path d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z'></path>
                    </svg>
                    </span>Preencha todos os campos do formulario corretamente</div>
                    ";
                    }
                ?>
        <div class="row">
            <div class="col-lg-6">
                <button class="btn btn-sm btn-anterior" id="prev">Anterior</button>
            </div>
            <div class="col-lg-6">
                <button class="btn btn-sm btn-proximo" id="next">Próximo</button>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

            //Esconde todos os passos e exibe o primeiro ao carregar a página 
            $('.step').hide();
            $('.step').first().show();

            //Exibe no topo em qual passo estamos pela ordem da div que esta visivel
            var passoexibido = function () {
                var index = parseInt($(".step:visible").index());
                if (index == 0) {
                    //Se for o primeiro passo desabilita o botão de voltar
                    $("#prev").prop('disabled', true);
                } else if (index == (parseInt($(".step").length) - 1)) {
                    //Se for o ultimo passo desabilita o botão de avançar
                    $("#next").prop('disabled', true);
                } else {
                    //Em outras situações os dois serão habilitados
                    $("#next").prop('disabled', false);
                    $("#prev").prop('disabled', false);
                }
                $("#passo").html(index + 1);

            };

            //Executa a função ao carregar a página
            passoexibido();

            //avança para o próximo passo
            $("#next").click(function () {
                $(".step:visible").hide().next().show();
                passoexibido();
            });

            //retrocede para o passo anterior
            $("#prev").click(function () {
                $(".step:visible").hide().prev().show();
                passoexibido();
            });

        });
    </script>
</body>

</html>