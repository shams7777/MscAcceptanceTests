<?php


namespace App\Tests\Pdf;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
//require 'vendor/autoload.php';


class SendEmail
{

    private function getCustomersEmails()
    {
        $path =(dirname(dirname(__FILE__))) . '/_log/email-config.txt';
        $list= array();
        if(file_exists($path)) {
            $txt_file = fopen($path, 'r');
            $a = 1;
            while ($line = fgets($txt_file)) {
                //echo($a." ".$line)."<br>";
                array_push($list,$line);
                $a++;
            }
            fclose($txt_file);
        }

        return $list;
    }

    public function testemail($name,$status,$report)
    {
        //$defaultemail = 'notification@it-schrake.net ';
        $defaultemail = 'chamseddine.bouwazra@it-schrake.de';

        $emails = $this->getCustomersEmails();
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'sslout.de';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'smtp.schrake@th-gruppe.de';                     //SMTP username
            $mail->Password   = 'E00vEB@CdrIU7rEDm*&834s';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('info@th-gruppe.de', 'It-Schrake');
            //$mail->addAddress('paul.schrake@it-schrake.de', 'Paul');     //Add a recipient
            if(empty($emails)) {
                $mail->addAddress($defaultemail);
            }
            else
            {
                foreach ($emails as $adrress):
                    $mail->addAddress($adrress);

                endforeach;
            }
             //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('chamseddine.bouwazra@it-schrake.de');

            //$mail->addBCC('bcc@example.com');

            //Attachments
           // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $name;
            $mail->Body    = '<b>'.$name.'</b> is '.$status.' for more details please click <b><a href="http://b93c77e.online-server.cloud/thpgacceptancetests/public/reports/'.$report.'">Here</a></b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
           // print_r(var_export($this->getCustomersEmails(),true));
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }


}