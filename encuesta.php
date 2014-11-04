<?php
    session_start();
    $conexion = mysql_connect("localhost","root","");
    mysql_select_db("aniversario") or die("no se puede selecionar la base de datos ");
?>
<html>
    <head>
        <title>encuesta</title>
    </head>
    <body>
        <?php
        // variables del form
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $boton=$_POST['boton'];

        // variables sql
        $sqlLogin="SELECT * FROM usuario WHERE dni='$user' AND pass='$pass'";
        $sqlProductos="SELECT * FROM producto";
        //$sqlCrear="INSERT INTO usuario (dni,pass) VALUES ($user,$pass)";
        $sqlCrear = "INSERT INTO  `usuario` (
                    `id` ,
                    `dni` ,
                    `pass`
                    )
                    VALUES (
                    NULL ,  '$user',  '$pass'
                    )";
        //
        $login = mysql_query($sqlLogin, $conexion) or die ("fallo la consulta");
        $productos = mysql_query($sqlProductos, $conexion) or die("fallo productos");

        if ($boton=='crear') {
            $nuevaCuenta = mysql_query($sqlCrear, $conexion);
        }

        if (mysql_num_rows($login)>0){
            $_SESSION['idUsuario']=$user;
            echo "
                <form method='post' action='final.php'style='width: 200px;'>
                    <div>Escriba su nombre<input TYPE='text' NAME='nombreYApellido'></div>
                    <div>Que frase le quiere dedicar a la facu<textarea COLS='50' ROWS='4' NAME='fraseDedicatoriaUnlam'></textarea></div>
                    <div>";
            /*consulta de productos*/
            $nfilas = mysql_num_rows($productos);
                if ($nfilas > 0 )
            {
            echo "<select name='producto'>";
                for ($i=0; $i <$nfilas ; $i++)
            {
            $fila = mysql_fetch_array($productos);
            echo "<option VALUE='$fila[id]'>" .$fila["descripcion"] . "</option>";
            }
            echo "</select></div>
            <div><input TYPE='submit' VALUE='enviar'></div>
            </form>";
            }
            /*^^^^^^^^^^^^^^^^^^^^^^^^^*
            /*if (isset($_POST['recordar'])){
            $recordar=$_POST['recordar'];*/
            /* if ($recordar) {
            setcookie("cookieSesion",$_SESSION['idUsuario']);
            }*/
        }
        else
        if ($boton!='crear')
            echo "INCORRECTO";
        else
            echo "Cuenta creada";
            mysql_close($conexion) or die("no cerro");
        ?>
        <!-- <form>
        <div><input TYPE="text" NAME="nombreYApellido"><div>
        <div><input TYPE="text" NAME="fraseDedicatoriaUnlam"><div>
        <div>
        <input TYPE="radio" NAME="sexo" VALUE="M" CHECKED>Mujer
        <input TYPE="radio" NAME="sexo" VALUE="H">Hombre</div>
        </form> -->
    </body>
</html>