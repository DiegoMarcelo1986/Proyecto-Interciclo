
<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    include 'conexion.php';
    $codigo = $_GET["su_cod"];

    $sql = "SELECT * FROM sucursal WHERE su_cod = $codigo";

    $result = $conn->query($sql);
    echo "    <table style='width:100%' enctype='multipart/form-data'>
                <tr>
                    <th>CODIGO</th>
                    <th>IMAGEN</th> 
                    <th>NOMBRE</th> 
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    
                    <th></th>
                    <th></th>
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row["su_cod"] . "</td>";
echo '<td><img height="60px" src="data:image/jpeg;base64,'.base64_encode($row["emp_img"]).'"/></td>';
            echo "   <td>" . $row['su_nombre'] ."</td>";
            echo "   <td>" . $row['su_direccion'] . "</td>";
            echo "   <td>" . $row['su_telefono'] . "</td>";
            echo "   <td> <a href='modificarSucursal.php?codigo=". $row["su_cod"] . "'>Modificar</a></td>";      
            echo "   <td> <a href='eliminarSucursal.php?codigo=". $row["su_cod"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar la empresa seleccionada?\")'>Eliminar</a></td>";                              
            echo "</tr>";            
        }        
    } else {        
        echo "   <tr>";
        echo "      <td colspan='8'> No existen productos registrados en el sistema </td>";
        echo "   </tr>";        
    }
    echo "</table>";
    $conn->close();  
    
?>