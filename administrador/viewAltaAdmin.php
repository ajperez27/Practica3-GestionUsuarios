<?php
require '../require/comun.php';
$sesion->administrador("../index.php ");
$usuario = $sesion->getUsuario();
$pagina = 0;

if (Leer::get("pagina") != null) {
    $pagina = Leer::get("pagina");
}
$bd = new BaseDatos();
$modelo = new ModeloUsuario($bd);

$paginas = $modelo->getNumeroPaginas();
$filas = $modelo->getList($pagina, Configuracion::RPP);
$total = $modelo->count();

$enlaces = Util::getEnlacesPaginacion2($pagina, $total[0]);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Administrador</title>
        <link rel="stylesheet" href="../CSS/terceros/reset.css">
        <link rel="stylesheet" href="../CSS/usuarios.css">
        <script src="../js/main.js"></script>
        <script src="../js/ajax.js"></script>        
        <script src="../js/validar.js"></script>
    </head>
    <body>          
        <section  id="visitanos">
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
                <br/>
                <h1> Hola<?php echo $usuario->getLogin(); ?>,  Seccion1: Listaddo</h1>
                <table id="tabla">  
                    <tr>
                        <td>Login</td>
                        <td>Clave</td>
                        <td>Nombre</td>
                        <td>Apellidos</td>
                        <td>Email</td>
                        <td>Fecha Alta</td>
                        <td>IsActivo</td>
                        <td>IsRoot</td>
                        <td>Rol</td>
                        <td> Fecha Login</td>
                    </tr>
                    <?php
                    foreach ($filas as $indice => $objeto) {
                        ?>  
                        <tr>
                            <td> <?php echo$objeto->getLogin(); ?></td>
                            <td> <?php echo$objeto->getClave(); ?></td>
                            <td> <?php echo$objeto->getNombre(); ?></td>
                            <td> <?php echo$objeto->getApellidos(); ?></td>
                            <td> <?php echo$objeto->getEmail(); ?></td>
                            <td> <?php echo$objeto->getFechaalta(); ?></td>
                            <td> <?php echo$objeto->getIsactivo(); ?></td>
                            <td> <?php echo$objeto->getIsroot(); ?></td>
                            <td> <?php echo$objeto->getRol(); ?></td>                          
                            <td> <?php echo$objeto->getFechaFormatoEuropeo(); ?></td>
                            <td><a data-id='<?php echo $objeto->getLogin(); ?>'
                                   data-nombre='<?php echo $objeto->getNombre() . " " . $objeto->getApellidos(); ?>'
                                   class='borrar' href='phpDelete.php?login=<?php echo $objeto->getLogin(); ?>'>borrar</a>
                            </td>
                            <td><a data-login='<?php echo $objeto->getLogin(); ?>'
                                   href='viewEditarAdmin.php?login=<?php echo $objeto->getLogin(); ?>'>editar</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <hr>
                <h1>Sección 2: Formulario insertar</h1>
                <form action="phpAltaAdmin.php" method="POST" id="myformulario">
                    <label>Login</label>
                    <input type="text" name="login" value="" size="30" id="login" required/>
                    <span id="spanLogin" ></span>
                    <br/>
                    <label>Clave</label>
                    <input type="password" name="clave" value="" size="40" id="clave" required/>
                    <br/>
                    <label>Repetir Clave</label>
                    <input type="password" name="claveconfirmada" value="" size="40" id="claveConfirmada" required/>
                    <br/>
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="" size="30" id="nombre" required/>
                    <br/>
                    <label>Apellidos</label>
                    <input type="text" name="apellidos" value="" size="60" id="apellidos" required/>
                    <br/>
                    <label>Email</label>
                    <input type="email" name="email" value="" size="40" id="email" required/>
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
                    <input type="submit" class="enviar" id="enviarAncho2" id="enviar" value="Insertar" />
                </form>                
            </div>
            <a id="cerrar" href="../usuario/phplogout.php">Cerrar Sesion</a>
            <div id="paginacion">
                <?php echo $enlaces["inicio"]; ?>
                <?php echo $enlaces["anterior"]; ?>
                <?php echo $enlaces["primero"]; ?>
                <?php echo $enlaces["segundo"]; ?>
                <?php echo $enlaces["actual"]; ?>
                <?php echo $enlaces["cuarto"]; ?>
                <?php echo $enlaces["quinto"]; ?>
                <?php echo $enlaces["siguiente"]; ?>
                <?php echo $enlaces["ultimo"]; ?>
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