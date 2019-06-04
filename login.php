
<?php
$enlace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html class="login">
    <head>
        <meta charset="utf-8">
        <title>LOGIN</title>
        <link href="estilos.css" rel="stylesheet"/>
        
        
    </head>
    <body class="loginbo">
        
                   <div class="div1">
             <a href="index.html"><img src="css/casa.png" height="50px" /></a>
        </div>
        
         <center>

        <form method="post" atributes action="validarU.php">
            <div><img src="ima/user.png" style="width: 100px"/></div>
            <div style="display: inline-block;">
                <img src="ima/icor.png" style="width: 23px"/>
                <input  type="text" id="user" name="correo"   placeholder="Correo"/>   
            </div>     
            <div id="edesc" style="color: red; margin-left: 150px; font-size: 11px;">
            </div>
            <div>
                <img src="ima/ipass.png" style="width: 20px"/>
                <input  type="password" id="contra" name="contrasenia"  placeholder="Contraseña"/>   
            </div>  
            <div>
                   <input class="boton" type="submit" name="login" value="LOGIN"/>
            </div>
            <div>
                   <a href="registro.php?url=<?php echo $enlace;?>" class="reg"><h5>Registrarse</h5></a>
            </div>
        </form>
        </center>
        
    </body>
</html>