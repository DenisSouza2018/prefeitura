<?php
//Step1
 $db = mysqli_connect('localhost','root','','db_prefeitura')
 or die('Error connecting to MySQL server.');

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Formulario</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>

  <div class="container">

    <div class="container col-md-10">
      --- container 1 ----
      
   
      
    </div>
    <!-- Div formulario de cadastro -->
    <div class="container col-md-10">

      <h2>Incluir participação</h2>
      <form method="post" action="prefeitura/formulario/classe/Envio.php">
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

              <label for="cpfcnpj"><b>CPF/CNPJ: </b></label>

              <input type="text" class="form-control" name="cpfcnpj" id="cpfcnpj">

            </div>
            <div class="form-group col-md-6">
              <label for="tema-comentario"><b>Tema do comentário: </b></label>
              <select class="form-control" name="tema-comentario" id="temaComentario">
                <option value="Constituicao">Constituição, Legislação e Redação</option>
                <option value="Financa">Finanças, Orçamento e Fiscalização Financeira</option>
                <option value="Obras">Obras, Serviços Públicos, Habitação e Política Urbana</option>
                <option value="Meio Ambiente">Meio Ambiente, Cultura e Turismo</option>
                <option value="Direitos Humanos">Direitos Humanos e Defesa do Consumidor</option>
                <option value="Segurança Publica">Segurança Pública</option>
                <option value="Desenvolvimento Economico">Desenvolvimento Econômico, Indústria, Comércio, Ciência</option>
                <option value="Educacao">Educação, Desporto e Lazer</option>
                <option value="Saúde">Saúde, Assistência e Promoção Social</option>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="tipo_comentario"><b>Tipo de comentário: </b></label> <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_comentario" value="denuncia">
                <label class="form-check-label" for="Denuncia">Denuncia</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_comentario" value="elogio">
                <label class="form-check-label" for="Elogio">Elogio</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_comentario" value="reclamacao">
                <label class="form-check-label" for="Reclamacao">Reclamação</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tipo_comentario" value="sugestao">
                <label class="form-check-label" for="Sugestao">Sugestão</label>
              </div>
            </div>
            <div class="form-group col-md-6">
              <label for="anexo"><b>Anexar Arquivo: </b></label>
              <input type="file" class="form-control-file" name="anexo">
            </div>
          </div>
          <div class="form-row">
            <textarea cols="100" rows="10" class="form-control" name="texto_comentario"></textarea>
          </div>

          <div class="col-sm-10">
            <button type="submit" name="ok" class="btn btn-primary"
              style=" margin-left: -3%;  margin-top: 2%;">Enviar</button>

          </div>
      </form>
          <a href="prefeitura/formulario/view-fiscaliza.php">
          <button class="btn btn-primary" style=" margin-left: 90%;  margin-top: -6%;">Visualizar</button>
          </a>
    </div>

    <!-- Consulta Protocolo -->
    <div class="container col-md-10">
      --- container 1 ----
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="protocolo"><b>Protocolo: </b></label>
                <input type="number" class="form-control" name="protocolo" id="protocolo" >
              </div>
            </div>
            <button type="submit"  class="btn btn-primary" style="    margin-left: 52%;  margin-top: -11%;" name="consulta" >Consultar</button> 
        </from>      
    </div>
    
    <!-- Resposta Usuario -->
    <div class="container col-md-10">
  

        <?php
              if(isset($_POST['consulta'])){
                $protocolo = $_POST['protocolo'];
                //$resposta = $_GET['resposta_formulario'];
              
                
                if($protocolo != ''){
                          
                    $query = "SELECT * FROM formulario INNER JOIN historico_resposta ON formulario.protocolo = historico_resposta.protocolo_historico where formulario.protocolo = $protocolo";
                    
                    mysqli_query($db, $query) or die('Error querying database.');
              
                    $result = mysqli_query($db, $query);
              
                    $row = mysqli_fetch_array($result);
                  
                  
              
                    if($row['texto'] == ''){
                      echo "
                      <div class='alert alert-danger' role='alert'> Protocolo Inválido </div>";
                    }else{
                      echo "
                      <div class='form-row'>
                      <textarea cols='100' rows='5' class='form-control'>".$row['nome'].": ".$row['texto_comentario']."&#10;"."Prefeitura: ".$row['texto']."</textarea>
                      </div>
                      <form method='post' action='prefeitura/formulario/classe/Resposta.php'>
                        <br>
                        <div class='form-row'>
                          <br>
                          <label for='resposta_formulario'><b>Resposta: </b></label>
                          <textarea cols='100' rows='3' class='form-control'  id='resposta_formulario' name='resposta_formulario'></textarea>
                        </div>

                        <button  class='btn btn-primary' style=' margin-left: -1%;   margin-top: 3%;'  name='resposta' id='resposta' >Responder</button>
                      </from>";
                    }
                
                }      
            
              } 
        ?>
    </div>

  </div>
     
  
  
   

  
  
 

</body>

</html>