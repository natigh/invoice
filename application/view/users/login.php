<!-- Define que el documento esta bajo el estandar de HTML 5 -->
<!doctype html>

<!-- Representa la raíz de un documento HTML o XHTML. Todos los demás elementos deben ser descendientes de este elemento. -->
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> INVOICE </title>
        <link rel="shortcut icon" href="<?php echo URL; ?>public/img/icons8-factura-64.png"/>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <meta name="author" content="Videojuegos & Desarrollo">
        <meta name="description" content="Ejemplo de formulario de acceso basado en HTML5 y CSS">
        <meta name="keywords" content="login,formulariode acceso html">
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="<?php echo URL; ?>login/css/login.css">
        
        <style type="text/css">
            
        </style>
        
        <script type="text/javascript">
        
        </script>
        
    </head>
    
    <body>
    
        <div id="contenedor">
            <div id="contenedorcentrado">
                <div id="login">
                    <form id="loginform" method="post">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" type="text" name="txtUsername" placeholder="Usuario" required>
                        
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" placeholder="Contraseña" name="txtPassword" required>
                        
                        <button type="submit" title="Ingresar" name="btnLogin">Login</button>
                    </form>
                    
                </div>
                <div id="derecho">
                    <div class="titulo">
                        Bienvenido a Invoice
                    </div>
                    <hr>
                    <div class="pie-form">
                        <a href="#">¿Perdiste tu contraseña?</a>
                        <a href="#">¿No tienes Cuenta? Registrate</a>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <?php
    // Mostrar alerta de SweetAlert si existe la variable de sesión
    if (isset($_SESSION['alert'])) {
        echo "<script>{$_SESSION['alert']}</script>";
        unset($_SESSION['alert']); // Limpiar la variable de sesión para evitar que se repita
    }
    ?>
    </body>
</html>