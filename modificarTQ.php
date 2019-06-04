
<!DOCTYPE html>
<html>
<head>
    <title>tARJETAS</title>
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
    $titular = $_POST["nombre"];
    $numero = $_POST["telefono"];
    $vence = $_POST["correo"];
    $vcc = $_POST["contrasenia"];
    $codigo=$_REQUEST['codigo'];
    echo 'C: '.$codigo;
    $sql ="UPDATE tarjetas SET  `titular` = '" .$titular.  "', `numero` = '" .$numero.  "', `vencimiento` = '" .$vence. "', `cvv` = '" .$vcc. "' WHERE `codigo` = '"  .$codigo. "'";

    if ($conn->query($sql) === TRUE) {
        
     header("Location: tarjetasU.php");     
    } else {        
        echo "Error: " . $sql . "<br>" . $conn->errno . "<br>";        
    }

    $conn->close();
    
?>
</body>
</html>