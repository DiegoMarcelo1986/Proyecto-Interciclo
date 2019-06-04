
<?php
    session_start();    
    if(!isset($_SESSION['logueado']) || $_SESSION['logueado'] != "true"){
        echo "<script>alert('No tiene permisos para ingresar');</script>";
        header("Location: login.php");
    }

    //incluir conexión a la base de datos
    include 'conexion.php';
    $cedula=$_SESSION["cedula"];
    $titular = $_POST["titular"];
    $numero = $_POST["numT"];
    $mes = $_POST["venM"];
    $anio = $_POST["venA"];
    $cvv = $_POST["cvv"];
    $vencimiento=$mes ."/".$anio;
    
    echo "D: ".$cedula." ".$titular." ".$numero." ".$vencimiento." ".$cvv;

    $sql = "INSERT INTO tarjetas VALUES(NULL,'$cedula','$titular','$numero','$vencimiento','$cvv')";  
    if($conn->query($sql) === TRUE){
         header("Location: tarjetasU.php");
    }else{
        echo "Error: ". $sql . "<br> . $conn->error";
    }
    $conn->close();
?>
