
<?php
    session_start();

    $enlace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        
    $ced=$_SESSION["cedula"];

    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        header("Location: login.php");
        exit;
    }
    include 'conexion.php';
?>

<!DOCTYPE html>
<html class="c">
    <head>
        <meta charset="utf-8">
        <title>Carrito</title>
        <link href="cs_form.css" rel="stylesheet"/>
         <link href="estiloHome.css" rel="stylesheet"/>
    </head>
    <body atributes action="agregarFactura.php" method="post">
    <header>
        <h1>Carrito de compras <img style="height:100px;" src="iconos/carrito.png"></h1>
    </header>
        <form name="f" id="f">
        <center>
            <table>
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM carrito WHERE cedulaPro='$ced'";
                        $resultado=$conn->query($sql);
                        $sub=0;
                        if ($resultado->num_rows >0) { 
                            echo '<caption><h3>PRODUCTOS</h3></caption>';

                            while($row=$resultado->fetch_assoc()){

                    ?>
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row["codPro"]; ?></td>
                        <td><?php echo $row["nomPro"]; ?></td>
                        <td><?php echo $row["precioPro"]; ?></td>
                        <th><a href="eliminarPC.php?codigo=<?php echo $row["codigo"];?>" onclick="return confirm('¿Está seguro que desea eliminar el producto?')"><img src="css/eliminar.png" height="50px"></a></th>
                        <?php $sub+=$row["precioPro"]; ?>

                    </tr>
                    <?php
                            }

                        }else{
                            echo "Carrito está vacío.";
                        }
                    ?>
                </tbody>
            </table>
                <?php
                     echo "Subtotal: $".$sub;
                    $_SESSION["sub"]=$sub;
            
                ?>
            </center>
        <input type="button"value="Home" onclick="location.href = 'homeCli.php';" style="width: 101px; margin-left: 25px"/>
    
        <input type="button"value="Comprar" name="compra" id="compra" style="width: 101px; margin-left: 25px"
        href="javascript:void(0);"
        onclick="window.open('listarT.php?sub=<?php echo $sub;?>',  'popup', 'top=220, left=400, width=550, height=300, toolbar=NO, resizable=NO, Location=NO, Menubar=NO,  Titlebar=No, Status=NO')" rel="nofollow"
        />
    
        </form>
    </body>
</html>


