
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    $cedula=$_REQUEST["cedula"];
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
    echo 'Cd: '.$cedula;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Compras</title>
        <link href="cs_form.css" rel="stylesheet"/>
         <link href="estiloHome.css" rel="stylesheet"/>
        <script src="validacionesU.js"></script>        

    </head>
    <body>
                <h3>COMPRAS REALIZADAS</h3>
                <br>            
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM factura WHERE cedula='$cedula';";
                        $resultado=$conn->query($sql);
                        if ($resultado->num_rows >0) {      
                            while($row=$resultado->fetch_assoc()){
                    ?>
                    <table>
                    <thead>
                        <tr>
                            <th>FACTURA</th>
                            <th>FECHA</th>
                            <th>CEDULA</th>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>SUBTOTAL</th>
                            <th>IVA</th>
                            <th>TOTAL</th>
                            <th colspan="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row["numeroF"]; ?></td>
                        <td><?php echo $row["fecha"]; ?></td>
                        <td><?php echo $row["cedula"]; ?></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["apellido"]; ?></td>
                        <td><?php echo $row["subtotal"]; ?></td>
                        <td><?php echo $row["iva"]; ?></td>
                        <td><?php echo $row["total"]; ?></td>
                        <th><a href="listarDetallesA.php?factura=<?php echo $row["numeroF"];?>"><img src="css/deta.png" height="50px"></a></th>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "No se han registrado compras.";
                        }
                    ?>
                </tbody>
            </table>
        <input type="button"value="Home" onclick="location.href = 'homeAdm.php';" style="width: 101px; margin-left: 25px"/>
                
        <?php
        $conn->close();  
        ?>
    </body>
</html>
