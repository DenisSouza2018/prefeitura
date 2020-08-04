<?php
//Step1
  $db = mysqli_connect('localhost','root','','db_prefeitura')
  or die('Error connecting to MySQL server.');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hemeroteca</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css'> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/style.css">
  <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css" rel="stylesheet">
  <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />


</head>

<body>

  <div class="container">
    <h1 class="highlight-title tituloPadrao"> Biblioteca Digital</h1>




    <div id="busca">
      <!-- action="./php/Consulta.php" enctype="multipart/form-data" -->
      <form method="post" action="">
        <div class="row textPadrao">
          <div class="col-md-6">
            <div class="form-group input-text-wrapper">
              <label class="control-label required" for="palavra-chave"> Buscar por palavra-chave </label>
              <input class="field field-required form-control" id="palavra-chave" name="palavra-chave"
                placeholder="Ex: Livros, Poemas, Canções ..." title="Ex: Livros, Poemas, Canções ..." type="text"
                value="" aria-required="true">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group input-text-wrapper">
              <label class="control-label required" for="exibir"> Exibir </label>
              <input class="field field-required form-control" id="exibir" name="exibir" type="number" value="5"
                max="1000" min="1" maxlength="3" aria-required="true">
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group input-select-wrapper has-success">
              <label class="control-label required" for="ordenar"> Nacionalidade </label>
              <select class="form-control field-required success-field" id="idioma" name="idioma" aria-required="true">
                <option class="" selected="" value="brasileiro"> Brasileiro </option>
                <option class="" value="estrangeiro"> Estrangeiro </option>
              </select>
            </div>
          </div>
        </div>
        <div class="row textPadrao">
          <div class="col-md-3">
            <label class="control-label required" for="ordenar"> Periodo Inicial </label>
            <div class=" range-wrap">
              <div class="range-value" id="rangeV"></div>
              <input id="range" name="periodo_inicial" type="range" min="1917" max="1980" value="1947" step="1">
            </div>
          </div>

          <div class="col-md-3" style="margin-left: 25%;">
            <label class="control-label required" for="ordenar"> Periodo Final </label>
            <div class="range-wrap2">
              <div class="range-value2" id="rangeV2"></div>
              <input id="range2" name="periodo_final" type="range" min="1917" max="1980" value="1948" step="1">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary right btn-default" id="buscar" name="hemeroteca_villaLobos">
              <span class="lfr-btn-label">Buscar</span> </button>
          </div>
        </div>
      </form>

    </div>





  </div>

 

  <?php


              if(isset($_POST['hemeroteca_villaLobos']))
              {

                $perido_inicial = filter_input(INPUT_POST, "periodo_inicial", FILTER_SANITIZE_MAGIC_QUOTES);
                $perido_final = filter_input(INPUT_POST, "periodo_final", FILTER_SANITIZE_MAGIC_QUOTES);
                $palavra_chave = filter_input(INPUT_POST, "palavra-chave", FILTER_SANITIZE_MAGIC_QUOTES);
                $qtd_exibicao = filter_input(INPUT_POST, "exibir", FILTER_SANITIZE_MAGIC_QUOTES);
                $idioma = filter_input(INPUT_POST, "idioma", FILTER_SANITIZE_MAGIC_QUOTES);
                
                  
                $db = mysqli_connect('localhost','root','','museu')
                or die('Error connecting to MySQL server.');
                $query =  "SELECT h.id,h.nome,h.periodo_inicial,h.periodo_final,h.texto_imagem,h.nacionalidade_recorte FROM hemeroteca h WHERE 
                (periodo_inicial = $perido_inicial OR periodo_inicial > $perido_inicial) AND (periodo_final = $perido_final OR periodo_final < $perido_final)
                AND (h.nacionalidade_recorte = '$idioma') 
                AND (h.texto_imagem LIKE '%$palavra_chave%') LIMIT $qtd_exibicao";

                $qr = mysqli_query($db, $query) or die('Error querying database.');
                $result = mysqli_query($db, $query);
                $row = mysqli_fetch_array($result);
                $qtd=0;
                
                echo "<input class='field field-required form-control' id='palavra-chave-teste' name='palavra-chave'
                placeholder='Ex: Livros, Poemas, Canções ...'
                title='Ex: Livros, Poemas, Canções ...' type='hidden' value='".$palavra_chave."' aria-required='true'>";

               echo "<div class='container'>
               <div class='row'>
                 <div class='col-xs-12'>
                   <div class='tituloWrapper' style='    margin-top: 40px;'>
                     <div class='titulo'>
                       Resultados da pesquisa (<span id='CountResult'>$result->num_rows</span>)
                     </div>
                   </div>
                 </div>
               </div>
               <div class='row'>
                 <div class='col-xs-12'>
                   <div class='row'>
                     <div class='pesquisaListWrapper'>
                       <div id='source''>
                        <div id='container2'>
                          <div id='container1'>";
                
                $cont = 0;
                $aux = 0;
                while($row = mysqli_fetch_assoc($qr)){
                 $cont++;
              
                    $nome_titulo = substr($row['nome'],0,-5);
                    $nome_img = $nome_titulo.".jpg";
                    
                  
                
                    if($cont % 2 == 0){
                      echo "
                      
                            <div id='col2' class='col-md-6 '>
                              <div class='pesquisaBoxWrapper'>
                                <div class='boxEsquerda megcE'>
                                  <div class='imagemJ'>
                                  <a  href='/prefeitura/Hemeroteca_template/img/".$nome_img."' rel='lightbox' title='".$nome_titulo."'>
                                    <img src='./img/".$nome_img."' class='img-responsive img_tamanho' alt='".$nome_img."'>
                                  </a>
                                  </div>
                                  
                                  <div class='pdfLink'>                 
                                    <a href='/prefeitura/Hemeroteca_template/img/".$nome_img."' download='".$nome_img."' >
                                      <img src='./img/download-direto.png' alt='".$nome_img."'>
                                      <div class='textPadrao' style='margin-top: -31px; margin-left: 39px;'>Download do recorte.</div>
                                    </a>
                                  </div>
                                </div>

                              
                                <div class='boxDireita megcE'>
                                  <div class='titAutWrapper'>
                                    <div class='titulo'>".$nome_titulo."</div>
                                    <div class='autor'></div>
                                  </div>
                                
                                  <div class='dataLocalWrapper textPadrao'>
                                    <div class='subtitulos'>Periodo
                                      <ul>
                                        <li><div class='data'>".$row['periodo_inicial']."-".$row['periodo_final']."</div> </li>
                                      </ul>
                                    </div>
                                  </div>

                                  <div class='subtitulos textPadrao'>Nacionalidade
                                    <div class='descricao'>
                                      <ul>
                                        <li>".$row['nacionalidade_recorte']."</li>
                                      </ul> 
                                    </div>
                                  </div>
                                  <div class='subtitulos section textPadrao'>Descrição
                                    <div class='container partial '  >
                                      
                                          ".$row['texto_imagem']."

                                      
                                    </div>
                                    <a class='txt-more' href='javascript:void(".$aux.");'></a>
                                  </div>
                                </div>

                              </div>
                            </div>
                          ";

                    }else{
                      echo "
                          
                            <div id= 'col1' class='col-md-6'>
                              <div class='pesquisaBoxWrapper'>
                                <div class='boxEsquerda megcE'>
                                  <div class='imagemJ'>
                                  <a  href='/prefeitura/Hemeroteca_template/img/".$nome_img."' rel='lightbox' title='".$nome_titulo."'>
                                  <img src='./img/".$nome_img."' class='img-responsive img_tamanho' alt='".$nome_img."'>
                                  </a>
                                  </div>
                                  <div class='pdfLink'>                 
                                    <a href='/prefeitura/Hemeroteca_template/img/".$nome_img."' download='".$nome_img."' >
                                      <img src='./img/download-direto.png' alt='".$nome_img."'>
                                      <div class='textPadrao' style='margin-top: -31px; margin-left: 39px;'>Download do recorte.</div>
                                    </a>
                                  </div>
                                </div>
                                <div class='boxDireita megcE'>
                                  <div class='titAutWrapper'>
                                    <div class='titulo'>".$nome_titulo."</div>
                                    <div class='autor'></div>
                                  </div>
                                
                                  <div class='dataLocalWrapper textPadrao'>
                                    <div class='subtitulos'>Periodo
                                      <ul>
                                        <li><div class='data'>".$row['periodo_inicial']."-".$row['periodo_final']."</div> </li>
                                      </ul>
                                    </div>
                                  </div>

                                  <div class='subtitulos textPadrao'>Nacionalidade
                                    <div class='descricao'>
                                      <ul>
                                        <li>".$row['nacionalidade_recorte']."</li>
                                      </ul> 
                                    </div>
                                  </div>
                                  <div class='subtitulos section textPadrao'>Descrição
                                    <div class='container partial '  >
                                      
                                          ".$row['texto_imagem']."

                                      
                                    </div>
                                    <a class='txt-more' href='javascript:void(".$aux.");'></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          
                        ";
                    }
                
                    $aux++;
                }
               
                echo "
                          </div>
                        </div>
                      </div>
                    <div class='clearfix'></div>
                  </div>
                </div>";
              }
            ?>




  </div>
  </div>

  </div>
  <!-- <div id="lightbox">
    <div id="outerImageContainer">
      <div id="imageContainer">
        <img id="lightboxImage">
        <div style="" id="hoverNav">
          <a href="#" id="prevLink"></a>
          <a href="#" id="nextLink"></a>
        </div>
        <div id="loading">
          <a href="#" id="loadingLink">
            <img src="images/loading.gif">
          </a>
        </div>
      </div>
    </div>
    <div id="imageDataContainer">
      <div id="imageData">
        <div id="imageDetails">
          <span id="caption"></span>
          <span id="numberDisplay"></span>
        </div>
        <div id="bottomNav">
          <a href="#" id="bottomNavClose">
            <img src="images/close.gif">
          </a>
        </div>
      </div>
    </div>
  </div> -->

  <!-- JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.js"></script>
  <script type="text/javascript" src="js/prototype.js"></script>
  <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
  <script type="text/javascript" src="js/lightbox.js"></script>
  <script src="./util/mark.js/dist/mark.min.js"></script>

  <script src="./js/script.js"></script>


</body>

</html>