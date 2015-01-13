<?php

require '../require/comun.php';
$bd = new BaseDatos();

$login = Leer::post("login");
$clave = Leer::post("clave");

$modelo = new ModeloUsuario($bd);
$r = $modelo->autentifica($login, $clave);

if ($r instanceof Usuario) {
    $sesion->setUsuario($r);
    $bd->closeConexion();
    if ($r->getRol() == "administrador") {
        header("Location: ../administrador/viewAltaAdmin.php");
    } else {
        header("Location: phpReservado.php");
    }
} else {
    $sesion->cerrar();
    $bd->closeConexion();
    header("Location: viewlogin.php?error=Datos Incorrectos&r=-1");
}

