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
        
        $extensao = strtolower(substr($_FILES['anexo']['name'],-4));
        $novo_nome = md5(time()).$extensao;
        $diretorio = "upload/";
        move_uploaded_file($_FILES['anexo']['tmp_name'],$diretorio.$novo_nome);

        $anexo = filter_input(INPUT_POST, "anexo", FILTER_SANITIZE_MAGIC_QUOTES);



        $protocolo = mt_rand();
        while(strlen($protocolo) != 10){
            $protocolo = mt_rand();
        }    
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d/m/Y  H:i:s');
       
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
            $envio->setAnexo($novo_nome);
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
          //  Email($EmailPrefeitura,$SenhaPrefeitura,$EmailDestinatario,$Mensagem,$BodyDestinatario);
            
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
            //$mail->addAddress('endereco2@provedor.com.br');
        
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