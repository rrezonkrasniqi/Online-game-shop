<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    if(isset($_POST["submit"]))
    {
        $email = $_POST["email"];

        $token = bin2hex(random_bytes(16));
        $token_hash = hash("sha256", $token);

        $expire = date("Y-m-d H:i:s",time() + 60 * 2000);

        $conn = new mysqli("localhost", "root", "", "shop");

        $sql = "update users set reset_token_hash = ?,
                                reset_token_expires_at = ?
                                where email = ?";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("sss",$token_hash,$expire,$email);

        $stmt->execute();

        if($conn->affected_rows)
        {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ksgameshopre@gmail.com';
            $mail->Password = 'xyfqredhpagnmnye';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                

            $mail->setFrom('ksgameshopre@gmail.com');
            $mail->addAddress($_POST['email']);

            $mail->isHTML(true);
            $mail->Subject = "Reset Password";
            $mail->Body = <<<END
                Click here <a href="http://localhost/Online-game-shop/public/view/Authentication/reset-password.php?token=$token">here</a> to reset your password
            END;

            try
            {
                $mail->send();
            }
            catch(Exception $e)
            {
                echo "Message could not be send:{$mail->ErrorInfo}";
            }
       }
       header("Location: ../../public/view/check-email.php");
    }
?>
