

<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Usuario</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <script src="validacionesU.js"></script>        
    </head>
    
    <body>
        <?php
         $cedula=$_GET["cedula"];
       echo 'C: '.$cedula;
        $sql = "SELECT * FROM usuarios where cedula='$cedula'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {            
            while($row = $result->fetch_assoc()) {
        ?>
        <form atributes action="modificarUA.php?cedula=<?php echo $row["cedula"];?>" method="post" enctype="multipart/form-data">       
            <div><h3>Datos Usuario</h3></div>
            <div id="preview">
            <img height="60px" src="data:image/jp;base64,<?php echo base64_encode($row['imagen']); ?>"/>
            </div>
            <div>
                <label for="ima">Imagen:</label>
                <input id="file" type="file" name="imagen" required/>            
            </div>
                    
            <div>
                <label for="cedula">Cedula:</label>
                <input type="text" id="cedula" name="ced" value="<?php echo $row["cedula"]; ?>" disabled/>
            </div>                                                           

            <div>
                <label for="nombres">Nombres:</label>
                <input class="error" type="text" id="nombres" name="nombre" title="Ingrese sus dos nombres" placeholder="Nombre Nombre" onkeypress="return soloLetras(event);" value="<?php echo $row["nombre"]; ?>" onblur="return validarNombres(nombres);" required/>   
            </div>                                                 
            <div id="eNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="apellidos">Apellidos:</label>
                <input class="error" type="text" id="apellidos" name="apellido" title="Ingrese sus dos apellidos" placeholder="Apellido Apellido" onkeypress="return soloLetras(event);" onblur="return validarApellidos(apellidos);" value="<?php echo $row["apellido"]; ?>" required/>   
            </div>
            <div id="eApellidos" style="color: red; margin-left: 150px; font-size: 11px;"></div>    
            
            <div>
                <label for="telefono">Telefono:</label>
                <input class="error" type="text" id="telefono" name="telefono" placeholder="Celular: 0935485612"  onkeypress="return soloNumeros(event);"  onblur="return validarCelular(telefono);" minlength="10" maxlength="10" value="<?php echo $row["telefono"]; ?>" required/>    
            </div>                                           
            <div id="eTelefono" style="color: red; margin-left: 150px; font-size: 11px;"></div>

            <div>
                <label for="genero">Genero:</label>
                <select id="genero" name="genero">
                    <?php
                            if($row["genero"]=="Masculino"){
                                echo "<option value='Masculino' selected>Masculino</option>";
                                echo "<option value='Femenino'>Femenino</option>";
                            }else{
                                echo "<option value='Masculino'>Masculino</option>";
                                echo "<option value='Femenino' selected>Femenino</option>";
                            }
                    ?>    
                </select> 
                <input type="submit" style="width: 101px; margin-left: 25px" name="actualizar" value="Actualizar"/>
            </div>                                                           

            <div>
                <label for="correo">Correo:</label>
                <input class="error" type="text" id="correo" name="correo" placeholder="Ingrese su correo"; onblur="return validarCorreoL(this);" value="<?php echo $row["correo"]; ?>" required/>
            </div>                                                                    
            <div id="eCorreo" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="password">Contraseña:</label>
                <input class="error" type="password" id="contrasenia" name="contrasenia" placeholder="Ingrese su contraseña"; onblur="return validarContrasenia(this);" value="<?php echo $row["contrasenia"]; ?>"/>  
                <input type="button" id="Regresar" name="regresar" value="Home" onclick="location.href = 'homeAdm.php';" style="width: 101px; margin-left: 25px" required/>
            </div>                                                           
            
            <div id="eContrasenia" style="color: red; margin-left: 150px; font-size: 11px;">
            </div>

            <script type="text/javascript">
                document.getElementById("file").onchange = function(e) {
                let reader = new FileReader();

              reader.onload = function(){
                let preview = document.getElementById('preview'),image = document.createElement('img');
                image.src = reader.result;
                preview.innerHTML = '';
                preview.append(image);
              };

              reader.readAsDataURL(e.target.files[0]);
            }
    
            </script>
        </form>
        <?php
            }
        } else {            
            echo "Ha ocurrido un error inesperado !";
        }
        $conn->close();         
    ?>                      

    </body>
</html>

