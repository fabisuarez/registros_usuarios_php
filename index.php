<?php session_start();?>
<html>
    <head>
        <title>sesiones</title>
    </head>
    <body>
        <?php
        /*if (isset($_COOKIE['cookieSesion'])) {
        $_SESSION['idUsuario']=coocieSesion;
        header('location: principal.php');
        }*/
        ?>
        <form method="post" action="encuesta.php">
            <div style="width: 200px;">
                <div>Ingrese DNI<input type='number' name='user'></div>
                <div>Ingrese contrase&ntilde;a(solo numeros)<input TYPE='password' name='pass'></div>
                <div>
                    <input type='submit' name="boton" value='login'>
                    <input type='submit' name="boton"value='crear'>
                </div>
            </div>
        </form>
    </body>
</html>