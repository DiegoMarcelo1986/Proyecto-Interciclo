
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    $cedula=$_SESSION["cedula"];
    $factura=$_REQUEST["factura"];
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
    echo 'F: '.$factura;
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
                <h3>DETALLES DE FACTURA</h3>
                <br>            
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM detalle WHERE numeroF='$factura';";
                        $resultado=$conn->query($sql);
                        if ($resultado->num_rows >0) {      
                            while($row=$resultado->fetch_assoc()){
                    ?>
                    <table>
                    <thead>
                        <tr>
                            <th>PRODUCTO</th>
                            <th>PRECIO UNIDAD</th>
                            <th colspan="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["precioU"]; ?></td>
                         <td></td>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "No existen detalles.";
                        }
                    ?>
                </tbody>
            </table>

        <?php
        $conn->close();  
        ?>
    </body>
</html>
