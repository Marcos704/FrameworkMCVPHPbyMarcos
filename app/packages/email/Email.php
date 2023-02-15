<?php

namespace app\core\mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

class Email
{
    private $error;

    public function sendEmail($destinatario, $assunto, $corpo)
    {

        try {
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = EMAIL_HOST_GMAIL;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = EMAIL_SMTP_SECURE;
            $mail->Username = EMAIL_USERNAME;
            $mail->Password = EMAIL_PASSWORD;
            $mail->Port = 465;
            $mail->CharSet = EMAIL_CHARSET;

            $mail->setFrom(EMAIL_USERNAME, EMAIL_SUBTITLE);
            $mail->addAddress($destinatario);

            $mail->isHTML(true);

            $mail->Subject = $assunto;
            $mail->Body    = $corpo;
            $mail->AltBody = nl2br(strip_tags("Tudo certo"));
            if ($mail->send()) 
            {
                return true;
            }
        } catch (Exception $e) {
            $this->error = $e->errorMessage();
        }
    }
    public function getErroEmail()
    {
        return $this->error;
    }
    public function sendEmailRecuperacao($nomeUsuario, $linkRecuperacao, $destinatario, $assunto)
    {
        $html = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Demystifying Email Design</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;600&display=swap" rel="stylesheet">
        </head>
        <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                    <tr>
                        <td>
                            <table align="center" border="0" style="border: 1px solid #cccccc;" cellpadding="0"
                                cellspacing="0" width="600px">
                                <tr>
                                    <td align="center" bgcolor="#92B4EC">
                                        <h1
                                            style="text-align:center;color: white; font-family: "Quicksand", sans-serif;font-weight:lighter">
                                            Recuperação de senha</h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#F9F9F9"
                                        style="padding-left:15px; padding-right:15px; padding-bottom: 5px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td>
                                                    <h2
                                                        style="text-align:left;color:#494949;font-size: 18px; font-family: "Quicksand", sans-serif;font-weight:lighter; padding: 12px;">
                                                        <strong>Olá ' . $nomeUsuario . ',</strong>
                                                    </h2>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span
                                                        style="text-align:center; font-family: "Quicksand", sans-serif;;font-weight:300">
                                                        Recebemos uma solicitação para redefinir sua senha do
                                                        FizCardSystem.<br>
                                                        Seu nome de usuário é: <span
                                                            style="color:#2343d1; font-weight: 600;">' . $nomeUsuario .
            '</span>
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left"
                                                    style="text-align: start; padding-bottom: 40px; padding-top: 40px;">
                                                    <h4 style="text-align:center">
                                                    <a href=' . $linkRecuperacao . '
                                                        style="text-decoration:none;font-family: "Quicksand", sans-serif;;font-weight:300; width: 100px; background-color: #92B4EC; color: #FFFFFF; padding-top:10px; padding-bottom: 10px; padding-left:5px; padding-right: 5px; border-radius: 2px; margin: 12px; font-weight:600;">
                                                        Clique
                                                        aqui
                                                    </a>
                                                    </h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: start;">
                                                    <small
                                                        style="text-align:center; font-family: "Quicksand", sans-serif;;font-weight:300; padding-bottom:30px ">
                                                        Se o link acima não funcionar, você pode copiar e colar o seguinte no seu navegador:
                                                        <br>
                                                        <a href=' . $linkRecuperacao . '>' . $linkRecuperacao . '</a>
                                                    </small>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: start; padding-bottom: 10px; padding-top: 40px;">
                                                    <small
                                                        style="text-align:center; font-family: "Quicksand", sans-serif;;font-weight:300; padding-bottom:10px ">
                                                        Se você não solicitou uma nova senha ou recebeu esta notificação por engano, pode ignorar este e-mail e sua senha permanecerá inalterada.
                                                        <br>
                                                    </small>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#A0BCC2" align="center">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center" style="padding-top:10px; padding-bottom:10px;">
                                                    <a href="#"
                                                        style="text-decoration: none;text-align:center;color: white; font-family: "Quicksand", sans-serif;font-weight:lighter">
                                                        timeengcriasoftwares
                                                    </a>
                                                </td>
                                                <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
        </body>
        </html>
        ';
        return $this->sendEmail($destinatario, $assunto, $html);
    }
}
