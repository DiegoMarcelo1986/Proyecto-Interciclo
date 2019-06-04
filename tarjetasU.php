
<?php
    session_start();
    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    $cedula=$_SESSION["cedula"];
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
        <title>Metodo de pagos</title>
        <link href="cs_form.css" rel="stylesheet"/>
        <link href="estiloHome.css" rel="stylesheet"/>
        <script src="validacionesU.js"></script>        

    </head>
    <body>
            <form id="form1" atributes action="agregarT.php" method="post">      
            <div><h3>Datos Nueva Tarjeta</h3></div>

            <div>
                <label class="tarjetasL" for="nombres">Titular:</label>
                <input type="text" id="titular" name="titular" title="Ingrese sus dos nombres" placeholder="Nombre Apellido" onkeypress="return soloLetras(event);" onblur="return validarNombres(titular);"  required/>   
            </div>                                                 
            <div id="eTitular" style="color: red; margin-left: 150px; font-size: 11px;"></div>
        
            <div>
                <label style="width: 101px;" 
                       for="numT">Numero tarjeta:</label>
                <input type="text" id="numT" name="numT" placeholder="4321############"  onkeypress="return soloNumeros(event);" minlength="16" maxlength="16"  required />    
            </div>                                           
            <div id="eNumT" style="color: red; margin-left: 150px; font-size: 11px;"></div>
                
            <div>
                <label class="tarjetasL" for="numT">Vencimiento:</label>
                <input class="tarjetasV" type="text" id="venM" name="venM" placeholder="MM"  onkeypress="return soloNumeros(event);" minlength="2" maxlength="2"  required/> 
                <label class="tarjetaP" for="/">/</label>
                <input class="tarjetasV" type="text" id="venA" name="venA" placeholder="AA"  onkeypress="return soloNumeros(event);" minlength="2" maxlength="2" required /> 
            </div>                                           
            <div id="eVen" style="color: red; margin-left: 150px; font-size: 11px;"></div>

             <div>
                <label class="tarjetasC" for="cvv">CVV:</label>
                <input class="tarjetasC"type="text" id="cvv" name="cvv" placeholder="####"; onkeypress="return soloNumeros(event);" minlength="4" maxlength="4" required/>
            </div>                                                                    
            <div id="eCVV" style="color: red; margin-left: 150px; font-size: 11px;"></div>
            <div>
            <input type="button"value="Home" onclick="location.href = 'homeCli.php';" style="width: 101px; margin-left: 25px"/>
                
            <input type="submit" value="Añadir" style="width: 101px; margin-left: 25px"/>
            </div>

        </form>

        <div method="post">
            <header >
            </header>            
            <center>

                <h3>TARJETAS ASOCIADAS</h3>
                <br>            
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM tarjetas WHERE cedulaPro='$cedula';";
                        $resultado=$conn->query($sql);
                        if ($resultado->num_rows >0) {      
                            while($row=$resultado->fetch_assoc()){
                    ?>
                    <table>
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>C.I PROPIETARIO</th>
                            <th>TITULAR</th>
                            <th>NUMERO</th>
                            <th>VENCIMIENTO</th>
                            <th>CVV</th>
                            <th colspan="5"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row["codigo"]; ?></td>
                        <td><?php echo $row["cedulaPro"]; ?></td>
                        <td><?php echo $row["titular"]; ?></td>
                        <td><?php echo $row["numero"]; ?></td>
                        <td><?php echo $row["vencimiento"]; ?></td>
                        <td><?php echo $row["cvv"]; ?></td>
                        <th><a href="eliminarT.php?codigo=<?php echo $row["codigo"];?>" onclick="return confirm('¿Está seguro que desea eliminar la tarjeta?')">Eliminar</a></th>
                    </tr>
                    <?php
                            }
                        }else{
                            echo "No se han agregado tarjetas.";
                        }
                    ?>
                </tbody>
            </table>
        </center>
        </div>
        <?php
        $conn->close();  
        ?>
    </body>
</html>
