
<?php
    session_start();

    $enlace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

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
        <title>Home Administrador</title>
        <link href="estiloHome.css" rel="stylesheet"/>
    </head>
    
    <body enctype="multipart/form-data">
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
        ?>
        
          <header class="cabecera">
        <nav>
            <ul>
                <li><a href="homeAdm.php">Home</a></li>
                <li><a href="listarUsers.php">Usuarios</a></li>
                <li> <a href="login.php">Cerrar sesión</a></li>
              
            </ul>
        </nav>
    
            <br>
             <br>
             <br>
             <br>
    </header>
        <div method="post">
            <header class="cab" >
                <div style="margin-left:-80px;">
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM usuarios WHERE cedula='$cedula';";
                        $resultado=$conn->query($sql);
                        while($row=$resultado->fetch_assoc()){
                    ?>                  
                        <img style="float:left; margin-left:100px;" height="80px"src="data:image/jp;base64,<?php echo base64_encode($row['imagen']); ?>"/>
                    <?php
                        }
                    ?>           

                <a style="block:line;" class="bin">Bienvenid@ <?php echo $nombres ." ". $apellidos ."!";?></a>
                
                </div>
            </header>            
            <center>
            <table>
                <caption><h3>USUARIOS</h3></caption>
                <thead>
                    <tr>
                        <th>CEDULA</th>
                        <th>IMAGEN</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>TELEFONO</th>
                        <th>GENERO</th>
                        <th>CORREO</th>
                        <th>CONTRASEÑA</th>
                        <th>ROL</th>
                        <th><a href="buscarU.php"><img src="css/busU.png" height="50px"></a></th>
                        <th colspan="20"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM usuarios";
                        $resultado=$conn->query($sql);
                        while($row=$resultado->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td><?php echo $row["cedula"]; ?></td>
<td><img height="60px" src="data:image/jp;base64,<?php echo base64_encode($row['imagen']); ?>"/></td>
                        <td><?php echo $row["nombre"]; ?></td>
                        <td><?php echo $row["apellido"]; ?></td>
                        <td><?php echo $row["telefono"]; ?></td>
                        <td><?php echo $row["genero"]; ?></td>
                        <td><?php echo $row["correo"]; ?></td>
                        <td><?php echo $row["contrasenia"]; ?></td>
                        <td><?php echo $row["rol"]; ?></td>
                        <th><a href="listarCA.php?cedula=<?php echo $row["cedula"];?>"><img src="css/histo.png" height="50px"></a></th>
                        
                        <th><a href="usuarioAd.php?cedula=<?php echo $row["cedula"];?>"><img src="css/modU.png" height="50px"></a></th>
                        
<!--                        <th><a href="eliminarU.php?cedula=<?php echo $row["cedula"];?>" onclick="return confirm('¿Está seguro que desea eliminar al usuario?')"></a><img src="css/eliU.png" height="50px"></th>-->
                        
                        <th><a href="eliminarU.php?cedula=<?php echo $row["cedula"];?>" 
                               onclick="return confirm('¿Está seguro que desea eliminar al usuario?')">                            
                            <img src="css/eliU.png" height="50px">                            
                            </a></th>
                        
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
