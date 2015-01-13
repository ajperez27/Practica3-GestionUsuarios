<?php
require '../require/comun.php';
$sesion->administrador("../index.php ");

$login = Leer::get("login");

$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$usuario = $modelo->get($login);

if ($usuario->getIsroot() != 1) 
{
    $r = $modelo->delete($usuario);
}

$bd->closeConexion();
header("Location: ../administrador/viewAltaAdmin.php");

