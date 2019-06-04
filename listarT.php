
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    $cedula=$_SESSION["cedula"];
    $sub=$_REQUEST["sub"];
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
    if ($sub <=0){
        echo "<script>alert('Debe añadir productos al carrito previamente'); window.close();</script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Metodo de pagos</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <script src="validacionesU.js"></script>        

    </head>
    <body>          
    <form atributes action="agregarFactura.php" method="post" >
        <center>
                <h3>Elección método de pago</h3>

                <label for="tarjet">Tarjeta:</label>
                <select id="item" name="item" required>

                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM tarjetas WHERE cedulaPro='$cedula';";
                        $resultado=$conn->query($sql);
                        if ($resultado->num_rows >0) {      
                            while($row=$resultado->fetch_assoc()){
                    ?>                
                        <option value='<?php echo $row["numero"]; ?>' selected><?php echo $row["numero"]; ?></option>";                

                   <?php                       
                            }
                        }else{
                            echo "<script>alert('Debe registar al menos una tarjeta previamente'); window.close();</script>";

                            echo "Debe agregar tarjetas previamente.";
                        }
                    ?>
<!--                    <option value=”” disabled selected>Elija un atarjeta</option>-->
                </select> 
                    <input type="button"value="Cancelar" onclick="window.close()" style="width: 101px; margin-left: 25px"/>
                    <input type="button"value="Aceptar" onclick="location.href = 'agregarFactura.php?sub=<?php echo $sub;?>';" style="width: 101px; margin-left: 25px" 
                    />
        </center>
            <?php $conn->close();?>
        </form>
    </body>
</html>
<script>
 if(item.length<=0){
    alert(Datos.length); 
    }
</script>