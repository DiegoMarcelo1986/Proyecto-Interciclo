
<!DOCTYPE html>
<html>
<head>
    <title>Editar información del Usuario</title>
</head>
<body>
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $imagen=addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));   
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $genero = $_POST["genero"];
    $correo = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    $cedula=$_REQUEST['cedula'];
    echo 'C: '.$cedula;
    $sql ="UPDATE usuarios SET `imagen`= '" .$imagen. "', `nombre` = '" .$nombre. "', `apellido` = '" .$apellido. "', `telefono` = '" .$telefono. "', `genero` = '" .$genero.  "', `correo` = '" .$correo. "', `contrasenia` = '" .$contrasenia. "' WHERE `cedula` = '"  .$cedula. "'";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: homeAdm.php");     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }

    $conn->close();
    
?>
</body>
</html>