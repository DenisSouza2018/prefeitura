<?php
//Step1
 $db = mysqli_connect('localhost','root','','db_prefeitura')
 or die('Error connecting to MySQL server.');

//Step2
$query = "SELECT * from `enquete` WHERE status='ATIVO' ORDER BY id DESC LIMIT 1 ";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

$row = mysqli_fetch_array($result);
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

    <form method="post" action="prefeitura/enquete/classe/Envio.php">
        <div class="container col-md-10 form-group">
            <label for="exampleInputEmail1" class="enquete">ENQUETE</label>
            <div class="img-aspa">
                <div class="row img-seta-1">
                    <div class="col-6 col-md-6">
                        <label for="exampleInputEmail1" class="pergunta">
                            <?php echo  $row['titulo']; ?>

                        </label>


                    </div>

                    <div class="col-sm-2 radio-chex" style="margin-top: 2%;   margin-left: -3%;   font-size: 22px;">
                    <script>
                        $(function(){
                            $('input.checkbox').click(function(){
                                    echo "adasdasd";

                                if($(this).is(":checked")){
                                    $('input.checkbox').attr('disabled',true);
                                    $(this).removeAttr('disabled');
                                }else{
                                    $('input.checkbox').removeAttr('disabled');
                                }
                            })
                            })
                    </script>
                        <?php 
                    if($row['op1']!=null) {
                    echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                            <input  type='radio' name='op' id='exampleRadios' value=".$row["op1"]."+".$row["id"]." > ".$row["op1"]."
                        </div>";
                  /*   echo "<div class='custom-control custom-checkbox mb-3'>
                            <input type='checkbox' class='custom-control-input' id='customCheck1' name='OP1'  value=".$row["op1"].">
                            <label class='custom-control-label' for='customCheck1'>".$row["op1"]."</label>
                        </div>"; */
                    }
                    
                    if($row['op2']!=null) {
                        echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                <input type='radio' name='op' id='exampleRadios' value=".$row["op2"]."+".$row["id"]." > ".$row["op2"]."
                            </div>";
                            /* echo "<div class='custom-control custom-checkbox mb-3'>
                            <input type='checkbox' class='custom-control-input' id='customCheck2' name='OP2'  value=".$row["op2"].">
                            <label class='custom-control-label' for='customCheck2'>".$row["op2"]."</label>
                            </div>";  */   
                    }

                        if($row['op3']!=null) {
                            echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                    <input  type='radio' name='op' id='exampleRadios' value=".$row["op3"]."+".$row["id"]." > ".$row["op3"]." 
                                </div>";
                                /* echo "<div class='custom-control custom-checkbox mb-3'>
                                <input type='checkbox' class='custom-control-input' id='customCheck3' name='OP3'  value=".$row["op3"].">
                                <label class='custom-control-label' for='customCheck3'>".$row["op3"]."</label>
                                </div>";   */  
                        }

                            if($row['op4']!=null) {
                                echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                        <input  type='radio' name='op' id='exampleRadios' value=".$row["op4"]."+".$row["id"]." > ".$row["op4"]." 
                                    </div>";
                                    /* echo "<div class='custom-control custom-checkbox mb-3'>
                                    <input type='checkbox' class='custom-control-input' id='customCheck4' name='OP4'  value=".$row["op4"].">
                                    <label class='custom-control-label' for='customCheck4'>".$row["op4"]."</label>
                                    </div>";  */   
                            }

                                if($row['op5']!=null) {
                                    echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                            <input type='radio' name='op' id='exampleRadios' value=".$row["op5"]."+".$row["id"]." > ".$row["op5"]."
                                        </div>";
                                        /* echo "<div class='custom-control custom-checkbox mb-3'>
                                        <input type='checkbox' class='custom-control-input' id='customCheck5' name='OP5' value=".$row["op5"].">
                                        <label class='custom-control-label' for='customCheck5' >".$row["op5"]."</label>
                                        </div>"; */    
                                }
                                
                    ?>
                    
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

                                    inputvar.addEventListener("input", function () {

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
        <button type="submit" name="votar" class="btn btn-primary"
            style="margin-left: 83%;   margin-top: -1%;">Votar</button>
       </div>

       

    </form>
    


    <div class="container col-md-10">
        --- container 2 ----





    </div>

</body>

</html>

<?php

?>