<?php
require '../require/comun.php';
$sesion->administrador("../index.php ");
$login = Leer::get("login");
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);
$usuario = $modelo->get($login);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario</title>
        <link rel="stylesheet" href="../CSS/terceros/reset.css">
        <link rel="stylesheet" href="../CSS/usuarios.css">
        <script src="../js/main.js"></script>        
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
                <h1> Sección 1: Formulario Editar</h1>
                <form action="phpEditAdmin.php" method="POST" id="myformulario">
                    <input type="hidden" name="loginpk" value=" <?php echo $usuario->getLogin(); ?>" id="loginpk"/>
                    <label>Login</label>
                    <input type="text" name="login" value=" <?php echo $usuario->getLogin(); ?>" size="30" id="login" placeholder="login" required/>
                    <br/>           
                    <label>Clave Nueva</label>
                    <input type="password" name="clave" value="" size="40" id="clave" placeholder="clave" required />
                    <br/>          
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?> " size="30" id="nombre" placeholder="nombre" required/>
                    <br/>
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" value="<?php echo $usuario->getApellidos(); ?>" size="60" id="apellidos" placeholder="apellidos" required/>
                    <br/>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo $usuario->getEmail(); ?>" size="40" id="email" placeholder="email" required/>
                    <br/> 
                    <label>Estado</label>
                    <select name="isactivo" id="isactivo">
                        <option id="activado" value="activado" selected="">Activado</option>
                        <option id="desactivado" value="desactivado">Desactivado</option>
                    </select>
                    <br/>   
                    <label>Rol</label>
                    <select name="rol" id="rol">
                        <option id="usuario" value="usuario" selected="">Usuario</option>
                        <option id="aministrador" value="administrador">Administrador</option>
                        <option id="root" value="root">root</option>
                    </select>
                    <br/>  
                    <input type="submit" class="enviar" id="enviarAncho2" id="enviar" value="Editar" />
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
<?php
$bd->closeConexion();
?>