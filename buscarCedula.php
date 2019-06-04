
<?php

    include 'conexion.php';
    $cedula = $_GET["cedula"];

    $sql = "SELECT * FROM usuarios WHERE cedula = '$cedula'";

    $result = $conn->query($sql);
    echo "    <table style='width:100%' enctype='multipart/form-data'>
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
                    <th></th>
                    <th></th>
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row["cedula"] . "</td>";
echo '<td><img height="60px" src="data:image/jpeg;base64,'.base64_encode($row["imagen"]).'"/></td>';
            echo "   <td>" . $row['nombre'] ."</td>";
            echo "   <td>" . $row['apellido'] . "</td>";
            echo "   <td>" . $row['telefono'] . "</td>";
            echo "   <td>" . $row['genero'] . "</td>";
            echo "   <td>" . $row['correo'] . "</td>";         
            echo "   <td>" . $row['contrasenia'] . "</td>";     
            echo "   <td>" . $row['rol'] . "</td>";  
            echo "   <td> <a href='usuarioAd.php?cedula=". $row["cedula"] . "'>Modificar</a></td>";      
            echo "   <td> <a href='eliminarU.php?cedula=". $row["cedula"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar al usuario?\")'>Eliminar</a></td>";                              
            echo "</tr>";            
        }        
    } else {        
        echo "   <tr>";
        echo "      <td colspan='8'> No existen personas registradas en el sistema </td>";
        echo "   </tr>";        
    }
    echo "</table>";
    $conn->close();  
    
?>
