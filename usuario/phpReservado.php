<?php
require '../require/comun.php';
$sesion->autentificado("viewlogin.php");
$r = $sesion->getUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Reservado</title>
        <link rel="stylesheet" href="../CSS/terceros/reset.css">
        <link rel="stylesheet" href="../CSS/usuarios.css">
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
                <h1>Bienvenido <?php echo $r->getNombre(); ?>, estas logeado</h1>
                <a href="viewEditar.php">Editar perfil</a>
                <a href="phplogout.php">Cerrar Sesion</a>
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