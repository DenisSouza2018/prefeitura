<?php
 

    $to = "fake.tracoleal@gmail.com";
    $subject = "Formulário de inscrição - Pessoa Jurídica";
    
    /*SALVAR O IP DE QUEM ESTÁ ENVIANDO O FORMULARIO*/
        if ( isset ( $_SERVER [ 'HTTP_X_FORWARDED_FOR' ])  && $_SERVER [ 'HTTP_X_FORWARTDED_FOR' ]  !=  '' )  {
            $ip_address = $_SERVER [ 'HTTP_X_FORWARDED_FOR' ]; 
        }  else{
            $ip_address = $_SERVER [ 'REMOTE_ADDR' ]; 
        }
    /*FIM DA PARTE QUE SALVA O IP DE QUEM ESTÁ ENVIANDO O FORMULARIO*/	


    if($_POST['razao'] != ''){

        // Cadastro de uma pessoa Juridica;
        $razaoSocial = $_POST['razao'];
        $nomeFantasia = $_POST['fantasia'];
        $cnpj = $_POST['cnpj'];
        $inscricao_estadual = $_POST['estadual'];
        $cep_empresa = $_POST['cep'];
        $endereco_empresa = $_POST['endereco'];
        $numero_empresa = $_POST['numero'];
        $complemento_empresa = $_POST['complemento'];
        $bairro_empresa = $_POST['bairro'];
        $cidade_empresa = $_POST['cidade'];
        $estado_empresa = $_POST['estado'];
        $contato_empresa =$_POST['contato'];
        $cargo = $_POST['cargo'];
        $departamento = $_POST['departamento'];
        $telefone_empresa = $_POST['telefone'];
        $fax_empresa = $_POST['fax'];
        $email_empresa = $_POST['email'];
        $pagamento = 'ARRUMAR FORMULARIO';
        $tipo_pagamento = 'ARRUMAR FORMULARIO';
        $especificacao = $_POST['especificacao'];
        $email_nota_fiscal = $_POST['email_nota_fiscal'];
        $opcao_email_nota = $_POST['opcao_email_nota'];
        $mais_email_nota = $_POST['mais_email_nota'];
        $extras = $_POST['extras'];
        $informacoes_nota = $_POST['informacoes_nota'];
        $prazo_emissao = $_POST['prazo_emissao'];
        $dia_semana = $_POST['dia_semana'];
        
        // Pessoas cadastradas nos treinamento de uma pessoa
        $treinamento1 = $_POST['treinamento1'];
        $dataT1 = $_POST['dataT1'];
        $escolaridade1 = $_POST['escolaridade1'];
        $nomeParticipante1 = $_POST['nomeParticipante1'];
        $formacao1 = $_POST['formacao1'];
        $cep1 = $_POST['cep1'];
        $endereco1 = $_POST['endereco1'];
        $numero1 = $_POST['numero1'];
        $complemento1 = $_POST['complemento1'];
        $bairro1 = $_POST['bairro1'];
        $dataNasc1 = $_POST['dataNasc1'];
        $cpf1 = $_POST['cpf1'];
        $rg1 = $_POST['rg1'];
        $orgaoEx1 = $_POST['orgaoEx1'];
        $cidade1 = $_POST['cidade1'];
        $celular1 =$_POST['celular1'];
        $estado1 = $_POST['estado1'];
        $email1 = $_POST['email1'];
        $telResidencial = $_POST['telResidencial1']; 

        // Dados de varios participantes;
        $dados = $_COOKIE['dados'];

        
        // 
        $html ="
        <html>
        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <title>Formulário de inscrição - Pessoa Jurídica</title>
        </head>

        <body>
        <p><img src='http://www.fupai.com.br/imagens/fixas/logofupai.png' /></p>
        <div style='font-family: Calibri, sans-serif; font-weight: bold; text-align: left;'>

            <table colspan='10' style='border: 2px solid #336699; font-size:12px; font-family:  Calibri, sans-serif; width: 715px;'>
             <tr>
                <td style='color: #336699; font-weight: bold; font-size:14px; border: 1px solid #000000;' colspan='10'>Dados da empresa</td>
              </tr>
              
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Razão social</td>
                <td style='border: 1px solid #000000;' colspan='8'>$razaoSocial</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nome fantasia</td>
                <td style='border: 1px solid #000000;' colspan='8'>$nomeFantasia</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CNPJ</td>
                <td style='border: 1px solid #000000;' colspan='3'>$cnpj</td>
                <td style='font-weight: bold; color: #336699;border: 1px solid #000000;' colspan='2'>Inscrição estadual</td>
                <td style='border: 1px solid #000000;' colspan='3'>$inscricao_estadual</td>
              </tr>
              <tr>
                <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Endereço</td>
                <td style='border: 1px solid #000000;' colspan='8'>$endereco_empresa</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Número</td>
                <td style='border: 1px solid #000000;' colspan='2'>$numero_empresa</td>
                <td colspan='1'></td>
                <td style='font-weight: bold; color: #336699;border: 1px solid #000000;' colspan='2'>Complemento</td>
                <td style='border: 1px solid #000000;' colspan='3'>$complemento_empresa</td>
              </tr>
              <tr>
                <td  colspan='2' style='color: #336699; font-weight: bold; border: 1px solid #000000;'>Bairro</td>
                <td style='border: 1px solid #000000;' colspan='8'>$bairro_empresa</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Cidade</td>
                <td style='border: 1px solid #000000;' colspan='4'>$cidade_empresa</td>
                <td style='border: 1px solid #000000;' colspan='1'>$estado_empresa</td>
                <td colspan='1' style='color: #336699; border: 1px solid #000000;'>CEP</td>
                 <td style='border: 1px solid #000000;' colspan='2'>$cep_empresa</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Contato</td>
                <td style='border: 1px solid #000000;' colspan='8'>$contato_empresa</td>
              </tr>
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold; border: 1px solid #000000;'>Cargo</td>
                <td style='border: 1px solid #000000;' colspan='4'>$cargo</td>
                <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Departamento</td>
                <td style='border: 1px solid #000000;' colspan='3'>$departamento</td>
              </tr>
              <tr>
                <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Telefone</td>
                <td style='border: 1px solid #000000;' colspan='3'>$telefone_empresa</td>
                <td style='color: #336699; font-weight: bold; border: 1px solid #000000;' colspan='2'>Fax</td>
                <td style='border: 1px solid #000000;' colspan='3'>$fax_empresa</td>
              </tr>
              <tr>
                <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>E-mail</td>
                <td style='border: 1px solid #000000;' colspan='8'>$email_empresa</td>
              </tr>
              <tr>
                <td style='color: #336699; font-weight: bold; font-size:14px; border: 1px solid #000000;' colspan='10'>Forma de pagamento</td>
              </tr>
              
              <tr>
                <td colspan='2'style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Tipo</td>
                <td style='border: 1px solid #000000;' colspan='8'>$pagamento</td>
             </tr>
             <tr>
                     <td colspan='2' style='color: #336699; font-weight: bold; border: 1px solid #000000;'>Dados do pagamento </td>
                    <td style='border: 1px solid #000000;' colspan='8'>$tipo_pagamento</td>
                
             </tr>
             
             <tr>
                <td style='color: #336699; font-weight: bold; font-size:14px;border: 1px solid #000000;' colspan='10'>Dados da nota</td>
              </tr>
              
             <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Email para NF-e</td>
                <td style='border: 1px solid #000000;' colspan='8'>$email_nota_fiscal / $mais_email_nota</td>
              </tr>
             
             <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Informações</td>
                <td style='border: 1px solid #000000;' colspan='8'>$informacoes_nota</td>
              </tr>
              
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold; border: 1px solid #000000;'>Prazo para emissão</td>
                <td style='border: 1px solid #000000;' colspan='8'>$prazo_emissao</td>
              </tr>
              
              <tr>
                <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Dia para vencimento</td>
                <td style='border: 1px solid #000000;' colspan='8'>$dia_semana</td>
              </tr>
              <tr>
                <td colspan='10'></td>
             </tr>
             <tr>
                <td colspan='10'></td>
             </tr>";

        

             $html_corpo='';

             $html_titulo="
                   <tr>
                     <td colspan='10' style='color: #336699; font-weight: bold; font-size:14px;border: 1px solid #000000;'>Dados do participante</td>
                   </tr>
                  
             ";
 
             $html_fim = "
             
                   <tr>
                       <td colspan='2' style='color: #336699; font-weight: bold; border-top: 2px solid #000000;border-left: 2px solid #000000; border-right: 2px solid #000000;'>&nbsp;</td>
                     <td style='border: 1px solid #000000;' colspan='8' rowspan='3'></td>
                   </tr>
                   <tr>
                       <td colspan='2' style='color: #336699; font-weight: bold;border-left: 2px solid #000000; border-right: 2px solid #000000;'>Observação</td>
                   </tr>
                   <tr>
                       <td colspan='2' style='color: #336699; font-weight: bold;border-bottom: 2px solid #000000;border-left: 2px solid #000000; border-right: 2px solid #000000;'>&nbsp;</td>
                   </tr>
                 </table>
             </div>
             </body>
             </html>
               ";

        // Cadastrar os participantes que estão nos cookies e no corpo do ultimo POST
        if(sizeof(json_decode($dados)) > 0 && $nomeParticipante1 != ''){
          print_r ('Lista com '.sizeof(json_decode($dados)).' participantes ');
          echo " | Com dados no ultimo POST ";
          $html_corpo_ultimo_post = '';
          if($treinamento1 != '' && $dataT1  != '' && $nomeParticipante1 != '' && $cep1 != '' && $endereco1 != '' && $numero1 != '' && $bairro1 != '' && $cep1 != '' && $rg1 != '' && $orgaoEx1 != '' && $cidade1 != '' && $celular1 != '' && $estado1 != '' && $email1 != '' && $telResidencial){
          $html_corpo_ultimo_post ="
          <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Treinamento</td>
               <td colspan='8' style='border: 1px solid #000000; font-size: 14px;'>$treinamento1</td>
           </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Data</td>
               <td style='border: 1px solid #000000; font-size: 14px;' colspan='8'>$dataT1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nome</td>
               <td style='border: 1px solid #000000;' colspan='8'>$nomeParticipante1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Escolaridade</td>
               <td style='border: 1px solid #000000;' colspan='3'>$escolaridade1</td>
               <td colspan='2'><span style='color: #336699; font-weight: bold;'>Formação</span></td>
               <td colspan='3' style='color: #000;border: 1px solid #000000;'>$formacao1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nascimento</td>
               <td style='border: 1px solid #000000;' colspan='2'>$dataNasc1</td>
               <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CPF</td>
               <td style='border: 1px solid #000000;' colspan='2'>$cpf1</td>
               <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>RG</td>
               <td style='border: 1px solid #000000;' colspan='2'>$rg1 - $orgaoEx1</td>
             </tr>
             <tr>
               <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Endereço</td>
               <td style='border: 1px solid #000000;' colspan='8'>$endereco1</td>
             </tr>
              <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Número</td>
               <td style='border: 1px solid #000000;' colspan='2'>$numero1</td>
               <td colspan='2'><span style='color: #336699; font-weight: bold;'>Complemento</span></td>
               <td colspan='4' style='color: #000;border: 1px solid #000000;'>$complemento1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Bairro</td>
               <td style='border: 1px solid #000000;' colspan='8'>$bairro1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Cidade</td>
               <td style='border: 1px solid #000000;' colspan='2'>$cidade1</td>
               <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Estado</td>
               <td style='border: 1px solid #000000;' colspan='1'>$estado1</td>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CEP</td>
               <td style='border: 1px solid #000000;' colspan='2'>$cep1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Telefone residencial</td>
               <td style='border: 1px solid #000000;' colspan='3'>$telResidencial</td>
               <td colspan='2'><span style='color: #336699; font-weight: bold;'>Celular</span></td>
               <td colspan='3' style='color: #000;border: 1px solid #000000;'>$celular1</td>
             </tr>
             <tr>
               <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>E-mail</td>
               <td style='border: 1px solid #000000;' colspan='8'>$email1</td>
             </tr>
             ";}           

          foreach (json_decode($dados) as $key => $value) {
            //echo '<pre>';
           // print_r($value);

           $html_corpo .="
             <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Treinamento</td>
                  <td colspan='8' style='border: 1px solid #000000; font-size: 14px;'>$value->treinamento</td>
              </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Data</td>
                  <td style='border: 1px solid #000000; font-size: 14px;' colspan='8'>$value->dataT</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nome</td>
                  <td style='border: 1px solid #000000;' colspan='8'>$value->nome</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Escolaridade</td>
                  <td style='border: 1px solid #000000;' colspan='3'>$value->escolaridade</td>
                  <td colspan='2'><span style='color: #336699; font-weight: bold;'>Formação</span></td>
                  <td colspan='3' style='color: #000;border: 1px solid #000000;'>$value->formacao</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nascimento</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->dataNasc</td>
                  <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CPF</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->cpf</td>
                  <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>RG</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->rg - $value->orgaoEx</td>
                </tr>
                <tr>
                  <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Endereço</td>
                  <td style='border: 1px solid #000000;' colspan='8'>$value->endereco</td>
                </tr>
                 <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Número</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->numero</td>
                  <td colspan='2'><span style='color: #336699; font-weight: bold;'>Complemento</span></td>
                  <td colspan='4' style='color: #000;border: 1px solid #000000;'>$value->complemento</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Bairro</td>
                  <td style='border: 1px solid #000000;' colspan='8'>$value->bairro</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Cidade</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->cidade</td>
                  <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Estado</td>
                  <td style='border: 1px solid #000000;' colspan='1'>$value->estado</td>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CEP</td>
                  <td style='border: 1px solid #000000;' colspan='2'>$value->cep</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Telefone residencial</td>
                  <td style='border: 1px solid #000000;' colspan='3'>$value->telResidencial</td>
                  <td colspan='2'><span style='color: #336699; font-weight: bold;'>Celular</span></td>
                  <td colspan='3' style='color: #000;border: 1px solid #000000;'>$value->celular</td>
                </tr>
                <tr>
                  <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>E-mail</td>
                  <td style='border: 1px solid #000000;' colspan='8'>$value->email</td>
                </tr>
                ";              
            
          }
          $html_final = '';
          if($html_corpo_ultimo_post != ''){
          $html_final = $html . $html_titulo . $html_corpo_ultimo_post .$html_corpo . $html_fim;
          }else{
            $html_final = $html . $html_titulo . $html_corpo . $html_fim;
          }            
          echo $html_final;

        }


        // Cadastrar os participantes que estão nos cookies
        if(sizeof(json_decode($dados)) > 0 && $nomeParticipante1 == ''){
            
            print_r ('Lista com '.sizeof(json_decode($dados)).' participantes ');
            
           
            foreach (json_decode($dados) as $key => $value) {
              //echo '<pre>';
             // print_r($value);
 
             $html_corpo .="
               <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Treinamento</td>
                    <td colspan='8' style='border: 1px solid #000000; font-size: 14px;'>$value->treinamento</td>
                </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Data</td>
                    <td style='border: 1px solid #000000; font-size: 14px;' colspan='8'>$value->dataT</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nome</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$value->nome</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Escolaridade</td>
                    <td style='border: 1px solid #000000;' colspan='3'>$value->escolaridade</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Formação</span></td>
                    <td colspan='3' style='color: #000;border: 1px solid #000000;'>$value->formacao</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nascimento</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->dataNasc</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CPF</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->cpf</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>RG</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->rg - $value->orgaoEx</td>
                  </tr>
                  <tr>
                    <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Endereço</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$value->endereco</td>
                  </tr>
                   <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Número</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->numero</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Complemento</span></td>
                    <td colspan='4' style='color: #000;border: 1px solid #000000;'>$value->complemento</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Bairro</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$value->bairro</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Cidade</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->cidade</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Estado</td>
                    <td style='border: 1px solid #000000;' colspan='1'>$value->estado</td>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CEP</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$value->cep</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Telefone residencial</td>
                    <td style='border: 1px solid #000000;' colspan='3'>$value->telResidencial</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Celular</span></td>
                    <td colspan='3' style='color: #000;border: 1px solid #000000;'>$value->celular</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>E-mail</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$value->email</td>
                  </tr>
                  ";

                 
                
              
            }


            
           $html_final = $html . $html_titulo . $html_corpo . $html_fim;

            
           echo $html_final;

           //Limpa os Cookies
           //unsetcookie('dados');

           //header('Location:/prefeitura/stepform-jquery/solucao1.html?sucess=1'); 

        }

        // Cadastrar apenas um participante, sendo os dados do POST mesmo.
        if(sizeof(json_decode($dados)) == 0  && $nomeParticipante1 != '' ){
          echo "Lista com 1 participante !";
            $html_corpo="
                  <tr>
                    <td colspan='10' style='color: #336699; font-weight: bold; font-size:14px;border: 1px solid #000000;'>Dados do participante</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Treinamento</td>
                    <td colspan='8' style='border: 1px solid #000000; font-size: 14px;'>$treinamento1</td>
                </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Data</td>
                    <td style='border: 1px solid #000000; font-size: 14px;' colspan='8'>$dataT1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nome</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$nomeParticipante1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Escolaridade</td>
                    <td style='border: 1px solid #000000;' colspan='3'>$escolaridade1</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Formação</span></td>
                    <td colspan='3' style='color: #000;border: 1px solid #000000;'>$formacao1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Nascimento</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$dataNasc1</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CPF</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$cpf1</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>RG</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$rg1 - $orgaoEx1</td>
                  </tr>
                  <tr>
                    <td  colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Endereço</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$endereco1</td>
                  </tr>
                   <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Número</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$numero1</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Complemento</span></td>
                    <td colspan='4' style='color: #000;border: 1px solid #000000;'>$complemento1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Bairro</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$bairro1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Cidade</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$cidade1</td>
                    <td colspan='1' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Estado</td>
                    <td style='border: 1px solid #000000;' colspan='1'>$estado1</td>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>CEP</td>
                    <td style='border: 1px solid #000000;' colspan='2'>$cep1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>Telefone residencial</td>
                    <td style='border: 1px solid #000000;' colspan='3'>$telResidencial</td>
                    <td colspan='2'><span style='color: #336699; font-weight: bold;'>Celular</span></td>
                    <td colspan='3' style='color: #000;border: 1px solid #000000;'>$celular1</td>
                  </tr>
                  <tr>
                    <td colspan='2' style='color: #336699; font-weight: bold;border: 1px solid #000000;'>E-mail</td>
                    <td style='border: 1px solid #000000;' colspan='8'>$email1</td>
                  </tr>
                  <tr>
                      <td colspan='2' style='color: #336699; font-weight: bold; border-top: 2px solid #000000;border-left: 2px solid #000000; border-right: 2px solid #000000;'>&nbsp;</td>
                    <td style='border: 1px solid #000000;' colspan='8' rowspan='3'></td>
                  </tr>
                  <tr>
                      <td colspan='2' style='color: #336699; font-weight: bold;border-left: 2px solid #000000; border-right: 2px solid #000000;'>Observação</td>
                  </tr>
                  <tr>
                      <td colspan='2' style='color: #336699; font-weight: bold;border-bottom: 2px solid #000000;border-left: 2px solid #000000; border-right: 2px solid #000000;'>&nbsp;</td>
                  </tr>
                </table>
            </div>
            </body>
            </html>
            ";
            

          $html_final = $html . $html_corpo;

          echo $html_final;

          header('Location:/prefeitura/stepform-jquery/solucao1.html?sucess=1'); 
        }

        
    
    }

    
    // Função responsavel por limpar cookeis
    function unsetcookie($key, $path = '', $domain = '', $secure = false)
    {
        if (array_key_exists($key, $_COOKIE)) {
            if (false === setcookie($key, null, -1, $path, $domain, $secure)) {
                return false;
            }
    
            unset($_COOKIE[$key]);
        }
    
        return true;
    }


     
        
        
      
    
           
            
?>