
<?php
    session_start();
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    include 'conexion.php';
    $codigo = $_GET["codigo"];

    $sql = "SELECT * FROM productos WHERE pro_cod = $codigo";

    $result = $conn->query($sql);
    echo "    <table style='width:100%' enctype='multipart/form-data'>
                <tr>
                    <th>CODIGO</th>
                    <th>IMAGEN</th> 
                    <th>NOMBRE</th> 
                    <th>DESCRIPCION</th>
                    <th>PRECIO</th>
                    <th></th>
                    <th></th>
                </tr>";

    if ($result->num_rows > 0) {        
        while($row = $result->fetch_assoc()) {
            
            echo "<tr>";
            echo "   <td>" . $row["pro_cod"] . "</td>";
echo '<td><img height="60px" src="data:image/jpeg;base64,'.base64_encode($row["pro_img"]).'"/></td>';
            echo "   <td>" . $row['pro_nombre'] ."</td>";
            echo "   <td>" . $row['pro_desc'] . "</td>";
            echo "   <td>" . $row['pro_precio'] . "</td>";
              
            echo "   <td> <a href='modificarProductos.php?codigo=". $row["pro_cod"] . "'>Modificar</a></td>";      
            echo "   <td> <a href='eliminarProductos.php?codigo=". $row["pro_cod"] . "' onclick='return confirm(\"¿Está seguro que desea eliminar el producto seleccionado?\")'>Eliminar</a></td>";                              
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