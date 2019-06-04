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
<html>
    <head>
        <meta charset="utf-8">
        <title>Home Cliente</title>
        <link href="estiloHome.css" rel="stylesheet"/>
    </head>
    <body enctype="multipart/form-data">
        <header class="cabecera">
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="Contactos.html">Contacto</a></li>
                <li><a href="login.php">Cerrar sesión</a></li>
                <li><a href="Mision.html">Contacto</a></li>
                <li><a href="Vision.html">Cerrar sesión</a></li>
                
              
            </ul>
        </nav>
            </header>
        <?php
        include("conexion.php");
        $sql = "SELECT * FROM usuarios WHERE correo = '$cor' and contrasenia = '$con';";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $cedula=$row['cedula'];
            $nombres=$row['nombre'];
            $apellidos=$row['apellido'];
        }
        $_SESSION["cedula"]=$cedula;
        $_SESSION["nombres"]=$nombres;
        $_SESSION["apellidos"]=$apellidos;
        
        ?>
        <div method="post">
            <header class="cab">
                <div style="margin-left:-80px;">
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM usuarios WHERE cedula='$cedula';";
                        $resultado=$conn->query($sql);
                        while($row=$resultado->fetch_assoc()){
                    ?>                  
                        <img style="float:left; margin:70px;" height="80px"src="data:image/jp;base64,<?php echo base64_encode($row['imagen']); ?>"/>
                    <?php
                        }
                    ?>           

                <a style="block:line;"  class="bin">Bienvenid@ <?php echo $nombres ." ". $apellidos ."!";?></a>
                <a href="usuarios.php" class="bin"><h5>MODIFICAR INORMACION PERSONAL</h5></a>
                <a href="homCli.php" class="bin"><h5>LISTA DE EMPRESAS</h5></a>
                <a href="tarjetasU.php" class="bin"><h5>INGRESAR TARJETA</h5></a>
                <a href="carrito.php" class="bin" ><h5>VERIFICAR CARRITO <img style="height:20px;" src="iconos/carrito.png"></h5></a>
                <a href="listarC.php" class="bin"><h5>HISTORIAL DE COMPRAS</h5></a>
                </div>
            </header>            
            <center>

                <h3>LISTA DE EMPRESAS</h3>
                <br>
            <table>
                <thead>
                    <tr>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <th colspan="5"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM empresa";
                        $resultado=$conn->query($sql);
                        while($row=$resultado->fetch_assoc()){
                    ?>
                    <tr>
                        <td><img height="60px" src="data:image/jp;base64,<?php echo base64_encode($row['emp_img']); ?>"/></td>
                        <td><?php echo $row["emp_nombre"]; ?></td>
                        <td><?php echo $row["emp_direccion"]; ?></td>
                        <td><?php echo $row["emp_telefono"]; ?></td>
                        <th><a href="homeSucursal.php?codigoP=<?php echo $row["emp_cod"];?>" ><img src="css/deta.png" height="70px"></a></th>
                    </tr>
                    <?php
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

