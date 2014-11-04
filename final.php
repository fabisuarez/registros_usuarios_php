<?php
session_start();
if (!isset($_SESSION['idUsuario']))
die("no esta logueado");
$conexion = mysql_connect("localhost","root","");
mysql_select_db("aniversario") or die("no se puede selecionar la base de datos ");
// $conexion = mysql_connect("localhost")
?>
<html>
<head>
<title></title>
</head>
<body>
<?php
$name=$_POST['nombreYApellido'];
$frase=$_POST['fraseDedicatoriaUnlam'];
$producto=$_POST['producto'];
$sqlInsertarName="INSERT INTO encuesta (dni,nombreYApellido,frase,productos) VALUES
($_SESSION[idUsuario],'$name','$frase',$producto)";
//die("$sqlInsertarName");
echo "
<form action='cerrar.php' method='post'>
<input TYPE='submit' VALUE='Cerrar sesion' NAME='cerrar'>
";
/*if ($sqlInsertarName== false) {
die("nooo");
}*/
$insertarName=mysql_query($sqlInsertarName,$conexion); //no hace falta asignar una variable
mysql_close($conexion) or die("no cerro");
//echo "$sqlInsertarName";
?>
</body>
</html>