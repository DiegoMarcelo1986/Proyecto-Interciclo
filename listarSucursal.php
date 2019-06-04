
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

  //  $codigo= $_GET['emp_cod'];
       
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
                <caption><h3>LISTA DE SUCURSALES</h3></caption>
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>DIRECCION</th>
                        <th>TELEFONO</th>
                        <?php
                        include("conexion.php");
                        $codigo= $_GET['emp_cod'];
                        //echo $codigo;
                        echo " <td> <a href='crearSucursal.php?emp_cod=" .$codigo . "'> NUEVO   </a> </td>";
                        echo "<th>"
                        ?>
                        <th><a href="buscarSucursal.php"><img src="css/lupa.png" height="50px"></a></th>
                    
                        <th colspan="20"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include("conexion.php");
                        $codigo= $_GET['emp_cod'];
                        $sql = "SELECT su_cod,su_img,su_nombre,su_direccion,su_telefono FROM  sucursal, empresa WHERE  sucursal.emp_cod=empresa.emp_cod and empresa.emp_cod=$codigo";
                        $result=$conn->query($sql);
                        
                        if($result->num_rows > 0){

                            while($row=$result->fetch_assoc()){
                              echo "<tr>";
                              echo " <td>" . $row["su_cod"] . "</td>";
                              echo " <td>" . $row['su_nombre'] ."</td>";
                              echo " <td>" . $row['su_direccion'] . "</td>";
                              echo " <td>" . $row['su_telefono'] . "</td>";
                              echo "<td>".'<img  height="40px" src="data:image/jpeg;base64,'.base64_encode($row['su_img']) .' "/>'."</td>";
                              echo " <td> <a href='modificarSucursal.php?su_cod=" . $row['su_cod'] . "'>Modificar</a> </td>";
                              echo "   <td> <a href='eliminarSucursal.php?su_cod=". $row["su_cod"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar la empresa seleccionada?\")'>Eliminar</a></td>";                              
          
                              echo "</tr>";
                            }
                        }else{
                            echo "<tr>";
                            echo "<td colspan='7'> No existen empresas registrados en el sistema </td>";
                            echo "</tr>";
                        }
                    
                    $conn->close();
                        
                      
                        
                    ?>
                </tbody>
            </table>
      
        </div>
      
    </body>
</html>
