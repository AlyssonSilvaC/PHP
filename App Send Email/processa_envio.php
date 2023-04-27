<?php 

require "./bibliotecas/PHPMailer/Exception.php";
require "./bibliotecas/PHPMailer/OAuth.php";
require "./bibliotecas/PHPMailer/PHPMailer.php";
require "./bibliotecas/PHPMailer/POP3.php";
require "./bibliotecas/PHPMailer/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem{

        private $para = null;
        private $assunto = null;
        private $mensagem = null;
        public $status = array ("codigo_status" => null, "descricao_status" => '');

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function __get($atributo){
            return $this->$atributo;
        }

        public function validarMensagem(){
           
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }
            return true;
            
        }
        
    }

    $mensagem = new Mensagem();

    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);


    if(!$mensagem->validarMensagem()){ 
        echo 'Mensagem invalida';
        header('Location: index.php');
    }

    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                                   //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alyssoncassimiro316@gmail.com';        //SMTP username
    $mail->Password   = 'gkpwodsbefsosgnx';                     //SMTP password
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_STARTTLS;                                  //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('alyssoncassimiro316@gmail.com', 'raça absoluta');
    $mail->addAddress($mensagem->__get('para'));            //Add a recipient
    
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                    //Set email format to HTML
    $mail->Subject = $mensagem->__get('assunto');
    $mail->Body    = $mensagem->__get('mensagem');
    $mail->AltBody = 'É necessario utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem';

    $mail->send();

    $mensagem->status['codigo_status'] = 1;
    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';;
    

} catch (Exception $e) {

    $mensagem->status['codigo_status'] = 2;
    $mensagem->status['descricao_status'] = "Não foi possivel enviar este e-mail!: {$mail->ErrorInfo}";
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>App Mail Send</title>
</head>
    <body>
        <div class="container">
            <div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

            <div class="row">
                <div class="col-md-12">
                    
                <?php if($mensagem->status['codigo_status'] == 1){?>
                    <div class="container">
                        <h1 class="display-4 text-success">Sucesso</h1>
                        <p><?= $mensagem->status['descricao_status']?></p>
                        <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                    </div>

                <?php } ?>

                    
                <?php if($mensagem->status['codigo_status'] == 2){?>
                    <div class="container">
                        <h1 class="display-4 text-danger">Ops</h1>
                        <p><?= $mensagem->status['descricao_status']?></p>
                        <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                        </div>

                <?php } ?>
                    

                </div>
            </div>

        </div>
    </body>
</html>