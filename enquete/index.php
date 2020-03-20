<?php
//Step1
 $db = mysqli_connect('localhost','root','','db_prefeitura')
 or die('Error connecting to MySQL server.');

//Step2
$query = "SELECT * FROM enquete ";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);


 

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
</head>

<body>
  <!-- <script src="../enquete/js/jquery.js" crossorigin="anonymous"></script>
<script src="../enquete/js/popper.js" crossorigin="anonymous"></script>
<script src="../enquete/js/bootstrapcdn.js" crossorigin="anonymous"></script> -->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <div class="container">


    <label style="    margin-left: 47%; font-size: 24px;">Enquete</label>

    <a href="prefeitura/enquete/view-enquete.php">
      <button class="btn btn-primary" style="margin-left: 86%; background-color: #4BBDBA; border-color:#FFFF">
        Visualizar Enquete </button></a>

    <form method="post" action="prefeitura/enquete/classe/Envio.php">


      <div class="form-group">
        <label for="form_nameEnquente">Nome da enquete</label>
        <input type="text" class="form-control" name="form_nameEnquente" placeholder="Informe o nome da enquente">
      </div>

      <div class="form-group">
        <label for="form_quantidade">Selecione a quantidade de resposta: </label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id=1 value=1>
          <label class="form-check-label" for="inlineRadio">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id=2 value=2>
          <label class="form-check-label" for="inlineRadio">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id=3 value=3>
          <label class="form-check-label" for="inlineRadio">3</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id=4 value=4>
          <label class="form-check-label" for="inlineRadio">4</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id=5 value=5>
          <label class="form-check-label" for="inlineRadio">5</label>
        </div>
      </div>

      <script>
        $("input:radio").on("click", function () {
          var identificador = $(this).attr("id");

          var html;
          switch (identificador) {
            case '1':
              html = `<div class="form-group">
            <label for="form_reposta1">Resposta 1</label>
              <input type="text" class="form-control" name="form_reposta1" placeholder="Insera o nome da resposta">
             </div>`
              break;
            case '2':
              html = `<div class="form-group">
        <label for="form_reposta1">Resposta 1</label>
        <input type="text" class="form-control" name="form_reposta1" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta2">Resposta 2</label>
        <input type="text" class="form-control" name="form_reposta2" placeholder="Insera o nome da resposta">
      </div>`
              break;
            case '3':
              html = `<div class="form-group">
        <label for="form_reposta1">Resposta 1</label>
        <input type="text" class="form-control" name="form_reposta1" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta2">Resposta 2</label>
        <input type="text" class="form-control" name="form_reposta2" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta3">Resposta 3</label>
        <input type="text" class="form-control" name="form_reposta3" placeholder="Insera o nome da resposta">
      </div>`
              break;
            case '4':
              html = `<div class="form-group">
        <label for="form_reposta1">Resposta 1</label>
        <input type="text" class="form-control" name="form_reposta1" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta2">Resposta 2</label>
        <input type="text" class="form-control" name="form_reposta2" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta3">Resposta 3</label>
        <input type="text" class="form-control" name="form_reposta3" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta4">Resposta 4</label>
        <input type="text" class="form-control" name="form_reposta4" placeholder="Insera o nome da resposta">
      </div>`
              break;
            case '5':
              html = `<div class="form-group">
        <label for="form_reposta1">Resposta 1</label>
        <input type="text" class="form-control" name="form_reposta1" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta2">Resposta 2</label>
        <input type="text" class="form-control" name="form_reposta2" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta3">Resposta 3</label>
        <input type="text" class="form-control" name="form_reposta3" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta4">Resposta 4</label>
        <input type="text" class="form-control" name="form_reposta4" placeholder="Insera o nome da resposta">
      </div>
      <div class="form-group">
        <label for="form_reposta5">Resposta 5</label>
        <input type="text" class="form-control" name="form_reposta5" placeholder="Insera o nome da resposta">
      </div>`
              break;
          }

          document.getElementById('escolha').innerHTML = html;
        });
      </script>

      <div id='escolha'></div>
      <button type="submit" name="ok" class="btn btn-primary">Submit</button>

    </form>

    <label style=" margin-top: 2%;     margin-left: 42%; font-size: 21px; " for="form_nameEnquente">Enquete
      Cadastradas</label>

    <div style="        height: 400px;       overflow-x: hidden; border: 2px solid #d1d1e0;">

      <form method="post" action="prefeitura/enquete/classe/Update.php">

        <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
          width="100%">

          <thead>
            <tr>
              <th class="th-sm">Codigo
              </th>
              <th class="th-sm">Titulo
              </th>
              <th class="th-sm">Status
              </th>

            </tr>
          </thead>
          <tbody>
            <?php
              while($row = mysqli_fetch_array($result)) {
                echo "  <tr>
                  <td  >
                        <div class='custom-control custom-checkbox custom-control-inline' style='margin-left: 39%;' >
                        
                        <input class='custom-control-input ' type='checkbox'  name='form_IDEnquente' id=checkID".$row["id"]."
                        value=".$row["id"]." >
                        
                        <label class='custom-control-label ' for=checkID".$row["id"].">
                        
                        </div>                    
                  </td>
                  <td >".$row["titulo"]."
                  </td>
                  <td >
                        <select class='custom-select mr-sm-2' id='inlineFormCustomSelect' name='skills[]'>
                          <option  value=".$row["id"]."+".$row["status"].">".$row["status"]."</option>
                          <option value=".$row["id"]."+ATIVO>ATIVO</option>
                          <option value=".$row["id"]."+INATIVO>INATIVO</option>
                          <option value=".$row["id"]."+FINALIZADO>FINALIZADO</option>
                        </select>
                  </td>
                   </tr>";
              }
           ?>
          </tbody>
        </table>
    </div>

    <button type="submit" name="ok" class="btn btn-primary" style=" margin-left: 94%; margin-top: 1%;">Salvar</button>
    </from>
  </div>
</body>

</html>