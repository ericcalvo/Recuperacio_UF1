<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
    <?php
        include "functions.php";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_REQUEST["rand1"] + $_REQUEST["rand2"] == $_REQUEST["resultado"]) {
                if (isset($_REQUEST["enviar"]) && comprovar_email_db($_REQUEST["mail"])) {
                    $pass = generar_contra();
                    $username = $_REQUEST["mail"];
                    nueva_password(md5($pass), $username);
        
                    $mail = new PHPMailer(true);
        
                    try {
                        //Server settings
                        //$mail->SMTPDebug = 2;
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.googlemail.com';//smtp.gmail.com
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'eric.cinco@gmail.com';
                        $mail->Password   = 'wjjrodnzecqrraux';
                        $mail->SMTPSecure = 'tls';
                        $mail->Port       = 587;
        
                        //Recipients
                        $mail->setFrom('eric.cinco@gmail.com', 'Mailer');
                        $mail->addAddress($username, 'Usuario');
        
                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Recuperacion Contraseña';
                        $mail->Body    = 'Esta sera la nueva contraseña: '.$pass.'<br>Para iniciar session usa tu nueva contraseña aqui: <a href="https://dawjavi.insjoaquimmir.cat/ecalvo/eric/Recuperacio_UF1/B/login.php">Entrar</a>';
                        $mail->AltBody = 'Codigo: ';
        
                        $mail->send();
                        echo 'El correo se ha enviado.';
                    } catch (Exception $e) {
                        echo "El correo no se ha podido enviar. Mailer Error: {$mail->ErrorInfo}";
                    }
                } else {
                    echo "Ese correo no esta registrado en la base de datos";
                }
            } else {
                echo "La suma esta mal, intentelo de nuevo";
            }

            if (isset($_REQUEST["volver"])) {
                header("Location: login.php");
            }
        }
    ?>
        <table border="1">
            <form method="post">
                <tr><th colspan="2">Escribe tu correo</th></tr>
                <tr>
                    <td>
                        <label>Correo: </label>
                        <input type="text" name="mail">
                    </td>
                </tr>
    <?php
        $rand1 = rand(1, 9);
        $rand2 = rand(1, 9);
        echo '<input type="hidden" name="rand1" value="'.$rand1.'">';
        echo '<input type="hidden" name="rand2" value="'.$rand2.'">';
        echo '<tr><td>'.$rand1." + ".$rand2." =";
    ?>
                    <input type="text" name="resultado">
                    </td>
                </tr>
                <td colspan="2" style="text-align: center;"><button type="submit" name="enviar" value="si">Regenerar</button></td>
            </form>
        </table>
        <br>
        <form method="post">
            <label><strong>Volver:</strong> </label><button type="submit" name="volver" value="si">Volver</button>
        </form>
    </body>
</html>