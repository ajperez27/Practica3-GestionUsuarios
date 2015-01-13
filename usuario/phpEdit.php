<?php
require '../require/comun.php';
$sesion->autentificado("viewlogin.php");
$usuario = $sesion->getUsuario();

$login = Leer::post("login");
$claveAnterior = Leer::post("claveanterior");
$clave = Leer::post("clave");
$claveConfirmada = Leer::post("claveconfirmada");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");
$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);

$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$cambioClave = strlen($clave) > 0 && $clave == $claveConfirmada;
$cambioCorreo = $email != $usuario->getEmail();

if ($cambioClave) {
    $r = $modelo->editConClave($objeto, $usuario->getLogin(), $usuario->getClave());
} else {
    $r = $modelo->editSinClave($objeto, $usuario->getLogin());
}

if ($cambioCorreo && $r > 0) 
{
    $r = $modelo->desactiva($usuario->getLogin());
    $id = md5($email . Configuracion::PEZARANA . $login);
    //$enlace = urlencode("<a href='" . Entorno::getEnlaceCarpeta("phpconfirmar.php?id=$id") . "'>" . Entorno::getEnlaceCarpeta("phpconfirmar.php?id=$id"));
    echo $enlace = "Click aqui  para validar t&uacute; cuenta: <a href='" . Entorno::getEnlaceCarpeta("phpConfirmar.php?id=$id") . "'>" . Entorno::getEnlaceCarpeta("phpConfirmar.php?id=$id") . "</a>";
    //$correo = Correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "alta en web", $enlace, Configuracion::CLAVEGMAIL);
    //header("Location: phplogout.php");
    // exit();
    $sesion->setUsuario($usuario);
    $bd->closeConexion();
} 
else 
{
    $sesion->setUsuario($usuario);
    $bd->closeConexion();
    header("Location: phplogout.php");
}