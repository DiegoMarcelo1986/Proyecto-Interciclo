
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
?>

<!DOCTYPE html>



<html class="cabe">
    <header>
        <meta charset="utf-8">
        <title>Registro Producto</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <script src="validacionesProductos.js"></script>
    </header>
    
    <body>

        <form id="formulario" name="formulario" atributes action="registrarProductos.php" method="post" enctype="multipart/form-data"  >                                               
            <div><h3>Crear Producto</h3></div>
            <div id="preview">
            <img height="600px" src="productos/iconos/inte.png"/>
            </div>
            <div>
                <label for="ima">Imagen:</label>
                <input id="file" type="file" name="imagen" required/>            
            </div> 
                    
                  
            
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"  placeholder="Nombre producto" onkeypress="return validarLetras(event,this);" required/>   
            </div>                                           
            
            <div id="mensajeNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="desc"  placeholder="Descripcion producto"   required/>   
            </div>
            <div id="edesc" style="color: red; margin-left: 150px; font-size: 11px;"></div>     
        
            
            <div>
                <label for="precio">Precio:</label>
                <input type="text" id="precio" name="pre" placeholder="Precio Unitario"  onkeypress="return soloNumeros(event,this);"  required/>   
            </div>                                                                   
            <div id="eprecio" style="color: red; margin-left: 150px; font-size: 11px;"></div>

                                                
            <input type="submit" style="width: 80px; margin-left: 25px;" style="width: 80px" name="crea" value="Crear"/>
    
                   
                  
            
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
    </body>
</html>
        
