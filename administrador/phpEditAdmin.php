<?php
require '../require/comun.php';
$sesion->administrador("../index.php ");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$loginpk = Leer::post("loginpk");
$login = Leer::post("login");
$clave = Leer::post("clave");
$claveConfirmada = Leer::post("claveconfirmada");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$estado = Leer::post("isactivo");
$rol = Leer::post("rol");

$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);

if($rol=="usuario")
{
    $objeto->setRol('usuario');
}
if($rol=="administrador")
{
    $objeto->setRol('administrador');
}
if($rol=="root")
{
    $objeto->setIsroot(1);
    $objeto->setRol('administrador');
}

if($estado=="activado")
{
    echo $estado;
    $objeto->setIsactivo(1);
}
if($estado=="desactivado")
{
    echo $estado;
    $objeto->setIsactivo(0);
}

$r = $modelo->editPK2($objeto, $loginpk); 
$bd->closeConexion();
header("Location: viewAltaAdmin.php?r=$r"); 
