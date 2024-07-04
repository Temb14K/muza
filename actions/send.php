<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '/OSPanel/domains/dist/PHPMailer/src/Exception.php';
require '/OSPanel/domains/dist/PHPMailer/src/PHPMailer.php';
require '/OSPanel/domains/dist/PHPMailer/src/SMTP.php';

session_start();
require_once("dbconn.php");
$email = $_POST['reg-email'];

if (empty($email)) {
    $_SESSION['article'] = "<article class='err-article'>Пожалуйста, заполните все поля</article>";
    header('Location: ../forget.php');
} else {
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `email` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $checkUser = $stmt->get_result();
    if ($checkUser->num_rows == 0) {
        $_SESSION['article'] = "<article class='err-article'>Неверный e-mail</article>";
        header('Location: ../forget.php');
        } else {
            $_SESSION['isChanging'] = true;
            $_SESSION['emailConf'] = $email;
            $_SESSION['code'] = mt_rand(100000, 999999);
            $_SESSION['article'] = "<article class='corr-article'>На указанный при регистрации почтовый ящик было отправлено сообщение, содержащее код подтверждения. Введите его в указанное поле</article>";
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.smtp2go.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'artem@mpt.ru';                     //SMTP username
                $mail->Password   = 'password1';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
                $mail->Port       = 80;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('isip_a.l.kravcov@mpt.ru', 'Muza');
                $mail->addAddress($email);     //Add a recipient

                //Content
                //$mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Muza';
                $mail->Body    = 'Ваш код подтверждения: '.$_SESSION['code'];
            
                $mail->send();
                header('Location: ../confirmation.php');

            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
        }
    }
