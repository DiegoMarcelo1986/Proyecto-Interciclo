
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $codigo=$_GET['codigo'];
    $sql = "DELETE FROM productos WHERE pro_cod='$codigo'";

    if($conn->query($sql) === TRUE){
         header("Location: homeAdm.php");
    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>