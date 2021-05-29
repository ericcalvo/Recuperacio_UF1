<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .buttons{
            padding: 6px;
            background-color: black;
            color: white;
        }
        .info{
            padding-right: 10px;
            padding-left: 10px;
        }
        .inputPassword{
            width: 240px;
        }
    </style>
</head>
    <body>
        <?php
            include "functions.php";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_REQUEST["logout"])) {
                    cerrar_session();
                }

                if (isset($_REQUEST["cambiar"])) {
                    cambiar_password_home(comprovar_campo($_REQUEST["password"]), $_SESSION["user"]);
                }
            }

            if (isset($_SESSION["user"]) && isset($_SESSION["password"])) {
                mensaje_bienvenida($_SESSION["user"]);
            
                if (comprovar_recuperada($_SESSION["user"])) {
                    regenerar_password($_SESSION["user"]);
        ?>
            <table border="1">
                <tr><th colspan="2">Cambia tu contraseña</th></tr>
                <form method="post">
                    <tr>
                        <td>
                            <label>Contraseña: </label><input class="inputPassword" type="password" name="password">
                            <button class="buttons" type="submit" name="cambiar" value="si">Cambiar</button>
                        </td>
                        
                    </tr>
                </form>
                <tr>
                    <td colspan="2" class="info" >Si no actualizas la contraseña, tendras que recuperarla otra vez</td>
                </tr>
            </table><br>
        <?php
                }
        ?>
            <form method="post">
                <label><strong>Cerrar sesion:</strong> </label>
                <button type="submit" class="buttons" name="logout" value="si">Log out</button>
            </form>
        <?php
            } else {
                header("Location: login.php");
            }
        ?>
    </body>
</html>