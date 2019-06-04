
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
                        $factura=$_GET['factura'];
                        echo $factura;
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
                        <td></td>
                        <td><?php echo $row["precioU"]; ?></td>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "No existen detalles.";
                        }
                    ?>
                </tbody>
            </table>
        <input type="button"value="Regresar" onclick="location.href = 'listarC.php';" style="width: 101px; margin-left: 25px"/>
                
        <?php
        $conn->close();  
        ?>
    </body>
</html>
