
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
    $codigo=$_GET['emp_cod'];
         
?>

<!DOCTYPE html>



<html class="cabe">
    <header>
        <meta charset="utf-8">
        <title>Registro Empresa</title>
        <link href="cs_form.css" rel="stylesheet"/>
    </header>
    
    <body>

        <form id="formulario" name="formulario" atributes action="registrarSucursal.php" method="post" enctype="multipart/form-data"  >                                               
            <div><h3>Crear Sucursal</h3></div>
            <div id="preview">
            <img height="600px" src="productos/iconos/inte.png"/>
            </div>
            <div>
                <label for="ima">Imagen:</label>
                <input id="file" type="file" name="imagen" required/>            
            </div> 
                    
                  
            
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"  placeholder="Nombre de la empresa" onkeypress="return validarLetras(event,this);" required/>   
            </div>                                           
            
            <div id="mensajeNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="descripcion">Descripcion:</label>
                <input type="text" id="descripcion" name="desc"  placeholder="direccion de la empresa"   required/>   
            </div>
            <div id="edesc" style="color: red; margin-left: 150px; font-size: 11px;"></div>     
        
            
            <div>
                <label for="telefono">telefono:</label>
                <input type="text" id="tel" name="telefono" placeholder="INGRESE SOLO NUMEROS"  onkeypress="return soloNumeros(event,this);"  required/>   
            </div>                                                                   
            <div id="eprecio" style="color: red; margin-left: 150px; font-size: 11px;"></div>


  <div>
                <label for="empresa">empresa:</label>
              
                <input type="text" id="emp" name="empresa"  value="<?php echo $codigo ?>"   onkeypress="return soloNumeros(event,this);"  required/>   
            </div>                                                                   
                                                
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
        
