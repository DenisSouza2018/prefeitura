<?php
//Step1
  $db = mysqli_connect('localhost','root','','db_prefeitura')
  or die('Error connecting to MySQL server.');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Banco de Idéias</title>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>




    <div class="container">

        <div class="container col-md-10">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nome"><b>Dados Estatísticos: </b></label>
                    <?php
                
                  $query = "SELECT COUNT(*) AS protocolo FROM ideias as i WHERE protocolo != 0";                
                  mysqli_query($db, $query) or die('Error querying database.');
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);
                  $qtd_procotolos = $row['protocolo'];

                  $query = "SELECT COUNT(*) AS aberto FROM ideias as i WHERE status ='ABERTO'";                
                  mysqli_query($db, $query) or die('Error querying database.');
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);
                  $qtd_status_aberto = $row['aberto'];
                  
                  $porcentagem = number_format(($qtd_status_aberto/$qtd_procotolos)*100, 2, '.', '');
                  echo "<p>ABERTO: $porcentagem %</p> <br/>";


                  $query = "SELECT COUNT(*) AS sucesso FROM ideias as i WHERE status ='FINALIZADO COM SUCESSO'";                
                  mysqli_query($db, $query) or die('Error querying database.');
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);
                  $qtd_status_finalizado_com_sucesso = $row['sucesso'];
                  $porcentagem = number_format( ($qtd_status_finalizado_com_sucesso/$qtd_procotolos)*100, 2, '.', '');
                  echo "<p>FINALIZADO COM SUCESSO: $porcentagem %</p> <br/>";

                  $query = "SELECT COUNT(*) AS sem FROM ideias as i WHERE status ='FINALIZADO SEM SUCESSO'";                
                  mysqli_query($db, $query) or die('Error querying database.');
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);
                  $qtd_status_finalizado_sem_sucesso = $row['sem'];
                  $porcentagem = number_format( ($qtd_status_finalizado_sem_sucesso/$qtd_procotolos)*100, 2, '.', '');
                  echo "<p>FINALIZADO SEM SUCESSO: $porcentagem %</p> <br/>";
                ?>
                </div>
            </div>

        </div>


        <!-- Div formulario de cadastro -->
        <div class="container col-md-10">

            <h2>Idéias</h2>
            <form method="post" action="prefeitura/formulario/classe/Envio.php" enctype="multipart/form-data">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nome"><b>Nome: </b></label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email"><b>Email: </b></label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cpf"><b>CPF: </b></label>
                        <input type="number" class="form-control" name="cpf" id="cpf">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tel"><b>Telefone: </b></label> <br>
                        <input type="number" class="form-control" name="tel" id="tel">
                    </div>
                </div>
                <div class="form-row">
                    <label for="texto_comentario"><b>Insira sua idéia: </b></label> <br>
                    <textarea cols="100" rows="10" class="form-control" name="texto_comentario"></textarea>
                </div>

                <div class="col-sm-10">
                    <button type="submit" name="ideias" class="btn btn-primary"
                        style=" margin-left: -3%;  margin-top: 2%;">Enviar</button>

                </div>
            </form>
            <a href="prefeitura/formulario/view-ideias.php">
                <button class="btn btn-primary" style=" margin-left: 90%;  margin-top: -6%;">Visualizar</button>
            </a>
        </div>

        <!-- Consulta Protocolo -->
        <div class="container col-md-10">

            <form method="post" action="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="protocolo"><b>Protocolo: </b></label>
                        <input type="number" class="form-control" name="protocolo" id="protocolo">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="    margin-left: 52%;  margin-top: -11%;"
                    name="consulta">Consultar</button>
            </form>

        </div>

        <!-- Resposta usuario -->
        <div class="container col-md-10">
            <div class='form-row'>

                <?php

              if(isset($_POST['consulta']))
              {
                $protocolo = $_POST['protocolo'];
                if($protocolo != '')
                {
                  $query = "SELECT hi.numero_ordem,i.status FROM historico_ideias as hi, ideias as i WHERE hi.protocolo_historico = $protocolo && i.protocolo =$protocolo LIMIT 1";                
                  mysqli_query($db, $query) or die('Error querying database.');
                  $result = mysqli_query($db, $query);
                  $row = mysqli_fetch_array($result);
                  $ordem = $row['numero_ordem'];
                  $status = $row['status'];
        
                  if($status != 'FINALIZADO COM SUCESSO' && $status != 'FINALIZADO SEM SUCESSO' ){
                    $query = "SELECT * FROM historico_ideias WHERE protocolo_historico = $protocolo;";                
                    mysqli_query($db, $query) or die('Error querying database.');
                    $result = mysqli_query($db, $query);
                      while($row = mysqli_fetch_array($result))
                      {
                        echo"";
                        echo"".$row['data_envio']." -  ".$row['nome'].": ".$row['texto']."";
                        echo "<br />";
                      }
                      
                      echo "<form method='post' action='prefeitura/formulario/classe/Resposta.php'>
                              <label for='resposta_formulario' style='margin-top: 5%; '><b>Resposta: </b></label>
                              <textarea cols='100' rows='3' class='form-control'  id='resposta_formulario' name='resposta_formulario'></textarea>

                              <button  class='btn btn-primary' style=' margin-top: 3%;'  name='resposta_protocolo_ideias'
                                 id='resposta_protocolo' value=$protocolo+$ordem >Responder
                              </button> 
                            </form> "; 

                  }else{
                    echo"<div class='alert alert-danger' role='alert'>
                          PROTOCOLO FINALIZADO !  
                        </div>";
                  }

                }else{
                  echo"<div class='alert alert-warning' role='alert'>
                        Por favor informe o seu protocolo !
                      </div>";
                }
              }
            ?>





            </div>
        </div>

    </div>

</body>

</html>