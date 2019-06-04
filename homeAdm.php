
<!DOCTYPE html>
<html class="cabe">
    <head>
        <meta charset="utf-8">
        <title>Home Administrador</title>
        <link href="estiloHome.css" rel="stylesheet"/>
    </head>
    <body enctype="multipart/form-data">
        <header class="cabecera">
        <nav>
            <ul>
                <li><a href="listarProductos.php">Productos</a></li>
                <li><a href="listarEmpresas.php">Empresas</a></li>
                <li><a href="listarUsers.php">Usuarios</a></li>
               
                <li><a href="login.php">Cerrar sesión</a></li>
                
              
            </ul>
        </nav>
    
            <br>
             <br>
             <br>
             <br>
            
    </header>
        <div method="post">
           
            <header >
                <div style="margin-left:-80px;">
                <?php
                        include("conexion.php");
                        @
                        $sql = "SELECT * FROM usuarios WHERE cedula='0196426882' ;";
                        $result=$conn->query($sql);
                        
                        if($result->num_rows > 0){

                            while($row=$result->fetch_assoc()){
                         echo '<img  style="float:left; margin-left:150px;" height="100px" src="data:image/jpeg;base64,'.base64_encode($row['imagen']) .' "/>';
                //    echo   "<a class="bin" style="block:line;" >Bienvenid@ ".$row['nombre'] ." ". $row['apellido'] ."!". "</a>";  
                  echo "<h1>".$row['nombre']." ". $row['apellido'] ."</h1>";   
                }
                        }else{
                            echo "<tr>";
                            echo "<td colspan='7'> No existen mensajes registrados en el sistema </td>";
                            echo "</tr>";
                        }
                    
                    $conn->close();
                    ?>
                   
                   
                                  
                   
                </div>
            </header>   
        </div>
      
    </body>
</html>
