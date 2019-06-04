
<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    include 'conexion.php';
    $codigo = $_GET["emp_cod"];

    $sql = "SELECT * FROM empresa WHERE emp_cod = $codigo";

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
            echo "   <td>" . $row["emp_cod"] . "</td>";
echo '<td><img height="60px" src="data:image/jpeg;base64,'.base64_encode($row["emp_img"]).'"/></td>';
            echo "   <td>" . $row['emp_nombre'] ."</td>";
            echo "   <td>" . $row['emp_direccion'] . "</td>";
            echo "   <td>" . $row['emp_telefono'] . "</td>";
            echo "   <td> <a href='modificarEmpresa.php?codigo=". $row["emp_cod"] . "'>Modificar</a></td>";      
            echo "   <td> <a href='eliminarEmpresa.php?codigo=". $row["emp_cod"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar la empresa seleccionada?\")'>Eliminar</a></td>";                              
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