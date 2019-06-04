
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
    $telefono = $_POST["telefono"];
    $apellido = $_POST['apellido'];
    $cedula=$_GET['emp_cod'];
    echo 'C: '.$cedula;
    $sql ="UPDATE empresa SET  emp_img = ".$imagen." `emp_nombre` = '" .$nombre. "', `emp_direccion` = '" .$apellido. "', `emp_telefono` = '" .$telefono. "',  WHERE `emp_cod` = "  .$cedula. "";

    if ($conn->query($sql) === TRUE) {
        
        header("Location: homeAdm.php");     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }

    $conn->close();
    
?>
</body>
</html>