<?php
require '../require/comun.php';

$login = Leer::post("login");
$clave = Leer::post("clave");
$claveconfirmada = Leer::post("claveconfirmada");
$nombre = Leer::post("nombre");
$apellidos = Leer::post("apellidos");
$email = Leer::post("email");

$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$objeto = new Usuario($login, $clave, $nombre, $apellidos, $email);
$r = $modelo->add($objeto);
$bd->closeConexion();

if ($r == 1) {
    $id = md5($email . Configuracion::PEZARANA . $login); //codificar datos
    $enlace = "Pincha aqui para validar la cuenta: <a href='" . Entorno::getEnlaceCarpeta("phpConfirmar.php?id=$id") . "'>" . Entorno::getEnlaceCarpeta("phpConfirmar.php?id=$id") . " </a>";
    echo $enlace;
    //$correo = Correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "Correo de Alta", $enlace, Configuracion::CLAVEGMAIL);

    /* if(!$correo){
      header ("Location: view.php");
      exit();
      } */

   // $direccion = Entorno::getEnlaceCarpeta("phpconfirmar.php?id=$id");
   // header("Location: viewbienvenida.php?direccion=$direccion");
   // exit;
}
else
{
    header("Location: viewalta.php?error=$r");
}
?>
