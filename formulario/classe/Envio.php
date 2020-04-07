<?php
    require_once 'Crud.php';
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
    
    header ('Content-type: text/html; charset=UTF-8');
    session_start();

    function __autoload($class_name){ require_once 'C:/xampp/htdocs/prefeitura/formulario/classe/'. $class_name . '.php'; }

    $envio = new Formulario();
    
    if(isset($_POST['ok'])) {
        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_MAGIC_QUOTES);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
        $cpfcnpj = filter_input(INPUT_POST, "cpfcnpj", FILTER_SANITIZE_MAGIC_QUOTES);
        $tema_comentario = filter_input(INPUT_POST, "tema-comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        $tipo_comentario = filter_input(INPUT_POST, "tipo_comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        $texto_comentario = filter_input(INPUT_POST, "texto_comentario", FILTER_SANITIZE_MAGIC_QUOTES);
        
        

        $protocolo = mt_rand();
        while(strlen($protocolo) != 10){
            $protocolo = mt_rand();
        }    
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y  H:i:s');

        /* CONFIGURA ANEXO */
        if($_FILES['arquivo']['tmp_name'] == ''){
            $anexo_name = "arquivo_default.pdf";
        }else{
        //Pasta onde o arquivo vai ser salvo
		$_UP['pasta'] = 'uploads/';
			
		//Tamanho máximo do arquivo em Bytes
		$_UP['tamanho'] = 1024*1024*100; //5mb
			
		//Array com a extensões permitidas
		$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif','pdf');
			
		//Renomeiar
		$_UP['renomeia'] = false;
			
		//Array com os tipos de erros de upload do PHP
		$_UP['erros'][0] = 'Não houve erro';
		$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
		$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
		$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
		$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
			
		//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
		if($_FILES['arquivo']['error'] != 0){
			die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
			exit; //Para a execução do script
		}
			
		//Faz a verificação da extensao do arquivo
		$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/prefeitura/formulario/incluir-participacao.php'>
				<script type=\"text/javascript\">
					alert(\"Extensão de arquivo inválida.\");
				</script>
			";
		}
			
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
			echo "
	    		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/prefeitura/formulario/incluir-participacao.php'>
				<script type=\"text/javascript\">
					alert(\"Arquivo muito grande.\");
				</script>
			";
		}
			
		//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta upload
		else{
			//Primeiro verifica se deve trocar o nome do arquivo
			if($UP['renomeia'] == true){
				//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
				$nome_final = time().'.jpg';
			}else{
				//mantem o nome original do arquivo
				$nome_final = $_FILES['arquivo']['name'];
			}
			//Verificar se é possivel mover o arquivo para a pasta escolhida
			if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
                //Upload efetuado com sucesso, exibe a mensagem
                    $anexo_name = $nome_final;
					/* $query = mysqli_query($conn, "INSERT INTO usuarios (
					nome_imagem) VALUES('$nome_final')"); */
					/* echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
					"; */	
				}/* else{
					//Upload não efetuado com sucesso, exibe a mensagem
					echo "
						<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/upload_imagem.php'>
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
					";
				} */
			}

        }
        /* FIM DA CONFIGURAÇÃO DE ANEXO */


       
        //Validando campos só realiza o cadastro caso não seja null
        if($nome != null && $email != null && $cpfcnpj != null && $tema_comentario != null && $tipo_comentario != null && $texto_comentario != null  && $protocolo != null )
        {      
            $envio->setId('');
            $envio->setDataEnvio($date);
            $envio->setNome($nome);
            $envio->setEmail($email);
            $envio->setCpfcnpj($cpfcnpj);
            $envio->setTemaComentario($tema_comentario);
            $envio->setTipoComentario($tipo_comentario);
            $envio->setAnexo($anexo_name);
            $envio->setProtocolo($protocolo);
            $envio->setStatus('ABERTO');
            $envio->setTexto($texto_comentario);
            $envio->setOrdem('');
            $envio->insert();
            $envio->insert_historio_resposta();

            //>>>>>>>> !!!  CONFIGURAR EMAIL PREFEITURA !!! <<<<<<
            $EmailPrefeitura = 'COLOCAR O EMAIL QUE SERÁ USADO PARA ENVIAR';
            $SenhaPrefeitura = 'SENHA DESTE EMAIL';
            $EmailDestinatario = $email;
           
            
            //Mensagem para o usuario com apenas o Protocolo
            $BodyDestinatario = "<label ><b>Numero do Protocolo: </b>".$protocolo."</label>";
            $Mensagem = "Numero do Protocolo: ";
           // Email($EmailPrefeitura,$SenhaPrefeitura,$EmailDestinatario,$Mensagem,$BodyDestinatario);
            
            //Mensagem para alguem da prefeitura com dados pedido sendo: NOME,EMAIL,DATA,PROTOCOLO
            $BodyDestinatario ="<b>Requerimento Emitido </b><br><b>Data: </b>${date}<br><b>Nome: </b>${nome}<br><b>E-mail: </b>${email}<br><b>Numero do Protocolo:</b> ${protocolo}";
            $Mensagem = "Requerimento Emitido Data: Nome: E-mail: Numero do Protocolo:";
           
           /*  if( Email($EmailPrefeitura,$SenhaPrefeitura,$EmailPrefeitura,$Mensagem,$BodyDestinatario)){
                header('Location:/prefeitura/formulario/incluir-participacao.html'); 
            } */
            header('Location:/prefeitura/formulario/incluir-participacao.php'); 
            
        } 
        header('Location:/prefeitura/formulario/incluir-participacao.php'); 
    }

    // Função responsavel por disparar o email de acordo com os dados de parametro
    function Email($EmailPrefeitura,$SenhaPrefeitura,$EmailDestinatario,$Mensagem,$Body){
        $mail = new PHPMailer();

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $EmailPrefeitura;
            $mail->Password = $SenhaPrefeitura;
            $mail->Port = 587;
        
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                 )
                );
                
            $mail->setFrom($EmailPrefeitura);
            $mail->addAddress($EmailDestinatario);
        
            $mail->isHTML(true);
            $mail->addAttachment('img/camara.png');
            $mail->Subject = 'Fiscaliza Itajuba - Protocolo do Requerimento';
            $mail->Body = $Body;
            $mail->AltBody = $Mensagem;
        
            if($mail->send()) {
                //echo 'Email enviado com sucesso';
                return true;
            } else {
                //echo 'Email nao enviado';
                return false;
            }
        } catch (Exception $e) {
            //echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
            return false;
        }

    }
?>