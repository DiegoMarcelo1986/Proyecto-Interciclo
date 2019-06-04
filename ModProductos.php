
<!DOCTYPE html>
<html>
<head>
    <title>Actualizar Productos</title>
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
    $desc = $_POST["desc"];
    $precio = $_POST["pre"];
    $codigo= $_GET["cod"];
    echo 'Codigo:' .$codigo;
    /*
    $sql ="UPDATE `productos` SET `imagen`= '" .$imagen. "', `nombre` = '" .$nombre. "', `descripcion` = '" .$desc. "', `precio` = '" .$precio. "', `disponible`= 'si' WHERE `codigo` = '"  .$codigo. "'";*/
    
    $sql ="UPDATE productos SET pro_img='$imagen', pro_nombre='$nombre',pro_desc='$desc',pro_precio='$precio', pro_disponible='si' WHERE codigo=$codigo";
    
    if ($conn->query($sql) === TRUE) {
        //echo 'bien';
        header("Location: listarProductos.php");     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }

    $conn->close();
    
?>
</body>
</html>