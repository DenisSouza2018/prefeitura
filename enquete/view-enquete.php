<?php
//Step1
 $db = mysqli_connect('localhost','root','','db_prefeitura')
 or die('Error connecting to MySQL server.');

//Step2
$query = "SELECT * from `enquete` WHERE status='ATIVO' ORDER BY id DESC LIMIT 1 ";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

$row = mysqli_fetch_array($result);

//print_r($row['op1_qtd']);

$total_votos = $row['op1_qtd']+$row['op2_qtd']+$row['op3_qtd']+$row['op4_qtd']+$row['op5_qtd'];

echo $total_votos." ".$row['op1_qtd']."<br>";

/* $porcentagem = ($row['op1_qtd']/$total_votos)*100;

echo number_format($porcentagem,0);
 */

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Enquete</title>
    
    
   
  <link rel="stylesheet" href="../enquete/css/index.css">
  <link rel="stylesheet" href="../enquete/recursos/bootstrap.css">
  


     <!-- <link rel="stylesheet" type="text/css" href="assets/css/style.css"> -->
     <base href="/">
</head>

<body>

    <div class="container col-md-10">
        --- container 1 ----
        <input type="range" min="0" max="100" step="5" value="" id="range">



    </div>

    <form method="post" action="prefeitura/enquete/classe/Envio.php"  id="formulario">
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
                            <input  type='radio' name='op' id='exampleRadios' value=".$row["op1"]."+".$row["id"]."+op1_qtd > ".$row["op1"]."
                        </div>";
                  /*   echo "<div class='custom-control custom-checkbox mb-3'>
                            <input type='checkbox' class='custom-control-input' id='customCheck1' name='OP1'  value=".$row["op1"].">
                            <label class='custom-control-label' for='customCheck1'>".$row["op1"]."</label>
                        </div>"; */
                    }
                    
                    if($row['op2']!=null) {
                        echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                <input type='radio' name='op' id='exampleRadios' value=".$row["op2"]."+".$row["id"]."+op2_qtd > ".$row["op2"]."
                            </div>";
                            /* echo "<div class='custom-control custom-checkbox mb-3'>
                            <input type='checkbox' class='custom-control-input' id='customCheck2' name='OP2'  value=".$row["op2"].">
                            <label class='custom-control-label' for='customCheck2'>".$row["op2"]."</label>
                            </div>";  */   
                    }

                        if($row['op3']!=null) {
                            echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                    <input  type='radio' name='op' id='exampleRadios' value=".$row["op3"]."+".$row["id"]."+op3_qtd > ".$row["op3"]." 
                                </div>";
                                /* echo "<div class='custom-control custom-checkbox mb-3'>
                                <input type='checkbox' class='custom-control-input' id='customCheck3' name='OP3'  value=".$row["op3"].">
                                <label class='custom-control-label' for='customCheck3'>".$row["op3"]."</label>
                                </div>";   */  
                        }

                            if($row['op4']!=null) {
                                echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                        <input  type='radio' name='op' id='exampleRadios' value=".$row["op4"]."+".$row["id"]."+op4_qtd > ".$row["op4"]." 
                                    </div>";
                                    /* echo "<div class='custom-control custom-checkbox mb-3'>
                                    <input type='checkbox' class='custom-control-input' id='customCheck4' name='OP4'  value=".$row["op4"].">
                                    <label class='custom-control-label' for='customCheck4'>".$row["op4"]."</label>
                                    </div>";  */   
                            }

                                if($row['op5']!=null) {
                                    echo "<div class='custom-control custom-radio custom-control-inline' style=' margin-top: 4px;'>
                                            <input type='radio' name='op' id='exampleRadios' value=".$row["op5"]."+".$row["id"]."+op5_qtd > ".$row["op5"]."
                                        </div>";
                                        /* echo "<div class='custom-control custom-checkbox mb-3'>
                                        <input type='checkbox' class='custom-control-input' id='customCheck5' name='OP5' value=".$row["op5"].">
                                        <label class='custom-control-label' for='customCheck5' >".$row["op5"]."</label>
                                        </div>"; */    
                                }
                                
                    ?>
                    
                    </div>

                    <div class="elementos-status-percentual">

                        <?php
                            $porcentagem=0;
                            if($row['op1']!= null){
                                $porcentagem = number_format((($row['op1_qtd']/$total_votos)*100),1);
                                echo "<label for='' >".$porcentagem."%</label><br>";
                            }
                            if($row['op2']!= null){
                                $porcentagem = number_format((($row['op2_qtd']/$total_votos)*100),1);
                                echo "<label for='' >".$porcentagem."%</label><br>";
                            }
                            if($row['op3']!= null){
                                $porcentagem = number_format((($row['op3_qtd']/$total_votos)*100),1);
                                echo "<label for='' >".$porcentagem."%</label><br>";
                            }
                            if($row['op4']!= null){
                                $porcentagem = number_format((($row['op4_qtd']/$total_votos)*100),1);
                                echo "<label for='' >".$porcentagem."%</label><br>";
                            }
                            if($row['op5']!= null){
                                $porcentagem = number_format((($row['op5_qtd']/$total_votos)*100),1);
                                echo "<label for='' >".$porcentagem."%</label><br>";
                            }
                        ?>

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
        <button name="votar" class="btn btn-primary" type="submit" id="voto" 
            style="margin-left: 83%;   margin-top: -1%;">Votar</button>
       </div>

       

    </form>
    


    <div class="container col-md-10">
        --- container 2 ----

        <style>
    .pieContainer {
          height: 100px;
     }
     .pieBackground {
          background-color: grey;
          position: absolute;
          width: 100px;
          height: 100px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
          -moz-box-shadow: -1px 1px 3px #000;
          -webkit-box-shadow: -1px 1px 3px #000;
          -o-box-shadow: -1px 1px 3px #000;
          box-shadow: -1px 1px 3px #000;
     }
     .pie {
          position: absolute;
          width: 100px;
          height: 100px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
          clip: rect(0px, 50px, 100px, 0px);
     }
     .hold {
          position: absolute;
          width: 100px;
          height: 100px;
          -moz-border-radius: 50px;
          -webkit-border-radius: 50px;
          -o-border-radius: 50px;
          border-radius: 50px;
          clip: rect(0px, 100px, 100px, 50px);
     }
       
     #pieSlice1 .pie {
          background-color: #1b458b;
          -webkit-transform:rotate(150deg);
          -moz-transform:rotate(150deg);
          -o-transform:rotate(150deg);
          transform:rotate(150deg);
     }
     #pieSlice2 {
          -webkit-transform:rotate(150deg);
          -moz-transform:rotate(150deg);
          -o-transform:rotate(150deg);
          transform:rotate(150deg);
     }
     #pieSlice2 .pie {
          background-color: #ccbb87;
          -webkit-transform:rotate(40deg);
          -moz-transform:rotate(40deg);
          -o-transform:rotate(40deg);
          transform:rotate(40deg);
     }
     #pieSlice3 {
          -webkit-transform:rotate(190deg);
          -moz-transform:rotate(190deg);
          -o-transform:rotate(190deg);
          transform:rotate(190deg);
     }
     #pieSlice3 .pie {
          background-color: #cc0000;
          -webkit-transform:rotate(70deg);
          -moz-transform:rotate(70deg);
          -o-transform:rotate(70deg);
          transform:rotate(70deg);
     }
     #pieSlice4 {
          -webkit-transform:rotate(260deg);
          -moz-transform:rotate(260deg);
          -o-transform:rotate(260deg);
          transform:rotate(260deg);
     }
     #pieSlice4 .pie {
          background-color: #cc00ff;
          -webkit-transform:rotate(100deg);
          -moz-transform:rotate(100deg);
          -o-transform:rotate(100deg);
          transform:rotate(100deg);
     }
</style>
  
<div class="pieContainer">
     <div class="pieBackground"></div>
     <div id="pieSlice1" class="hold"><div class="pie"></div></div>
     <div id="pieSlice2" class="hold"><div class="pie"></div></div>
     <div id="pieSlice3" class="hold"><div class="pie"></div></div>
     <div id="pieSlice4" class="hold"><div class="pie"></div></div>
</div>


    </div>


<script>
     function salvar() {
        lista_pessoas({
                   
                });

        document.cookie = `dados = ${JSON.stringify(lista_pessoas)}`;
     }
</script>
</body>

</html>

