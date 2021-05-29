<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .inputText{
                margin-left: 28px;
            }
            #buttonEntrar{
                position:relative;
                left:40%;
            }
        </style>
    </head>
    <body>
    <?php
        include "functions.php";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_REQUEST["login"])) {
                iniciar_sesion(comprovar_campo($_REQUEST["user"]), comprovar_campo($_REQUEST["password"]));
            }

            if (isset($_REQUEST["recuperar"])) {
                header("Location: recuperar.php");
            }
        }
    ?>
        <table border="1">
            <form method="post">
                <tr><th colspan="1">Escribe tus datos</th></tr>
                <tr>
                    <td>
                        <label>Correo: </label>
                        <input class="inputText" type="text" name="user">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Contraseña: </label>
                        <input  type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td><button type="submit" id="buttonEntrar" name="login" value="si">Entrar</button></td>
                </tr>
            </form>
        </table>
        <br>
        <form method="post">
            <label><strong>Recuperar contraseña:</strong> </label><button type="submit" name="recuperar" value="si">Recuperar</button>
        </form>
    </body>
</html>