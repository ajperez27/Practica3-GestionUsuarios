<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alta Usuario</title>
        <link rel="stylesheet" href="../CSS/terceros/reset.css">
        <link rel="stylesheet" href="../CSS/usuarios.css">
        <script src="../js/main.js"></script>
        <script src="../js/ajax.js"></script>
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
                <h1>Formulario de Alta para Usuarios</h1><br/>
                <form action="phpAlta.php" method="POST">
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
                    <input type="submit" class="enviar" id="enviarAncho2" id="enviar" value="Insertar" />
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