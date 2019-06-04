
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $cedula=$_REQUEST['cedula'];
    $sql = "DELETE FROM usuarios WHERE cedula='$cedula'";
    if($conn->query($sql) === TRUE){
         header("Location: homeAdm.php");
    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }

    $sqlT = "DELETE FROM tarjetas WHERE cedulaPro='$cedula'";
    if($conn->query($sqlT) === TRUE){
         header("Location: homeAdm.php");
    }else{
        echo "Error: ". $sqT . "<br> . $conn->error";
    }

    $sqlC = "DELETE FROM carrito WHERE cedulaPro='$cedula'";
    if($conn->query($sqlC) === TRUE){
         header("Location: homeAdm.php");
    }else{
        echo "Error: ". $sqC . "<br> . $conn->error";
    }

    $conn->close();
?>
