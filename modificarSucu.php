
<!DOCTYPE html>
<html>
<head>
    <title>Editar información de la sucursal</title>
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
    $cedula=$_REQUEST['cedula'];
    echo 'C: '.$cedula;
    $sql ="UPDATE sucursal SET `su_img`= '" .$imagen. "', `su_nombre` = '" .$nombre. "', `su_direccion` = '" .$apellido. "', `su_telefono` = '" .$telefono. "' WHERE `su_cod` = '"  .$cedula. "'";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: listarEmpresas.php");     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }

    $conn->close();
    
?>
</body>
</html>