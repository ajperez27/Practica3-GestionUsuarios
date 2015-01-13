<?php
require '../require/comun.php';
$id = Leer::get("id");
$login = Leer::get("login");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$r = $modelo->cambiarClave($login, $id);

if ($r <= 0) {
    $bd->closeConexion();
    header("Location:../index.php");
    exit();
}
$bd->closeConexion();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Restablecer Contraseña</title>           
        <link rel="stylesheet" href="../CSS/terceros/reset.css">
        <link rel="stylesheet" href="../CSS/usuarios.css">
        <script src="../js/validar.js"></script>
    </head>
    <body>
        <section id="rutas">
            <header>
                <div class="headerCentro">
                    <div class="headerTitulo">
                        <span>User Gestion</span>
                    </div>
                    <nav class="headerNav">                        
                        <a href="../usuario/phplogout.php">Inicio</a>
                        <a href="#visitanos">Visítanos</a>
                        <a href="#footerCentro">Contacta</a>
                    </nav>
                    <img class="mapaHeader" src="../Imagenes/mapaHeader.png" alt="mapa">
                </div>
            </header>
            <div id="index">
                <h1>Introduzca su Nueva clave</h1>
                <form action="phpRecupera.php" id="myformulario" method="POST">
                    <label for="clave">Clave</label>
                    <input type="password" name="clave" value="" id="clave" required/>
                    </br>
                    <label for="claveConfirmada">Confirmar clave</label>
                    <input type="password" name="claveConfirmada" value="" id="claveConfirmada" required/>
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"/>
                    <input type="hidden" name="login" id="login" value="<?php echo $login; ?>"/>
                    </br>
                    <input type="submit" class="enviar" id="enviarAncho2" id="enviar" value="Cambiar" />
                </form>
            </div> 
        </section>   
        <footer>
            <div id="footerCentro">
                <div id="informacion">
                    <h3>Información sobre la página:</h3>
                    <ul>
                        <li>· &nbsp;Historia</li>
                        <li>· &nbsp;Los creadores de la pagina</li>
                        <li>· &nbsp;Geografía y geología de la pagina</li>
                        <li>· &nbsp;Ayuda</li>
                    </ul>
                    <span id="copy">Copyright © 2014 | Gestion de Usuarios</span>
                </div>   
                <div id="contacta">
                    <h3>Contacta con nosotros:</h3>
                    <form action="#">
                        <div class="campos">
                            <label>Nombre</label>
                            <input type="text" name="nombre" value="" />
                        </div>
                        <div class="campos">
                            <label>Correo Electrónico</label>
                            <input type="text" name="correo" value="" />
                        </div>
                        <div class="campos">
                            <label>Mensaje</label>
                            <textarea name="mensaje" rows="4" cols="20">
                            </textarea>
                        </div>
                        <input id="enviar" type="submit" value="Enviar" />
                    </form>
                </div>                 
            </div>
        </footer>
    </body>
</html>