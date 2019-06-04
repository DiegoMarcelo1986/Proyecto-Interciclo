
<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
///
   // $codigo=$_GET["codigo"];
///
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Modificar Producto</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <script src="validacionesProductos.js"></script>        
    </head>
    
    <body>
        <?php
            $codigo=$_GET["codigo"];

       // echo 'Codigo: '.$codigo;
        $sql = "SELECT * FROM productos where pro_cod=$codigo";
        $result = $conn->query($sql);        
        if ($result->num_rows > 0) {            
            while($row = $result->fetch_assoc()) {
        ?>
        
        <form atributes action="ModProductos.php?cod=<?php echo $row["pro_cod"];?>" method="post" enctype="multipart/form-data">       
            <div><h3>Datos Prodcutos</h3></div>
            <div id="preview">
            <img  height="60px"   src="data:image/jp;base64,<?php echo base64_encode($row['pro_img']); ?>"/>
            </div>
          
            <div>
             <label for="ima">Imagen:</label>
              <input id="file" type="file" name="imagen" required/>           
            </div>
                 
                                                                       

            <div>
                <label for="nombres">Nombre:</label>
                <input class="error" type="text" id="nombres" name="nombre"  placeholder="Nombre producto"onkeypress="return validarLetras(event,this);" value="<?php echo $row["pro_nombre"]; ?>" required/>   
            </div>                                                 
            <div id="eNombres" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            
            <div>
                <label for="descripcion">Descripcion:</label>
                <input class="error" type="text" id="descripcion" name="desc" placeholder="Descripcion producto"  value="<?php echo $row["pro_desc"]; ?>" required/>   
            </div>
            <div id="eApellidos" style="color: red; margin-left: 150px; font-size: 11px;"></div>    
            
            <div>
                <label for="precio">Precio:</label>
                <input class="error" type="text" id="precio" name="pre" placeholder="Precio unitario"  onkeypress="return soloNumeros(event,this);" value="<?php echo $row["pro_precio"]; ?>" required/>   
                 
                <input type="submit" style="width: 101px; margin-left: 25px" name="actualiza" value="Actualizar"/>
                  
                <input type="button" id="Regresar" name="regresar" value="Home" onclick="location.href = 'homeAdm.php';" style="width: 101px; margin-left: 25px" required/>
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

