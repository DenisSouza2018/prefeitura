
<?php
//Step1
 $db = mysqli_connect('localhost','root','','db_prefeitura')
 or die('Error connecting to MySQL server.');

//Step2
$query = "SELECT * FROM enquete WHERE status='ATIVO' LIMIT 1 ";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

$row = mysqli_fetch_array($result);

//echo $row;
echo $row['titulo'];





?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Enquete</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="enquete/css/index.css">

    <link rel="stylesheet" href="../enquete/recursos/bootstrap.css">


   <!--  <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->

</head>

<body>

    <div class="container col-md-10">
        --- container 1 ----
        <input type="range" min="0" max="100" step="5" value="" id="range">



    </div>

    <form action="destino.php" method="get">
        <div class="container col-md-10">
            <label for="exampleInputEmail1" class="enquete">ENQUETE</label>
            <div class="img-aspa">
                <div class="row img-seta-1">
                    <div class="col-6 col-md-6">
                        <label for="exampleInputEmail1" class="pergunta">
                        <?php echo  $row['titulo']; ?>
 
                        </label>


                    </div>

                    <div class="col-sm-2 radio-chex" style="margin-top: 2%;   margin-left: -1%;   font-size: 22px;">

                    <?php 
                    if($row['op1']!=null) {
                    echo '<div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                    <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios1"
                        value="option1" checked>
                    <label class="custom-control-label" for="exampleRadios1">';
                    echo $row['op1'];
                    echo '</label> </div>';}
                    
                    if($row['op2']!=null) {
                        echo '<div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                        <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios2"
                            value="option2" checked>
                        <label class="custom-control-label" for="exampleRadios2">';
                        echo $row['op2'];
                        echo '</label> </div>';}

                        if($row['op3']!=null) {
                            echo '<div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                            <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                value="option1" checked>
                            <label class="custom-control-label" for="exampleRadios3">';
                            echo $row['op3'];
                            echo '</label> </div>';}

                            if($row['op4']!=null) {
                                echo '<div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                                <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios4"
                                    value="option1" checked>
                                <label class="custom-control-label" for="exampleRadios4">';
                                echo $row['op4'];
                                echo '</label> </div>';}

                                if($row['op5']!=null) {
                                    echo '<div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                                    <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios5"
                                        value="option1" checked>
                                    <label class="custom-control-label" for="exampleRadios5">';
                                    echo $row['op5'];
                                    echo '</label> </div>';}
                             
                    ?> 


                       
                      

                     <!--    <div class="custom-control custom-radio custom-control-inline" style=" margin-top: 4px;">
                            <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="custom-control-label" for="exampleRadios1">
                                Ótimo
                            </label>
                        </div>
                        <div class="custom-control  custom-radio custom-control-inline" style="    margin-top: 4px;">
                            <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2" checked>
                            <label class="custom-control-label" for="exampleRadios2">
                                Bom
                            </label>
                        </div>
                        <div class="custom-control  custom-radio custom-control-inline" style="    margin-top: 4px;">
                            <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios3"
                                value="option3" checked>
                            <label class="custom-control-label" for="exampleRadios3">
                                Regular
                            </label>
                        </div>
                        <div class="custom-control  custom-radio custom-control-inline" style="    margin-top: 4px;">
                            <input class="custom-control-input" type="radio" name="exampleRadios" id="exampleRadios4"
                                value="option4" checked>
                            <label class="custom-control-label" for="exampleRadios4">
                                Péssimo
                            </label>
                        </div> -->

                    </div>

                    <div class="elementos-status-percentual">
                        <label for="">10%</label><br>
                        <label for="">25%</label><br>
                        <label for="">25%</label><br>
                        <label for="">25%</label>
                    </div>

                    <div class="col-2">

                        <img src="../enquete/img/seta.png" class="img-seta-2">
                        <div class="margin-enquete">

                            <label class="resultado-parcial">Resultado parcial</label>

                            <div class="margin-interna">

                                <div id="processo1" class="progress-bar"></div>

                                <script>
                                var inputvar = document.getElementById("range");
                                var element = document.getElementById("processo1");

                                inputvar.addEventListener("input", function() {

                                    displayStyle(element, inputvar.value)

                                })


                                function displayStyle(element, valor) {
                                    element.style = `--progress:${valor};`;
                                }
                                </script>

                                <br>
                                <div id="processo2" class="progress-bar" style="--progress:20"></div>

                                <br>
                                <div id="processo2" class="progress-bar" style="--progress:20"></div>

                                <br>
                                <div id="processo4" class="progress-bar" style="--progress:20"></div>

                            </div>
                        </div>

                    </div>
                    <div class="elementos-status-percentual">
                        <label for="">Otimo</label><br>
                        <label for="">Bom</label><br>
                        <label for="">Regular</label><br>
                        <label for="">Péssimo</label>
                    </div>
                </div>

            </div>

        </div>
        <div class="container col-md-10">
            --- container 2 ----
        
   
      </div>




    </div>                      
        </div>

    </form>

</body>

</html>