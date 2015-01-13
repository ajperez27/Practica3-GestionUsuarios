<?php
require '../require/comun.php';

$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$email = Leer::post("email");
$login = Leer::post("login");

if ($login != "") {
    $usuario = $modelo->get($login);
    if ($usuario->getLogin() != null) {
        $email = $usuario->getEmail();
        $id = md5($login . Configuracion::PEZARANA . $email);
        $enlace = "Pincha aqui para cambiar la contrase&ntilde;a: <a href='" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "'>" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "</a>";

        /* $correo = Correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "recuperacion clave", $enlace, Configuracion::CLAVEGMAIL);
          if (!$correo) {
          header("Location: index.php");
          exit();
          } */
        echo $enlace;
        exit();
    }
}
if ($email != "") {
    $parametros["email"] = $email;
    $filas = $modelo->getList2("email=:email", $parametros);
    $mensaje = "";
    if ($filas != null) {
        foreach ($filas as $indice => $objeto) {
            $login = $objeto->getLogin();
            $email = $objeto->getEmail();
            $id = md5($login . Configuracion::PEZARANA . $email);
            $enlace = "Pincha aqui para cambiar la contrase&ntilde;a: <a href='" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "'>" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "</a>";
            $mensaje .= "Usuario: $login . Pincha aqui para cambiar la contrase&ntilde;a: <a href='" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "'>" . Entorno::getEnlaceCarpeta("viewRecupera.php?id=$id&login=$login") . "</a><br/>";
        }
        /* $correo = Correo::enviarGmail(Configuracion::ORIGENGMAIL, $email, "recuperacion clave", $mensaje, Configuracion::CLAVEGMAIL);
          if (!$correo) {
          header("Location: index.php");
          exit();
          } */
        echo $mensaje;
        exit();
    }
}
$bd->closeConexion();
header("Location: ../index.php");
?>


