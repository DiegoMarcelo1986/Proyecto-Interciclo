

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
         $cedula=$_GET["su_cod"];
       echo 'C: '.$cedula;
        $sql = "SELECT * FROM sucursal where su_cod='$cedula'";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {            
            while($row = $result->fetch_assoc()) {
        ?>
        <form atributes action="modificarSucu.php?cedula=<?php echo $row["su_cod"];?>" method="post" enctype="multipart/form-data">       
            <div><h3>Datos Usuario</h3></div>
            <div id="preview">
            <img height="60px" src="data:image/jp;base64,<?php echo base64_encode($row['su_img']); ?>"/>
            </div>
            <div>
                <label for="ima">Imagen:</label>
                <input id="file" type="file" name="imagen" required/>            
            </div>
                    
                                                                    

            <div>
                <label for="nombres">Nombre:</label>
                <input class="error" type="text" id="nombres" name="nombre" title="Ingrese sus dos nombres" placeholder="Nombre Nombre" onkeypress="return soloLetras(event);" value="<?php echo $row["su_nombre"]; ?>" onblur="return validarNombres(nombres);" required/>   
            </div>                                                 
            <div id="eNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="apellidos">DIREECION:</label>
                <input class="error" type="text" id="apellidos" name="apellido"  value="<?php echo $row["su_direccion"]; ?>" required/>   
            </div>
            <div id="eApellidos" style="color: red; margin-left: 150px; font-size: 11px;"></div>    
            
            <div>
                <label for="telefono">Telefono:</label>
                <input class="error" type="text" id="telefono" name="telefono" placeholder="Celular: 0935485612"  onkeypress="return soloNumeros(event);"  value="<?php echo $row["su_telefono"]; ?>" required/>    
            </div>                                           
            <div id="eTelefono" style="color: red; margin-left: 150px; font-size: 11px;"></div>

           
                </select> 
                <input type="submit" style="width: 101px; margin-left: 25px" name="actualiza" value="Actualizar"/>
            </div>                                                           
                                                                
            <div id="eCorreo" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                  <input type="button" id="Regresar" name="regresar" value="Home" onclick="location.href = 'homeAdm.php';" style="width: 101px; margin-left: 25px" required/>
            </div>                                                           
            
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

