
<?php
    session_start();

    $enlace = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    $cor=$_SESSION["correo"];
    $con=$_SESSION["contrasenia"];
//    $cedula=$_SESSION["cedula"];
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
                <li><a href="listarEmpresas.php">Empresas</a></li>
             
                <li> <a href="login.php">Cerrar sesión</a></li>
              
            </ul>
        </nav>
    
            <br>
             <br>
             <br>
             <br>
    </header>
        <div method="post">
            <header  class="cab">
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

                <a class="bin" style="block:line;" >Bienvenid@ <?php echo $nombres ." ". $apellidos ."!";?></a>
               
                </div>
            </header>            
         
            <table>
                <caption><h3>Productos</h3></caption>
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>PRECIO</th>
                        <th><a href="crearProductos.php"><img src="css/agregar.png" height="50px"></a></th>
                        <th><a href="buscarProducto.php"><img src="css/lupa.png" height="50px"></a></th>
                        
                        <th colspan="20"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conexion.php");
                        $sql = "SELECT * FROM productos";
                        $result=$conn->query($sql);
                        
                        if($result->num_rows > 0){

                            while($row=$result->fetch_assoc()){
                              echo "<tr>";
                              echo " <td>" . $row["pro_cod"] . "</td>";
                              echo " <td>" . $row['pro_nombre'] ."</td>";
                              echo " <td>" . $row['pro_desc'] . "</td>";
                              echo " <td>" . $row['pro_precio'] . "</td>";
                              echo "<td>".'<img  height="40px" src="data:image/jpeg;base64,'.base64_encode($row['pro_img']) .' "/>'."</td>";
                              echo " <td> <a href='modificarProductos.php?codigo=" . $row['pro_cod'] . "'>Modificar</a> </td>";
                              echo "   <td> <a href='eliminarEmpresa.php?codigo=". $row["pro_cod"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar la empresa seleccionada?\")'>Eliminar</a></td>";                              
          
                              echo "</tr>";
                            }
                        }else{
                            echo "<tr>";
                            echo "<td colspan='7'> No existen mensajes registrados en el sistema </td>";
                            echo "</tr>";
                        }
                    
                    $conn->close();
                        
                      
                        
                    ?>
                </tbody>
            </table>
      
        </div>
      
    </body>
</html>
