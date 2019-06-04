
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $codigo=$_REQUEST['codigo'];
    $sql = "DELETE FROM tarjetas WHERE codigo='$codigo'";

    if($conn->query($sql) === TRUE){
         header("Location: tarjetasU.php");
    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>
