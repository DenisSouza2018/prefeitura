<?php
    //Step1
    $db = mysqli_connect('localhost','root','','db_prefeitura')
    or die('Error connecting to MySQL server.');

    //Step2
    $query = "SELECT DISTINCT rh.numero_ordem as n_ordem, rh.protocolo_historico as protocolo,f.data_envio,f.nome,f.email,f.cpf_cnpj,f.tema_comentario,f.tipo_comentario,f.anexo,f.status,
    (SELECT hr.id as id_historico from historico_resposta hr WHERE hr.numero_ordem = n_ordem ORDER BY hr.id DESC LIMIT 1) as id_auxiliar,
    (SELECT rp.texto as texto_historico from historico_resposta rp WHERE rp.id = id_auxiliar) as texto 
    FROM historico_resposta rh INNER JOIN formulario f ON f.id = rh.numero_ordem ORDER BY rh.id DESC";
    mysqli_query($db, $query) or die('Error querying database.');

    $result = mysqli_query($db, $query);

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
        <script src="https://kit.fontawesome.com/7d33aafd44.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="container">

            <div class="container col-md-10">
                --- container 1 ----

                <br>
            </div>

            <div class='container col-md' style='    overflow: auto;    height: 300px;'>

                <table id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="th-sm">Nome
                            </th>
                            <th class="th-sm">E-mail
                            </th>
                            <th class="th-sm">CPF/CNPJ
                            </th>
                            <th class="th-sm">Tema comentario
                            </th>
                            <th class="th-sm">Tipo do comentario
                            </th>
                            <th class="th-sm">Protocolo
                            </th>
                            <th class="th-sm">Status
                            </th>
                            <th class="th-sm">Ações
                            </th>

                        </tr>
                    </thead>
                    <tbody>                       
                        <?php
                            while($row = mysqli_fetch_array($result)) 
                            {
                                echo " 
                                <tr>
                                <td>
                                    ".$row['nome']."
                                </td>
                                <td>
                                ".$row['email']."
                                </td>
                                <td>
                                ".$row['cpf_cnpj']."
                                </td>
                                <td>
                                ".$row['tema_comentario']."
                                </td>
                                <td>
                                ".$row['tipo_comentario']."
                                </td>
                                <td>
                                ".$row['protocolo']."
                                </td>
                                <td>
                                ".$row['status']."
                                </td>
                                <td>

                                    <button type='button' class='btn btn-success' data-toggle='tooltip' data-placement='top'
                                        title='Responder fiscalização' onclick='myEdicao".$row['n_ordem']."(value)' value=".$row['n_ordem']."><i
                                            class='fas fa-edit'></i></button>
                                    <script>
                                        function myEdicao".$row['n_ordem']."(id) {

                                            document.getElementById('formulario').innerHTML = 
                                            `
                                            <form method='post' action=''>

                                                <div class='form-group'>
                                                    <label for='' style='margin-left:43%;'><b>Dados da Notificação</b></label>
                                                    <div class='form-row'>
                                                        <div class='col-md-4 mb-3'>
                                                            <label for='nome'>Nome</label>
                                                            <input type='text' class='form-control' name='nome' value=".$row['nome']."  readonly>
                                                        </div>
                                                        <div class='col-md-4 mb-3'>
                                                            <label for='cpfcnpj'>CPF/CNPJ</label>
                                                            <input type='text' class='form-control' name='cpfcnpj' value='".$row['cpf_cnpj']."'  readonly>
                                                        </div>
                                                        <div class='col-md-4 mb-3'>
                                                            <label for='protocolo'>Protocolo</label>
                                                            <input type='text' class='form-control' name='protocolo'  value='".$row['protocolo']."' readonly >
                                                        </div>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='col-md-6 mb-3'>
                                                            <label for='email'>E-mail</label>
                                                            <input type='text' class='form-control' name='email' value='".$row['email']."'  readonly>
                                                        </div>
                                                        <div class='col-md-3 mb-3'>
                                                            <label for='status'>Status</label>
                                                            <input type='text' class='form-control' name='status' value='".$row["status"]."'  readonly>
                                                           
                                                        </div>
                                                        <div class='col-md-3 mb-3'>
                                                            <label for='id_ordem'>Ordem da fiscalização</label>
                                                            <input type='text' class='form-control' name='id_ordem' value='".$row['n_ordem']."'  readonly>
                                                        </div>
                                                    </div>
                                                    <div class='form-row'>
                                                        <div class='col-md-6 mb-3'>
                                                            <label for='tema'>Tema Comentario</label>
                                                            <input type='text' class='form-control' name='tema' value='".$row['tema_comentario']."'  readonly>
                                                        </div>
                                                        <div class='col-md-6 mb-3'>
                                                            <label for='tipo'>Tipo Comentario</label>
                                                            <input type='text' class='form-control' name='tipo' value='".$row['tipo_comentario']."'  readonly>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                               
                                                
                                                <button type='submit' name='ver_historico' class='btn btn-primary'>Ver Historico</button><br><br>
                                                </form>
                                            `;
                                        }
                                    </script>
                                        <button type='button' class='btn btn-primary' data-toggle='tooltip' data-placement='top'
                                            title='Baixar Anexo'><i class='fas fa-download'></i></button>

                                </td>
                                </tr>
                                "; 
                            } 
                        ?>
                    </tbody>
                </table>
                
            </div>
            
            <div class="container col-md">
                <br>
                <p id="formulario"></p> 

                <?php


                if(isset($_POST['ver_historico'])){
                    //$status = $_POST['skills'];
                    $status = $_POST['status'];
                    $protocolo = filter_input(INPUT_POST, "protocolo", FILTER_SANITIZE_MAGIC_QUOTES);
                    $id = filter_input(INPUT_POST, "id_ordem", FILTER_SANITIZE_MAGIC_QUOTES);
                    

                    echo" 
                    <form method='post' action='prefeitura/formulario/classe/Resposta.php'>
                        <div class='form-group'>
                        <label for='' style='margin-left:43%;'><b>Dados da Notificação</b></label>
                        <div class='form-row'>
                            <div class='col-md-4 mb-3'>
                                <label for='nome'>Nome</label>
                                <input type='text' class='form-control' name='nome' value=".$_POST['nome']."  readonly>
                            </div>
                            <div class='col-md-4 mb-3'>
                                <label for='cpfcnpj'>CPF/CNPJ</label>
                                <input type='text' class='form-control' name='cpfcnpj' value='".$_POST['cpfcnpj']."'  readonly>
                            </div>
                            <div class='col-md-4 mb-3'>
                                <label for='protocolo'>Protocolo</label>
                                <input type='text' class='form-control' name='protocolo'  value='".$_POST['protocolo']."' readonly >
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-6 mb-3'>
                                <label for='email'>E-mail</label>
                                <input type='text' class='form-control' name='email' value='".$_POST['email']."'  readonly>
                            </div>
                            <div class='col-md-3 mb-3'>
                                <label for='status'>Status</label>
                                <select class='custom-select mr-sm-2' id='inlineFormCustomSelect' name='skills[]'>
                                <option  value=$status>$status</option>
                                <option value='ABERTO'>ABERTO</option>
                                <option value='FINALIZADO COM SUCESSO'>FINALIZADO COM SUCESSO</option>
                                <option value='FINALIZADO SEM SUCESSO'>FINALIZADO SEM SUCESSO</option>
                                </select>
                            </div>
                            <div class='col-md-3 mb-3'>
                                <label for='id_ordem'>Ordem da fiscalização</label>
                                <input type='text' class='form-control' name='id_ordem' value='".$_POST['id_ordem']."'  readonly>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='col-md-6 mb-3'>
                                <label for='tema'>Tema Comentario</label>
                                <input type='text' class='form-control' name='tema' value='".$_POST['tema']."'  readonly>
                            </div>
                            <div class='col-md-6 mb-3'>
                                <label for='tipo'>Tipo Comentario</label>
                                <input type='text' class='form-control' name='tipo' value='".$_POST['tipo']."'  readonly>
                            </div>
                        </div>
                    
                    </div>";
                    
                    $query = "SELECT * FROM historico_resposta WHERE protocolo_historico = $protocolo;";                
                    mysqli_query($db, $query) or die('Error querying database.');
                    $result = mysqli_query($db, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                        echo"";
                        echo"".$row['data_envio']." -  ".$row['nome'].": ".$row['texto']."";
                        echo "<br />";
                    }

                    echo "
                    

    
                        <div class='form-group'>
                        <br>
                            <label for='resposta' >Responder Solicitação</label>
                            <textarea class='form-control' name='resposta' rows='3' ></textarea>
                        </div>

                        <button type='submit' name='ok' class='btn btn-primary' >Enviar Resposta</button><br><br>
                    </form>";}
              
                ?>
                
            </div>

        </div>

    </body>

    
</html>