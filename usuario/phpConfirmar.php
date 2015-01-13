<?php
require '../require/comun.php';
$id = Leer::get("id");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$r = $modelo->activa($id);
header("Location:viewlogin.php");
?>
